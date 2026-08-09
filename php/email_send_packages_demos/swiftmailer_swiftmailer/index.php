<?php
	require_once 'vendor/autoload.php';

	// Create the Transport
	$transport = (new Swift_SmtpTransport('smtp.gmail.com', 587, 'tls'))
	  ->setUsername('smtp@gmail.com')
	  ->setPassword('123456')
	;

	// Create the Mailer using your created Transport
	$mailer = new Swift_Mailer($transport);

	// Create a message
	$message = (new Swift_Message('Test Subject'))
	  ->setFrom(['smtp@gmail.com' => 'Test from'])
	  ->setTo(['keyurrajpara1@gmail.com'])
	  ->setBody('Here is the message itself');

	$imagePath = __DIR__."/"."rose-gold-iphone-wallpaper-green-palm-tree-leaf-on-pink-background.jpg";
	$message->attach(Swift_Attachment::fromPath($imagePath));

	// Send the message
	$result = $mailer->send($message);

	if($result){
		echo "<pre>";
		echo "Email sent successfully";
		var_dump($result);
		exit;
	}
	else{
		echo "Failed to send email";
		exit;
	}
?>