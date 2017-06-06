
<?php
require "conn.php";
if (!isset($_SESSION['logged_user'])) {
	echo "<meta http-equiv='refresh' content='0; URL=login.html'>";
	
}
else {
	$currUser = $_SESSION['logged_user'];
	//echo $_SESSION['logged_user']."<br
	//echo "<a href='?logout'>Logout</a>";
	

if (isset($_POST["submit"]))
{
	$pass = $_POST['pass'];

$pass = md5($pass);
$result = $mysqli->query("UPDATE users SET password='$pass' where uid='$currUser'");
	$row_count = $result->num_row;

?>
<script type="text/javascript">
          alert('Your password have been changed.');   
      window.close();

      window.onunload = refreshParent;
          function refreshParent() {
              window.opener.location.reload();
          }
</script>
<?php
}
?>





<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php echo "<title>".$_SESSION['logged_user']. " | Settings</title>"?>
    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <script src="http://cdn.ckeditor.com/4.6.1/standard/ckeditor.js"></script>
  </head>
  <body>

    <nav class="navbar navbar-default">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">Enocrypton</a>
        </div>
        <div id="navbar" class="collapse navbar-collapse">
          <ul class="nav navbar-nav">
            <li><a href="dashboard.php">Dashboard</a></li>
            <li><a href="settings.php">Settings</a></li>
          </ul>
          <ul class="nav navbar-nav navbar-right">
            <li><?php echo '<a href="#">Welcome, '. $_SESSION['logged_user']. "</a>"?></li>
            <li><?php echo "<a href='?logout'>Logout</a>"?></li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>

    <header id="header">
      <div class="container">
        <div class="row">
          <div class="col-md-10">
            <h1><img src="fyp logo.png" style="width:304px;height:108px;""></h1>
          </div>
          <div class="col-md-2">
            <div class="dropdown create">
              <button class="btn btn-default" type="button" onclick="up()">
                Upload File

		<script>
		function up(){
			window.open("download/upload.html", "_blank", "toolbar=yes, scrollbars=yes, resizeable=yes,top=90, left=500, width=600, height=500");
		}
		</script>

              </button>
              <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                <li><a type="button" data-toggle="modal" data-target="#addPage">Upload</a></li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </header>

    <section id="breadcrumb">
      <div class="container">
        <ol class="breadcrumb">
          <li><a href="dashboard.php">Dashboard</a></li>
          <li class="active"><a href="settings.php">Settings</a></li>
        </ol>
      </div>
    </section>

    <section id="main">
      <div class="container">
        <div class="row">
          <div class="col-md-3">
            <div class="list-group">
              <a href="dashboard.php" class="list-group-item active main-color-bg">
                <span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span> Dashboard
              </a>
              <a href="settings.php" class="list-group-item"><span class="glyphicon glyphicon-cog" aria-hidden="true"></span> Settings</a>
            </div>

            <div class="well">
              <h4>Disk Space Used</h4>
              <div class="progress">
                  <div class="progress-bar" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 10%;">
                      3%
              </div>
            </div>
            </div>
          </div>
          <div class="col-md-9">
            <!-- Website Overview -->
            <div class="panel panel-default">
              <div class="panel-heading main-color-bg">
                <h3 class="panel-title">Edit Details</h3>
              </div>
              <div class="panel-body">
                <form method="post" action="settings.php">
                  <div class="form-group">
                    <label>Password</label>
                    <input type="password" class="form-control" placeholder="changepass" value="" name="pass">
                  </div>
                  <input type="submit" class="btn btn-default" value="Submit" name="submit">
                </form>
              </div>
              </div>

          </div>
        </div>
      </div>
    </section>

    <footer id="footer">
      <p>Copyright Enocrypton, &copy; 2017</p>
    </footer>

    <!-- Modals -->

    <!-- Add Page -->
    <div class="modal fade" id="addPage" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <form>
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Add Files</h4>
      </div>
      <div class="modal-body">
        <div class="form-group">
          <label>Select your files</label>
          <input type="file">
        </div>
        <div class="form-group">
          <label>Enter key phrase to encrypt</label>
          <input type="password" class="form-control" placeholder="Please remember the key phrase!">
        </div>
        
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save changes</button>
      </div>
    </form>
    </div>
  </div>
</div>

  <script>
     CKEDITOR.replace( 'editor1' );
 </script>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>

<?php
	if (isset($_GET['logout']))
	{
		session_destroy();
		echo "<meta http-equiv='refresh' content='0; URL=dashboard.php'>";
	}
	else if (isset($_GET['register']))
	{
		echo "LSLD";
	}
	else {
		 echo "LOL";
	}
}

