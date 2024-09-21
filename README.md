# ZpHace - Auto Spacing for Chinese

[![Donate](https://img.shields.io/badge/donate-PayPal-blue.svg)](https://seafoodholdhand.com/donate/)

Automatically inserts spaces between CJK characters and English letters, numbers, and punctuation marks, while keeping Chinese punctuation without extra spaces.

---

## Table of Contents

- [Description](#description)
  - [Key Features](#key-features)
  - [Why Use ZpHace?](#why-use-zphace)
- [Installation](#installation)
  - [Requirements](#requirements)
  - [Installation Steps](#installation-steps)
- [Frequently Asked Questions](#frequently-asked-questions)
- [Changelog](#changelog)
- [Upgrade Notice](#upgrade-notice)
- [Additional Information](#additional-information)
- [Credits](#credits)
- [License](#license)
- [Metadata](#metadata)

---

## Description

**ZpHace** is a lightweight WordPress plugin designed to improve the readability of content containing Chinese, Japanese, and Korean (CJK) characters mixed with English letters, numbers, and punctuation marks. It automatically adjusts spacing to adhere to typographic standards, making your content look clean, professional, and easier to read.

### Key Features

- **Automatic Spacing:** Inserts spaces between CJK characters and English letters, numbers, and common punctuation marks.
- **Punctuation Cleanup:** Removes unnecessary spaces around Chinese punctuation marks such as `。`, `，`, `！`, `？`.
- **No Configuration Needed:** Works immediately upon activation without any settings to adjust.
- **Lightweight and Efficient:** Optimized for performance with minimal impact on site speed.
- **Multisite Compatible:** Fully compatible with both single-site and multisite WordPress installations.
- **Up-to-Date Compatibility:** Tested up to WordPress 6.6.2 and PHP 8.3.

### Why Use ZpHace?

In multilingual content, especially involving CJK characters mixed with English or other Latin-based languages, improper spacing can significantly impact readability. Manually correcting spacing is time-consuming and prone to errors. **ZpHace** automates this process, ensuring your content follows best typographic practices without extra effort.

---

## Installation

### Requirements

- **WordPress Version:** 5.0 or higher
- **PHP Version:** 7.0 or higher (compatible with PHP 8.3)
- **Server Encoding:** UTF-8 support is required

### Installation Steps

1. **Install via WordPress Dashboard:**

   - Navigate to **Plugins > Add New**.
   - Search for **"ZpHace - Auto Spacing for Chinese"**.
   - Click **"Install Now"** and then **"Activate"**.

2. **Upload via WordPress Dashboard:**

   - Download the plugin ZIP file from the official repository.
   - Navigate to **Plugins > Add New > Upload Plugin**.
   - Select the downloaded `zphace-auto-spacing.zip` file and click **"Install Now"**.
   - Activate the plugin after installation.

3. **Manual Installation via FTP:**

   - Download and extract the `zphace-auto-spacing.zip` file.
   - Upload the extracted `zphace-auto-spacing` folder to your server's `/wp-content/plugins/` directory.
   - Navigate to the **Plugins** page in your WordPress dashboard and activate **"ZpHace - Auto Spacing for Chinese"**.

---

## Frequently Asked Questions

### Q1: Is ZpHace compatible with WordPress multisite?

**A:** Yes, ZpHace works seamlessly with both single-site and multisite WordPress installations.

---

### Q2: Will ZpHace affect the formatting of my RSS feeds and excerpts?

**A:** Yes, the plugin processes all content areas, including RSS feeds and excerpts, to ensure consistent spacing throughout your site.

---

### Q3: Can I customize the spacing rules or disable the plugin on certain pages?

**A:** Currently, ZpHace does not offer customization options. It is designed to work automatically without any configuration. Future updates may include settings based on user feedback.

---

### Q4: Does ZpHace impact site performance?

**A:** No, ZpHace is optimized for performance and has a minimal impact on your site's loading speed.

---

## Changelog

### 1.1.0

- Refactored the plugin for improved performance and efficiency.
- Updated to ensure compatibility with WordPress 6.6.2 and PHP 8.3.
- Converted code to an object-oriented structure for better maintainability.
- Expanded CJK Unicode range coverage.
- Optimized regular expressions for faster processing.
- Added text domain loading for translation support.

### 1.0.1

- Initial release of ZpHace - Auto Spacing for Chinese.
- Implemented automatic spacing between CJK characters and English letters/numbers/punctuation.
- Removed unnecessary spaces around Chinese punctuation marks.
- Ensured compatibility with WordPress 6.6.

---

## Upgrade Notice

### 1.1.0

This update brings significant performance improvements and ensures compatibility with the latest versions of WordPress and PHP. Please update to enjoy enhanced functionality and efficiency.

---

## Additional Information

For support or to contribute to the plugin, please visit the [GitHub repository](https://github.com/seafoodholdhand/zphace).

---

## Credits

Originally created by Tunghsiao Liu (Space Lover) and Rakume Hayashi (Pangu). Refactored and maintained by Glass Chan.

---

## License

This plugin is licensed under the **GPLv2 or later**.  
License URI: [http://www.gnu.org/licenses/gpl-2.0.html](http://www.gnu.org/licenses/gpl-2.0.html)

---

## Metadata

- **Contributors:** [Glass Chan](https://seafoodholdhand.com/)
- **Donate Link:** [Donate](https://seafoodholdhand.com/donate/)
- **Tags:** content, Chinese, copywriting, CJK, typography, auto-spacing
- **Requires at least:** WordPress 5.0
- **Tested up to:** WordPress 6.6.2
- **Stable tag:** 1.1.0
