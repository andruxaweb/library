<?php
	session_start();
	if(isset($_POST['submit']))
	{		
	$name = $_POST['name'];
	$subject = $_POST['subject'];
	$mailFrom = $_POST['email'];
	$message = $_POST['message'];
	$_SESSION[name]=$name;
	$_SESSION[subject]=$subject;
	$_SESSION[mailFrom]=$mailFrom;
	$_SESSION[message]=$message;	
	
	$mailto = "librarytestczest@gmail.com";
	$headers = "From: ".mailFrom;
	$txt = "You have received an e-mail from".$name."\n".message;
	
	mail($mailto,$subject,$txt,$headers);
	
	header("Location: index.php?mailsend");
	
	}
	
	?>