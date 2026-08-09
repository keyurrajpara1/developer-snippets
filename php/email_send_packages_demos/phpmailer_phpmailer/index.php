<?php
// Import PHPMailer classes into the global namespace
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require_once 'vendor/autoload.php';

//Create an instance of PHPMailer class
$mail = new PHPMailer;

// SMTP configuration
$mail->isSMTP();                    // Set mailer to use SMTP
$mail->Host = 'smtp.gmail.com';     // Specify main and backup SMTP servers
$mail->SMTPAuth = true;             // Enable SMTP authentication
$mail->Username = 'smtp@gmail.com'; // SMTP username
$mail->Password = '123456';          // SMTP password
$mail->SMTPSecure = 'tls';          // Enable TLS encryption, `ssl` also accepted
$mail->Port = 587;                  // TCP port to connect to

// Sender info
$mail->setFrom('smtp@gmail.com', 'Test from');
//$mail->addReplyTo('reply@example.com', 'SenderName');

// Add a recipient
$mail->addAddress('keyurrajpara1@gmail.com');

// Add cc or bcc 
//$mail->addCC('cc@example.com');
//$mail->addBCC('bcc@example.com');

// Add attachments
$imagePath = __DIR__."/"."212755.jpg";
$mail->addAttachment($imagePath);

// Email subject
$mail->Subject = 'Send Email via SMTP using PHPMailer';

// Set email format to HTML
$mail->isHTML(true);

// Email body content
$mailContent = '
    <h2>Send HTML Email using SMTP Server in PHP</h2>
    <p>It is a test email sent via SMTP server with PHPMailer using PHP.</p>';
$mail->Body = $mailContent;

// Send email
if(!$mail->send()){
    echo 'Message could not be sent. Mailer Error: '.$mail->ErrorInfo;
}
else{
    echo 'Message has been sent.';
}

?>