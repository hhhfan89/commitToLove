<?
	// EDIT THE 2 LINES BELOW AS REQUIRED
    $email_to = "postmaster@sacommittolove.com";
    $email_subject = "Your email subject line";
		
	$first_name = $_POST['inputname']; // required
	$email_from = $_POST['inputemail']; // required
	$attending = $_POST['attending']; // not required
    $guest = $_POST['guest']; // required
	
	//echo '<script>console.log("'.$first_name.'")</script>';
	
    $error_message = "";
    $email_exp = '/^[A-Za-z0-9._%-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,4}$/';
	
	$email_message = "Form details below.\n\n";
    
	function clean_string($string) {
      $bad = array("content-type","bcc:","to:","cc:","href");
      return str_replace($bad,"",$string);
    }
    
	$email_message .= "First Name: ".clean_string($first_name)."\n";
    $email_message .= "Email: ".clean_string($email_from)."\n";
    $email_message .= "Attending: ".clean_string($attending)."\n";
    $email_message .= "Guest: ".clean_string($guest)."\n";
	
	// create email headers
	$headers = 'From: '.$email_from."\r\n".
	@mail($email_to, $email_subject, $email_message, $headers);  
	
	$referer = $_SERVER['HTTP_REFERER'];
	header("Location: $referer");
	exit;

?>