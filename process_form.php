<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $message = $_POST['message'];

    // Destination email address
    $to = "tozziemk03@gmail.com"; // Replace with the photographer's email address
    $subject = "New Appointment Booking";
    
    // Email body
    $body = "You have received a new booking:\n\n";
    $body .= "Name: $name\n";
    $body .= "Email: $email\n";
    $body .= "Phone: $phone\n";
    $body .= "Message: $message\n";

    // Additional headers
    $headers = "From: $email";
    
    // Send email
    if (mail($to, $subject, $body, $headers)) {
        echo "Success! Your message has been sent.";
    } else {
        echo "Oops! Something went wrong, please try again.";
    }
}
?>
