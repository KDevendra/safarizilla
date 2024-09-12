<?php

require 'vendor/autoload.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $phone = $_POST['phone'];
    $email = $_POST['mail'];
    $message = $_POST['message'];

    $mail = new PHPMailer(true);

    try {
        
        $mail->isSMTP();
        $mail->Host       = 'smtp.hostinger.com';
        $mail->SMTPAuth   = true;
        $mail->Username   = 'enquiry@safarizilla.in';
        $mail->Password   = '7A=or#[X&ib?'; 
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port       = 587;

        
        $mail->setFrom('enquiry@safarizilla.in', 'Safari Zilla');
        $mail->addAddress('Info@safarizilla.in'); 

        
        $mail->isHTML(true);
        $mail->Subject = 'New Enquiry from Website';
        $mail->Body    = "You have received a new enquiry. <br><br>
                          <b>Name:</b> $name <br>
                          <b>Phone:</b> $phone <br>
                          <b>Email:</b> $email <br>
                          <b>Message:</b> $message";

        $mail->send();
        echo '<p class="text-success">Email has been sent successfully!</p>';
    } catch (Exception $e) {
        echo '<p class="text-danger">Message could not be sent. Mailer Error: ' . $mail->ErrorInfo . '</p>';
    }
}
