<?php
////////////////////////////////
// PROGRAM SKR
// IPSI MHT
// Refyandra
// gangguan.OnProccess.php 
// edit 6 juni 2016
// usercase  CUSTOMER SERVICE
/////////////////////////////////
session_start();
if(!isset($_SESSION['login_hash']))
{
  echo "What your looking for..??";
}else{

require("../../../../_db.php");  

// proses menghapus data
if(isset($_POST['hapus'])) {
	$idhapus =  'KR'.sprintf("%03s", $_POST['hapus']);
    $edt = mysql_query("DELETE FROM tb_karyawan WHERE id_karyawan='$idhapus'");
    if($edt){ 
    	echo json_encode(array('status'=>true));
    	echo 3;
    }else{
    	echo json_encode(array('status'=>false));
    	echo 0;
    }

} else {
	// deklarasikan variabel
	$kd			= $_POST['id'];
	$kode			= $_POST['kode'];
	$nama			= $_POST['nama'];
	$hp				= $_POST['hp'];
	$alamat         = $_POST['alamat'];
	$bagian			= $_POST['bagian'];
	$password		= md5($_POST['password']);
	$username		= $_POST['username'];
	$avatar			= $_POST['gambar'];
	if ($bagian == 'Koordinator') {
		       $login_hash	='krd';
	}elseif ($bagian == 'Customer Service') {
		       $login_hash	='cs';
	}elseif ($bagian == 'Teknisi' || $bagian == '') {
		       $login_hash	='tek';
	}
	/*jika tanggal gangguan lupa diisi
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
	
	*/// validasi agar tidak ada data yang kosong
	if($kode!="" && $nama!="" && $bagian!="" && $password!="" && $username!="" && $bagian!="") {
		// proses tambah data gangguan
		if(substr($kd, 2, 5) == 0) {
			$edt = mysql_query("INSERT INTO tb_karyawan VALUES('$kode','$nama','$alamat','$hp','$bagian','$login_hash','$username','$password','$avatar','0')");
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
<?php  } ?>     