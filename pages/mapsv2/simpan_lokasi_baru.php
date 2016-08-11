<?php
include('koneksi.php');
$koordinat_x = $_GET['koordinat_x'];
$koordinat_y = $_GET['koordinat_y'];
$nama_tempat = $_GET['nama_tempat'];
$jenis = $_GET['jenis'];
mysql_query("insert into kordinat_gis (x,y,nama_tempat,jenis) values('$koordinat_x','$koordinat_y','$nama_tempat','$jenis')");
?>
