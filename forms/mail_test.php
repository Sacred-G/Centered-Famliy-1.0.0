<?php
// Configuration - Replace with your email
$to = "info@centeredfamily.org";
$subject = "PHP Mail Test";
$message = "This is a test email sent from your server to verify that the PHP mail() function is working correctly.";
$headers = "From: webmaster@" . $_SERVER['SERVER_NAME'] . "\r\n" .
           "Reply-To: webmaster@" . $_SERVER['SERVER_NAME'] . "\r\n" .
           "X-Mailer: PHP/" . phpversion();

// Display form if not submitted
if (!isset($_POST['submit'])) {
    ?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>PHP Mail Function Test</title>
        <style>
            body {
                font-family: Arial, sans-serif;
                line-height: 1.6;
                max-width: 800px;
                margin: 0 auto;
                padding: 20px;
            }
            h1 {
                color: #333;
                border-bottom: 1px solid #eee;
                padding-bottom: 10px;
            }
            .form-group {
                margin-bottom: 15px;
            }
            label {
                display: block;
                margin-bottom: 5px;
                font-weight: bold;
            }
            input[type="email"], input[type="submit"] {
                padding: 8px;
                width: 100%;
                max-width: 300px;
            }
            input[type="submit"] {
                background-color: #4CAF50;
                color: white;
                border: none;
                cursor: pointer;
            }
            input[type="submit"]:hover {
                background-color: #45a049;
            }
            .info {
                background-color: #f8f9fa;
                border-left: 4px solid #17a2b8;
                padding: 10px 15px;
                margin: 20px 0;
            }
            .success {
                background-color: #d4edda;
                border-left: 4px solid #28a745;
                padding: 10px 15px;
                margin: 20px 0;
            }
            .error {
                background-color: #f8d7da;
                border-left: 4px solid #dc3545;
                padding: 10px 15px;
                margin: 20px 0;
            }
            pre {
                background-color: #f8f9fa;
                padding: 10px;
                overflow: auto;
            }
        </style>
    </head>
    <body>
        <h1>PHP Mail Function Test</h1>
        
        <div class="info">
            <p>This tool helps you test if your server is properly configured to send emails using PHP's mail() function.</p>
        </div>
        
        <form method="post">
            <div class="form-group">
                <label for="email">Your Email Address:</label>
                <input type="email" id="email" name="email" required placeholder="Enter your email address">
            </div>
            <div class="form-group">
                <input type="submit" name="submit" value="Send Test Email">
            </div>
        </form>
        
        <h2>PHP Mail Configuration</h2>
        <pre>
<?php
echo "PHP Version: " . phpversion() . "\n";
echo "sendmail_path: " . ini_get('sendmail_path') . "\n";
echo "SMTP: " . ini_get('SMTP') . "\n";
echo "smtp_port: " . ini_get('smtp_port') . "\n";
echo "Server Software: " . $_SERVER['SERVER_SOFTWARE'] . "\n";
?>
        </pre>
    </body>
    </html>
    <?php
    exit;
}

// Process form submission
$to = $_POST['email'];

// Send test email
$result = mail($to, $subject, $message, $headers);

// Display result
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP Mail Function Test Result</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
        }
        h1 {
            color: #333;
            border-bottom: 1px solid #eee;
            padding-bottom: 10px;
        }
        .success {
            background-color: #d4edda;
            border-left: 4px solid #28a745;
            padding: 10px 15px;
            margin: 20px 0;
        }
        .error {
            background-color: #f8d7da;
            border-left: 4px solid #dc3545;
            padding: 10px 15px;
            margin: 20px 0;
        }
        .info {
            background-color: #f8f9fa;
            border-left: 4px solid #17a2b8;
            padding: 10px 15px;
            margin: 20px 0;
        }
        pre {
            background-color: #f8f9fa;
            padding: 10px;
            overflow: auto;
        }
        .back-link {
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <h1>PHP Mail Function Test Result</h1>
    
    <?php if ($result): ?>
    <div class="success">
        <h3>Test Email Sent Successfully!</h3>
        <p>A test email has been sent to: <?php echo htmlspecialchars($to); ?></p>
        <p>Please check your inbox (and spam folder) to confirm receipt.</p>
    </div>
    <?php else: ?>
    <div class="error">
        <h3>Failed to Send Test Email</h3>
        <p>The mail() function returned false, indicating that the email could not be sent.</p>
        <p>This could be due to server configuration issues. Please check the server configuration information below and refer to the troubleshooting guide.</p>
    </div>
    <?php endif; ?>
    
    <div class="info">
        <h3>What to do next:</h3>
        <p>If you received the test email, your server is properly configured for sending emails.</p>
        <p>If you did not receive the email:</p>
        <ul>
            <li>Check your spam/junk folder</li>
            <li>Verify your server's mail configuration</li>
            <li>Consult the server_config_guide.txt file for troubleshooting tips</li>
            <li>Consider using an alternative method for sending emails (PHPMailer, form services, etc.)</li>
        </ul>
    </div>
    
    <h2>PHP Mail Configuration</h2>
    <pre>
<?php
echo "PHP Version: " . phpversion() . "\n";
echo "sendmail_path: " . ini_get('sendmail_path') . "\n";
echo "SMTP: " . ini_get('SMTP') . "\n";
echo "smtp_port: " . ini_get('smtp_port') . "\n";
echo "Server Software: " . $_SERVER['SERVER_SOFTWARE'] . "\n";
?>
    </pre>
    
    <div class="back-link">
        <a href="<?php echo $_SERVER['PHP_SELF']; ?>">← Back to Test Form</a>
    </div>
</body>
</html>
