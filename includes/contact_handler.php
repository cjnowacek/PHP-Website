<?php
// includes/contact_handler.php

header('Content-Type: application/json');

// Only allow POST requests
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405);
    echo json_encode(['error' => 'Method not allowed']);
    exit;
}

// Honeypot: real users never fill this hidden field; bots do
if (!empty($_POST['website'])) {
    echo json_encode(['success' => true, 'message' => 'Thank you for your message!']);
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
    'timestamp' => date('Y-m-d H:i:s')
];

// Save to file (simple logging)
$logFile = __DIR__ . '/contact_submissions.json';
$submissions = [];

if (file_exists($logFile)) {
    $submissions = json_decode(file_get_contents($logFile), true) ?? [];
}

$submissions[] = $data;
file_put_contents($logFile, json_encode($submissions, JSON_PRETTY_PRINT));

// Send the email (JSON log above remains as backup)
$subjectLabels = [
    'job_opportunity' => 'Job Opportunity',
    'freelance_project' => 'Freelance Project',
    'collaboration' => 'Collaboration',
    'technical_question' => 'Technical Question',
    'other' => 'Other',
];
$subjectLabel = $subjectLabels[$data['subject']] ?? $data['subject'];

$body = "New message from cjnowacek.com\n\n"
    . "Name: {$data['name']}\n"
    . "Email: {$data['email']}\n"
    . "Company: {$data['company']}\n"
    . "Subject: {$subjectLabel}\n"
    . "Time: {$data['timestamp']}\n\n"
    . $data['message'] . "\n";

$headers = "From: noreply@cjnowacek.com\r\n"
    . "Reply-To: {$data['email']}\r\n"
    . "Content-Type: text/plain; charset=UTF-8\r\n";

$sent = @mail('cj@cjnowacek.com', 'Portfolio contact: ' . $subjectLabel, $body, $headers);
if (!$sent) {
    error_log('contact_handler: mail() returned false for submission from ' . $data['email']);
}

// Return success (submission is logged even if mail delivery hiccups)
echo json_encode([
    'success' => true,
    'message' => 'Thank you for your message! I\'ll get back to you soon.'
]);
?>
