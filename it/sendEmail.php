<?
	$user_ip = getenv('REMOTE_ADDR');
	$geo = unserialize(file_get_contents("http://www.geoplugin.net/php.gp?ip=$user_ip"));
	$country = $geo["geoplugin_countryName"];
	$city = $geo["geoplugin_city"];

	function clean_string($string) {
		$bad = array("content-type","bcc:","to:","cc:","href");
		return str_replace($bad,"",$string);
    }
	
	$first_name = $_POST['name']; 
	$email_from = $_POST['email']; // required
	$attending = $_POST['attending']; // not required
    $guest = $_POST['guest']; 
	$altro = $_POST['altro'];


	//echo '<script>console.log("'.$first_name.'")</script>';
	//if(empty($first_name) || empty($email_from)) 
    //{ 
    //    echo '<script> alert ("Please go back and fill in all required lines"); window.history.back()</script>';
    //}
	
	
    $error_message = "";
    $email_exp = '/^[A-Za-z0-9._%-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,4}$/';
	
    $email_to = "postmaster@sacommittolove.com";
    $email_subject = "Hai ricevuto un messaggio da ".clean_string($first_name)."!";
		
    
	$email_message .= "Nome e cognome: ".clean_string($first_name)."\n";
    $email_message .= "Email: ".clean_string($email_from)."\n";
    $email_message .= "Parteciperai? ".clean_string($attending)."\n";
    $email_message .= "Quanti sarete? ".clean_string($guest)."\n";
	$email_message .= "Altro: ".clean_string($altro)."\n\n";
	$email_message .= "(città: ".$city.")";
	
	// create email headers
	$headers = 'From: '.$email_from."\r\n".
	@mail($email_to, $email_subject, $email_message, $headers);  
	
	echo '<script type="text/javascript"> alert ("Thankyou") </script>';

	$referer = $_SERVER['HTTP_REFERER'];
	header("Location: rsvp.html?message=ok");
	exit;

?>