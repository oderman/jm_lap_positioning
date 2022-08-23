<?php
include("conection.php");

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'libraries/phpmailer/Exception.php';
require 'libraries/phpmailer/PHPMailer.php';
require 'libraries/phpmailer/SMTP.php';

$sql = "INSERT INTO contactform(name, email, message)VALUES(:name, :email, :message)";
$stmt = $pdo->prepare($sql);

$stmt->bindParam(':name', $_POST['name'], PDO::PARAM_STR);
$stmt->bindParam(':email', $_POST['email'], PDO::PARAM_STR);
$stmt->bindParam(':message', $_POST['message'], PDO::PARAM_STR);

$stmt->execute();


include("templateEmail.php");

// Instantiation and passing `true` enables exceptions
$mail = new PHPMailer(true);

try {
    //Server settings
    $mail->SMTPDebug = 0;                                       // Enable verbose debug output
    $mail->isSMTP();                                            // Set mailer to use SMTP
    $mail->Host       = 'mail.lap-positioning.com';  // Specify main and backup SMTP servers
    $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
    $mail->Username   = 'info@lap-positioning.com';                     // SMTP username
    $mail->Password   = 'hjtu4RY7!#YD';                              // SMTP password
    $mail->SMTPSecure = 'ssl';                                  // Enable TLS encryption, `ssl` also accepted
    $mail->Port       = 465;                                    // TCP port to connect to

    //Recipients
    $mail->setFrom('info@lap-positioning.com', 'Lap');

    $mail->addAddress($_POST['email'], $_POST['name']);     // Add a recipient

    // Content
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = "Contact Form" . $newId;
    $mail->Body = $fin;
    $mail->CharSet = 'UTF-8';

    $mail->send();

} catch (Exception $e) {
    echo "Error: {$mail->ErrorInfo}";
    exit();
}


header("Location: index.php?messageSent=1");
die();
