<!DOCTYPE html>
<?php
  require_once('recaptcha-php-1.11/recaptchalib.php');
  $privatekey = "Private-Key-number";
  $resp = recaptcha_check_answer ($privatekey,
                                $_SERVER["REMOTE_ADDR"],
                                $_POST["recaptcha_challenge_field"],
                                $_POST["recaptcha_response_field"]);

  if (!$resp->is_valid) {
    // What happens when the CAPTCHA was entered incorrectly
    die ("The reCAPTCHA wasn't entered correctly. Go back and try it again." .
	 "<p><input type='button' value='Retry' onClick='history.go(-1)'></p>" .
         "(reCAPTCHA said: " . $resp->error . ")");
  } else {


$name = $_POST['name'];
$email = $_POST['email'];
$city = $_POST['city'];
$state = $_POST['state'];
$country = $_POST['country'];
$phone = $_POST['phone'];
$message = $_POST['message'];
$updates = $_POST['updates'];
$name = trim($name);
$email = trim($email);
$city = trim($city);
$state = trim($state);
$country = trim($country);
$phone = trim($phone);
$message = trim($message);
$name = strip_tags($name);
$email = strip_tags($email);
$city = strip_tags($city);
$state = strip_tags($state);
$country = strip_tags($country);
$phone = strip_tags($phone);
$message = strip_tags($message);
$valid = true;

if(empty($name) or empty($city) or empty($phone) or empty($message) or empty($email) ) 
	{
		echo "<h3><u> ERROR </u></h3>";
		echo "<hr>";
		echo "Name, Email, City, Phone number and Message are mandatory!";
		$valid = false;
	}

 if(!empty($name))
	{
		if (is_numeric($name))
		{
		echo "<h3><u> ERROR </u></h3>";
		echo "<hr>";
		echo "Data that was entred: " . $name. '<br/>';
		echo "You entred a numeric value in the Name field";
		$valid = false;
		}
		else if (strlen($name) < 3 || strlen($name) > 40)
		{
		echo "<h3><u> ERROR </u></h3>";
		echo "<hr>";
		echo "Data that was entred: " . $name. '<br/>';
		echo "Names has to be beween 3 and 40 charachters long";
		$valid = false;
		}
		else 
		{
			$valid = true;
		}
	}

 if(!empty($city))
	{
		if (is_numeric($city))
		{
		echo "<h3><u> ERROR </u></h3>";
		echo "<hr>";
		echo "Data that was entred: " . $city. '<br/>';
		echo "You entred a numeric value in the City field";
		$valid = false;
		}
		else if (strlen($city) < 3 || strlen($city) > 40)
		{
		echo "<h3><u> ERROR </u></h3>";
		echo "<hr>";
		echo "Data that was entred: " . $city. '<br/>';
		echo "City has to be beween 3 and 40 charachters long";
		$valid = false;
		}
		else
		{
			$valid = true;
		}
	}

 if(!empty($phone))
	{
		if (!is_numeric($phone))
		{
		echo "<h3><u> ERROR </u></h3>";
		echo "<hr>";
		echo "Data that was entred: " . $phone. '<br/>';
		echo "<p>Phone number can only be a numeric value (ex: 4235555555)</p>";
		}
		else if (strlen($phone) > 10)
		{
		echo "<h3><u> ERROR </u></h3>";
		echo "<hr>";
		echo "Data that was entred: " . $phone. '<br/>';
		echo "Phone has to be 10 charachters long";
		$valid = false;
		}
		else
		{
		$valid = true;	
		}
	}

 if(!empty($message))
	{
		if (strlen($message) < 3 || strlen($message) > 300)
		{
		echo "<h3><u> ERROR </u></h3>";
		echo "<hr>";
		echo "Data that was entred: " . $message. '<br/>';
		echo "<p>Message has to be beween 3 and 300 charachters long</p>";
		$valid = false;
		}
		else
		{
		$valid = true;	
		}
	}
 
 if(!empty($email))
	{
		if(filter_var($email, FILTER_VALIDATE_EMAIL))	//If Email is not correct return error message	
		{
		
		//var_dump(filter_var($email, FILTER_VALIDATE_EMAIL)); 
		$valid = true;
    	}
 		else
    	{ 
		echo "<h3><u> ERROR </u></h3>";
		echo "<hr>";
		echo "Data that was entred: " . $email. '<br/>';
		echo "<p>Please make sure you entred a correct Email (jon@email.com)!</p>\n";  
		$valid = false; 
    	} 
	}
	
	if (!$valid)
	{
		echo "<hr>";
		echo "<b> Please go back and try again</b>";
		echo "<p><input type='button' value='Retry' onClick='history.go(-1)'></p>";
	}

if($valid)
	{	
	$email_from = 'contact@email.com';
	$email_subject = "New Form submission for salhoferstudio.com";
	$email_body = "You have received a new message from the user:\n \n ".
	"Name:   $name \n".
	"Email:   $email \n ".
	"City:   $city \n ".
	"State:   $state \n ".
	"Country:   $country \n ".
	"Phone number:   $phone \n ".
	"Comment: \n$message \n\n".
	"Would you like to receive frequent updates:   $updates \n \n".
	"Messege send to:".
		
	$to = "contact@email.com";
	$headers = "From: $email_from \r\n";
	$headers .= "Reply-To: $email \r\n";
	
	//Send the email!
	mail($to,$email_subject,$email_body,$headers);
	
	//done. redirect to thank-you page.
	header('Location: thank-you.html');
	}

 } //end of reCupter else statment	 
?> 
</html>