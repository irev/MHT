<?php
$dir = "assets/icon/";

// Open a directory, and read its contents
if (is_dir($dir)){
  if ($dh = opendir($dir)){
    while (($image = readdir($dh)) !== false){
     // echo "filename:" . $image . "<br>";
       echo '<img src="'.$dir.$image.'"/>';
    }
    closedir($dh);
  }
}
?>
