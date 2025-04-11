<?php
/**
 * Alternative contact form handler using PHPMailer
 * 
 * This script requires PHPMailer to be installed via Composer:
 * composer require phpmailer/phpmailer
 */

// Your actual receiving email address
$receiving_email_address = 'info@centeredfamily.org';

// Check if PHPMailer is installed
if (!file_exists('../vendor/autoload.php')) {
    die('PHPMailer not installed. Please run "composer require phpmailer/phpmailer" in the root directory.');
}

require '../vendor/autoload.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// Get form data
$name = isset($_POST['name']) ? $_POST['name'] : '';
$email = isset($_POST['email']) ? $_POST['email'] : '';
$subject = isset($_POST['subject']) ? $_POST['subject'] : '';
$message = isset($_POST['message']) ? $_POST['message'] : '';

// Validate form data
if (empty($name) || empty($email) || empty($subject) || empty($message)) {
    echo 'Please fill all required fields.';
    exit;
}

if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    echo 'Invalid email format.';
    exit;
}

// Create a new PHPMailer instance
$mail = new PHPMailer(true);

try {
    // Server settings
    // Uncomment and configure the following settings based on your email provider
    
    $mail->isSMTP();                                      // Send using SMTP
    $mail->Host       = 'smtp.example.com';               // SMTP server
    $mail->SMTPAuth   = true;                             // Enable SMTP authentication
    $mail->Username   = 'your-email@example.com';         // SMTP username
    $mail->Password   = 'your-password';                  // SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;   // Enable TLS encryption
    $mail->Port       = 587;                              // TCP port to connect to
    
    // Recipients
    $mail->setFrom($email, $name);
    $mail->addAddress($receiving_email_address);          // Add a recipient
    $mail->addReplyTo($email, $name);

    // Content
    $mail->isHTML(false);                                 // Set email format to plain text
    $mail->Subject = "Contact Form: $subject";
    
    // Prepare email content
    $email_content = "From: $name\n";
    $email_content .= "Email: $email\n\n";
    $email_content .= "Subject: $subject\n\n";
    $email_content .= "Message:\n$message\n";
    
    $mail->Body = $email_content;

    $mail->send();
    echo 'OK'; // This is what the validate.js script expects for success
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}
?>
