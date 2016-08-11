<?php
////////////////////////////////
// PROGRAM SKR
// IPSI MHT
// Refyandra
// paket.input.php 
// edit 13 juli 2016
// usercase  ALL
/////////////////////////////////
require("../../../../_db.php");  
// proses menghapus data
if(isset($_POST['hapus'])) {
	$idhapus =  'PK'.sprintf("%05s", $_POST['hapus']);
    $edt = mysql_query("DELETE FROM tb_gangguan WHERE id_gangguan='$idhapus'");
    if($edt){ 
    	echo json_encode(array('status'=>true));
    	echo 3;
    }else{
    	echo json_encode(array('status'=>false));
    	echo 0;
    }

} else {
	// deklarasikan variabel
	$kd_mhs			= $_POST['id'];
	$kode			= $_POST['kode'];
	$nama			= $_POST['nama'];
	$pilihikon		= $_POST['pilihikon'];
	$band 			= $_POST['band'];
	
	// validasi agar tidak ada data yang kosong
	if($kode!="" && $nama!="" && $band!="" && $pilihikon!="") {
		// proses tambah data gangguan
		if(substr($kd_mhs, 2, 5) == 0) {
			$edt = mysql_query("INSERT INTO tb_paket VALUES('$kode','$nama','$band','$pilihikon')");
			if($edt){
				echo json_encode(array('status'=>true));
				echo 1;
			}else{
				echo json_encode(array('status'=>false));
				echo 0;
			}
		// proses ubah data gangguan
		} else {
			//echo'<script>alert("EDITsss");</script>';	
			$edt = mysql_query("UPDATE tb_gangguan SET 
			tgl_pelaporan 	= '$tgl_pelaporan',
			tgl_gangguan 	= '$tgl_gangguan',
			id_pelanggan 	= '$pelanggan',
			pelapor 		= '$pelapor',
			keterangan 		= '$keterangan',
			status_gangguan	= '$status'
			WHERE id_gangguan = '$kode'
			");
			if($edt){
				echo json_encode(array('status'=>true));
				echo 2;
			}else{
				echo json_encode(array('status'=>false));
				echo 0;
			}
		}
	}
}

// tutup koneksi ke database mysql
//koneksi_tutup();

?>
