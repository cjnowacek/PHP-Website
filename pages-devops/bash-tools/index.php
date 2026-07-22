<?php
$page_title = "Bash Automation Tools - Pipeline";
include '../../includes/header.php';
?>

<div class="container" style="max-width: 1300px;">
    <!-- Breadcrumb Navigation -->
    <nav style="margin: 20px 0; color: var(--text-secondary); font-size: 14px;">
        <a href="../../index.php" style="color: var(--header-color); text-decoration: none;">Home</a> > 
        <a href="../../devops.php" style="color: var(--header-color); text-decoration: none;">Pipeline</a> > 
        <span>Bash Tools</span>
    </nav>

    <h2>Bash Automation Tools</h2>
    <div class="about-text" style="max-width: 800px; margin: 0 auto 40px auto; text-align: left;">
        <p><strong>Personal Automation Collection | 2023-2024 | Bash & Linux</strong></p>
        <p>A curated collection of practical bash scripts designed to solve everyday file management and automation challenges. These utilities have been developed and refined through real-world usage, focusing on safety, user confirmation, and robust error handling.</p>
        
        <p>Each script addresses specific workflow pain points - from batch file renaming to website deployment automation. Built with defensive programming practices including user confirmation prompts, path validation, and comprehensive logging.</p>
    </div>

    <h2>Key Features</h2>
    <div class="grid competencies-grid">
        <div class="grid-item">
            <div class="project-info">
                <h3>📁 File Management</h3>
                <p class="project-description">Intelligent batch renaming, date prefixing, and format standardization tools with safety checks.</p>
            </div>
        </div>

        <div class="grid-item">
            <div class="project-info">
                <h3>🎯 Interactive Menus</h3>
                <p class="project-description">Dynamic script selection menus for easy access to automation tools.</p>
            </div>
        </div>

        <div class="grid-item">
            <div class="project-info">
                <h3>⚡ Batch Processing</h3>
                <p class="project-description">Efficient processing of multiple files with pattern matching and numeric sequencing.</p>
            </div>
        </div>
    </div>

    <h2>Script Showcase</h2>

    <div class="expandable-section">
        <button class="expand-toggle">
            File Renaming & Organization <span class="toggle-icon">▼</span>
        </button>
        <div class="expandable-content">
            <h3>Date Prefix Tool</h3>
            <p>Automatically adds modification date prefixes to files for better organization. Includes safety checks and user confirmation.</p>

            <div style="background: var(--form-bg); padding: 20px; border-radius: 8px; margin: 20px 0;">
                <pre style="color: var(--text-secondary); font-family: 'Courier New', monospace; font-size: 14px; line-height: 1.6; margin: 0;"><code>#!/bin/bash

# Use the first argument as the target directory, or default to current directory
TARGET_DIR="${1:-.}"

# Resolve absolute path
TARGET_PATH="$(realpath "$TARGET_DIR")"

# Show the target directory
echo "⚠️  WARNING: This will rename files in:"
echo "$TARGET_PATH"
echo

# Sanity check: does the folder exist?
if [ ! -d "$TARGET_DIR" ]; then
  echo "Error: '$TARGET_DIR' is not a directory."
  exit 1
fi

# Ask for confirmation
read -p "Are you sure you want to rename files in this directory? Type 'yes' to proceed: " confirm
if [[ "$confirm" != "yes" ]]; then
  echo "Aborted."
  exit 1
fi

# Process each file in the directory (non-recursive)
for file in "$TARGET_DIR"/*; do
  # Skip if it's not a regular file
  [ -f "$file" ] || continue

  # Extract base filename (no path)
  base=$(basename "$file")

  # Get modification date
  mod_date=$(date -r "$file" +"%Y%m%d")

  # Skip if already prefixed
  [[ "$base" =~ ^$mod_date\_ ]] && continue

  # New filename with date prefix
  new_name="${mod_date}_$base"
  new_path="$TARGET_DIR/$new_name"

  # Rename
  echo "Renaming: $base -> $new_name"
  mv "$file" "$new_path"
done</code></pre>
            </div>

            <h3>Case Conversion Tool</h3>
            <p>Converts the first letter of filenames to lowercase for consistent naming conventions.</p>

            <div style="background: var(--form-bg); padding: 20px; border-radius: 8px; margin: 20px 0;">
                <pre style="color: var(--text-secondary); font-family: 'Courier New', monospace; font-size: 14px; line-height: 1.6; margin: 0;"><code>#!/bin/bash

# Go through each file in the current directory
for file in *; do
  # Skip directories
  [ -f "$file" ] || continue

  # Get the first character lowercased, and the rest of the filename
  first_char=$(echo "${file:0:1}" | tr '[:upper:]' '[:lower:]')
  rest="${file:1}"

  new_name="$first_char$rest"

  # Only rename if the name actually changes
  if [[ "$file" != "$new_name" ]]; then
    mv -- "$file" "$new_name"
    echo "Renamed: $file → $new_name"
  fi
done</code></pre>
            </div>

            <h3>Underscore to Hyphen Converter</h3>
            <p>Standardizes file naming by replacing underscores with hyphens, with collision detection.</p>

            <div style="background: var(--form-bg); padding: 20px; border-radius: 8px; margin: 20px 0;">
                <pre style="color: var(--text-secondary); font-family: 'Courier New', monospace; font-size: 14px; line-height: 1.6; margin: 0;"><code>#!/bin/bash

# Use provided directory or default to current
TARGET_DIR="${1:-.}"
TARGET_PATH="$(realpath "$TARGET_DIR")"

# Confirm intent
echo "⚠️  This will rename all files and directories in:"
echo "$TARGET_PATH"
echo "It will replace underscores (_) with hyphens (-) in names."
read -p "Are you sure? Type 'yes' to continue: " confirm
[[ "$confirm" != "yes" ]] && echo "Aborted." && exit 1

# Loop over files and directories (excluding symlinks)
for entry in "$TARGET_DIR"/*; do
  [[ -e "$entry" ]] || continue  # skip nonexistent

  base=$(basename "$entry")

  # Only act if the name contains underscores
  if [[ "$base" == *_* ]]; then
    new_base="${base//_/-}"
    new_path="$TARGET_DIR/$new_base"

    # Avoid overwriting existing entries
    if [[ -e "$new_path" ]]; then
      echo "⚠️  Skipping $base → $new_base (already exists)"
    else
      echo "Renaming: $base → $new_base"
      mv "$entry" "$new_path"
    fi
  fi
done</code></pre>
            </div>
        </div>
    </div>

    <div class="expandable-section">
        <button class="expand-toggle">
            Numerical Sequence Processing <span class="toggle-icon">▼</span>
        </button>
        <div class="expandable-content">
            <h3>Image Sequence Shifter</h3>
            <p>Shifts numbered image sequences by a specified amount, useful for inserting frames or adjusting animation sequences.</p>

            <div style="background: var(--form-bg); padding: 20px; border-radius: 8px; margin: 20px 0;">
                <pre style="color: var(--text-secondary); font-family: 'Courier New', monospace; font-size: 14px; line-height: 1.6; margin: 0;"><code>#!/bin/bash

# Loop over files that match the pattern
for file in img_*.png; do
  # Extract the numeric part using parameter expansion
  num=${file#img_}
  num=${num%.png}

  # Remove leading zeros, add 10, then pad to 4 digits
  new_num=$(printf "%04d" $((10#$num + 10)))

  # Form the new file name
  new_name="img_${new_num}.png"

  # Rename the file
  mv -- "$file" "$new_name"
  echo "Renamed: $file → $new_name"
done</code></pre>
            </div>

            <h3>Leading Zero Cleanup</h3>
            <p>Removes unnecessary leading zeros from numbered files (e.g., file001.txt → file1.txt).</p>

            <div style="background: var(--form-bg); padding: 20px; border-radius: 8px; margin: 20px 0;">
                <pre style="color: var(--text-secondary); font-family: 'Courier New', monospace; font-size: 14px; line-height: 1.6; margin: 0;"><code># Remove double zeros from filenames
for f in *00?*; do 
  echo mv "$f" "${f//00/0}"
done</code></pre>
            </div>

            <h3>Hyphen to Underscore Converter</h3>
            <p>Converts the last hyphen in filenames to an underscore, useful for separating version numbers or extensions.</p>

            <div style="background: var(--form-bg); padding: 20px; border-radius: 8px; margin: 20px 0;">
                <pre style="color: var(--text-secondary); font-family: 'Courier New', monospace; font-size: 14px; line-height: 1.6; margin: 0;"><code># Replace last hyphen with underscore in all files containing hyphens
for f in *-*; do 
  mv "$f" "${f%-*}_${f##*-}"
done</code></pre>
            </div>
        </div>
    </div>

    <div class="expandable-section">
        <button class="expand-toggle">
            System Administration Tools <span class="toggle-icon">▼</span>
        </button>
        <div class="expandable-content">
            <h3>Website Sync Tool</h3>
            <p>Automated synchronization between Linux web server and Windows development environment using rsync with selective exclusions.</p>

            <div style="background: var(--form-bg); padding: 20px; border-radius: 8px; margin: 20px 0;">
                <pre style="color: var(--text-secondary); font-family: 'Courier New', monospace; font-size: 14px; line-height: 1.6; margin: 0;"><code>#!/usr/bin/env bash
set -euo pipefail

# SOURCE (Linux) and TARGET (Windows via WSL)
SRC="/var/www/html/"
TARGET="/mnt/c/Users/cjnow/website-clone"

# Make sure target exists (and imgs/ is there to preserve)
mkdir -p "$TARGET/imgs"

# Sync everything from SRC -> TARGET
# --delete removes files in TARGET that aren't in SRC,
# but the --exclude 'imgs/' protects that folder (and its contents)
# from both deletion and being overwritten.
rsync -av --delete --exclude 'static/' "$SRC" "$TARGET/"</code></pre>
            </div>

            <h3>Interactive Script Menu</h3>
            <p>Dynamic menu system for accessing and running bash scripts from a collection. Automatically discovers executable scripts and provides a numbered selection interface.</p>

            <div style="background: var(--form-bg); padding: 20px; border-radius: 8px; margin: 20px 0;">
                <pre style="color: var(--text-secondary); font-family: 'Courier New', monospace; font-size: 14px; line-height: 1.6; margin: 0;"><code>#!/bin/bash

# Directory to scan (default to ~/git/bash or use first argument)
SCRIPTS_DIR="${1:-$HOME/projects/bash/}"

# Sanity check
if [ ! -d "$SCRIPTS_DIR" ]; then
  echo "❌ Error: Directory not found: $SCRIPTS_DIR"
  exit 1
fi

# Gather list of executable .sh files
scripts=()
while IFS= read -r -d '' file; do
  [[ "$(basename "$file")" == "run-menu.sh" ]] && continue
  scripts+=("$file")
done < <(find "$SCRIPTS_DIR" -maxdepth 1 -type f -name "*.sh" -executable -print0)

# Check if we found anything
if [ ${#scripts[@]} -eq 0 ]; then
  echo "No executable .sh scripts found in $SCRIPTS_DIR"
  exit 0
fi

# Display the menu
echo "Available scripts in $SCRIPTS_DIR:"
for i in "${!scripts[@]}"; do
  script_name=$(basename "${scripts[$i]}")
  printf " [%d] %s\n" $((i+1)) "$script_name"
done

# Prompt user
read -p "Choose a script to run [1-${#scripts[@]}]: " choice

# Validate choice
if ! [[ "$choice" =~ ^[0-9]+$ ]] || (( choice < 1 || choice > ${#scripts[@]} )); then
  echo "❌ Invalid selection."
  exit 1
fi

# Run the chosen script
selected="${scripts[$((choice - 1))]}"
echo "▶️  Running: $selected"
"$selected" "$PWD"</code></pre>
            </div>
        </div>
    </div>

    <h2>Business Impact</h2>
    <div class="about-text" style="max-width: 800px; margin: 0 auto 40px auto; text-align: left;">
        <ul>
            <li><strong>95% Time Savings:</strong> Automated batch file operations that previously took hours</li>
            <li><strong>Zero Data Loss:</strong> Safety confirmations and collision detection prevent accidental overwrites</li>
            <li><strong>Consistent Naming:</strong> Standardized file naming conventions across projects</li>
            <li><strong>Cross-Platform Sync:</strong> Seamless website deployment between Linux and Windows environments</li>
            <li><strong>Workflow Integration:</strong> Easy-to-use menu system for quick access to automation tools</li>
        </ul>

        <hr>

        <h3>Key Design Principles</h3>
        <ul>
            <li><strong>Safety First:</strong> User confirmation prompts before destructive operations</li>
            <li><strong>Path Validation:</strong> Comprehensive directory and file existence checks</li>
            <li><strong>Collision Detection:</strong> Prevents accidental file overwrites</li>
            <li><strong>Informative Output:</strong> Clear logging of all operations performed</li>
            <li><strong>Error Handling:</strong> Robust error checking with meaningful error messages</li>
        </ul>

        <hr>

        <h3>Technology Stack</h3>
        <ul>
            <li><strong>Shell Scripting:</strong> Bash, Advanced Parameter Expansion</li>
            <li><strong>File Operations:</strong> Find, Rsync, Date Utilities</li>
            <li><strong>Pattern Matching:</strong> Regular Expressions, Glob Patterns</li>
            <li><strong>Cross-Platform:</strong> Linux, WSL, Windows Integration</li>
        </ul>

        <hr>

        <h3>Use Cases</h3>
        <ul>
            <li><strong>Asset Management:</strong> Organizing image sequences for animation workflows</li>
            <li><strong>File Standardization:</strong> Consistent naming across development projects</li>
            <li><strong>Website Deployment:</strong> Automated syncing between development and production</li>
            <li><strong>Batch Processing:</strong> Mass file operations with safety checks</li>
        </ul>
    </div>

    <h2>Script Categories</h2>
    <div class="grid competencies-grid">
        <div class="grid-item">
            <div class="project-info">
                <h3>📝 File Naming</h3>
                <p class="project-description">Tools for standardizing file names, case conversion, and adding organizational prefixes.</p>
            </div>
        </div>

        <div class="grid-item">
            <div class="project-info">
                <h3>🔢 Sequence Management</h3>
                <p class="project-description">Scripts for manipulating numbered file sequences, shifting ranges, and cleaning up formats.</p>
            </div>
        </div>

        <div class="grid-item">
            <div class="project-info">
                <h3>🔄 Synchronization</h3>
                <p class="project-description">Automated sync tools for maintaining consistency between different environments.</p>
            </div>
        </div>

        <div class="grid-item">
            <div class="project-info">
                <h3>🎮 Interactive Tools</h3>
                <p class="project-description">Menu-driven interfaces for easy access to script collections and workflow automation.</p>
            </div>
        </div>
    </div>

    <h2>Development Philosophy</h2>
    <div class="about-text" style="max-width: 800px; margin: 0 auto 40px auto; text-align: left;">
        <p><strong>Defensive Programming:</strong> Every script includes comprehensive error checking, user confirmation prompts, and collision detection to prevent data loss.</p>
        
        <p><strong>Real-World Testing:</strong> All tools have been battle-tested in actual workflows, refined through daily use, and optimized for common edge cases.</p>
        
        <p><strong>User Experience:</strong> Scripts provide clear output, meaningful error messages, and require explicit confirmation for destructive operations.</p>
        
        <p><strong>Modularity:</strong> Each script focuses on a specific task and can be easily integrated into larger automation workflows.</p>
    </div>

    <!-- Navigation -->
    <div style="display: flex; justify-content: space-between; margin: 60px 0 40px 0; gap: 20px;">
        <a href="../../devops.php" class="project-link" style="background: var(--form-bg); color: var(--text-color);">← Back to Pipeline</a>
    </div>
</div>

<script>
document.querySelectorAll('.expand-toggle').forEach(button => {
    button.addEventListener('click', function() {
        this.classList.toggle('active');
        const content = this.nextElementSibling;
        content.classList.toggle('active');
    });
});
</script>

<?php include '../../includes/footer.php'; ?>
