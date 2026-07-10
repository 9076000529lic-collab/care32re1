<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Get Form Data
    $appointment_date = isset($_POST['appointment_date']) ? trim($_POST['appointment_date']) : '';
    $appointment_time = isset($_POST['appointment_time']) ? trim($_POST['appointment_time']) : '';

    // Validation
    if (empty($appointment_date) || empty($appointment_time)) {
        echo "<script>
                alert('Please select Date and Time.');
                history.back();
              </script>";
        exit;
    }

    // Change this email
    $to = "info@yourdomain.com";

    // Subject
    $subject = "New Appointment Booking";

    // Email Body
    $message = "
    <html>
    <head>
        <title>Appointment Booking</title>
    </head>

    <body style='font-family:Arial,sans-serif;background:#f5f5f5;padding:20px;'>

        <table width='600' align='center' cellpadding='10' cellspacing='0'
        style='background:#ffffff;border:1px solid #ddd;'>

            <tr style='background:#222;color:#fff;'>
                <th colspan='2' style='font-size:22px;'>
                    New Appointment Request
                </th>
            </tr>

            <tr>
                <td width='200'><strong>Appointment Date</strong></td>
                <td>$appointment_date</td>
            </tr>

            <tr>
                <td><strong>Appointment Time</strong></td>
                <td>$appointment_time</td>
            </tr>

            <tr>
                <td><strong>Booked On</strong></td>
                <td>".date("d-m-Y h:i A")."</td>
            </tr>

        </table>

    </body>
    </html>
    ";

    // Email Headers
    $headers  = "MIME-Version: 1.0\r\n";
    $headers .= "Content-type:text/html;charset=UTF-8\r\n";
    $headers .= "From: Website <noreply@yourdomain.com>\r\n";

    // Send Mail
    if(mail($to,$subject,$message,$headers)){

        echo "<script>
                alert('Appointment Booked Successfully.');
                window.location.href='index.html';
              </script>";

    }else{

        echo "<script>
                alert('Email Sending Failed!');
                history.back();
              </script>";

    }

}

?>