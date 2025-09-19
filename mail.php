<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $to      = "vrittipathaniamua@gmail.com";   // Replace with your Gmail
    $subject = "New Contact Form Submission"; 
    $message = "Name: " . $_POST['name'] . "\n";
    $message .= "Email: " . $_POST['email'] . "\n";
    $message .= "Message: " . $_POST['message'] . "\n";
    $message .= "Service: " . $_POST['subject'] . "\n";

    $headers = "From: no-reply@yourdomain.com\r\n" .
               "Reply-To: " . $_POST['email'];

    if (mail($to, $subject, $message, $headers)) {
        echo "Message sent successfully!";
    } else {
        http_response_code(500);
        echo "Mail function failed!";
    }
} else {
    http_response_code(405);
    echo "Method Not Allowed";
}