
<?php
//require('../../assets/plugins/pdf/fpdf.php');
//require("../../_db.php");
require('../../../../assets/plugins/pdf/fpdf.php');
require("../../../../_db.php");

$hari_ini=date('Y-m-d');
class PDF extends FPDF
{
// Page header
function Header()
{
	$this->Cell(19,0,'','T',0,'R');
	$this->Ln(0.2);
	// Logo
	$this->Image('../../../../assets/img/logo_smn.jpg',1,1,2.2);
	// Arial bold 15
	$this->SetFont('Arial','B',30);
	// Move to the right
	$this->Cell(5);
	// Title
	$this->Cell(5.6,1,'Solok Media Net',0,0,'R');
	$this->SetFont('Arial','',8);
	$this->Cell(5.3,3.0,'Jln. Adytiawarman No.336 Kampung Jawa Solok.  Kode Pos. 27321 Telp.  081931003200 / 085316001000',0,0,'R');	
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
	$this->SetY(28.5);
	$this->Cell(19,1,'','T',0,'C');
	$this->Ln(1);
	// Arial italic 8
	$this->SetFont('Arial','I',8);
	// Page number
	$this->Cell(0,-1.5,'Page '.$this->PageNo().'/{nb}',0,0,'C');
}
}

// Instanciation of inherited class
//$pdf = new PDF('P','cm','A4'); //untuk A4
$pdf = new PDF('P','cm', array(21.0, 29.7)); ////untuk a4
//$pdf = new PDF('L','cm', array(21, 15)); ////untuk a4
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Times','B',12);
/// TAMPIL DATA 
//$pdf->Cell(0,0,'Telah terima pengaduan gangguan jaringan dari',0,0);
$pdf->Ln(0.5);
$pdf->Text(1,3.9,'Laporan Perbaikan',0,0,'C');
$pdf->SetFont('Times','',8);
//label 
$pdf->Text(1,(4.5),'Priode : 9999-99-99 s.d 9999-99-99');
$pdf->Cell((0.8),(0.5), 'NO','LRTB',0,'C');
$pdf->Cell((1.4),(0.5), 'KODE','LRTB',0,'C');
$pdf->Cell((1.5),(0.5), 'TANGGAL','LRTB',0,'C');
$pdf->Cell((3.0),(0.5), 'PELANGGAN','LRTB',0,'C');
$pdf->Cell((3.0),(0.5), 'PELAPOR','LRTB',0,'C');
$pdf->Cell((5.2),(0.5), 'ALAMAT','LRTB',0,'C');
$pdf->Cell((2.5),(0.5), 'HP','LRTB',0,'C');
//$pdf->Cell((4.5),(0.5), 'VIA','LRTB',0,'C');
$pdf->Cell((1.5),(0.5), 'KET','LRTB',0,'C');
//$pdf->Ln();


$query ="SELECT * FROM `tb_gangguan` ORDER BY `tb_gangguan`.`id_gangguan` ASC";
$qr = mysql_query($query);
$no=0;
while ($data = mysql_fetch_array($qr)) {
$no++;
$pdf->Ln();
$pdf->Cell((0.8),(0.5), $no,'LRTB',0,'C');
$pdf->Cell((1.4),(0.5), $data[0],'LRTB',0,'C');
$pdf->Cell((1.5),(0.5), $data[1],'LRTB',0,'C');
$pdf->Cell((3.0),(0.5), 'PELANGGAN','LRTB',0,'L');
$pdf->Cell((3.0),(0.5), 'PELAPOR','LRTB',0,'L');
$pdf->Cell((5.2),(0.5), 'Jln. Beringin no. 456 komplek','LRTB',0,'L');
$pdf->Cell((2.5),(0.5), '085212663404x','LRTB',0,'C');
//$pdf->Cell((1.5),(0.5), 'VIA','LRTB',0,'C');
$pdf->Cell((1.5),(0.5), $data[6],'LRTB',0,'C');
}

//$pdf->SetY(24.0);
if (mysql_num_rows($qr)>=40) {
	# code...
	$Ln = 4;
}else{
	$Ln = 1;
}
$pdf->Ln($Ln);
$pdf->Cell(12.5,(0.5),'','',0,'L');
$pdf->Cell(5.5,(0.5),'Solok, '. tgl_indonesia(date('Y-m-d')),'',0,'L');
$pdf->Ln();
$pdf->Cell(12.5,(0.5),'','',0,'L');
$pdf->Cell(5.5,(0.5),'Koordinator','',0,'L');
$pdf->Ln(1.2);
$pdf->Cell(12.5,(0.5),'','',0,'L');
//$pdf->SetFont('Times','U',8);
$pdf->Cell(5.5,(0.5),'nama koordinator ','B',0,'L');
//$pdf->Ln();
//$pdf->Cell(5.5,(0.5),'____________________________','LRTB',0,'L');

$pdf->Output('Laporan_Gangguan_.pdf','I');
?>
