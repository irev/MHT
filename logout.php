<?php
error_reporting();
require("_db.php");
session_start();
echo $baseurl = "http://".$_SERVER['SERVER_NAME']."/mht";
$idkar = $_SESSION['id_karyawan'];
mysql_query("UPDATE `tb_karyawan` SET online='0' WHERE id_karyawan='$idkar'");
echo   setcookie('_id_smn','', time()+60*60*24*365,  $baseurl);
  setcookie('_meedun_smn','', time()+60*60*24*365, $baseurl);
  setcookie('_stat', "0", time()+60*60*24*365, $baseurl);
  setcookie('id', md5(idkar), time()+60*60*24*365,  $baseurl);
  setcookie('id', idkar, time()+60*60*24*365,  $baseurl);
session_destroy();
 echo "<script>window.location='index.php'</script>";
 include('_script.php');
?>
<script>window.location='<?php echo $baseurl ?>index.php'</script>