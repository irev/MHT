<?php
require('fpdf.php'); // file fpdf.php harus diincludekan
$pdf = new FPDF('P','cm','Legal');
$pdf->SetMargins(40,40,30);
$pdf->AddPage();
$pdf->SetFont('Arial','B',12);
$pdf->MultiCell(0,0.5,'  Hello World! Hello World! Hello World! Hello Worjsdhsjds dsjdshdjhsd sjdsjdjhsd sdjsdjhsdjs dsudsdhshds dsjdsjdhsjhds djsdhsjdhsd sdjshdjshd sdjsdhjsdhs dsdhsdhs ds djsdjshd ld!');
$pdf->Output();
?>