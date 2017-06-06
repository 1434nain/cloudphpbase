<?php
if(isset($_POST['submit']))
{
	$pic = rand(1000,1000000)."-".$_FILES['pic']['name'];
	$pic_loc = $_FILES['pic']['tmp_name'];
	$folder = "files/";

	if(move_uploaded_file($pic_loc, $folder.$pic))
	{
		?><script>alert('success!!');</script><?php
	}
	else
	{
		?><script>alert('failed');</script><?php
	}

}
?>
