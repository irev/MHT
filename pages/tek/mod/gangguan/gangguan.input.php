<?php 
////////////////////////////////
// PROGRAM SKRIPSI MHT
// Refyandra
// gangguan.input.php 
// edit 6 juni 2016
// usercase KOORDINATOR
/////////////////////////////////
require("../../../../_db.php");  
echo'<script>alert("TAMBAH Surat");</script>';	
// proses menghapus data
if(isset($_POST['hapus'])) {
	echo $idhapus =  'SJ'.sprintf("%05s", $_POST['hapus']);
	echo mysql_query("DELETE FROM tb_surat_jalan_teknisi WHERE id_surat='$idhapus'");
} else {
	// simpan surat
	$id_surat		= $_POST['kdsurat'];
	$id_gangguan	= $_POST['kd'];
	$id_karyawan	= $_POST['teknisi'];
	$status			= $_POST['status'];
	$tgl_surat 		= $_POST['tgl_surat'];
	// deklarasikan variabel
	//$kd_gang		= $_POST['id'];
	//$kode			= $_POST['kode'];
	//$pelapor		= $_POST['pelapor'];
	//$pelanggan		= $_POST['pelanggan'];
	//$tgl_gangguan	= $_POST['tgl_gangguan'];
	//$tgl_pelaporan	= $_POST['tgl_pelaporan'];
	//$keterangan		= $_POST['keterangan'];
	//$status 		= $_POST['status'];
     
	// validasi agar tidak ada data yang kosong
	if($id_surat!="" && $id_gangguan!="" && $id_karyawan!="") {
		// proses tambah data mahasiswa
		$data = mysql_fetch_row(mysql_query("SELECT * FROM `tb_surat_jalan_teknisi` WHERE `id_surat`='$id_surat'"));
		if($data == 0) {
	
		echo $id_surat.' '.$data['jum'];
			//mysql_query("INSERT INTO `tb_surat_jalan_teknisi` VALUES('$kode','$tgl_pelaporan','$tgl_gangguan','$pelapor','$pelanggan','$keterangan','$status')");
		echo	mysql_query("INSERT INTO `tb_surat_jalan_teknisi` VALUES('$id_surat', '$id_gangguan', '$id_karyawan', '$status', '$tgl_surat')"); 
		mysql_query("UPDATE tb_gangguan SET status_gangguan = '$status'
					WHERE id_gangguan = '$id_gangguan'");
		// proses ubah data mahasiswa
		} else {
			echo'<script>alert("EDIT Surat");</script>';	
			echo mysql_query("UPDATE tb_surat_jalan_teknisi SET 
			status 			= '$status',
			id_karyawan     = '$id_karyawan'
			WHERE id_surat  = '$id_surat'
			");
		}
	}
}

// tutup koneksi ke database mysql
//koneksi_tutup();

?>
