
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
	$query = "SELECT * FROM `data_faktur_berang_masuk` WHERE `kode_transaksi`='".$idtran."'";
	$rquery = mysql_query($query);
	while($result = mysql_fetch_object($rquery)){
		//$arrayjson[] = $result;
		$data[]=array(
 'idt'=>$result->kode_transaksi,//y sebagai kata kunci nya (tahun)  
 'jumlah'=>$result->supplier, //jumlah penjualan
 'penerima'=>$result->penerima
 ); 
	}
	
	/* 	bagian ini digunakan untuk meng-encode ke dalam JSON 
		agar bisa digunakan oleh getjson maupun ajax JQUERY */
	//echo json_encode($arrayjson);
	//echo json_encode($data);
	//echo json_encode($data).";";
	echo json_encode(array('artikel'=>$data));
 


 //$data[]=array(

 //'y'=>$row->tahun, //y sebagai kata kunci nya (tahun)  'jumlah'=>$row->m, //jumlah penjualan
?>

