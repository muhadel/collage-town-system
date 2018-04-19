<?php
function SendEmail($to,$Subject,$body)
{
require_once('phpmailer.php');
$from = "appservice83@Gmail.com";
ini_set("SMTP","ssl://smtp.gmail.com");  //protocol of the Gmail
ini_set("smtp_port","465");     //port of the Gmail
$fromName="AppService";

$mail = new PHPMailer(true); // the true param means it will throw exceptions on errors, which we need to catch
$mail->IsSMTP(); // telling the class to use SMTP

try {
  $mail->Host       = "smtp.gmail.com"; // SMTP server
  $mail->SMTPDebug  = 1;                     // enables SMTP debug information (for testing)
  $mail->SMTPAuth   = true;                  // enable SMTP authentication
  $mail->SMTPSecure = 'ssl';
  $mail->Port       = 465;                    // set the SMTP port for the GMAIL server
  $mail->Username   = "jomohamed87@gmail.com"; // SMTP account username
  $mail->Password   = "0102991970";        // SMTP account password
 
  $mail->AddAddress($to,$to);
  $mail->SetFrom($from, $from);
  $mail->Subject = $Subject;
  
  $mail->MsgHTML($body);
  $mail->CharSet='utf-8';
  
  $mail->Send();
         
  //echo $e->getMessage(); //Boring error messages from anything else!
}
 catch (phpmailerException $e) {
  //echo $e->errorMessage()."errorrrrrrrrrrrrrrr"; 
} 
}
?>



