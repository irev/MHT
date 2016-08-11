<?php
require("../../../../_db.php");  

// buat koneksi ke database mysql
koneksi_buka();

// proses menghapus data mahasiswa
if(isset($_POST['hapus'])) {
	mysql_query("DELETE FROM mahasiswa WHERE kd_mhs=".$_POST['hapus']);
} else {
	// deklarasikan variabel
	$kd_data	= $_POST['id'];
	$pelapor	= $_POST['pelapor'];
	$pelanggan	= $_POST['pelanggan'];
	$tanggal	= $_POST['tgl_pelapor'];
	$tgl_gangguan	= $_POST['tgl_gangguan'];
	$gangguan	= $_POST['gangguan'];
	$ket		= $_POST['ket'];
	$status 	= $_POST['status'];
	
	// validasi agar tidak ada data yang kosong
	if($pelapor!="" && $pelanggan!=""  && $tanggal!=""  && $tgl_gangguan!=""  && $gangguan!=""  && $ket!=""  && $status!="") {
		// proses tambah data mahasiswa
		if($kd_mhs == 0) {
			mysql_query("INSERT INTO tb_gangguan VALUES('$kd_data','$pelapor','$pelanggan','$tanggal','$tgl_gangguan','$gangguan','$ket','$status ')");
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
