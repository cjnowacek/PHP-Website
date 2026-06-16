<?php
// includes/contact_handler.php
require_once __DIR__ . '/config.php';

header('Content-Type: application/json');

// Only allow POST requests
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405);
    echo json_encode(['error' => 'Method not allowed']);
    exit;
}

// Validate required fields
$requiredFields = ['name', 'email', 'subject', 'message'];
$errors = [];

foreach ($requiredFields as $field) {
    if (empty($_POST[$field])) {
        $errors[] = ucfirst($field) . ' is required';
    }
}

// Validate email
if (!empty($_POST['email']) && !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
    $errors[] = 'Please enter a valid email address';
}

if (!empty($errors)) {
    http_response_code(400);
    echo json_encode(['error' => 'Validation failed', 'details' => $errors]);
    exit;
}

// Sanitize inputs
$data = [
    'name' => htmlspecialchars(trim($_POST['name'])),
    'email' => htmlspecialchars(trim($_POST['email'])),
    'company' => htmlspecialchars(trim($_POST['company'] ?? '')),
    'subject' => htmlspecialchars(trim($_POST['subject'])),
    'message' => htmlspecialchars(trim($_POST['message'])),
    'newsletter' => !empty($_POST['newsletter']) ? 'yes' : 'no',
    'timestamp' => date('Y-m-d H:i:s')
];

// Save to file (simple logging / backup). The includes/.htaccess rule blocks
// direct web access to this file.
$logFile = __DIR__ . '/contact_submissions.json';
$submissions = [];

if (file_exists($logFile)) {
    $submissions = json_decode(file_get_contents($logFile), true) ?? [];
}

$submissions[] = $data;
file_put_contents($logFile, json_encode($submissions, JSON_PRETTY_PRINT));

// Email the submission to the site owner.
// Use the raw (unescaped) submitter email for Reply-To so replies go straight back.
$replyTo = filter_var(trim($_POST['email']), FILTER_VALIDATE_EMAIL) ?: $contact_from;

$emailBody = "New contact form submission:\n\n"
    . "Name:       {$data['name']}\n"
    . "Email:      {$data['email']}\n"
    . "Company:    {$data['company']}\n"
    . "Subject:    {$data['subject']}\n"
    . "Newsletter: {$data['newsletter']}\n"
    . "Time:       {$data['timestamp']}\n\n"
    . "Message:\n{$data['message']}\n";

$headers = "From: {$site_name} <{$contact_from}>\r\n"
    . "Reply-To: {$data['name']} <{$replyTo}>\r\n"
    . "Content-Type: text/plain; charset=UTF-8\r\n";

$mailSent = @mail(
    $contact_email,
    'Contact Form: ' . $data['subject'],
    $emailBody,
    $headers,
    '-f' . $contact_from
);

if (!$mailSent) {
    // The submission is still saved to the JSON log above, so it isn't lost.
    error_log('contact_handler: mail() failed for submission from ' . $data['email']);
}

// Return success (submission is recorded even if the email failed to send)
echo json_encode([
    'success' => true,
    'message' => 'Thank you for your message! I\'ll get back to you soon.'
]);
?>
