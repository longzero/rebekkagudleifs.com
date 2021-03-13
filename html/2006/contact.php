<?php include("header.php"); ?>
<div id="container">
	<div id="photo"><img src="photos/contact.jpg" width="675" alt="" /></div>
	<div id="content">
		<h2><span style="color:#fff;">contact</span>rebekka</h2>
		<?php 
			if (isset($_POST['subSend'])) 
			{
				if (isset($_POST['check2']))
				{
					$name     = $_POST['name'];
					$email    = $_POST['email'];
					$website  = $_POST['website'];
					$location = $_POST['location'];
					$subject  = $_POST['subject'];
					$message  = $_POST['message'];

					$to = "Rebekka Guðleifsdóttir <rebekka@rebekkagudleifs.com>";
					$subject = "[re..com] ".$subject;
					$headers  = "MIME-Version: 1.0 \r\n";
					$headers .= "Content-type: text/html; charset=utf-8 \r\n";
					$headers .= "From: ".$name." <".$email."> \r\n";
					$headers .= "Cc: rbekka@hotmail.com \r\n";
					$headers .= "Bcc: long@longzero.com \r\n";
					$message  = "
						<html>
							<body>
								<strong>name</strong> $name <br />
								<strong>email</strong> $email <br />
								<strong>website</strong> $website <br />
								<strong>location</strong> $location <br />
								<strong>subject</strong> $subject <br />
								<strong>message</strong> $message
							</body>
						</html>";


					if (empty($name) || empty($email) || empty($subject) || empty($message))
					{
						echo "You left empty fields. Please go back to fill in what's missing.";
					}
					else if (substr($name, -20) == "@rebekkagudleifs.com") {showContactForm();}
					else
					{
						$sent = mail($to, $subject, $message, $headers);
						if ($sent) { echo "Thank you. Your message has been sent."; }
						else { echo "Something went wrong. Please send your message via email to rebekka@rebekkagudleifs.com"; }
					}
				}
				else
				{
					echo "You didn't follow the form's instructions. Go back.";
				}
			} 
			else 
			{ 
				showContactForm();
			} 
		?>
	</div>
</div>
<?php include("footer.php"); ?>