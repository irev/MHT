<?php 
require('fpdf.php');
require('koneksi.php');

$pdf=new FPDF('P','cm','Legal');
 $pdf->AddPage();
 $pdf->SetFont('Arial','B',14);
 $pdf->Image('logo.jpg',1,1,2,2);
 $pdf->SetX(3);
 $pdf->MultiCell(19.5,0.5,'SMKN 1',0,'L');
 $pdf->SetX(3);
 $pdf->MultiCell(19.5,0.5,'Pemerintah Kota',0,'L');
 $pdf->SetFont('Arial','B',10);
 $pdf->SetX(3);
 $pdf->MultiCell(19.5,0.5,'JL. Mengkubumi No. 1, Telpon : 0411545',0,'L');
 $pdf->SetX(3);
 $pdf->MultiCell(19.5,0.5,'website : www.smkn.co.cc email : rajab@gmail.com',0,'L');
 $pdf->Line(1,3.1,20.5,3.1);
 $pdf->SetLineWidth(0.1);
 $pdf->Line(1,3.2,20.5,3.2);
 $pdf->SetLineWidth(0);
 $pdf->Ln();
 $pdf->SetFont('Arial','B',12);
 $pdf->Cell(3.5,0.8,'NISN',1,0,'C');
 $pdf->Cell(4,0.8,'Nama',1,0,'C');
 $pdf->Cell(3.5,0.8,'Username',1,0,'C');
 $pdf->Cell(2.5,0.8,'Password',1,0,'C');
 $pdf->SetFont('Arial','',10);
 $pdf->Ln();
 $hasi=mysql_query("select nisn, nama, username, password_asli from siswa where nisn='9011'");
 while($hasil=mysql_fetch_array($hasi)){ $pdf->SetFillColor(255,255,255);
 $pdf->Cell(3.5,0.5,$hasil[0],1,0,'C',true);
 $pdf->Cell(3,0.5,$hasil[1],1,0,'L',true);
 $pdf->Cell(4,0.5,$hasil[2],1,0,'L',true);
 $pdf->Cell(3.5,0.5,$hasil[3],1,0,'L',true);
 $pdf->Ln();
 } $pdf->SetFont('Arial','B',10);
 $pdf->SetX(1);
 $pdf->MultiCell(19.5,2,'Kepala Sekolah',0,'L');
 $pdf->SetFont('Arial','B',10);
 $pdf->SetX(1);
 $pdf->MultiCell(19.5,0.5,'ttd',0,'L');
 $pdf->SetFont('Arial','B',10);
 $pdf->SetX(1);
 $pdf->MultiCell(19.5,0.8,'Muh Nur Rajab',0,'L');
 $pdf->Ln();
 $pdf->Output();
 }


?>