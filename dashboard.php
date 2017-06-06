<?php
require "conn.php";
if (!isset($_SESSION['logged_user'])) {
	echo "<meta http-equiv='refresh' content='0; URL=login.html'>";
}
else {

  $currUser = $_SESSION["logged_user"];
	//echo $_SESSION['logged_user']."<br
	//echo "<a href='?logout'>Logout</a>";
	?>
	<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php echo "<title>".$_SESSION['logged_user']. " | Files</title>"?>
    <!-- Bootstrap core CSS -->
<script src="http://cdn.ckeditor.com/4.6.1/standard/ckeditor.js"></script>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    
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
            <li class="active"><a href="dashboard.php">Dashboard</a></li>
            <li><a href="settings.php">Settings</a></li>
          </ul>
          <ul class="nav navbar-nav navbar-right">
            <li><?php echo '<a href="#">Welcome, ' . $_SESSION['logged_user']. "</a>"?></li>
            <li><?php echo "<a href='?logout'>Logout</a>"?></li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>
    <header id="header">
      <div class="container">
        <div class="row">
          <div class="col-md-10">
            <h1><img src="fyp logo.png" style="width:304px;height:108px;"></h1>
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
                <li><a type="button" data-toggle="modal" data-target="addPage">Upload File</a></li>
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
              <h4>Memory Used</h4>
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
                <h3 class="panel-title">Files</h3>
              </div>


              <div class="panel-body">
                <div class="row">
                      <div class="col-md-12">
                          <input class="form-control" type="text" placeholder="Filter Files...">
                      </div>
                </div>
                <br>
		<table class="table table-striped table-hover">
               <?php
  //opens the directory that this file is in and reads the contents
	$myDirectory = opendir("aes/uploads/$currUser");
	while($entryName = readdir($myDirectory)) {
		$dirArray[] = $entryName;
	}
	
	closedir($myDirectory);
	$indexCount	= count($dirArray);
	

	// print 'em
	
	print("<TR><th><center>No<center></th><th>Filename</th><th>Size</th><th>Action</th></TR>\n");
	// loop through the array of files and print them all
	$j = 1;
  
  if (count($dirArray) == 0) {
  		print("<TR>");
  			print("<td><center><b>" . $j++ . "</b></center></td>");
        		print("<td>There were no files found in the specified directory!!!</td>");
  			print("<td> 0kb </td>");									
  			print("<td> now </td>");
  		print("</TR>\n");
  } else {
  	for ($i = 0; $i < $indexCount; $i++) { 
  		if (substr($dirArray[$i], 0, 1) != "." && $dirArray[$i] != "index.php" && $dirArray[$i] != "hitcounter.txt") { 
  			if (substr($dirArray[$i], -3) == "jpg") {
  				$picArray[$picCntr++];
  				print("</TR>");
  					print("<td><center>" . $j++ . "</center></td>");
  					print("<td><center><img src=\"" . $dirArray[$i] . "\" width=\"400\"></center></td>");
  					print("<td>/td>");?>
					<td><button  onclick="myFunction()">Download</button></td>
<script>
	function down(){
	window.open("download/send.php"+id,"_blank","toolbar=yes, scrollbars=yes, resizable=yes, top=90, left=500, width=800, height=200"
}
</script>
			<?php
  				print("</TR>\n");
  			} else {
  				print("<TR>");
  				print("<td><center><b>" . $j++ . "</b></center></td>");
  	        		print("<td><a href=aes/uploads/$currUser/" . $dirArray[$i] . ">". $dirArray[$i]."</a></td>");
  				print("<td></td>");?>
				<td><button  onclick="myFunction('<?php echo $dirArray[$i]; ?>')" >Download</button></td>
<script>
	function myFunction(id){
	window.open("download/send.php?id="+id,"_blank","toolbar=yes, scrollbars=yes, resizable=yes, top=90, left=500, width=800, height=400");
}
</script>
<?php	
												
  				print("</TR>\n");
  			}
  		}
  	}
  }
	print("</TABLE>\n");
?>
              </div>
              </div>

          </div>
        </div>
      </div>
    </section>

    <footer id="footer">
      <p>Copyright Enocrypton Cloud, &copy; 2017</p>
    </footer>

    <!-- Modals -->


    <!-- Add Page -->
    <div class="modal fade" id="addPage" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <form action="aes/new.php" method="POST" enctype="multipart/form-data">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Add File</h4>
      </div>
      <div class="modal-body">
        <div class="form-group">
          <label>Select your files</label>
          <input type="file" name="fileToUpload" id="fileToUpload">
        </div>
        <div class="form-group">
          <label>Enter key phrase to encrypt</label>
        <input type="password" class="form-control" placeholder="Please remember the key phrase!" name="content">
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary" name="submit">Upload</button>
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
		// echo "LOL";
	}
}




