# Contact Form Setup for Porkbun Hosting

This guide provides specific instructions for setting up your contact form on Porkbun hosting.

## Porkbun Hosting Environment

Porkbun provides shared hosting with PHP support, which means you have several options for implementing your contact form:

### Option 1: Using PHP mail() Function (Basic Solution)

Porkbun's shared hosting typically has PHP mail() function configured, making this the simplest option:

1. Use the `contact.php` file we've already created
2. Update the receiving email address in the file:
   ```php
   $receiving_email_address = 'info@centeredfamily.org'; // Replace with your actual email
   ```
3. Upload all files to your Porkbun hosting account using FTP or the file manager in Porkbun's control panel

To test if mail() is working on your Porkbun hosting:
1. Upload the `mail_test.php` file to your server
2. Access it through your browser (e.g., `https://centeredfamily.org/forms/mail_test.php`)
3. Enter your email address and send a test email
4. Check if you receive the test email

### Option 2: Using PHPMailer with SMTP (Recommended)

For more reliable email delivery, you can use PHPMailer with Porkbun's SMTP settings or an external email service:

1. Install PHPMailer via Composer on your local machine:
   ```
   composer require phpmailer/phpmailer
   ```
2. Upload the vendor directory to your Porkbun hosting
3. Use the `contact_phpmailer.php` file we've created
4. Update the SMTP settings in the file with either:
   - Porkbun's SMTP settings (if provided with your hosting plan)
   - Your own email provider's SMTP settings (Gmail, Outlook, etc.)

Example configuration for Gmail SMTP:
```php
$mail->isSMTP();
$mail->Host       = 'smtp.gmail.com';
$mail->SMTPAuth   = true;
$mail->Username   = 'your-gmail@gmail.com';
$mail->Password   = 'your-app-password'; // Use an app password, not your regular password
$mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
$mail->Port       = 587;
```

### Option 3: Using a Form Submission Service (No PHP Required)

If you encounter issues with the PHP options, you can use a form submission service:

1. Sign up for a service like Formspree, FormSubmit, or similar
2. Update your HTML forms to point to the service instead of PHP
3. This approach works regardless of your hosting environment

## Porkbun-Specific Tips

1. **PHP Version**: Porkbun typically offers PHP 7.4+ which is compatible with all our solutions
2. **File Permissions**: Ensure your PHP files have the correct permissions (typically 644)
3. **Error Logs**: If you encounter issues, check the error logs in your Porkbun control panel
4. **Email Deliverability**: 
   - If emails are not being delivered, they might be flagged as spam
   - Using PHPMailer with authenticated SMTP generally improves deliverability
   - Consider using your domain email (e.g., contact@yourdomain.com) for better deliverability

## Testing on Porkbun

After uploading your files to Porkbun:

1. Navigate to your website
2. Fill out and submit the contact form
3. Check if you receive the email
4. If you don't receive the email:
   - Check your spam folder
   - Try the mail test script to diagnose issues
   - Consider switching to one of the alternative solutions

## Getting Support

If you continue to have issues with your contact form on Porkbun hosting:

1. Contact Porkbun support for specific information about their mail server configuration
2. Ask if they have any restrictions on the PHP mail() function
3. Inquire about their recommended method for sending emails from PHP scripts

Remember that the third-party form submission services (Formspree, FormSubmit, etc.) are the most reliable option if you continue to have issues with the PHP-based solutions.
