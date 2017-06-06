<?php

if(isset($_POST['submit']))
{
	$fail = rand(1000,1000000)."-".$_FILES['userfile']['name'];
	$fail_loc = $_FILES['userfile']['tmp_name'];
	$folder = "files/";

	if(move_uploaded_file($fail_loc, $folder.$fail))
	{
		?><script>alert('success!!');</script><?php
	}
	else{
	?><script>alert('failed');</script><?php

}

}
?>
