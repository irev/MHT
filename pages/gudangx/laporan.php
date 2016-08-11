<?php 
//$koneksi = mysql_connect("localhost","root","") or die("Koneksi Gagal !" . mysql_error());
//$database = mysql_select_db("kasir");

require('pages/plugin/laporan/fpdf.php');
$pdf = new FPDF();
$pdf->addPage();
$pdf->setAutoPageBreak(false);
$pdf->setFont('Arial','',12);

$aidi = $_GET['id'];

$tgl = date('d-M-Y');
$id_beli = mysql_query("select transaksi from barang_keluar where transaksi='BK16031300001".$aidi."'");
$ar_data = mysql_fetch_array($id_beli);
//$pdf->Image('../asset/images/shopcart.png',1,1,33,0);
//$pdf->Image('http://localhost/suratv12/dasboard/cetak/logo.jpg',1,1,3,0);
$pdf->setFont('Arial','',40);
$pdf->text(30,20,'TOKO 2 SIM A');
$pdf->setFont('Arial','',17);
$pdf->text(30,30,'BILL PEMBAYARAN');
$pdf->setFont('Arial','',12);
$pdf->text(10,37,'Nama : ');
$pdf->text(30,37,$ar_data['transaksi']);
$pdf->text(150,37,'Tanggal : ');
$pdf->text(170,37,$tgl);


$yi = 50;
$ya = 43;
$row = 6;

$pdf->setFont('Arial','',9);
$pdf->setFillColor(222,222,222);
$pdf->setXY(10,$ya);
$pdf->cell(6,6,'No',1,0,'C',1);
$pdf->CELL(90,6,'Nama Barang',1,0,'C',1);
$pdf->CELL(25,6,'Harga Barang',1,0,'C',1);
$pdf->CELL(20,6,'Jumlah Beli',1,0,'C',1);
$pdf->CELL(50,6,'Jumlah Harga',1,0,'C',1);
$ya = $yi + $row;

//$lihat = mysql_query("select pembeli.id_pembeli,pembeli.kd_brg,barang.nama_brg,format(barang.harga,0) as 'harga',pembeli.jlh_beli,format((barang.harga * pembeli.jlh_beli),0) as 'Total' from pembeli,barang where pembeli.kd_brg = barang.kd_brg and pembeli.id_pembeli = '".$aidi."'");
$lihat = mysql_query("SELECT barang_keluar.id_keluar, barang_keluar.tgl, barang_keluar.kode_barang, barang_keluar.transaksi, barang_keluar.jumlah, barang_keluar.jumlah, barang_keluar.tot_biaya, data_barang.harga, data_barang.nama_barang FROM `barang_keluar` JOIN `data_barang` WHERE barang_keluar.kode_barang=data_barang.kode_barang AND transaksi='".$aidi."'");
$i = 1;
$no = 1;
$max = 31;

while($data = mysql_fetch_array($lihat)){

$pdf->setXY(10,$ya);
$pdf->setFont('arial','',9);
$pdf->setFillColor(255,255,255);
$pdf->cell(6,6,$no,1,0,'C',1);
$pdf->cell(90,6,$data['kode_barang'],1,0,'L',1);
$pdf->cell(25,6,$data['harga'],1,0,'R',1);
$pdf->cell(20,6,$data['nama_barang'],1,0,'C',1);
$pdf->CELL(50,6,$data['tot_biaya'],1,0,'R',1);
$ya = $ya+$row;
$no++;
$i++;
}
//$hasil = mysql_query("select format(sum(barang.harga * pembeli.jlh_beli),0) as 'jlh_total' from pembeli,barang where pembeli.kd_brg = barang.kd_brg and pembeli.id_pembeli = '".$aidi."'");
//$arr_hsl = mysql_fetch_array($hasil);
//$pdf->text(150,$ya+7,"Total Harga  :  Rp.".$arr_hsl['jlh_total']);


$pdf->setFont('Arial','',12);
$pdf->text(80,250,'.::: TERIMAKASIH :::. ');


$pdf->output();

?>