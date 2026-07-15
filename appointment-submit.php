<?php

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $appointment_date = trim($_POST["appointment_date"] ?? "");
    $appointment_time = trim($_POST["appointment_time"] ?? "");
    $name = trim($_POST["name"] ?? "");
    $contact = trim($_POST["contact"] ?? "");
    $email = trim($_POST["email"] ?? "");
    $message = trim($_POST["message"] ?? "");


    // Required Fields Check
    if (
        empty($appointment_date) ||
        empty($appointment_time) ||
        empty($name) ||
        empty($contact) ||
        empty($email)
    ) {
        echo "<script>
                alert('Please fill all required fields.');
                window.history.back();
              </script>";
        exit;
    }


    // Email Validation
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "<script>
                alert('Invalid email address.');
                window.history.back();
              </script>";
        exit;
    }


    // Mobile Validation
    if (!preg_match('/^[0-9]{10}$/', $contact)) {
        echo "<script>
                alert('Please enter a valid 10 digit mobile number.');
                window.history.back();
              </script>";
        exit;
    }


    // EMAIL WHERE YOU WANT TO RECEIVE APPOINTMENTS
    $to = "your-email@gmail.com";


    $subject = "New Appointment Booking";


    $body = "
New Appointment Received

Name: $name

Contact Number: $contact

Email: $email

Appointment Date: $appointment_date

Appointment Time: $appointment_time

Message:
$message
";


    $headers = "From: Website Appointment <noreply@yourdomain.com>\r\n";
    $headers .= "Reply-To: $email\r\n";


    if (mail($to, $subject, $body, $headers)) {

        echo "<script>
                alert('Appointment booked successfully.');
                window.location.href='index.html';
              </script>";

    } else {

        echo "<script>
                alert('Something went wrong. Please try again.');
                window.history.back();
              </script>";
    }

} else {

    header("Location: index.html");
    exit;
}

?>