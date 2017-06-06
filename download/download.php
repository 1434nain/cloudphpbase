<?php

require_once 'AESCryptFileLib.php';

//Include an AES256 Implementation
require_once 'aes256/MCryptAES256Implementation.php';

//Construct the implementation
$mcrypt = new MCryptAES256Implementation();
//Use this to instantiate the encryption library class
$lib = new AESCryptFileLib($mcrypt);


@unlink($decrypted_file);
//$target_dir = "uploads/";
$target_file = basename($id);
if (isset($_POST['submit'])) {

      $key = $_POST['content'];
      $lib->decryptFile($target_file, $key, $target_file . substr( basename($id), 0, -4 ) );
      
     // $lib->decryptFile($target_dir, filename);
      echo "<a href=".$lib."download>download here</a>";

  } else {
      echo "Sorry, there was an error uploading your file.";
  }


?>