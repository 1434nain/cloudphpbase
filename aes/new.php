<?php

require "../conn.php";
if (!isset($_SESSION['logged_user'])) {
  echo "<meta http-equiv='refresh' content='0; URL=login.html'>";
}
else 
{

$currUser = $_SESSION["logged_user"];

require_once 'AESCryptFileLib.php';

//Include an AES256 Implementation
require_once 'aes256/MCryptAES256Implementation.php';

//Construct the implementation
$mcrypt = new MCryptAES256Implementation();

//Use this to instantiate the encryption library class
$lib = new AESCryptFileLib($mcrypt);



$target_dir = "uploads/$currUser/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);

if(isset($_POST["submit"])) {
  if (file_exists($target_file)) {
      echo "Sorry, file already exists.";
      $uploadOk = 0;
  }
  else {
    $uploadOk = 1;
  }


  if ($uploadOk == 0) {
      echo "Sorry, your file was not uploaded.";
  // if everything is ok, try to upload file
  } else {
      // proceed here  
      @unlink($encrypted_file);
      if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
          echo "The file  has been uploaded. close and refresh windows";
          ?>
          <script type="text/javascript">
          alert('File successfully uploaded');   
      window.close();

      window.onunload = refreshParent;
          function refreshParent() {
              window.opener.location.reload();
          }

      </script>
          <?php
          // $key = 'lolz_hacked';
          $key = $_POST['content'];
          $lib->encryptFile($target_file, $key, $target_dir. basename($_FILES['fileToUpload']["name"]).".aes");
	  unlink($target_file);
      } else {
              ?>
              <script type="text/javascript">alert('Oops..., Something wrong. File cannot be upload.Try again');
      window.location='../download/upload.html'</script>

              <?php        
      }
  }
}
}
?>