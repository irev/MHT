<?php
include('../../../../../_db.php');
session_start();

 $_FILES["file"]["type"];

if(isset($_FILES["file"]["type"]))
{
$validextensions = array("jpeg", "jpg", "png"); 
$temporary = explode(".", $_FILES["file"]["name"]); // image.ext 
$file_extension = end($temporary);
if ((($_FILES["file"]["type"] == "image/png") || ($_FILES["file"]["type"] == "image/jpg") || ($_FILES["file"]["type"] == "image/jpeg")
) && ($_FILES["file"]["size"] < 1100000)//Approx. 100kb files can be uploaded.
&& in_array($file_extension, $validextensions)) {
if ($_FILES["file"]["error"] > 0)
{
echo "Return Code: " . $_FILES["file"]["error"] . "<br/><br/>";
}
else
{
if (file_exists("assets/img/user/" . $_FILES["file"]["name"])) {
	echo $_FILES["file"]["name"] . " <span id='invalid'><b>already exists.</b></span> ";
    //unlink("pages/web/mod/teknisi/upload_file_ajax/upload/" . $_FILES["file"]["name"]);
}
else
{
//echo $info; 	
$sourcePath = $_FILES['file']['tmp_name']; // Storing source path of the file in a variable
//no faktur auto
   $qkdf = mysql_query("SELECT MAX(id_karyawan) as kodex FROM tb_karyawan");
   $data=mysql_fetch_array($qkdf);
   $kodef = $data['kodex'];
   $nourut = substr($kodef, 2, 5);
   //$nourut++;
   if ($nourut==0){
    $nourut=1;
    $notr =sprintf("%03s", $nourut) ; 
   }else{
    $nourut++;
    $notr = sprintf("%03s", $nourut) ; 
   }

echo $tipeFile = '.'.substr($_FILES["file"]["type"],6);
  //end no faktur auto                                            
$targetPath = "../../../../../assets/img/user/KR".$notr.$tipeFile; // Target path where file is to be stored
echo $targetfoto =  substr($_FILES['file']['name'],5); // nama file
                                      
move_uploaded_file($sourcePath,$targetPath) ; // Moving Uploaded file
echo "<div style='color:#000;'><center><span id='success' >Image Uploaded Successfully...!!</span><br/>";
echo "<br/><b>File Name:</b> " . $_FILES["file"]["name"] . "<br>";
echo "<b>Type:</b> " . $_FILES["file"]["type"] . "<br>";
$ukuran= ($_FILES["file"]["size"] /1024); 
echo "<b>Size:</b> " . substr($ukuran,0,5) . " KB<br>";
echo "<script>$('#previewing2').attr('src','assets/img/user/KR".$notr.$tipeFile."' );</script>";
echo "<script>$('#gambar').attr('value','KR".$notr.$tipeFile."' );</script>";
echo "<b>Temp file:</b> " . $_FILES["file"]["tmp_name"] . "<br></center></div>";
}
}
}
else
{
echo $_FILES["file"]["size"];
echo "<div style='color:#000;'><span id='invalid'>***Invalid file Size or Type***<span></div>";
}
}
?>