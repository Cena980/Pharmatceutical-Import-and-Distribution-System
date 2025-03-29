import os
import re

# Define the root directory containing the HTML, PHP, and JS files
root_directory = "C:/projects/Pharmatceutical-Import-and-Distribution-System - Copy"

# Regex pattern to match headings, table headers, and title attributes
heading_pattern = re.compile(r"<(h[1-6]|th)([^>]*?)>(.*?)</\1>", re.IGNORECASE)
title_pattern = re.compile(r'(<[^>]+?)\s+title="([^"]+)"([^>]*?>)', re.IGNORECASE)

# Dictionary to store extracted translations
translations = {}

def generate_data_key(text):
    """Generate a data-key identifier from element text"""
    key = text.lower().strip().replace(" ", "-").replace(".", "").replace(",", "")
    return re.sub(r"[^a-z09\-]", "", key)  # Keep only alphanumeric and hyphens

def process_file(filepath):
    """Modify file to add data-key attributes and extract translations"""
    try:
        print(f"Processing file: {filepath}")
        with open(filepath, "r", encoding="utf-8") as file:
            content = file.read()

        modified_content = content

        # Process headings and table headers
        def replace_heading(match):
            tag, attributes, text = match.groups()
            key = generate_data_key(text)
            translations[key] = text  # Store translation entry
            if 'data-key=' not in attributes:  # Avoid duplicate keys
                attributes += f' data-key=\'{key}\''  # Use single quotes for data-key
            return f"<{tag}{attributes}>{text}</{tag}>"

        modified_content = heading_pattern.sub(replace_heading, modified_content)

        # Process elements with title attributes
        def replace_title(match):
            before, title_text, after = match.groups()
            key = generate_data_key(title_text)
            translations[key] = title_text  # Store translation entry
            if 'data-key=' not in before:  # Avoid duplicate keys
                before += f' data-key=\'{key}\''  # Use single quotes for data-key
            return f'{before} title="{title_text}"{after}'

        modified_content = title_pattern.sub(replace_title, modified_content)

        # Write modified content back to file if changes were made
        if modified_content != content:
            with open(filepath, "w", encoding="utf-8") as file:
                file.write(modified_content)
            print(f"Updated: {filepath}")

    except Exception as e:
        print(f"Error processing file {filepath}: {e}")

# Recursively scan all subdirectories
print("Starting directory scan...")
for subdir, _, files in os.walk(root_directory):
    for filename in files:
        if filename.endswith((".html", ".php", ".js")):
            process_file(os.path.join(subdir, filename))

# Step 2: Update translations.js with extracted data-keys
translations_js_path = os.path.join(root_directory, "translations.js")

if translations:
    try:
        with open(translations_js_path, "a", encoding="utf-8") as js_file:
            js_file.write("\n// Auto-generated translations\n")
            for key, value in translations.items():
                js_file.write(f'translations[\'{key}\'] = \'{value}\';\n')  # Use single quotes for data-key
        print("Translations updated in translations.js")
    except Exception as e:
        print(f"Error updating translations.js: {e}")
