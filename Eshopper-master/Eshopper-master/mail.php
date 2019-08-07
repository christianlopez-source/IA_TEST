<?php
function Send_Mail($to,$subject,$body){
require_once('phpmailer/PHPMailerAutoload.php');
$mail = new PHPMailer();
$mail->CharSet =  "utf-8";
$mail->IsSMTP();
// enable SMTP authentication
$mail->SMTPAuth = true;                  
// GMAIL username
$mail->Username = "christlopbsc12@gmail.com";
// GMAIL password
$mail->Password = "mdpvycala3012";
$mail->SMTPSecure = "ssl";  
// sets GMAIL as the SMTP server
$mail->Host = "smtp.gmail.com";
// set the SMTP port for the GMAIL server
$mail->Port = "465";
$mail->From='christlopbsc12@gmail.com';
$mail->FromName='Christian López';
$mail->AddAddress($to, '');
$mail->Subject  = $subject;
$mail->IsHTML(true);
$mail->Body    = $body;
$mail->Send();
}

?>