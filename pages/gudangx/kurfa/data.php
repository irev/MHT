
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
	//$query = "Select SUM(`jumlah`) as m, YEAR(tgl) as bulan from barang_keluar GROUP BY YEAR(`tgl`)";
	$query = "SELECT SUM(total)as belanja, YEAR(tgl) as tahun, kode_user as penerima FROM `data_faktur_berang_keluar` GROUP by YEAR(tgl)";
	$rquery = mysql_query($query);
	while($result = mysql_fetch_object($rquery)){
		//$arrayjson[] = $result;
		$data[]=array(
 'y'=>$result->tahun,//y sebagai kata kunci nya (tahun)  
 'jumlah'=>$result->belanja, //jumlah penjualan
 'penerima'=>$result->penerima
 ); 
	}
	
	/* 	bagian ini digunakan untuk meng-encode ke dalam JSON 
		agar bisa digunakan oleh getjson maupun ajax JQUERY */
	//echo json_encode($arrayjson);
	echo json_encode($data);
	
 //$data[]=array(

 //'y'=>$row->tahun, //y sebagai kata kunci nya (tahun)  'jumlah'=>$row->m, //jumlah penjualan
?>

