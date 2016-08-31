<?php

//require('.../.../assets/plugins/pdf/fpdf.php');
require('../../../assets/plugins/pdf/fpdf.php');
require("../../../_db.php");
//require('../../../assets/plugins/pdf/fpdf.php');
//require("../../../_db.php");

$hari_ini=date('Y-m-d');
class PDF extends FPDF
{
// Page header
function Header()
{
	$this->Cell(19,0,'','T',0,'R');
	$this->Ln(0.2);
	// Logo
	$this->Image('../../../assets/img/logo_smn.jpg',1,1,2.2);
	// Arial bold 15
	$this->SetFont('Arial','B',30);
	// Move to the right
	$this->Cell(5);
	// Title
	$this->Cell(5.6,1,'Solok Media Net',0,0,'R');
	$this->SetFont('Arial','',12);
	$this->Cell(3.2,3.0,'SURAT JALAN TEKNISI DAN BERITA ACARA PERBAIKAN',0,0,'R');	
	$this->Ln(2);
	$this->Cell(19,1,'','T',0,'R');
	$this->Ln(0.1);
	$this->Cell(19,0.1,'','T',0,'R');
	
	// Line break
	$this->Ln(1);
}

// Page footer
function Footer()
{
   
	// Position at 1.5 cm from bottom
	$this->SetY(14.5);
	$this->Cell(19,1,'','T',0,'C');
	$this->Ln(1);
	// Arial italic 8
	$this->SetFont('Arial','I',8);
	// Page number
	$this->Cell(0,-1.5,'Page '.$this->PageNo().'/{nb}',0,0,'C');

}
}

// Instanciation of inherited class
// $pdf = new PDF('P','cm','A4'); untuk f4
$pdf = new PDF('L','cm', array(21, 15));
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Times','',12);
/// TAMPIL DATA 
//$pdf->Cell(0,0,'Telah terima pengaduan gangguan jaringan dari',0,0);
$pdf->Ln(0.5);
$pdf->Text(1,3.9,'Telah terima pengaduan gangguan jaringan dari :');
//label 
$pdf->Text(1.5,(4.5),'Tanggal Pengduan');
$pdf->Text(1.5,(5),  'Nama Pelanggan');
$pdf->Text(10.5,(5),  'Pelapor');
$pdf->Text(1.5,(5.5),'Alamat');
$pdf->Text(1.5,(6),  'No.HP');
$pdf->Text(1.5,(6.5),'Pegaduan Via');
//$pdf->Text(1.5,(7),  'Tanggal Pengduan');
//$pdf->Text(1.5,(7.5),'Tanggal Pengduan');
 
if(!isset($_GET['id'])){
// POST Metode
$get_id = $_POST['id'];
    //$disurat = 'SJ'.sprintf("%05s",  $POST_id);
$gangguan = $_POST['gangguan'];
    //$digangguan = 'MT'.sprintf("%05s",  $gangguan);
$karyawan = $_POST['karyawan'];
    //$dikaryawan = 'KR'.sprintf("%03s",  $karyawan);
}else if(!isset($_POST['id'])){
// GET Metode
$get_id = $_GET['id'];
    //$disurat = 'SJ'.sprintf("%05s",  $get_id);
$gangguan = $_GET['gangguan'];
    //$digangguan = 'MT'.sprintf("%05s",  $gangguan);
$karyawan = $_GET['karyawan'];
    //$dikaryawan = 'KR'.sprintf("%03s",  $karyawan);
}


////////// ambil data gangguan
$qgangguan = mysql_fetch_array(mysql_query("SELECT * FROM `tb_gangguan` WHERE id_gangguan='$gangguan'"));
$pelapor = $qgangguan['pelapor'];
$tgl_pelaporan =$qgangguan['tgl_pelaporan'];
$tgl_gangguan =$qgangguan['tgl_gangguan'];
$id_pelanggan =$qgangguan['id_pelanggan'];

////////// ambil data karyawan
$qkaryawan = mysql_fetch_array(mysql_query("SELECT * FROM `tb_karyawan` WHERE id_karyawan='$karyawan'"));
$namakaryawan = $qkaryawan['nama'];
////////// ambil data pelanggan
$qpelanggan = mysql_fetch_array(mysql_query("SELECT * FROM `tb_pelanggan` WHERE id_pelanggan='$id_pelanggan'"));
$nmapelanggan = $qpelanggan['nama'];
$alamat = $qpelanggan['alamat'];
$hp = $qpelanggan['hp'];



//isi
//kode surat /SJ/MT/
$namafile = substr($get_id,4).'/'.substr($gangguan,4).'/'.date('d/m');
//$pdf->Text(15.5,(1.5),  'Nomor : '.substr($get_id,4).'/'.substr($gangguan,4).'/'.date('d/m')); // ID_SURAT
$pdf->Text(15.5,(1.5),  'Nomor : '.$get_id); // ID_SURAT
$pdf->Text(5.5,(4.5),': '.tgl_indonesia($tgl_pelaporan)); //tanggal pelaporan
$pdf->Text(5.5,(5),  ': '.$nmapelanggan); // nama pelanggan
$pdf->Text(12,(5), ': '.$pelapor); // nama pelanggan
$pdf->Text(5.5,(5.5),': '.$alamat); // alamat
$pdf->Text(5.5,(6),  ': '.$hp); // hp
$pdf->Text(5.5,(6.5),':  Telepon / SMS / Teknisi / Kantor');
$pdf->Text(11.5,(6.5),'  jam 09:00');
$pdf->Text(1,(7.3),'Dilakukan perbaikan jaringan berdasarkan pengaduan diatas oleh teknisi pada : ');
$pdf->Text(1.5,(8),'Tanggal');
$pdf->Text(5.5,(8),':  ......................');
$pdf->Text(11.5,(8),'  jam ..................');

$pdf->Text(1,(8.7),'Setelah dilakukan perbaikan maka jaringan di tempat pelanggan tersebut diatas sudah BISA / BELUM BISA');
$pdf->Text(1,(9.3),' digunakan lagi.');


$pdf->Text(11.5,(10.5),'  Solok, .....................');
$pdf->Text(11.5,(11),'  Pelanggan');
$pdf->Text(11.5,(13.5),'  ____________________________');

$pdf->Output('Brita_acara_pelanggan_'.$nmapelanggan.'_'.$namafile.'.pdf','I');
?>
