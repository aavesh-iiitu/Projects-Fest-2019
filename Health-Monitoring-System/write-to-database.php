<?php

$method=$_GET['temp'];
$pirinput=$_GET['pir11'];
$heart=$_GET['heartrate'];
$strheart=floatval($heart);
if($heart>=60 and $heart<=120)
{
	$heartrate=$heart;
}
else{
	$heartrate="0";
}

$date=date("d-m-y");
$time=time();
$tempreture=floatval($method);
$con=mysqli_connect('localhost','root','','templog');
$sql ="INSERT INTO `temp-at-interrupt`(`Date`,`Time`,`Temperature`,`Status`,`Heart_Rate`) VALUES (NOW(),NOW(),$tempreture,$pirinput,$heartrate)";
$run=mysqli_query($con,$sql);


if($pirinput=="1"){
	$chrome="Motion Detected! Take Appropriate Action";
}
else{
	$chrome="Motion Not Detected";
}



  
if($tempreture>=30 or $pirinput=="1" or $heartrate>="90" and $heartrate<="120" ){
	
	
	
// to send email in php

require 'PHPMailer/PHPMailerAutoload.php';
$mail = new PHPMailer;

//Enable SMTP debugging. 
$mail->SMTPDebug = 3;                               
//Set PHPMailer to use SMTP.
$mail->isSMTP();            
//Set SMTP host name                          
$mail->Host = "smtp.gmail.com";
//Set this to true if SMTP host requires authentication to send email
$mail->SMTPAuth = true;                          
//Provide username and password     
$mail->Username = "naveen177005@gmail.com";                 
$mail->Password = "Naveen@41";                           
//If SMTP requires TLS encryption then set it
//$mail->SMTPSecure = "tls";                           
//Set TCP port to connect to 
$mail->Port = 587;                                   

$mail->From = "naveen177005@gmail.com";
$mail->FromName = "naveen kumar";

$mail->smtpConnect(
    array(
        "ssl" => array(
            "verify_peer" => false,
            "verify_peer_name" => false,
            "allow_self_signed" => true
        )
    )
);

$mail->addAddress("naveenkatiyar41@gmail.com", "Naveen KUMAR");

$mail->isHTML(true);

$mail->Subject = "Health Report";
	
$mail->Body = "<!DOCTYPE html><html><head></head><body>current tempretue is=$tempreture<br></br>$chrome<br></br>Current Heart Rate=$heartrate</body></html>";
$mail->AltBody = "This is the plain text version of the email content";



if(!$mail->send()) 
{
    echo "Mailer Error: " . $mail->ErrorInfo;
} 
else 
{
    echo "Message has been sent successfully";
}


	




}

?>













