<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// Load Composer's autoloader
require 'vendor/autoload.php'; // Make sure the path is correct

// Create an instance of PHPMailer
$mail = new PHPMailer(true); 

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $message = $_POST['message'];

    try {
        // Server settings
        $mail->isSMTP();                                            // Set mailer to use SMTP
        $mail->Host       = 'smtp.example.com';                    // Specify main and backup SMTP servers
        $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
        $mail->Username   = 'tozzienk03@gmail.com';              // SMTP username
        $mail->Password   = 'Tozzie@3002';                 // SMTP password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;        // Enable TLS encryption, `ssl` also accepted
        $mail->Port       = 587;                                    // TCP port to connect to

        // Recipients
        $mail->setFrom('your-email@example.com', 'Your Name');    // Your email and name
        $mail->addAddress($email);                                 // Add the user's email

        // Content
        $mail->isHTML(true);                                       // Set email format to HTML
        $mail->Subject = 'New Appointment Booking';
        $mail->Body    = "You have received a new booking:<br><br>
                          Name: $name<br>
                          Email: $email<br>
                          Phone: $phone<br>
                          Message: $message<br>";

        $mail->send();
        echo 'Success! Your message has been sent.';
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
}
?>
