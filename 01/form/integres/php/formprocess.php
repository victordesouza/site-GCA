<?php 
	if (!isset($_SESSION)) session_start(); 
	if(!$_POST) exit;
	
	include dirname(__FILE__).'/settings/settings.php';
	include dirname(__FILE__).'/functions/emailValidation.php';
	
/*	---------------------------------------------------------------------------
	: Register all form field variables here
	--------------------------------------------------------------------------- */	
		
	$firstname = strip_tags(trim($_POST["firstname"]));	
	$lastname = strip_tags(trim($_POST["lastname"]));
	$emailaddress = strip_tags(trim($_POST["emailaddress"]));
	$telephone = strip_tags(trim($_POST["telephone"]));
	$website = strip_tags(trim($_POST["website"]));
	$department = strip_tags(trim($_POST["department"]));
	$message = strip_tags(trim($_POST["message"]));
	$captcha = strip_tags(trim($_POST["captcha"]));
	
/*	----------------------------------------------------------------------
	: Prepare form field variables for CSV export
	----------------------------------------------------------------------- */	
	
	if($generateCSV == true){
		$csvFile = $csvFileName;	
		$csvData = array(
			$_POST['firstname'],
			$_POST['lastname'],
			$_POST['emailaddress'],
			$_POST['telephone'],
			$_POST['website'],
			$_POST['department']	
		);
	}

/*	-------------------------------------------------------------------------
	: Prepare serverside validation 
	------------------------------------------------------------------------- */
	 
	$errors = array();
	
	/* validate firstname 
	------------------------------------ */
	if(isset($_POST["firstname"])){
		if (!$firstname) {
			$errors[] = "Enter first name";
		} elseif(strlen($firstname) < 2)  {
			$errors[] = "Enter at least 2 characters";
		}
	}
	
	/* validate lastname
	-------------------------------------- */
	if(isset($_POST["lastname"])){
		if (!$lastname) {
			$errors[] = "Enter last name";
		}
	}	
	
	/* validate email address 
	-------------------------------------- */
	if(isset($_POST["emailaddress"])){
		if (!$emailaddress) {
			$errors[] = "Enter email address";
		} else if (!validEmail($emailaddress)) {
			$errors[] = "Enter a VALID email address";
		}
	}
	
	/* validate telephone
	-------------------------------------- */
	if(isset($_POST["telephone"])){
		if (!$telephone) {
			$errors[] = "Enter telephone number";
		}
	}	
	
	/* validate security captcha 
	--------------------------------------- */
	if(isset($_POST["captcha"])){
		if (!$captcha) {
			$errors[] = "You must enter the captcha code";
		} else if (($captcha) != $_SESSION['gfm_captcha']) {
			$errors[] = "Captcha code is incorrect";
		}
	}
		
	/* output all errors as a list 
	-------------------------------------- */	
	if ($errors) {
		$errortext = "";
		foreach ($errors as $error) {
			$errortext .= '<li>'. $error . "</li>";
		}
		echo '<div class="alert flo-notification alert-error"><strong>The following errors occured:</strong><br><ul>'. $errortext .'</ul></div>';
	
	} else{	

			include dirname(__FILE__).'/phpmailer/PHPMailerAutoload.php';
			include dirname(__FILE__).'/templates/formmessage.php';			
				
			$mail = new PHPMailer();
			$mail->isSendmail();
			$mail->IsHTML(true);
			$mail->From = $emailaddress;
			$mail->CharSet = "UTF-8";
			$mail->FromName = $firstname;
			$mail->Encoding = "base64";
			$mail->Timeout = 200;
			$mail->ContentType = "text/html";
			$mail->addAddress($receiver_email, $receiver_name);
			$mail->Subject = $receiver_subject;	
			$mail->Body = $goldmessage;
			$mail->AltBody = "Use an HTML compatible email client";

			
		/*	-------------------------------------------------------------------
			: Prepare sending to multiple  addresses / recepients if true
			------------------------------------------------------------------- */
			// If you want the form to be emailed to other addresses
			// Change the extra_recipients option below from (false) to (true)
			// Then enter email addresses with corresponding names seperated by comas
			// For example "john@example.com" => "John", "jack@example.com" => "Jack", "jeny@example.com" => "Jeny"
			// echo $goldmessage;
			// echo $automessage;
			$recipients = false;
			if($recipients == true){
				$recipients = array(
						"example@domain.com" => "Admin",
						"example@domain.com" => "Sales"
				);
				
				foreach($recipients as $email => $name){
					$mail->AddBCC($email, $name);
				}	
			}			
			
			if($mail->Send()) {
			
			/*	-----------------------------------------------------------------
				: Generate the CSV file and post values if its true
				----------------------------------------------------------------- */		
				if($generateCSV == true){	
					if (file_exists($csvFile)) {
						$csvFileData = fopen($csvFile, 'a');
						fputcsv($csvFileData, $csvData );
					} else {
						$csvFileData = fopen($csvFile, 'a'); 
						$headerRowFields = array(
							"First Name",
							"Last Name",
							"Email",
							"Telephone",
							"Website",			
							"Department"
						);
						fputcsv($csvFileData,$headerRowFields);
						fputcsv($csvFileData, $csvData );
					}
					fclose($csvFileData);
				}
				
			/*	---------------------------------------------------------------------
				: Send the auto responder message if its true
				--------------------------------------------------------------------- */
				if($autoResponder == true){
				
					include dirname(__FILE__).'/templates/autoresponder.php';
					
					$automail = new PHPMailer();
					$automail->isSendmail();
					$automail->From = $receiver_email;
					$automail->FromName = $receiver_name;
					$automail->isHTML(true);                                 
					$automail->CharSet = "UTF-8";
					$automail->Encoding = "base64";
					$automail->Timeout = 200;
					$automail->ContentType = "text/html";
					$automail->AddAddress($emailaddress, $firstname);
					$automail->Subject = "Obrigado por entrar em contato";
					$automail->Body = $automessage;
					$automail->AltBody = "Use an HTML compatible email client";
					$automail->Send();	 
				}				
											
				echo '<div class="alert flo-notification alert-success">Mensagem enviada com sucesso!</div>';
			} 
			else {
			  	echo '<div class="alert flo-notification alert-error">Mensagem não enviada!</div>';
			}
	}
?>