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
	$idhapus =  'PR'.sprintf("%04s", $_POST['hapus']);
   $edt = mysql_query("DELETE FROM tb_perangkat WHERE id_perangkat='$idhapus'");
    if($edt){ 
    	echo json_encode(array('status'=>true));
    	echo "Perangkat dihapus" ;
    }else{
    	echo json_encode(array('status'=>false));
    	echo 0;
    }
} else {
	// deklarasikan variabel
        $kd_pel			= $_POST['id'];			///
        $kode			= $_POST['kode'];		///
        $merek			= $_POST['merek'];		///
        $mac 			= $_POST['mac'];		///
        $ket_per 		= $_POST['ket_per'];	///
        if(!isset($_POST['stat_per'])){
        	$status='0';
        }else{
        	$status = $_POST['stat_per'];
        }
        $tgl 			= $_POST['tgl'];
        $perangkatLama  = $_POST['perangkatLama'];
	//jika tanggal gangguan lupa diisi
		if ($_POST['tgl'] = "0000-00-00 00:00:00"){
			$tgl = date('Y-m-d H:i:s');
		}else{
			$tgl_gangguan = $_POST['tgl'];
		}
	//jika tanggal gangguan lupa diisi
		if ($_POST['tgl_pelaporan'] = "0000-00-00 00:00:00"){
			$tgl_pelaporan = date('Y-m-d H:i:s');
		}else{
			$tgl_pelaporan	= $_POST['tgl_pelaporan'];
		}
	//$keterangan		= $_POST['keterangan'];
	
	// validasi agar tidak ada data yang kosong
	if($kode!="" && $merek!="" && $mac!="") {
		// proses tambah data gangguan
		if(substr($kd_pel, 2, 5) == 0) {
//(`id_pelanggan`, `nama`, `alamat`, `hp`, `x`, `y`, `id_paket`, `id_perangkat`, `tgl_langganan`, `status`) 
			$edt = mysql_query("INSERT INTO tb_perangkat VALUES('$kode','$merek','$mac','$tgl','$ket_per','$status')");
			//mysql_query("UPDATE `tb_perangkat` SET `status`='1' WHERE `id_perangkat`='$perangkat'");
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
			$edt = mysql_query("UPDATE tb_perangkat SET 
			merek 		  	= '$merek',
			mac_address	 	= '$mac',
			tgl_masuk  		= '$tgl',
			keterangan		= '$ket_per',
			status 			= '$status'
			WHERE id_perangkat 	= '$kode'
			");
			if($edt){
				echo json_encode(array('status'=>true));
				echo 'udate berhasil';
			}else{
				echo json_encode(array('status'=>false));
				echo 'update gagal';
			}
		}
	}
}

?>
