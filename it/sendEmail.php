<?
	
	function clean_string($string) {
		$bad = array("content-type","bcc:","to:","cc:","href");
		return str_replace($bad,"",$string);
    }
	
	
	// Recupero informazioni utente
	$user_ip = getenv('REMOTE_ADDR');
	$geo = unserialize(file_get_contents("http://www.geoplugin.net/php.gp?ip=$user_ip"));
	$country = $geo["geoplugin_countryName"];
	$city = $geo["geoplugin_city"];
	
	
	// Recupero form RSVP
	$name = $_POST['name']; 
	$email = $_POST['email']; // required
	$attending = $_POST['attending']; // not required
    $guest = $_POST['guest']; 
	$altro = $_POST['altro'];

	// e-mail verso me
    $email_to = "postmaster@sacommittolove.com";
    $email_subject = "Hai ricevuto un messaggio da ".clean_string($name)."!";
		
    $email_message .= "Nome e cognome: ".clean_string($name)."\n";
    $email_message .= "Email: ".clean_string($email)."\n";
    $email_message .= "Parteciperai? ".clean_string($attending)."\n";
    $email_message .= "Quanti sarete? ".clean_string($guest)."\n";
	$email_message .= "Altro: ".clean_string($altro)."\n\n";
	$email_message .= "(città: ".$city.")";
	
	$headers = 'From: '.$email."\r\n".
	@mail($email_to, $email_subject, $email_message, $headers);


	// E-MAIL VERSO UTENTE
	$email_subject_2 = "Stefano e Angeni ti ringraziano per il messaggio!";
	$email_message_2 = "";
	$email_message_2 .= "Ciao ".clean_string($name).",\n";
	$email_message_2 .= "\tgrazie per averci scritto. Sarà nostra cura provvedere alle tue richieste, qualora ce ne fossero (fino al 29 Aprile!).";
	$email_message_2 .= "\nPer qualsiasi ulteriore esigenza, di preghiamo di contattarci via telefono (riportato in fondo all'invito, sperando che tu non l'abbia già buttato!)";
	$email_message_2 .= " oppure ad una delle seguenti email:\n";
	$email_message_2 .= "- Stefano: divitostefano@yahoo.it  oppure  divitostefano@gmail.com\n";
	$email_message_2 .= "- Angeni: angeni.uminga@gmail.com  oppure  angenie13@hotmail.com\n";
	
	$email_message_2 .= "\nDi seguito trovi il messaggio che hai inviato:\n";
	$email_message_2 .= "Nome e cognome: ".clean_string($name)."\n";
    $email_message_2 .= "Email: ".clean_string($email)."\n";
    $email_message_2 .= "Parteciperai? ".clean_string($attending)."\n";
    $email_message_2 .= "Quanti sarete? ".clean_string($guest)."\n";
	$email_message_2 .= "Altro: ".clean_string($altro)."\n\n";
	
	$email_message_2 .= "Grazie mille!";
	$email_message_2 .= "\nStefano & Angeni";
	
	//$headers = "From: postmaster@sacommittolove.com\r\n".

	@mail($email, $email_subject_2, $email_message_2);
	

	$referer = $_SERVER['HTTP_REFERER'];
	header("Location: rsvp.html?message=ok");
	exit;

?>