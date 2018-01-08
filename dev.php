<?php
session_start();
$captcha = $_POST['captcha'];
if($captcha != $_SESSION['code']){
echo "Enter Correct captcha";
exit();
}
require("class.phpmailer.php");

$mail = new PHPMailer();

$mail->IsSMTP();                                      // set mailer to use SMTP
$mail->Host = "mail.devomark.com";  // specify main and backup server
$mail->SMTPAuth = true;     // turn on SMTP authentication
$mail->Username = "mohammed@devomark.com";  // SMTP username
$mail->Password = "12486230"; // SMTP password
$mail->From = "elvis@devomark.com";
$mail->FromName = "Elvis";
$mail->AddAddress("ansariumair777@gmail.com", "Umair Ansari");                 // name is optional
/*$mail->AddReplyTo("info@example.com", "Information");*/

$mail->WordWrap = 50;
$Name = $_POST['name'];
$Phone = $_POST['phone'];
$Email = $_POST['email'];
$Message = $_POST['message'];
$mail->IsHTML(true);                                  // set email format to HTML
$mail->Subject = "Here is the subject";

$mail->Body = "Name: ".$Name.'<br>'."Phone: ".$Phone.'<br>'."Email: ".$Email.'<br>'."Message: ".$Message;
$mail->AltBody = "This is the body in plain text for non-HTML mail clients";

if(!$mail->Send())
{
   echo "Message could not be sent. <p>";
   echo "Mailer Error: " . $mail->ErrorInfo;
   exit;
}
echo "Message has been sent";
?>
