<?php
include("../conection.php");

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '../libraries/phpmailer/Exception.php';
require '../libraries/phpmailer/PHPMailer.php';
require '../libraries/phpmailer/SMTP.php';

try{

    $sql = "INSERT INTO contactForm(name, email, message)VALUES(:name, :email, :message)";
    $stmt = $pdo->prepare($sql);

    $stmt->bindParam(':name', $_POST['name'], PDO::PARAM_STR);
    $stmt->bindParam(':email', $_POST['email'], PDO::PARAM_STR);
    $stmt->bindParam(':message', $_POST['message'], PDO::PARAM_STR);

    $stmt->execute();

}catch(PDOException $e){ 
    die ("Error: " . $e->GetMessage() . " En la Linea " .  $e->getline()); 
}

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
    $mail->addAddress('info@lap-positioning.com', 'Lap');     // Add a recipient

    // Content
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = "LAP(es) | Nuevo mensaje de contacto";
    $mail->Body = $fin;
    $mail->CharSet = 'UTF-8';

    $mail->send();

} catch (Exception $e) {
    echo "Error: {$mail->ErrorInfo}";
    exit();
}


header("Location: index.php?messageSent=1");
die();
