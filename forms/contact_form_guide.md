# Contact Form Implementation Guide

This guide provides multiple solutions for implementing the contact form functionality in your website. Choose the option that best fits your hosting environment and technical requirements.

## Option 1: Basic PHP mail() Function (Default)

The simplest solution using PHP's built-in mail() function.

### Files:
- `forms/contact.php` - The main form handler

### Setup:
1. Open `forms/contact.php` and update the receiving email address:
   ```php
   $receiving_email_address = 'info@centeredfamily.org'; // Your actual receiving email address
   ```

2. Ensure your server is properly configured to send emails using the PHP mail() function.
   - Use `forms/mail_test.php` to test if your server can send emails
   - See `forms/server_config_guide.txt` for detailed server configuration instructions

### Advantages:
- Simple implementation
- No external dependencies
- Works on most shared hosting environments

### Limitations:
- Requires a properly configured mail server
- May not work on local development environments
- Limited features (no attachments, HTML formatting, etc.)

## Option 2: PHPMailer Implementation

A more robust solution using the PHPMailer library, which provides better reliability and more features.

### Files:
- `forms/contact_phpmailer.php` - Alternative form handler using PHPMailer

### Setup:
1. Install PHPMailer via Composer:
   ```
   composer require phpmailer/phpmailer
   ```

2. Open `forms/contact_phpmailer.php` and update:
   - The receiving email address
   - SMTP server settings (host, username, password, etc.)

3. Update your HTML forms to point to this file instead:
   ```html
   <form action="forms/contact_phpmailer.php" method="post" class="php-email-form">
   ```

### Advantages:
- More reliable email delivery
- Works on most hosting environments
- Supports SMTP authentication
- Better error handling
- Supports attachments, HTML emails, etc.

### Limitations:
- Requires Composer to install dependencies
- Slightly more complex configuration

## Option 3: Form Submission Service (No PHP Required)

A solution that doesn't require any server-side code by using a third-party form submission service.

### Files:
- `forms/formspree_example.html` - Example implementation using Formspree

### Setup:
1. Choose a form submission service (Formspree, FormSubmit, etc.)
2. Update your HTML forms to point to the service instead of PHP:
   ```html
   <form action="https://formspree.io/f/info@centeredfamily.org" method="POST">
   ```
3. Remove any PHP-specific classes or attributes if needed

### Advantages:
- Works without PHP or server-side code
- Can be used with static site hosting
- Simple to implement
- Reliable delivery
- Spam protection included

### Limitations:
- Relies on third-party service
- May have submission limits on free plans
- Less customization of the submission process

## Testing Your Implementation

1. Use `forms/mail_test.php` to test if your server can send emails
2. Fill out the contact form on your website and submit it
3. Check if you receive the email (don't forget to check spam folders)
4. Verify that the success message appears on the form

## Troubleshooting

If you encounter issues with the contact form:

1. Check the server error logs for PHP errors
2. Verify your email configuration settings
3. Test with the `mail_test.php` script
4. Consider switching to a different implementation option
5. Consult the `server_config_guide.txt` for detailed troubleshooting steps

## Additional Resources

- [PHP mail() function documentation](https://www.php.net/manual/en/function.mail.php)
- [PHPMailer GitHub repository](https://github.com/PHPMailer/PHPMailer)
- [Formspree documentation](https://formspree.io/docs/)
- [FormSubmit documentation](https://formsubmit.co/)
