<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form data
    $name = htmlspecialchars(trim($_POST['name']));
    $email = htmlspecialchars(trim($_POST['email']));
    $subject = htmlspecialchars(trim($_POST['subject']));
    $message = htmlspecialchars(trim($_POST['message']));

    // Email address where you want to receive the form submissions
    $to = "abdulmuizzahmad8@gmail.com"; // Replace this with your email address
    $headers = "From: $name <$email>\r\n";
    $headers .= "Reply-To: $email\r\n";
    $headers .= "Content-Type: text/html; charset=UTF-8\r\n";

    // Email subject and message
    $full_subject = "Contact Form Submission: " . $subject;
    $full_message = "
        <html>
        <body>
        <h2>Contact Form Submission</h2>
        <p><strong>Name: </strong> {$name}</p>
        <p><strong>Email: </strong> {$email}</p>
        <p><strong>Subject: </strong> {$subject}</p>
        <p><strong>Message: </strong> {$message}</p>
        </body>
        </html>
    ";

    // Send the email
    if (mail($to, $full_subject, $full_message, $headers)) {
        echo "Message sent successfully!";
    } else {
        echo "Failed to send the message.";
    }
}
?>
