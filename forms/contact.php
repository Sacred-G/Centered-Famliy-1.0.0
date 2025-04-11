<?php
  // Configuration
  $receiving_email_address = 'info@centeredfamily.org'; // Your actual receiving email address
  
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
  
  // Prepare email content
  $email_content = "From: $name\n";
  $email_content .= "Email: $email\n\n";
  $email_content .= "Subject: $subject\n\n";
  $email_content .= "Message:\n$message\n";
  
  // Email headers
  $headers = "From: $name <$email>\r\n";
  $headers .= "Reply-To: $email\r\n";
  $headers .= "MIME-Version: 1.0\r\n";
  $headers .= "Content-Type: text/plain; charset=UTF-8\r\n";
  
  // Send email
  if (mail($receiving_email_address, "Contact Form: $subject", $email_content, $headers)) {
    echo 'OK'; // This is what the validate.js script expects for success
  } else {
    echo 'Unable to send email. Please try again later.';
  }
?>
