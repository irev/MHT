<?php
////////////////////////////////
// PROGRAM SKR
// IPSI MHT
// Refyandra
// paket.input.php 
// edit 13 juli 2016
// usercase  ALL
/////////////////////////////////
if(!isset($_SESSION)){
	session_start();
 	//error_reporting(0);
}
if(isset($_SESSION['login_hash'])){ 
require("../../../../_db.php");  
// proses menghapus data
if(isset($_POST['hapus'])) {
	$idhapus =  'PK'.sprintf("%03s", $_POST['hapus']);
    $edt = mysql_query("DELETE FROM tb_paket WHERE id_paket='$idhapus'");
    echo "DELETE FROM tb_paket WHERE id_paket='$idhapus'";
    if($edt){ 
    	echo json_encode(array('status'=>true,'msg'=>'Berhasil dihapus'));
    }else{
    	echo json_encode(array('status'=>false,'msg'=>'Gagal dihapus'));
    }

} else {
	// deklarasikan variabel
	$kd				= $_POST['kd'];
    $kode			= $_POST['kode'];
	$nama			= $_POST['nama'];
	$pilihikon		= $_POST['pilihikon'];
	$band 			= $_POST['band'].' Mbps';
	
	// validasi agar tidak ada data yang kosong
	if($kode!="" && $nama!="" && $band!="" && $pilihikon!="") {
		// proses tambah data gangguan
		if(substr($kd, 2, 3) == 0) {
			$edt = mysql_query("INSERT INTO tb_paket VALUES('$kode','$nama','$band','$pilihikon')");
			if($edt){
				echo json_encode(array('status'=>true,'msg'=>'Paket berhasil ditambahkan'));
				
			}else{
				echo json_encode(array('status'=>false,'msg'=>'Simpan Gagal'));
			}
		// proses ubah data gangguan
		} else {
			//echo'<script>alert("EDITsss");</script>';	
			$edt = mysql_query("UPDATE tb_paket SET 
			paket 	       = '$nama',
			ikon 	       = '$pilihikon',
			keterangan 	   = '$band'
			WHERE id_paket = '$kode'
			");
			if($edt){
				echo json_encode(array('status'=>true,'msg'=>'EDIT BERHASIL'));
			}else{
				echo json_encode(array('status'=>false,'msg'=>'GAGAL BERHASIL'));
			}
		}
	}
}
}else{
	echo "Ilegal Akses";
}
?>
