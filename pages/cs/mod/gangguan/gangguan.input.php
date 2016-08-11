<?php
////////////////////////////////
// PROGRAM SKR
// IPSI MHT
// Refyandra
// gangguan.OnProccess.php 
// edit 6 juni 2016
// usercase  CUSTOMER SERVICE
/////////////////////////////////
require("../../../../_db.php");  
// proses menghapus data
if(isset($_POST['hapus'])) {
	$idhapus =  'MT'.sprintf("%05s", $_POST['hapus']);
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
	$pelapor		= $_POST['pelapor'];
	$pelanggan		= $_POST['pelanggan'];
	//jika tanggal gangguan lupa diisi
		if ($_POST['tgl_gangguan'] = "0000-00-00 00:00:00"){
			$tgl_gangguan = date('Y-m-d H:i:s');
		}else{
			$tgl_gangguan = $_POST['tgl_gangguan'];
		}
	//jika tanggal gangguan lupa diisi
		if ($_POST['tgl_pelaporan'] = "0000-00-00 00:00:00"){
			$tgl_pelaporan = date('Y-m-d H:i:s');
		}else{
			$tgl_pelaporan	= $_POST['tgl_pelaporan'];
		}
	$keterangan		= $_POST['keterangan'];
	$status 		= $_POST['status'];
	
	// validasi agar tidak ada data yang kosong
	if($kode!="" && $pelapor!="" && $pelanggan!="") {
		// proses tambah data gangguan
		if(substr($kd_mhs, 2, 5) == 0) {
			$edt = mysql_query("INSERT INTO tb_gangguan VALUES('$kode','$tgl_pelaporan','$tgl_gangguan','$pelapor','$pelanggan','$keterangan','$status')");
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
