<?php
require 'vendor/autoload.php';
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
// Configurações do servidor SMTP
$mail = new PHPMailer;
$mail->isSMTP();
$mail->Host = 'smtp.hostinger.com'; // Substitua pelo servidor SMTP desejado.
//$mail->SMTPAuth = true;
$mail->Username = 'brunocampos@projackstech.com'; // Substitua pelo seu endereço de e-mail.
$mail->Password = 'Cavaquinho@90'; // Substitua pela sua senha.
$mail->SMTPSecure = 'tls'; // Use 'tls' ou 'ssl' dependendo das configurações do servidor SMTP.
$mail->Port = 465 ; // Substitua pela porta correta.

// Remetente
$mail->setFrom('brunocampos@projackstech.com', 'Bruno Campos');

// Mensagem
$mail->isHTML(false); // Habilita o suporte a HTML na mensagem.
$mail->Subject = 'TESTE';
$mail->Body = 'Foi';

// Lista de endereços de e-mail
// $recipientList = ['meirelles.allisson@gmail.com'];
$recipient = 'bruno@bonamaison.com';
$mail->addAddress($recipient);
$mail->send();

// Envia e-mails para cada endereço na lista
// foreach ($recipientList as $recipient) {
//     $mail->clearAddresses();
//     $mail->addAddress($recipient);

     if (!$mail->send()) {
         echo 'Erro ao enviar e-mail para ' . $recipient . ': ' . $mail->ErrorInfo;
     } else {
         echo 'E-mail enviado para ' . $recipient . '<br>';
     }
// }
// ?>
