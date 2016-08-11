<?php 
////////////////////////////////
// PROGRAM SKRIPSI MHT
// Refyandra
// print.php 
// edit 6 juni 2016
// usercase ALL
/////////////////////////////////
require("../../_db.php"); 
$get_id = $_POST['id']; 
$disurat = 'SJ'.sprintf("%05s",  $get_id);
$qsurat = mysql_fetch_array(mysql_query("SELECT * FROM `tb_surat_jalan_teknisi` WHERE id_surat='$disurat'"));
$karyawan = $qsurat['id_karyawan'];
$gangguan = $qsurat['id_gangguan'];

echo "<br><iframe src='pages/web/print/suratjalan.print.php?id=".$disurat."&gangguan=".$gangguan."&karyawan=".$karyawan."' width='100%' height='500'></iframe>";
//echo "<iframe src='print/suratjalan.print.php?id=".$disurat."&gangguan=".$gangguan."&karyawan=".$karyawan."' width='600' height='565'></iframe>";
?>
<!--iframe src="pages/web/print/suratjalan.print.php" width="100%" height='565' ></iframe-->