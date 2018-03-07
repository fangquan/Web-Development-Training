<?php
	$firstname = $_POST['firstname'];
	$lastname = $_POST['lastname'];
	$visitor_email = $_POST['email'];
	$phone = $_POST['phone'];
	$wechat =$_POST['wechat'];
	$message = $_POST['message'];
	
	$email_from = $visitor_email;
	$email_to = "fangquans@gmail.com,nfeduboston@gmail.com,ethan.wang@nfeedu.com";
	$email_subject = "New Form submission";

	$email_body = "First name: $firstname.\n" . "Last name: $lastname\n"."Phone: $phone\n"."Email: $visitor_email\n"."Wechat: $wechat\n"."$message";

function IsInjected($str)
{
    $injections = array('(\n+)',
           '(\r+)',
           '(\t+)',
           '(%0A+)',
           '(%0D+)',
           '(%08+)',
           '(%09+)'
           );
               
    $inject = join('|', $injections);
    $inject = "/$inject/i";
    
    if(preg_match($inject,$str))
    {
      return true;
    }
    else
    {
      return false;
    }
}

if(IsInjected($visitor_email))
{
    echo "Bad email value!";
    exit;
}

	mail($email_to,$email_subject,$email_body);
	echo("Thank you! We will contact you soon!");
?>