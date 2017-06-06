<?php


require 'phpmailer/PHPMailerAutoload.php';
require '../conn.php';

if (isset($_SESSION['logged_user']))
{
	$user_id = $_SESSION['logged_user'];
	// session_destroy();
}

if (isset($_GET['id'])){
	$id = $_GET['id'];
}

$u_mail = '';

$mail = new PHPMailer;

//$mail->SMTPDebug = 3;                               // Enable verbose debug output


$result = $mysqli->query("SELECT * from users where uid='$user_id'");
	$row_count = $result->num_rows;
	// echo $row_count;
	if ($row_count==1) # 1 is exists
	{
		while ($row = $result->fetch_assoc()){
		$u_mail = $row['email'];
		}
	}


$num = rand(100000,999999);

$res = $mysqli->query("UPDATE users SET tac=$num WHERE uid='$user_id'");


$mail->isSMTP();                                      // Set mailer to use SMTP
$mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
$mail->SMTPAuth = true;                               // Enable SMTP authentication
$mail->Username = 'enocrypton@gmail.com';                 // SMTP username
$mail->Password = 'nws/25/15a';                           // SMTP password
$mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
$mail->Port = 587;                                    // TCP port to connect to

$mail->setFrom('enocrypton@gmail.com', 'Enocrypton Cloud');  // Add a recipient
$mail->addAddress($u_mail);    // Optional name
$mail->isHTML(true);                                  // Set email format to HTML

$mail->Subject = 'Enocrypton: Verification code';
$mail->Body    = 'This is your code <b>'. $num.'</b>. Verify it to continue';


if(!$mail->send()) {
    echo 'Message could not be sent.';
    echo 'Mailer Error: ' . $mail->ErrorInfo;
} else {
   echo 'Message has been sent';
	header("location:verify.php?id=".$id);
}




?>


