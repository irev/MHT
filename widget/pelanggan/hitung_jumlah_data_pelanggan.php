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
function jumlahPelanggan(){
	$bulaini =date('Y').'-';
	$q_hitung_all = mysql_fetch_array(mysql_query("SELECT COUNT(*) as alls FROM `tb_pelanggan`"));
	$hitung_all   = $q_hitung_all['alls'];
return $hitung_all;
}

function jumlahPelangganCuti(){
	$bulaini =date('Y').'-';
	$q_hitung_gangguan  = mysql_fetch_array(mysql_query("SELECT COUNT(*) as cuti FROM `tb_pelanggan` WHERE status='2'"));
	$hitung_gangguan = $q_hitung_gangguan['cuti'];
	return $hitung_gangguan;
}

function jumlahPelangganBlock(){
	$bulaini =date('Y').'-';
	$q_hitung_Proccess  = mysql_fetch_array(mysql_query("SELECT COUNT(*) as block FROM `tb_pelanggan` WHERE status='3'"));
	$hitung_Proccess = $q_hitung_Proccess['block'];
	return $hitung_Proccess;
}

function jumlahPelangganAktif(){
	$bulaini =date('Y').'-';
	$q_hitung_done   = mysql_fetch_array(mysql_query("SELECT COUNT(*) as aktif FROM `tb_pelanggan` WHERE status='1'"));
	$hitung_done     = $q_hitung_done['aktif'];
	return $hitung_done;
}

function hitungKomplain(){
	$bulaini =date('Y').'-';
	$q_hitung   = mysql_fetch_array(mysql_query("SELECT COUNT(status_gangguan) as komplain   FROM `tb_gangguan`"));
	$hitung  = $q_hitung ['komplain'];
	return $hitung;
}

function hitungPending(){
	$bulaini =date('Y').'-';
	$q_hitung  = mysql_fetch_array(mysql_query("SELECT COUNT(status_gangguan) as pending   FROM `tb_gangguan` WHERE status_gangguan='3' AND tgl_pelaporan like '%".$bulaini."%'"));
	$hitung = $q_hitung['pending'];
	return $hitung;
}

function hitungDone(){
	$bulaini =date('Y').'-';
	$q_hitung  = mysql_fetch_array(mysql_query("SELECT COUNT(status_gangguan) as done   FROM `tb_gangguan` WHERE status_gangguan='2' AND tgl_pelaporan like '%".$bulaini."%'"));
	$hitung = $q_hitung['done'];
	return $hitung;
}
function hitungProcess(){
	$bulaini =date('Y').'-';
	$q_hitung  = mysql_fetch_array(mysql_query("SELECT COUNT(status_gangguan) as process   FROM `tb_gangguan` WHERE status_gangguan='1' AND tgl_pelaporan like '%".$bulaini."%'"));
	$hitung = $q_hitung['process'];
	return $hitung;
}
function hitungGangguan(){
	$bulaini =date('Y').'-';
	$q_hitung  = mysql_fetch_array(mysql_query("SELECT COUNT(status_gangguan) as gangguan   FROM `tb_gangguan` WHERE status_gangguan='0' AND tgl_pelaporan like '%".$bulaini."%'"));
	$hitung = $q_hitung['gangguan'];
	return $hitung;
}

function jumlahPerangkat(){
	$bulaini =date('Y').'-';
	$q_jumlah_perangkat   = mysql_fetch_array(mysql_query("SELECT COUNT(*) as jumlah_perangkat   FROM `tb_perangkat`"));
	$jumlah_perangkat  = $q_jumlah_perangkat ['jumlah_perangkat'];
	return $jumlah_perangkat;
}


function jumlahPenggunaPaket($idPaket){
	$bulaini =date('Y').'-';
	$q_jumlah   = mysql_fetch_array(mysql_query("SELECT COUNT(*) as paket FROM `tb_pelanggan` WHERE `id_paket`='$idPaket'"));
	$jumlah  = $q_jumlah ['paket'];
	//return $idPaket;
	return $jumlah;
}
function hitung_semua_pel(){
	//$bulaini ='-'.date('m').'-';
	$q_hitung_all = mysql_fetch_array(mysql_query("SELECT COUNT(status) as alls FROM `tb_pelanggan`"));
	$hitung_all   = $q_hitung_all['alls'];
return $hitung_all;
}

/// Hitung Pelanggan
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
//// Hitung Perangkat
function hitungPrangkatTot(){
	//$bulaini ='-'.date('m').'-';
	$q = mysql_fetch_array(mysql_query("SELECT COUNT(status) as tot   FROM `tb_perangkat`"));
	$hitung  = $q['tot'];
	return $hitung;
}
function hitungPrangkatAktif(){
	//$bulaini ='-'.date('m').'-';
	$q = mysql_fetch_array(mysql_query("SELECT COUNT(status) as perangkat_aktif   FROM `tb_perangkat` WHERE status='1'"));
	$hitung  = $q['perangkat_aktif'];
	return $hitung;
}
function hitungPrangkatBaru(){
	//$bulaini ='-'.date('m').'-';
	$q = mysql_fetch_array(mysql_query("SELECT COUNT(status) as baru   FROM `tb_perangkat` WHERE Keterangan='baru'"));
	$hitung  = $q['baru'];
	return $hitung;
}
function hitungPrangkatBaik(){
	//$bulaini ='-'.date('m').'-';
	$q = mysql_fetch_array(mysql_query("SELECT COUNT(status) as baik   FROM `tb_perangkat` WHERE Keterangan='baik'"));
	$hitung  = $q['baik'];
	return $hitung;
}
function hitungPrangkatRusak(){
	//$bulaini ='-'.date('m').'-';
	$q = mysql_fetch_array(mysql_query("SELECT COUNT(status) as rusak   FROM `tb_perangkat` WHERE Keterangan='rusak'"));
	$hitung  = $q['rusak'];
	return $hitung;
}
function hitungPrangkatStok(){
	//$bulaini ='-'.date('m').'-';
	$q = mysql_fetch_array(mysql_query("SELECT COUNT(status) as rusak   FROM `tb_perangkat` WHERE Keterangan!='rusak' and status='0' "));
	$hitung  = $q['rusak'];
	return $hitung;
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