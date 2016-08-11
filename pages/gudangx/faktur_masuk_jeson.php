
<?php
	$host	 = "localhost";
	$user	 = "root";
	$pass	 = "";
	$dabname = "bahanbaku";
	
	$conn = mysql_connect( $host, $user, $pass) or die('Could not connect to mysql server.' );
	mysql_select_db($dabname, $conn) or die('Could not select database.');
	$baseurl="http://localhost/skripsi/";
?>

<?php
$idtran=$_GET['kt'];
	//$query = "Select SUM(`jumlah`) as m, YEAR(tgl) as bulan from barang_keluar GROUP BY YEAR(`tgl`)";
	//$query = "SELECT barang_keluar.id_keluar, barang_keluar.tgl, barang_keluar.kode_barang, barang_keluar.transaksi, barang_keluar.jumlah, barang_keluar.jumlah, barang_keluar.tot_biaya, data_barang.harga, data_barang.nama_barang, data_barang.satuan FROM `barang_keluar` JOIN `data_barang` WHERE barang_keluar.kode_barang=data_barang.kode_barang AND transaksi='".$idtran."'";
//$ex = "SELECT * FROM `barang_masuk` where `transaksi`='".$idtran."'";

	$query = "SELECT barang_masuk.tgl, barang_masuk.kode_barang, barang_masuk.transaksi, barang_masuk.jumlah,  data_barang.harga, data_barang.nama_barang, data_barang.satuan FROM `barang_masuk` JOIN `data_barang` WHERE barang_masuk.kode_barang=data_barang.kode_barang AND transaksi='".$idtran."'";
	//$query = "SELECT * FROM `data_faktur_berang_masuk` WHERE `kode_transaksi`='".$idtran."'";
	$rquery = mysql_query($query);
	while($result = mysql_fetch_object($rquery)){
		//$arrayjson[] = $result;
		$data[]=array(
			'kode_barang'=>$result->kode_barang,
 			'idt'=>$result->tgl,//y sebagai kata kunci nya (tahun)  
 			'transaksi'=>$result->transaksi, //jumlah penjualan
 			'jumlah'=>$result->jumlah,
 			'harga'=>$result->harga,
 			'namabarang'=>$result->nama_barang,
 			'unit'=>$result->satuan,
 			'supplier'=>$result->satuan,
 		); 
}	
	echo json_encode(array('fmasuk'=>$data));

 ?>

