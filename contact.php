<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $name = trim($_POST['name']);
    $phone = trim($_POST['phone']);
    $email = trim($_POST['email']);
    $message = trim($_POST['message']);
    $captcha = trim($_POST['captcha']);

    // Captcha Check
    if (!isset($_SESSION['captcha']) || strtolower($captcha) != strtolower($_SESSION['captcha'])) {

        echo "<script>
                alert('Invalid Captcha');
                window.history.back();
              </script>";
        exit;
    }

    // Email Address
    $to = "yourmail@gmail.com";   // <-- Apni Email ID yaha likho

    $subject = "New Contact Form Enquiry";

    $body = "
    <html>
    <head>
    <title>Contact Form</title>
    </head>

    <body>

    <h2>New Enquiry</h2>

    <table border='1' cellpadding='10' cellspacing='0'>

        <tr>
            <td><strong>Name</strong></td>
            <td>$name</td>
        </tr>

        <tr>
            <td><strong>Phone</strong></td>
            <td>$phone</td>
        </tr>

        <tr>
            <td><strong>Email</strong></td>
            <td>$email</td>
        </tr>

        <tr>
            <td><strong>Message</strong></td>
            <td>$message</td>
        </tr>

    </table>

    </body>
    </html>
    ";

    $headers  = "MIME-Version: 1.0\r\n";
    $headers .= "Content-type:text/html;charset=UTF-8\r\n";
    $headers .= "From: $email\r\n";

    if(mail($to,$subject,$body,$headers))
    {
        echo "<script>
                alert('Thank You! Your Message has been sent.');
                window.location='index.html';
              </script>";
    }
    else
    {
        echo "<script>
                alert('Mail Sending Failed.');
                window.history.back();
              </script>";
    }

}
?>