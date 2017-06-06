<?php
require 'conn.php';
if (isset($_SESSION['logged_user']))
{
	echo $_SESSION['logged_user'];
	echo "<meta http-equiv='refresh' content='0; URL=dashboard.php'>";
	// session_destroy();
}
if (isset($_POST['submit']))
{
	$username = $_POST['user'];
	$password = md5($_POST['pass']);
	// $user = filter_var($username, FILTER_SANITIZE_STRING);
	// $pass = fitler_var($password, FILTER_SANITIZE_STRING);
	$username_filtered = $mysqli->real_escape_string($username);
	$password_filtered = $mysqli->real_escape_string($password);

	$result = $mysqli->query("SELECT uid, password FROM users WHERE uid='$username_filtered' AND password='$password_filtered'");
	$row_count = $result->num_rows;
	// echo $row_count;
	if ($row_count==1) # 1 is exists
	{
		$_SESSION['logged_user'] = $username_filtered;
		echo "<meta http-equiv='refresh' content='0; URL=dashboard.php'>";
		// echo $_SESSION['logged_user'];
	}
	else
	{
		?>
		 <script type="text/javascript">alert('Oops..., Username or Password incorret. Try again');
      window.location='login.html'</script>
      <?php
	}
}
?>
