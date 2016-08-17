<?php
session_start();
include "config.php";
$userid = $_SESSION['userid'];
$pesan = mysql_query("SELECT nomor FROM tabel_pesan
    WHERE kepada='$userid' and sudahbaca='N'");
$j = mysql_num_rows($pesan);
if($j>0){
    echo $j;
}
?>
