<?php
  //opens the directory that this file is in and reads the contents
	$myDirectory = opendir("aes/uploads/");
	while($entryName = readdir($myDirectory)) {
		$dirArray[] = $entryName;
	}
	
	closedir($myDirectory);
	$indexCount	= count($dirArray);
	

	// print 'em
	print("<TABLE border=1 cellpadding=5 cellspacing=0 class=whitelinks id=\"maintable\">\n");
	print("<TR><th> - # - </th><th>Filename</th><th>Filesize (In Bytes)</th><th>Action</th></TR>\n");
	// loop through the array of files and print them all
	$j = 1;
  print("<form action='aes/new2.php' method='POST'>");
  if (count($dirArray) == 0) {
  		print("<TR>");
  			print("<td><center><b>" . $j++ . "</b></center></td>");
        		print("<td>There were no files found in the specified directory!!!</td>");
  			print("<td> 0kb </td>");									
  			print("<td><input type='submit' name='submit' value='Download'></td>");
  		print("</TR>\n");
  } else {
  	for ($i = 0; $i < $indexCount; $i++) { 
  		if (substr($dirArray[$i], 0, 1) != "." && $dirArray[$i] != "index.php" && $dirArray[$i] != "hitcounter.txt") { 
  			if (substr($dirArray[$i], -3) == "jpg") {
  				$picArray[$picCntr++];
  				print("</TR>");
  					print("<td><center>" . $j++ . "</center></td>");
  					print("<td><center><img src=\"" . $dirArray[$i] . "\" width=\"400\"></center></td>");
  					print("<td>" . filesize($dirArray[$i]) . "</td>");
  					print("<td><input type='submit' name='submit' value='Download'></td>");
  				print("</TR>\n");
  			} else {
  				print("<TR>");
  					print("<td><center><b>" . $j++ . "</b></center></td>");
  	        		print("<td>" . $dirArray[$i] . "</a></td>");
  					print("<td>" . filesize($dirArray[$i]) . "</td>");
					print("<td><input type='submit' name='submit' value='Download'></td>");									
  				print("</TR>\n");
  			}
  		}
  	}
  }
	print("</TABLE>\n");
print("</form>")
?>
