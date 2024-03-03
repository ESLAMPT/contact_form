<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// Load Composer's autoloader
require 'vendor/autoload.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form data
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $phonenumber = $_POST['phonenumber'];
    $email = $_POST['email'];
    $subject = $_POST['subject'];

    // Email recipient
    $to = "eslamfox30@gmail.com";

    // Email subject
    $email_subject = "New Contact Form Submission";

    // Email body
    $email_body = "First Name: $firstname\n";
    $email_body .= "Last Name: $lastname\n";
    $email_body .= "Phone Number: $phonenumber\n";
    $email_body .= "Email: $email\n";
    $email_body .= "Message:\n$subject";

    // Send email using PHPMailer
    $mail = new PHPMailer(true);

    try {
        //Server settings
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com'; // Gmail SMTP server
        $mail->SMTPAuth = true;
        $mail->Username = 'eslamfox30@gmail.com'; // Your Gmail address
        $mail->Password = 'Logy@123@'; // Your Gmail password (App Password or Less Secure Apps)
        $mail->SMTPSecure = 'tls';
        $mail->Port = 587;

        //Recipients
        $mail->setFrom($email, $firstname);
        $mail->addAddress($to);

        //Content
        $mail->isHTML(false);
        $mail->Subject = $email_subject;
        $mail->Body = $email_body;

        $mail->send();
        echo "Thank you! Your message has been sent.";
    } catch (Exception $e) {
        echo "Oops! Something went wrong. Please try again later.";
    }
}
?>
