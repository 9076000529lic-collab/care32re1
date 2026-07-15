<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $name = trim($_POST["name"] ?? "");
    $mobile = trim($_POST["mobile"] ?? "");
    $email = trim($_POST["email"] ?? "");
    $message = trim($_POST["message"] ?? "");

    // Validation
    if (
        empty($name) ||
        empty($mobile) ||
        empty($email) ||
        empty($message)
    ) {
        die("Please fill all fields.");
    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        die("Invalid email address.");
    }

    if (!preg_match("/^[0-9]{10}$/", $mobile)) {
        die("Invalid mobile number.");
    }


    // Email receiving address
    $to = "your-email@gmail.com";


    // Subject
    $subject = "New Contact Form Enquiry";


    // Message
    $body = "New Contact Form Enquiry\n\n";

    $body .= "Name: " . $name . "\n";

    $body .= "Mobile: " . $mobile . "\n";

    $body .= "Email: " . $email . "\n\n";

    $body .= "Message:\n" . $message;


    // Headers
    $headers = "From: Website <noreply@yourdomain.com>\r\n";

    $headers .= "Reply-To: " . $email . "\r\n";


    // Send Email
    if (mail($to, $subject, $body, $headers)) {

        echo "<script>
                alert('Message sent successfully!');
                window.location.href='index.html';
              </script>";

    } else {

        echo "<script>
                alert('Message sending failed!');
                window.history.back();
              </script>";
    }

}

?>