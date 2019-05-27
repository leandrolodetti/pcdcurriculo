<?php
//require_once("PHPMailer.php");

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'src/PHPMailer.php';
require 'src/SMTP.php';
require 'src/Exception.php';


$email = $_POST["email"];
$nome = $_POST["nome"];
$mensagem = $_POST["mensagem"];

//$mail = new PHPMailer;
//Create a new PHPMailer instance
$mail = new PHPMailer;

$mail->isSMTP();
$mail->Host = 'SMTP.office365.com';
$mail->Port = 587;
$mail->SMTPSecure = 'STARTTLS';
$mail->SMTPAuth = true;
$mail->Username = "leandro_sampa_@hotmail.com";
$mail->Password = "yaxun881D";

$mail->setFrom("leandro_sampa_@hotmail.com");
$mail->addAddress($email);
$mail->Subject = "Email de contato da loja";

$mail->msgHTML("<html>de: {$nome}<br/>email: {$email}<br/>mensagem: {$mensagem}</html>");
$mail->AltBody = "de: {$nome}\nemail:{$email}\nmensagem: {$mensagem}";

if($mail->send()) {
    $_SESSION["success"] = "Mensagem enviada com sucesso";
    header("Location: index.php");
} else {
    $_SESSION["danger"] = "Erro ao enviar mensagem " . $mail->ErrorInfo;
    header("Location: contato.php?erro!");
}
die();

?>