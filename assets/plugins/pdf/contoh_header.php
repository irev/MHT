<?php
require('fpdf.php');
require("../../../_db.php");
$hari_ini= date('Y-m-d');
class PDF extends FPDF
{
///////////////////////////////////////////////////////////////////// Page header
function Header()
{
    // Logo
   // $this->Image('logo.png',10,6,30);
    // Arial bold 15
    $this->SetFont('Arial','B',6);
    // Move to the right
    $this->Cell(1);
    // Title
    //$this->Cell(3,0.5,'Title',1,0,'C');
	$hari_ini= date('Y-m-d');
			// Tanggal pertama pada bulan ini
		$tgl_pertama = date('Y-m-01', strtotime($hari_ini));
		// Tanggal terakhir pada bulan ini
		$tgl_terakhir = date('d', strtotime($hari_ini));
		//$hari_i= date("Y-m-");
		$hari_i= date("Y-m-");
		//$hari_i= '2016-04-';
		$hari_Y= date("Y");
		$hari_M = sprintf('%01d', date("m"));
		$tglAkhir=tglAkhirBulan($hari_Y,$hari_M);
		/// BARIS HEADER TANGGAL
	if ( $this->PageNo() !== 1 ) {
	     $this->SetFont('Arial','',6);
		$this->Ln(2);
	    $this->Cell((0.5),(0.5),'1','LRTB',0,'C');
		$this->Cell((4.5),(0.5),'2','LRTB',0,'C');
		for($is=1;$is<=$tglAkhir;$is++){
		$hari=date_format(date_create($hari_i.$is),'D');
		//Mon Tue Wed Thu Fri
		//Sat Sun
		switch($hari){
			case 'Mon':
			case 'Tue':
			case 'Wed':
			case 'Thu':
			case 'Fri':
			$endis[]=$is;
			//$this->Cell((0.5),(0.5), $is,'LRTB',0,'C');
			break;
			case 'Sat':
			case 'Sun':
			break;	
		}	
		}
	    for($isx=3;$isx<=count($endis)+2;$isx++){
		$this->SetFont('Arial','B',6);
		$this->Cell((0.5),(0.5), $isx,'LRTB',0,'C');
		}
		for($isx3=count($endis)+3;$isx3<=count($endis)+4;$isx3++){
		$this->SetFont('Arial','B',6);
		$this->Cell((1.5),(0.5), ''.$isx3,'LRTB',0,'C');
		}
/// END PENAMPILAN KOLOM	
	
	
	
	}
    // Line break
    $this->Ln();
}

/////////////////////////////////////////////////////////////////// Page footer
function Footer()
{
    // Position at 1.5 cm from bottom
    $this->SetY(1.5);
    // Arial italic 8
    $this->SetFont('Arial','I',8);
    // Page number
	  if ( $this->PageNo() !== 1 ) {
            //$this->Cell(0,(2.5),'Page '.$this->PageNo().'/{nb}',0,0,'C');
			 $this->Cell(0,(2.5),'Page '.$this->PageNo().'/{nb}',0,0,'C');
			 	 
        }
		

   
}///END  FOOTER
}/// END CLASS PDF 

// Instanciation of inherited class
$pdf = new PDF('P','cm','A4');
$pdf->AliasNbPages();
$pdf->AddPage();
        $pdf->SetFont('Arial','B',12);
      //$pdf->Image('../../images/logo.jpg',1,1,3,0);
        $pdf->SetFont('Arial','B',10);
        $pdf->Text(7,(2),'PEMAKAIAN OBAT BULAN '.strtoupper(bln_indonesia($hari_ini)));
        $pdf->SetFont('Arial','',10);
        $pdf->Line(1,(2.5),19.5,(2.5));
        $pdf->Line(1,(2.6),19.5,(2.6));
        $pdf->Ln(2.2);
        //BATAS HEADER
	
        $pdf->Ln();
        $pdf->SetFont('Arial','',8);
        //BATAS KEPALA TABEL
      
        $nourut=0;
		$pdf->SetFont('Arial','B',6);
		//$pdf->Cell((0.5),(1.5),'NO','LRTB',0,'C');
		//$pdf->Cell((4.5),(1.5),'NAMA OBAT','LRTB',0,'C');
		/// URUTAN TANGGAL DAN HARI KERJA
		  $pdf->Text(10.5,(3.5),'TANGGAL','',0,'C');
		$pdf->Ln();
		$pdf->Cell((0.5),(1.5),'NO','LRTB',0,'C');
		$pdf->Cell((4.5),(1.5),'NAMA OBAT','LTR',0,'C');
		// Tanggal pertama pada bulan ini
		$tgl_pertama = date('Y-m-01', strtotime($hari_ini));
		// Tanggal terakhir pada bulan ini
		$tgl_terakhir = date('d', strtotime($hari_ini));
		//$hari_i= date("Y-m-");
		$hari_i= date("Y-m-");
		//$hari_i= '2016-04-';
		$hari_Y= date("Y");
		$hari_M = sprintf('%01d', date("m"));
		$tglAkhir=tglAkhirBulan($hari_Y,$hari_M);
		/// BARIS HEADER TANGGAL
		for($x=1;$x<=$tglAkhir;$x++){
		$hari=date_format(date_create($hari_i.$x),'D');
		$pdf->SetFont('Arial','B',6);
		//Mon Tue Wed Thu Fri //Sat Sun
		switch($hari){
			case 'Mon':
			case 'Tue':
			case 'Wed':
			case 'Thu':
			case 'Fri':
			//TAMPIL TANGGAL
			$pdf->Cell((0.5),(0.5),'','T',0,'C');
			break;
		}		
		}
		$pdf->Cell(1.5,(0.5),'','LRT',0,'C');
		$pdf->Cell(1.5,(0.5),'','LRT',0,'C');
		$pdf->Ln();
		$pdf->Cell((0.5),(1),'','LRB',0,'C');
		$pdf->Cell((4.5),(1),'','LRB',0,'C');
		/// BARIS tampil HEADER TANGGAL
		for($x=1;$x<=$tglAkhir;$x++){
		$hari=date_format(date_create($hari_i.$x),'D');
		$pdf->SetFont('Arial','B',6);
		//Mon Tue Wed Thu Fri //Sat Sun
		switch($hari){
			case 'Mon':
			case 'Tue':
			case 'Wed':
			case 'Thu':
			case 'Fri':
			//TAMPIL TANGGAL
			$pdf->Cell((0.5),(0.5), date_format(date_create($hari_i.$x),'d'),'LRTB',0,'C');
			break;
		}		
		}
		$pdf->SetFont('Arial','B',6);
		$pdf->Cell(1.5,(0.5),'JUMLAH','',0,'C');
		$pdf->Cell(1.5,(0.5),'KET','LR',0,'C');
		//$pdf->Cell(2,(1.5),'NAMA OBAT','LRTB',0,'C');
		$pdf->Ln();
		$pdf->SetFont('Arial','',6);
		$pdf->Cell((0.5),(1),'','LRB',0,'C');
		$pdf->Cell((4.5),(1),'',0,'C');
		//TAMPIL HARI KERJA BULANAN
		for($x=1;$x<=$tglAkhir;$x++){
		$hari=date_format(date_create($hari_i.$x),'D');
		//Mon Tue Wed Thu Fri
		//Sat Sun
		switch($hari){
			case 'Mon':
			case 'Tue':
			case 'Wed':
			case 'Thu':
			case 'Fri':
			//TAMPIL HARI
			$pdf->SetFont('Arial','B',6);
			$pdf->setFillColor(0,0,230);
			$pdf->Cell((0.5),(0.5), hr_indonesia(date_format(date_create($hari_i.$x),'D')),'LRTB',0,'C');
			$hitunghari = count($x);
			break;
		}	
		}
//// TAMPIL PENOMORAN KOLOM
		$pdf->SetFont('Arial','B',6);
		$pdf->Cell(1.5,(0.5),'PAKAI','B',0,'C');
		$pdf->Cell(1.5,(0.5),'','LRB',0,'C');
		$pdf->Ln();
		$pdf->Cell((0.5),(0.5),'1','LRTB',0,'C');
		$pdf->Cell((4.5),(0.5),'2','LRTB',0,'C');
	
		$pdf->SetFont('Arial','',6);
		for($is=1;$is<=$tglAkhir;$is++){
		$hari=date_format(date_create($hari_i.$is),'D');
		//Mon Tue Wed Thu Fri
		//Sat Sun
		switch($hari){
			case 'Mon':
			case 'Tue':
			case 'Wed':
			case 'Thu':
			case 'Fri':
			$endis[]=$is;
			//$pdf->Cell((0.5),(0.5), $is,'LRTB',0,'C');
			break;
			case 'Sat':
			case 'Sun':
			break;
			
		}	
		}

	
		for($isx=3;$isx<=count($endis)+2;$isx++){
		$pdf->SetFont('Arial','B',6);
		$pdf->Cell((0.5),(0.5), $isx,'LRTB',0,'C');
		}
		for($isx3=count($endis)+3;$isx3<=count($endis)+4;$isx3++){
		$pdf->SetFont('Arial','B',6);
		$pdf->Cell((1.5),(0.5), ''.$isx3,'LRTB',0,'C');
		}
/// END PENAMPILAN KOLOM		
		
		
		
		//TAMPIL KODE JENIS OBAT
		$nomr=111;
		$qjenis =  "SELECT * FROM `jenis_obat` ";
			$jn = mysql_query($qjenis); $pdf->Ln();
			 while($jno=mysql_fetch_array($jn)){
			 $nomr++;
			 	$pdf->SetFont('Arial','',6);
                $pdf->SetFillColor(222,222,222);
				$pdf->Cell((0.5),(0.5),'','LTB',0,0,'C');
				$pdf->SetFont('Arial','B',6);
				
				$pdf->Cell((4.5),(0.5),stripslashes($jno[1]),'TB',0,0,'C');
				
/// BARIS KOSONG JENIS
		for($x=1;$x<=$tglAkhir;$x++){
		$hari=date_format(date_create($hari_i.$x),'D');
		$pdf->SetFont('Arial','B',6);
		//Mon Tue Wed Thu Fri //Sat Sun
		switch($hari){
			case 'Mon':
			case 'Tue':
			case 'Wed':
			case 'Thu':
			case 'Fri':
			//TAMPIL TANGGAL
			$pdf->Cell((0.5),(0.5),'','TB',0,0,'C');
			break;
		}		
		}
		$pdf->Cell(1.5,(0.5),'','TB',0,0,'C');
		$pdf->Cell(1.5,(0.5),'','TBR',0,0,'C');
/// END BARIS KOSONG JENIS		
		
		//TAMPIL KODE NAMA OBAT
		$nom=0;
		$query1 =  "SELECT * FROM `v_obat` WHERE jenis='".$jno[1]."'";
			$data1 = mysql_query($query1); $pdf->Ln();
			 while($hasil1=mysql_fetch_array($data1)){
			 $nom++;
			 	$pdf->SetFont('Arial','',6);
				//$pdf->Cell((0.5),(0.5),abs(substr($hasil1[0], 2, 3)),'LRTB',0,'C');
				$pdf->Cell((0.5),(0.5),$nom,'LRTB',0,'L');
				$pdf->Cell((4.5),(0.5),$hasil1[1],'LRTB',0,'L');


		for($isa=1;$isa<=$tglAkhir;$isa++){
		$hari=date_format(date_create($hari_i.$isa),'D');
		//Mon Tue Wed Thu Fri Sat Sun
		switch($hari){
			case 'Mon':
			case 'Tue':
			case 'Wed':
			case 'Thu':
			case 'Fri':
			
			//$pdf->Cell((0.5),(0.5), "SELECT kode_obat, tgl,sum(jumlah) FROM `v_keluar` where kode_obat='".$hasil1[0]."' AND tgl='".$hari_i.$isa."' GROUP by tgl",'LRTB',0,'C');
			//$pdf->Ln();
			$query =  "SELECT kode_obat, tgl, COALESCE(sum(jumlah), 0) as jumlah FROM `v_keluar` where kode_obat='".$hasil1[0]."' AND tgl='".$hari_i.$isa."' GROUP by tgl";
			$data = mysql_query($query); 
			if($rc=mysql_num_rows($data)==0){
			 		$pdf->Cell((0.5),(0.5),'-','LRTB',0,'C'); // tampil pemakaian harian 
				}else{ 
			 while($hasil=mysql_fetch_array($data)){
			    $pdf->SetFont('Arial','B',6);
				$pdf->Cell((0.5),(0.5),''.$hasil[2].'','LRTB',0,'C');
				$pdf->SetFont('Arial','',6);
				}
			}
			$endis[]=$is;
			break;
		}	
		}
		//SELECT kode_obat, tgl,sum(jumlah) FROM `v_keluar` where kode_obat='OB001'
		$query2 =  "SELECT kode_obat, tgl, COALESCE(sum(jumlah), 0) as jumlah FROM `v_keluar` where kode_obat='".$hasil1[0]."' AND tgl LIKE '".$hari_i."%'";
			$data2 = mysql_query($query2); 
			if(mysql_num_rows($data2)==0){
					$pdf->Cell(1.5,(0.5),'0','T',0,'C');
			}else{ 
			 	while($hasil2=mysql_fetch_array($data2)){
					$pdf->Cell(1.5,(0.5),''.$hasil2[2].'','TB',0,'C'); // jumlah pakai bulan ini
					$pdf->Cell(1.5,(0.5),'','LRTB',0,'C'); // isi keterangan 
				}
			}
		$pdf->Ln();
		
		}
		
	}	
		$pdf->Cell(5,(0.5),'JUMLAH','LRTB',0,'C'); // isi keterangan 
		for($is=1;$is<=$tglAkhir;$is++){
		$hari=date_format(date_create($hari_i.$is),'D');
		//Mon Tue Wed Thu Fri
		//Sat Sun
		switch($hari){
			case 'Mon':
			case 'Tue':
			case 'Wed':
			case 'Thu':
			case 'Fri':
			$endis[]=$is;
			//$pdf->Cell((0.5),(0.5), $is,'TB',0,'C');
			$pdf->Cell((0.5),(0.5),'','LRTB',0,'C');
			break;
			case 'Sat':
			case 'Sun':
			break;
			
		}	
		}
		$qjum = mysql_query("SELECT SUM(jumlah) FROM `obat_keluar` WHERE `tgl` LIKE '2016-04%' ORDER BY `tgl` DESC");
		$jumlah=mysql_fetch_array($qjum);
		$pdf->Cell(1.5,(0.5),''.$jumlah[0].'','LTB',0,'C'); // jumlah pakai bulan ini
		$pdf->Cell(1.5,(0.5),'','LRTB',0,'C'); // isi keterangan  
		
		
		/// TTD
		$pdf->Ln(0.5);
		$pimpinan = mysql_query("SELECT * FROM `user` WHERE username='pimpinan'");
        $pimpinan = mysql_fetch_array($pimpinan);
		$pdf->Cell(11.5,(3.5),'','',0,'C'); // isi keterangan 
		$pdf->Cell(3,(1),'Padang, '.date('d ').bln_indonesia(date('Y-m-d')).'','',0,'C'); // isi keterangan 
		$pdf->Ln();
		$pdf->Cell(11.5,(0.5),'','',0,'C'); // isi keterangan 
		$pdf->Cell(3, (0.5), ''.$pimpinan[3].'','',0,'C');
		$pdf->Ln(2);
		$pdf->Cell(11.5,(0.5),'','',0,'C'); // isi keterangan 
		$pdf->Cell(3, (0.5), ''.$pimpinan[2].'','B',0,'C');
		$pdf->Ln();
		$pdf->Cell(11.5,(0.5),'','',0,'C'); // isi keterangan 
		$pdf->Cell(3, (0.5), 'PENDA I NIP '.$pimpinan[4].'','T',0,'C');



	$pdf->Text(12.5,(24.5),''.$pimpinan[3].'','LRTB',0,'C'); // isi keterangan  
//	for($f=1;$f<=10;$f++){
//		 $pdf->Ln();
//		 }







$pdf->Output();
?>