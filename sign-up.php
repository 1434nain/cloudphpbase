<?php
require 'conn.php';

$msg = "";

if (isset($_POST["submit"]))
{
	$userName = $_POST['user'];
	$email = $_POST['email'];
	$password =  $_POST['pass'];
	$password_confirm = $_POST['pass_confirm'];

	$userName = $mysqli->real_escape_string($userName);
	$password = $mysqli->real_escape_string($password);
	$password = md5($password);
		
	$password_confirm = $mysqli->real_escape_string($password_confirm);
	$password_confirm = md5($password);
	
	//$userName = mysqli_real_escape_string($db,$userName);
	//$email = mysqli_real_escape_string($db,$email);
	//$password = mysqli_real_escape_string($db,$password);
	//$password = md5($password);
	//echo $userName;
	//echo $email;
	//echo $password;

	$sql ="SELECT uid FROM users WHERE uid='$userName'";
	$result = $mysqli->query($sql);
	//$result=mysqli_query($db,$sql);
	$row = $result->num_rows;
	//$row=mysqli_fetch_array($result,MYSQLI_ASSOC);
	//if(mysqli_num_rows($result) == 1)
	if ($row == 1)	
	{?>
		<script type="text/javascript">alert('Oops..., Username already been registered. Try again');
			window.location='signup.html'</script><?php
	}
	else
	{
		$query = $mysqli->query("INSERT INTO users (uid, email, password) VALUES ('$userName','$email', '$password')");
		$path = "aes/uploads/".$userName;

		mkdir($path);
		chown($path, $userName);
		chmod($path, 0755);
		
		if($query)
		{
			?>
		<script type="text/javascript">alert('Successfully registered. Click Ok to login');
			window.location='login.html'</script>
		
<?php
		}
		else
		{
		echo "query failed";
		}
	}

}
?>
