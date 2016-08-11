<?php
require 'koneksi.php';

// buat koneksi ke database mysql
koneksi_buka();

// proses menghapus data mahasiswa
if(isset($_POST['hapus'])) {
	mysql_query("DELETE FROM mahasiswa WHERE kd_mhs=".$_POST['hapus']);
} else {
	// deklarasikan variabel
	$kd_mhs	= $_POST['id'];
	$nim	= $_POST['nim'];
	$nama	= $_POST['nama'];
	$alamat	= $_POST['alamat'];
	$kelas	= $_POST['kelas'];
	$status = $_POST['status'];
	
	// validasi agar tidak ada data yang kosong
	if($nim!="" && $nama!="" && $alamat!="") {
		// proses tambah data mahasiswa
		if($kd_mhs == 0) {
			mysql_query("INSERT INTO mahasiswa VALUES('','$nim','$nama','$alamat','$kelas','$status')");
		// proses ubah data mahasiswa
		} else {
			mysql_query("UPDATE mahasiswa SET 
			nim = '$nim',
			nama = '$nama',
			alamat = '$alamat',
			kelas = '$kelas',
			status = '$status'
			WHERE kd_mhs = $kd_mhs
			");
		}
	}
}

// tutup koneksi ke database mysql
koneksi_tutup();

?>
