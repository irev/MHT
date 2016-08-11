<?php 
////////////////////////////////
// PROGRAM SKRIPSI MHT
// Refyandra
// gangguan.input.php 
// edit 6 juni 2016
// usercase KOORDINATOR
/////////////////////////////////
require("../../_db.php");  
error_reporting(0);
// proses menghapus data
if(isset($_POST['hapus'])) {
	echo $idhapus =  'SJ'.sprintf("%05s", $_POST['hapus']);
	mysql_query("DELETE FROM tb_surat_jalan_teknisi WHERE id_surat='$idhapus'");
} else {
	// simpan surat
$id_surat		= $_POST['kdsurat'];
$id_gangguan	= $_POST['kd'];
$id_karyawan	= $_POST['teknisi'];
$status			= $_POST['status'];
$tgl_surat 		= $_POST['tgl_surat'];     
	// validasi agar tidak ada data yang kosong
	if($id_surat!="" && $id_gangguan!="" && $id_karyawan!="") {
		// proses tambah data mahasiswa
		$data = mysql_fetch_row(mysql_query("SELECT * FROM `tb_surat_jalan_teknisi` WHERE `id_surat`='$id_surat'"));
		if($data == 0) {
		echo'<script>alert("TAMBAH Surat");</script>';	
		echo $id_surat.' '.$data['jum'];
		$inpt =	mysql_query("INSERT INTO `tb_surat_jalan_teknisi` VALUES('$id_surat', '$id_gangguan', '$id_karyawan', '$status', '$tgl_surat')"); 
		$upd = mysql_query("UPDATE tb_gangguan SET status_gangguan = '$status'	WHERE id_gangguan = '$id_gangguan'");
		// proses ubah data mahasiswa
		if($inpt && $upd){
			echo "sukses";
		}
		} else {
		$edt =	mysql_query("UPDATE tb_surat_jalan_teknisi SET 
				status 			= '$status',
				id_karyawan     = '$id_karyawan'
				WHERE id_surat  = '$id_surat'
				");
		if($edt){
			echo "edit sukses";
		}
		}
	}
//echo "Input Surat Jalan teknisi";	
}
?>
