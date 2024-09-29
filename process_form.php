<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// Load Composer's autoloader
require 'vendor/autoload.php'; // Ensure this path is correct

$mail = new PHPMailer(true); // Create an instance of PHPMailer

try {
    //Server settings
    $mail->isSMTP();                                          // Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                   // Set the SMTP server to send through
    $mail->SMTPAuth   = true;                               // Enable SMTP authentication
    $mail->Username   = 'tozziemk03@gmail.com';             // Replace with your Gmail address
    $mail->Password   = 'Tozzie@3002';                // Replace with your Gmail password or App Password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;    // Enable TLS encryption
    $mail->Port       = 587;                                // TCP port to connect to

    //Recipients
    $mail->setFrom('your-email@gmail.com', 'Your Name');    // Your email and name
    $mail->addAddress('tozziemk03@gmail.com', 'Tozzie');    // Add your email as recipient

    // Content
    $mail->isHTML(true);                                   // Set email format to HTML
    $mail->Subject = 'New Appointment Request';           // Subject line
    $mail->Body    = 'This is the HTML message body <b>in bold!</b>'; // Email body

    // Send the email
    $mail->send();
    echo 'Message has been sent';
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}
?>
