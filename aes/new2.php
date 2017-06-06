<?php

require_once 'AESCryptFileLib.php';

//Include an AES256 Implementation
require_once 'aes256/MCryptAES256Implementation.php';

//Construct the implementation
$mcrypt = new MCryptAES256Implementation();
//Use this to instantiate the encryption library class
$lib = new AESCryptFileLib($mcrypt);


@unlink($decrypted_file);
$target_dir = "uploads/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
if (isset($_POST['submit'])) {
  if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
      echo "The file ". basename( $_FILES["fileToUpload"]["
      "]). " has been uploaded.";
      $key = $_POST['content'];
      $lib->decryptFile($target_dir. basename($_FILES['fileToUpload']["name"]), $key, $target_dir . substr( basename($_FILES['fileToUpload']["name"]), 0, -4 ) );
  } else {
      echo "Sorry, there was an error uploading your file.";
  }

}
?>

<form action="new2.php" method="post" enctype="multipart/form-data">
    Select image to upload:
    <input type="text" name="content" />
    <input type="file" name="fileToUpload" id="fileToUpload">
    <input type="submit" value="Upload Image" name="submit">
</form>
