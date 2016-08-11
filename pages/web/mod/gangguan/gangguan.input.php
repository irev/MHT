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

}else if(isset($_POST['proses_surat']) && isset($_POST['proses_gangguan'])) {
	// ubh pending jadi proses angka 2 untuk status proses
	$proses_gangguan =  'MT'.sprintf("%05s", $_POST['proses_gangguan']);
	$proses_surat    =  'SJ'.sprintf("%05s", $_POST['proses_surat']);
    $edt = mysql_query("UPDATE tb_gangguan SET `status_gangguan` = '1' WHERE id_gangguan='$proses_gangguan'");
    $edt2 = mysql_query("UPDATE tb_surat_jalan_teknisi SET `status` = '1' WHERE id_surat='$proses_surat'");
    if($edt && $edt2){ 
    	echo json_encode(array('status'=>true));
    	echo "<br>status jadi diproses".$proses_surat."/".$proses_gangguan;
    }else{
    	echo json_encode(array('status'=>false));
    	echo 0;
    }

}
//else if(isset($_POST['perbaikan']) && isset($_POST['surat']) && isset($_POST['selesai']) || isset($_POST['ket_selesai']))
else if(isset($_POST['done']))
{
	$id_perbaikan		= $_POST['perbaikan'];
	$id_surat		    = $_POST['surat'];
	$id_gangguan		= $_POST['gangguan'];
	$keterangan		    = $_POST['ket_selesai'];
	$tgl_perbaikan		= $_POST['selesai'];
	$edt = mysql_query("INSERT INTO `tb_data_perbaikan` VALUES ('$id_perbaikan', '$id_surat', '$keterangan', '$tgl_perbaikan')");
			if($edt){
				echo json_encode(array('status'=>true));
				// angka 2 untuk status Done 
				 $edt = mysql_query("UPDATE tb_gangguan SET `status_gangguan` = '2' WHERE id_gangguan='$id_gangguan'");
                 $edt2 = mysql_query("UPDATE tb_surat_jalan_teknisi SET `status` = '2' WHERE id_surat='$id_surat'");
				echo "DONE";
			}else{
				echo json_encode(array('status'=>false));
				echo "NOT SAVE DONE";
			}

} 
else if(isset($_POST['id']) || isset($_POST['kode']) && isset($_POST['pelapor']) && isset($_POST['pelanggan'])) {
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

?>
