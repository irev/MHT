<?php
////////////////////////////////
// PROGRAM SKR
// IPSI MHT
// Refyandra
//   menu.php 
// edit 21 juni 2016
// usercase  ALL
// function ini untuk menmpilkan jumlah masing-masing data status pelanggan
/////////////////////////////////
//date_default_timezone_set("Asia/Bangkok");
//require("../../_db.php");  
//session_start();
//$idkaryawan = $_SESSION['id_karyawan'];
// hitung jumlah masing-masing tipe pelanggan  selama 1 bulan 
//$bulaini ='-'.date('m').'-';
function hitung_semua_pel(){
	//$bulaini ='-'.date('m').'-';
	$q_hitung_all = mysql_fetch_array(mysql_query("SELECT COUNT(status) as alls FROM `tb_pelanggan`"));
	$hitung_all   = $q_hitung_all['alls'];
return $hitung_all;
}

function hitung_baru(){
	//$bulaini ='-'.date('m').'-';
	$q_hitung_pelanggan  = mysql_fetch_array(mysql_query("SELECT COUNT(status) as pelanggan  FROM `tb_pelanggan` WHERE status='0'"));
	$hitung_pelanggan = $q_hitung_pelanggan['pelanggan'];
	return $hitung_pelanggan;
}

function hitung_aktif(){
	//$bulaini ='-'.date('m').'-';
	$q_hitung_aktif  = mysql_fetch_array(mysql_query("SELECT COUNT(status) as aktif  FROM `tb_pelanggan` WHERE status='1'"));
	$hitung_aktif = $q_hitung_aktif['aktif'];
	return $hitung_aktif;
}

function hitung_cuti(){
	//$bulaini ='-'.date('m').'-';
	$q_hitung_cuti   = mysql_fetch_array(mysql_query("SELECT COUNT(status) as cuti      FROM `tb_pelanggan` WHERE status='2'"));
	$hitung_cuti     = $q_hitung_cuti['cuti'];
	return $hitung_cuti;
}

function hitung_block(){
	//$bulaini ='-'.date('m').'-';
	$q_hitung_block   = mysql_fetch_array(mysql_query("SELECT COUNT(status) as block   FROM `tb_pelanggan` WHERE status='3'"));
	$hitung_block  = $q_hitung_block ['block'];
	return $hitung_block;
}

function hitung_prangkat_aktif(){
	//$bulaini ='-'.date('m').'-';
	$q = mysql_fetch_array(mysql_query("SELECT COUNT(status) as perangkat_aktif   FROM `tb_perangkat` WHERE status='1'"));
	$hitung  = $q['perangkat_aktif'];
	return $hitung;
}
function hitung_prangkat_stok(){
	//$bulaini ='-'.date('m').'-';
	$q = mysql_fetch_array(mysql_query("SELECT COUNT(status) as perangkat_aktif   FROM `tb_perangkat` WHERE status='0'"));
	$hitung  = $q['perangkat_aktif'];
	return $hitung;
}
//echo "ditamplkan dari file inc/function/hitung_jumlah_pelangan.php";
//echo "AKTIF ".hitung_prangkat_aktif();
//echo "STOK ".hitung_prangkat_stok();
///test tampil hasil
// echo 'Prosess : '.hitung_proccess();
//echo '<br> pelanggan '.hitung_pelanggan();
// echo '<br> DONE '.hitung_done();
// echo '<br> block '.hitung_pending();
// echo '<br> Total Semua '.hitung_semua(); 


?>