# Contact Form Setup

This contact form implementation uses PHP's built-in mail() function to send emails without requiring the pro version of the PHP Email Form library.

## Configuration

1. Open `forms/contact.php` and update the following:
   - Replace `contact@example.com` with `info@centeredfamily.org` (already done).

2. Server Requirements:
   - PHP must be properly configured to send emails using the mail() function.
   - If your server doesn't support the mail() function or you're testing locally, you may need to use an alternative email sending method like PHPMailer or configure a local mail server.

## How It Works

1. The JavaScript in `assets/vendor/php-email-form/validate.js` handles the form submission via AJAX.
2. When a user submits the form, the data is sent to `forms/contact.php`.
3. The PHP script validates the input, formats the email, and attempts to send it.
4. If successful, it returns "OK" which the JavaScript recognizes as a successful submission.

## Troubleshooting

- If emails aren't being sent, check your server's mail configuration.
- For local development, you may need to set up a local mail server or use a service like Mailtrap.
- If you need more advanced features (attachments, HTML emails, etc.), consider implementing a more robust solution like PHPMailer.

## Alternative Solutions

If the PHP mail() function doesn't work for your hosting environment, consider these alternatives:

1. Use a third-party email library like PHPMailer or SwiftMailer.
2. Set up a form submission service like Formspree, FormSubmit, or Netlify Forms.
3. Use a serverless function with an email service API (SendGrid, Mailgun, etc.).
