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
	$idhapus =  'CL'.sprintf("%04s", $_POST['hapus']);
   $edt = mysql_query("DELETE FROM tb_pelanggan WHERE id_pelanggan='$idhapus'");
    if($edt){ 
    	echo json_encode(array('status'=>true));
    	echo 3;
    }else{
    	echo json_encode(array('status'=>false));
    	echo 0;
    }

} else {
	// deklarasikan variabel
        $kd_pel			= $_POST['id'];
        $kode			= $_POST['kode'];
        $pelanggan		= $_POST['pelanggan'];
        $hp 			= $_POST['hp'];
        $alamat 		= $_POST['alamat'];
        $koodx			= $_POST['koordinatx'];
        $koody			= $_POST['koordinaty'];
        //$status 		= $_POST['status_pel'];
        if(!isset($_POST['status_pel'])){
        	$status=0;
        }else{
        	$status = $_POST['status_pel'];
        }
        $tgl 			= $_POST['tgl_berlangganan'];
        $paket			= $_POST['paket'];
        $perangkat 		= $_POST['perangkat'];
	//jika tanggal gangguan lupa diisi
		if ($_POST['tgl_berlangganan'] = "0000-00-00 00:00:00"){
			$tgl = date('Y-m-d H:i:s');
		}else{
			$tgl_gangguan = $_POST['tgl_gangguan'];
		}
	//jika tanggal gangguan lupa diisi
		if ($_POST['tgl_pelaporan'] = "0000-00-00 00:00:00"){
			$tgl_pelaporan = date('Y-m-d H:i:s');
		}else{
			$tgl_pelaporan	= $_POST['tgl_pelaporan'];
		}
	//$keterangan		= $_POST['keterangan'];
	
	// validasi agar tidak ada data yang kosong
	if($kode!="" && $pelanggan!="" && $alamat!="") {
		// proses tambah data gangguan
		if(substr($kd_pel, 2, 5) == 0) {
//(`id_pelanggan`, `nama`, `alamat`, `hp`, `x`, `y`, `id_paket`, `id_perangkat`, `tgl_langganan`, `status`) 
			$edt = mysql_query("INSERT INTO tb_pelanggan VALUES('$kode','$pelanggan','$alamat','$hp','$koodx','$koody','$paket','$perangkat','$tgl','$status')");
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
			$edt = mysql_query("UPDATE tb_pelanggan SET 
			nama 		  	= '$pelanggan',
			alamat		 	= '$alamat',
			hp 		 		= '$hp',
			x 				= '$koodx',
			y 				= '$koody',
			id_paket 		= '$paket',
			id_perangkat	= '$perangkat',
			tgl_langganan   = '$tgl',
			status 			= '$status'
			WHERE id_pelanggan = '$kode'
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
