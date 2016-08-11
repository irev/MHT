<?php
////////////////////////////////
// PROGRAM SKR
// IPSI MHT
// Refyandra
//   menu.php 
// edit 6 juni 2016
// usercase  ALL
// function ini untuk menmpilkan jumlah masing-masing data 
/////////////////////////////////
//date_default_timezone_set("Asia/Bangkok");
//require("../../_db.php");  
//session_start();
//$idkaryawan = $_SESSION['id_karyawan'];
// hitung jumlah masing-masing tipe gangguan  selama 1 bulan 
$bulaini ='-'.date('m').'-';
function hitung_semua(){
	$bulaini =date('Y').'-';
	$q_hitung_all = mysql_fetch_array(mysql_query("SELECT COUNT(status_gangguan) as alls FROM `tb_gangguan` WHERE tgl_pelaporan like '%".$bulaini."%' "));
	$hitung_all   = $q_hitung_all['alls'];
return $hitung_all;
}

function hitung_gangguan(){
	$bulaini =date('Y').'-';
	$q_hitung_gangguan  = mysql_fetch_array(mysql_query("SELECT COUNT(status_gangguan) as gangguan  FROM `tb_gangguan` WHERE status_gangguan='0' AND tgl_pelaporan like '%".$bulaini."%'"));
	$hitung_gangguan = $q_hitung_gangguan['gangguan'];
	return $hitung_gangguan;
}

function hitung_proccess(){
	$bulaini =date('Y').'-';
	$q_hitung_Proccess  = mysql_fetch_array(mysql_query("SELECT COUNT(status_gangguan) as proccess  FROM `tb_gangguan` WHERE status_gangguan='1' AND tgl_pelaporan like '%".$bulaini."%'"));
	$hitung_Proccess = $q_hitung_Proccess['proccess'];
	return $hitung_Proccess;
}

function hitung_done(){
	$bulaini =date('Y').'-';
	$q_hitung_done   = mysql_fetch_array(mysql_query("SELECT COUNT(status_gangguan) as done      FROM `tb_gangguan` WHERE status_gangguan='2' AND tgl_pelaporan like '%".$bulaini."%'"));
	$hitung_done     = $q_hitung_done['done'];
	return $hitung_done;
}

function hitung_pending(){
	$bulaini =date('Y').'-';
	$q_hitung_pending   = mysql_fetch_array(mysql_query("SELECT COUNT(status_gangguan) as pending   FROM `tb_gangguan` WHERE status_gangguan='3' AND tgl_pelaporan like '%".$bulaini."%'"));
	$hitung_pending  = $q_hitung_pending ['pending'];
	return $hitung_pending;
}
//echo "ditamplkan dari file inc/function/hitung_jumlah_data_item.php";
//hitung_pending()
///test tampil hasil
// echo 'Prosess : '.hitung_proccess();
// echo '<br> Gangguan '.hitung_gangguan();
// echo '<br> DONE '.hitung_done();
// echo '<br> Pending '.hitung_pending();
// echo '<br> Total Semua '.hitung_semua(); 

?>