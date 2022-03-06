<?php

// include_once("PHPMailerAutoload.php");

// $mail = new PHPMailer();
// try {
//     $mail->IsSMTP(); // enable SMTP
// 	$mail->SMTPDebug = 1; // debugging: 1 = errors and messages, 2 = messages only
// 	$mail->Debugoutput = 'html';
// 	$mail->SMTPAuth = true; // authentication enabled
// 	$mail->SMTPSecure = 'ssl'; //Set the SMTP port number - likely to be 25, 465 or 587
// 	$mail->Host = "smtp.gmail.com";
// 	$mail->Port = 465; //Set the encryption system to use - ssl (deprecated) or tls
// 	$mail->Username = "info.kababji@gmail.com";
// 	$mail->Password = "kababji@123";
// 	$mail->setFrom('from@example.com', 'First Last');
// 	$mail->addAddress('info.kababji@gmail.com', 'Abeer Bilal');
// 	$mail->Subject = "New Email from Kababji Website";
// 	$mail->msgHTML("for test, please ignore.");
// 	$mail->IsHTML(true);
// 	$mail->SMTPOptions = array(
// 		'ssl' => array(
// 		'verify_peer' => false,
// 		'verify_peer_name' => false,
// 		'allow_self_signed' => true
// 		)
// 	);
			
// 	if(!$mail->Send()) {
// 		echo "Mailer Error: " . $mail->ErrorInfo;
// 	} else {
// 		echo "Message has been sent";
// 	}
// } catch (Exception $e) {
//     echo 'Message could not be sent. Mailer Error: '. $mail->ErrorInfo;
// }
	
?>