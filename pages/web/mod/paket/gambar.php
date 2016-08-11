<?php
$dir = "../../../../assets/icon/";

// Open a directory, and read its contents
if (is_dir($dir)){
  if ($dh = opendir($dir)){
    while (($image = readdir($dh)) !== false){
     // echo "filename:" . $image . "<br>";
    switch ($image) {
     case "..":
     		echo "Your favorite color is red!";
     	break;
     default:
     echo '<img src=mht/assets/icon/"'.$image.'"/>';  
    }
    closedir($dh);
  }
}
?>
