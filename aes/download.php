<?php
require "conn.php";
if (!isset($_SESSION['logged_user'])) {
	echo "<meta http-equiv='refresh' content='0; URL=login.html'>";
}
else {

  $currUser = $_SESSION["logged_user"];
require_once 'AESCryptFileLib.php';

//Include an AES256 Implementation
require_once 'aes256/MCryptAES256Implementation.php';

//Construct the implementation
$mcrypt = new MCryptAES256Implementation();
//Use this to instantiate the encryption library class
$lib = new AESCryptFileLib($mcrypt);

if (isset($_GET['id'])) {
	// use here.
	$id = $_GET['id'];
}

@unlink($decrypted_file);
$target_dir = "uploads/$currUser";
//$target_file = $target_dir . basename($_FILES[$id]["name"]);
$target_file = $target_dir .'/'.$id;
// echo $target_file;
// echo substr($target_file, 0, -4);
if (isset($_GET['id'])) {

      $key = $_POST['content'];

      $lib->decryptFile($target_file, $key, substr($target_file, 0, -4));
     // $lib->decryptFile($target_dir. basename($_FILES[$id]["name"]), $key, $target_dir . substr( basename($_FILES[$id]["name"]), 0, -4 ) );
     
      //$lib->decryptFile($target_file, $key, $target_file . substr( basename('$id'), 0, -4 ) );
      
     // $lib->decryptFile($target_dir, filename);
      // echo "<a href=".$lib."download>download here</a>";

      $file = substr($target_file, 0, -4);
     // echo "<a href='".$file."' download>download here</a>";

      if (file_exists($file)) {
    header('Content-Description: File Transfer');
    header('Content-Type: application/octet-stream');
    header('Content-Disposition: attachment; filename="'.basename($file).'"');
    header('Expires: 0');
    header('Cache-Control: must-revalidate');
    header('Pragma: public');
    header('Content-Length: ' . filesize($file));
    readfile($file);
    unlink($file);
    exit;


}




  } else {
      echo "Sorry, there was an error";
  }

}
?>