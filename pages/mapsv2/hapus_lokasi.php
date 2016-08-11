<?php
include('koneksi.php');
$id = $_POST['nomor'];
$hapus = mysql_query("delete from kordinat_gis where nomor='$id'");
?>
