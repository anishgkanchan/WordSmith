<?php
/*
	Download PhpMailer from the following link:
	https://github.com/Synchro/PHPMailer (CLick on Download zip on the right side)
	Extract the PHPMailer-master folder into your xampp->htdocs folder
	Make changes in the following code and its done :-)
	
	You will receive the mail with the name Root User.
	To change the name, go to class.phpmailer.php file in your PHPMailer-master folder,
	And change the name here: 
	public $FromName = 'Root User';
*/
require("PHPMailer-master/class.phpmailer.php");
require("PHPMailer-master/class.smtp.php");

ini_set("SMTP","ssl://smtp.gmail.com"); 
ini_set("smtp_port","465"); //No further need to edit your configuration files.
$mail = new PHPMailer();
$mail->IsSMTP();
$mail->SMTPAuth = true;
$mail->Host = "smtp.gmail.com"; // SMTP server
$mail->SMTPSecure = "ssl";
$mail->Username = "anishthegay@gmail.com"; //account with which you want to send mail.
$mail->Password = "iloveneha"; //this account's password.
$mail->Port = "465";
  // telling the class to use SMTP
$rec1=$email; 
 //email addresses to which u want to send the mail.
$mail->AddAddress($rec1); 
$mail->Subject  = "Wordsmith registration";
$mail->Body     = $msgbody;
$mail->WordWrap = 50;
echo $mail->Body;
if(!$mail->Send()) {
echo 'Message was not sent!.';
echo 'Mailer error: ' . $mail->ErrorInfo;
} else {
echo 'Message has been sent!.';
}
?>