<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = htmlspecialchars($_POST['name']);
    $contactNumber = htmlspecialchars($_POST['contactNumber']);
    $email = htmlspecialchars($_POST['email']);
    $serviceType = htmlspecialchars($_POST['serviceType']);
    $startDate = htmlspecialchars($_POST['startDate']);
    $endDate = htmlspecialchars($_POST['endDate']);
    $notes = htmlspecialchars($_POST['notes']);

    // Specify the recipient email address
    $to = "your-email@example.com"; // Change this to your email address
    $subject = "New Order Submission from $name";

    // Build the email body
    $message = "Name: $name\n";
    $message .= "Contact Number: $contactNumber\n";
    $message .= "Email: $email\n";
    $message .= "Service Type: $serviceType\n";
    $message .= "Start Date: $startDate\n";
    $message .= "End Date: $endDate\n";
    $message .= "Notes: $notes\n";

    // Set content-type header for sending HTML email
    $headers = "From: $email" . "\r\n" . // Sender's Email
               "Reply-To: $email" . "\r\n" . // Set reply-to email
               "X-Mailer: PHP/" . phpversion();

    // Send the email
    if (mail($to, $subject, $message, $headers)) {
        echo "Email sent successfully.";
    } else {
        echo "Email sending failed.";
    }
} else {
    echo "Invalid request.";
}
?>