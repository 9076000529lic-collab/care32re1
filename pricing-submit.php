<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Get Form Data
    $first_name = trim($_POST['first_name'] ?? '');
    $last_name  = trim($_POST['last_name'] ?? '');
    $email      = trim($_POST['email'] ?? '');
    $phone      = trim($_POST['phone'] ?? '');
    $postcode   = trim($_POST['postcode'] ?? '');
    $service    = trim($_POST['service'] ?? '');
    $message    = trim($_POST['message'] ?? '');

    // Validation
    if (
        empty($first_name) ||
        empty($last_name) ||
        empty($email) ||
        empty($phone) ||
        empty($postcode) ||
        empty($service)
    ) {
        die("Please fill all required fields.");
    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        die("Invalid email address.");
    }

    if (!preg_match('/^[0-9]{10}$/', $phone)) {
        die("Invalid phone number.");
    }

    // Receiver Email
    $to = "info@yourdomain.com";   // <-- Change to your email

    // Subject
    $subject = "New Treatment Enquiry";

    // Email Body
    $body  = "New Enquiry Received\n\n";
    $body .= "First Name : $first_name\n";
    $body .= "Last Name  : $last_name\n";
    $body .= "Email      : $email\n";
    $body .= "Phone      : $phone\n";
    $body .= "Postcode   : $postcode\n";
    $body .= "Treatment  : $service\n";
    $body .= "Message    : $message\n";

    // Headers
    $headers  = "From: Website Enquiry <noreply@yourdomain.com>\r\n";
    $headers .= "Reply-To: $email\r\n";

    // Send Mail
    if (mail($to, $subject, $body, $headers)) {

        echo "<script>
                alert('Thank you! Your enquiry has been submitted successfully.');
                window.location.href='index.html';
              </script>";

    } else {

        echo "<script>
                alert('Sorry! Mail could not be sent.');
                window.history.back();
              </script>";

    }

} else {

    header("Location: index.html");
    exit;

}

?>