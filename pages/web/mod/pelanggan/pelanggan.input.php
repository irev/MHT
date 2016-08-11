<?php
////////////////////////////////
// PROGRAM SKR
// IPSI MHT
// Refyandra
// gangguan.OnProccess.php 
// edit 6 juni 2016
// usercase  CUSTOMER SERVICE
/////////////////////////////////
if(!isset($_SESSION)) 
{ 
  session_start(); 
  error_reporting(0);
}
if(!isset($_SESSION['login_hash'])){
  echo "<script>alert('anda harus login dulu..!');</script>";
} 
$login=$_SESSION['login_hash'];

require("../../../../_db.php");  
// proses menghapus data
if(isset($_POST['hapus'])) {
  $idhapus =  'CL'.sprintf("%04s", $_POST['hapus']);
 // $idhapus =  'CL'.sprintf("%04s", $_GET['hapus']);
 // echo $idhapus;
  $pel  = mysql_query("SELECT id_perangkat FROM `tb_pelanggan` WHERE id_pelanggan='$idhapus'") or die(); ////select pelanggan
  $pelx = mysql_fetch_row($pel);
  $update_per =  $pelx[0]; 
    if($pelx &&   $update_per!=''){
    	echo "hapus ok";
    	mysql_query("UPDATE `tb_perangkat` SET `status`='0' WHERE `id_perangkat`='$update_per'");
    	mysql_query("DELETE FROM tb_pelanggan WHERE id_pelanggan='$idhapus'");
		$data = "[".date('Y-m-d H:i:s')."] [DEL] [BERHASIL] [Pelanggan id=".$idhapus." [Oleh USER id=".$_COOKIE['id']."] \r\n";

    }else{
    	mysql_query("DELETE FROM tb_pelanggan WHERE id_pelanggan='$idhapus'");
    	echo "prangkat null";
		$data = "[".date('Y-m-d H:i:s')."] [DEL] [BERHASIL] [Pelanggan id=". $idhapus." Nama = ] [Oleh USER id=".$_COOKIE['id']."]\r\n";
    }

}else if(isset($_POST['idpel'])){
	$idpl = 'CL'.sprintf("%04s",$_POST['idpel']);
	$stat = $_POST['stat'];
	$qsts = mysql_query("UPDATE `tb_pelanggan` SET `status`='$stat' WHERE `id_pelanggan`='$idpl'");
	if($qsts){
		echo "SATATUS DIUBAH";
	}else{ echo "Gagal Ubah Satatus";} 
} 
 else {
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
        $perangkatLama  = $_POST['perangkatLama'];
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
			     mysql_query("UPDATE `tb_perangkat` SET `status`='1' WHERE `id_perangkat`='$perangkat'");
			if($edt){
				echo json_encode(array('status'=>true));
				echo 1;
	            $data = "[".date('Y-m-d H:i:s')."] [ADD] [BERHASIL] [Pelanggan id=".$kode." Nama = ".$pelanggan."] [Oleh USER id=".$_COOKIE['id']." \r\n";
			}else{
				echo json_encode(array('status'=>false));
				echo 0;
	            $data = "[".date('Y-m-d H:i:s')."] [ADD] [GAGAL] [Pelanggan id=".$kode." Nama = ".$pelanggan."] [Oleh USER id=".$_COOKIE['id']." \r\n";
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
			if($_POST['perangkatLama']!=$_POST['perangkat']){
					mysql_query("UPDATE `tb_perangkat` SET `status`='0' WHERE `id_perangkat`='$perangkatLama'");
					mysql_query("UPDATE `tb_perangkat` SET `status`='1' WHERE `id_perangkat`='$perangkat'");
					echo "stats perangkat diubah 0";
			}else if($_POST['perangkatLama']==''){
					mysql_query("UPDATE `tb_perangkat` SET `status`='1' WHERE `id_perangkat`='$perangkat'");
					echo "stats perangkat diubah 1 ";

			} else{			
					mysql_query("UPDATE `tb_perangkat` SET `status`='1' WHERE `id_perangkat`='$perangkat'");
					echo "stats perangkat diubah 1 ".$perangkat;
			}
			if($edt){
				echo json_encode(array('status'=>true));
				echo 234234;
				$data = "[".date('Y-m-d H:i:s')."] [EDT] [BERHASIL] [Pelanggan id=".$kode." Nama = ".$pelanggan."] [Oleh USER id=".$_COOKIE['id']."] \r\n";
				//file_put_contents('log_mht.txt', $data, FILE_APPEND);
			}else{
				echo json_encode(array('status'=>false));
				echo 0;
	            $data = "[".date('Y-m-d H:i:s')."] [EDT] [GAGAL] [Pelanggan id=".$kode." Nama = ".$pelanggan."] [Oleh USER id=".$_COOKIE['id']."] \r\n";
			}
		}
	}
}
file_put_contents('log_pelanggan.txt', $data, FILE_APPEND);
?>
