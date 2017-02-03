<?
	// EDIT THE 2 LINES BELOW AS REQUIRED
    $email_to = "postmaster@sacommittolove.com";
    $email_subject = "Matrimonio";
		echo '<script>console.log("a")</script>';

	$first_name = $_POST['name']; // required
	$email_from = $_POST['email']; // required
	$attending = $_POST['attending']; // not required
    $guest = $_POST['guest']; // required
	$altro = $_POST['altro'];

	echo '<script>console.log("'.$first_name.'")</script>';
	if(empty($first_name) || empty($email_from)) 
    { 
        echo '<script> alert ("Please go back and fill in all required lines"); window.history.back()</script>';
    }
	
	
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
	$email_message .= "Altro: ".clean_string($altro)."\n";
	
	// create email headers
	$headers = 'From: '.$email_from."\r\n".
	@mail($email_to, $email_subject, $email_message, $headers);  
	
	echo '<script type="text/javascript"> alert ("Thankyou") </script>';

	$referer = $_SERVER['HTTP_REFERER'];
	header("Location: rsvp.html?message=ok");
	exit;

?>