<!DOCTYPE html>
<?php
$name = $_POST['name'];
$email = $_POST['email'];
$city = $_POST['city'];
$state = $_POST['state'];
$phone = $_POST['phone'];
$message = $_POST['message'];
$name = trim($name);
$email = trim($email);
$city = trim($city);
$state = trim($state);
$phone = trim($phone);
$message = trim($message);
$name = strip_tags($name);
$email = strip_tags($email);
$city = strip_tags($city);
$state = strip_tags($state);
$phone = strip_tags($phone);
$message = strip_tags($message);



if(!isset($_POST['submit']))
{
	
	echo "AN ERROR OCCURRED !";
	echo "<br/>";
	echo "<p><input type='button' value='Retry' onClick='history.go(-1)'></p>";
}

if(empty($name)&& empty ($city) && empty($state) && empty($country) && empty($email) ) 
{
    echo "Name, email, city, state and country are mandatory!";
    exit;
}
if(!empty($name))
{
	if (is_numeric($name) || is_numeric($city) || is_numeric($state) || is_numeric($country))
	{
	echo "You entred a numeric value in a data field";
	exit;
	}
	else if (strlen($name) > 35 || strlen($city) > 20)
	{
	echo "You entred to many charachters in data field";
	exit;
	}
}
if(!empty($phone))
{
	if (!is_numeric($phone))
	{
	echo "You entred not a numeric value in the phone field (ex: 4235555555)";
	exit;
	}
}
if(!empty($message))
{
	if (strlen($message) > 300)
	{
	echo "You can only add up to 300 characters";
	exit;
	}
}
if(!empty($email))
		{
	if (!filter_var($email, FILTER_VALIDATE_EMAIL))			//If Email is not correct return error message
	{
		echo "<p>You entred an incorect Email (jon@email.com)!</p>\n";
		exit();
	}
}
	

$email_from = 'contact@email.com';
$email_subject = "New Form submission ";
$email_body = "Have received a new message from the user:\n \n ".
"Name: $name \n".
"Email: $email \n ".
"City: $city \n ".
"State: $state \n ".
"Phone number: $phone \n ".
"Comment:$message \n".
"Messege send to:".
    
$to = "contact@email.com";
$headers = "From: $email_from \r\n";
$headers .= "Reply-To: $email \r\n";

//Send the email!
mail($to,$email_subject,$email_body,$headers);

//done. redirect to thank-you page.
header('Location: thank-you.html');


   
?> 
</html>
