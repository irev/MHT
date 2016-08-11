<?php

session_start();
if (!isset($_SESSION['level'])  && !isset ($_SESSION ['username']) )
{
    if (0==0)
    {
                      
        //require ('../../pdf/fpdf.php');
		require('fpdf.php');
		require("../../../_db.php");
		$hari_ini= date('Y-m-d');
		class PDF extends FPDF
{
// Page header
function Header()
{
    // Logo
   // $this->Image('logo.png',10,6,30);
    // Arial bold 15
    $this->SetFont('Arial','B',6);
    // Move to the right
    $this->Cell(2);
    // Title
    $this->Cell(3,0.5,'Title',1,0,'C');
	$this->Text(7,(2),'PEMAKAIAN OBAT BULAN '.strtoupper(bln_indonesia($hari_ini)));
    // Line break
    $this->Ln(2);
}

// Page footer
function Footer()
{
    // Position at 1.5 cm from bottom
    $this->SetY(0);
    // Arial italic 8
    $this->SetFont('Arial','I',8);
    // Page number
    $this->Cell(0,(5.5),'Page '.$this->PageNo().'/{nb}',0,0,'C');
}
}
		
		
		
		
        $pdf = new FPDF('P','cm','A4');
        $pdf->Open();
        $pdf->AddPage();
        $pdf->SetFont('Arial','B',12);
      //$pdf->Image('../../images/logo.jpg',1,1,3,0);
        $pdf->SetFont('Arial','B',10);
       // $pdf->Text(7,(2),'PEMAKAIAN OBAT BULAN '.strtoupper(bln_indonesia($hari_ini)));
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
		$pdf->Cell((1.5),(0.5), $isx3,'LRTB',0,'C');
		}
		
		
		
		
		//TAMPIL KODE JENIS OBAT
		$nomr=111;
		$qjenis =  "SELECT * FROM `jenis_obat` ";
			$jn = mysql_query($qjenis); $pdf->Ln();
			 while($jno=mysql_fetch_array($jn)){
			 $nomr++;
			 	$pdf->SetFont('Arial','',6);
				$pdf->Cell((0.5),(0.5),'','LTB',0,'C');
				$pdf->SetFont('Arial','B',6);
				$pdf->Cell((4.5),(0.5),stripslashes($jno[1]),'TB',0,'L');
				
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
			$pdf->Cell((0.5),(0.5),'','TB',0,'C');
			break;
		}		
		}
		$pdf->Cell(1.5,(0.5),'','TB',0,'C');
		$pdf->Cell(1.5,(0.5),'','TBR',0,'C');
/// END BARIS KOSONG JENIS		
		
		//TAMPIL KODE NAMA OBAT
		$nom=0;
		$query1 =  "SELECT * FROM `v_obat` WHERE jenis='".$jno[1]."'";
			$data1 = mysql_query($query1); $pdf->Ln();
			 while($hasil1=mysql_fetch_array($data1)){
			 $nom++;
			 	$pdf->SetFont('Arial','',6);
				$pdf->Cell((0.5),(0.5),abs(substr($hasil1[0], 2, 3)),'LRTB',0,'C');
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
		 

	for($f=1;$f<=10;$f++){
		 $pdf->Ln();
		 }
//WARNA TABLE
//$pdf->Cell(11.5,(4.5),'ffff','LRTB',0,'','2','C');
        // keterangan   pimpinan
		
		$pimpinan = mysql_query("SELECT * FROM `user` WHERE username='pimpinan'");
        $pimpinan = mysql_fetch_array($pimpinan);
        $pdf->SetFont('Arial','B',8);		
		$pdf->Text(11.5,(4.5),'ffff111','LRTB',0,'C');
		$pdf->Cell(5.2,(0.5),'Padang, '.date('d ').bln_indonesia(date('Y-m-d')).'','LRTB',1,'C');

		$pdf->Cell(11.5,(0.5),'ffff','LRTB',0,'C');
		$pdf->Cell((5.2),(0.5),''.$pimpinan[3].'','LRTB',0,'C');
		$pdf->Cell(11.5,(6.5),'xxxxxxx','LRTB',0,'C');
		$pdf->Cell((5.2),(0.5),'PENDA I NIP '.$pimpinan[4].'','LRTB',0,'C');
		$pdf->Line((12.2),(23.5),17.5,(23.5));
		$pdf->Ln();
		$pdf->Cell(11.5,(0.5),'ffff222','LRTB',0,'C');
		$pdf->Cell((5.2),(0.5),'PENDA I NIP '.$pimpinan[4].'','LRTB',0,'C');
		$pdf->Ln();
		
		
		
        
        
        //BATAS ISI TABEL
        $pdf->Line(1,(28),20,(28));
        $pdf->SetY(-15);
        $pdf->SetFont('Arial','',8);
        $pdf->Text((10.5),(28.5),'Generated by Meedun Management System 1.0   | ');
        $pdf->Text((17.3),(0.5),'Halaman ke-'.$pdf->PageNo().' dari {nb}');
		$pdf->Cell(0,(5.5),'Page '. $pdf->PageNo().'/{nb}',0,0,'C');

        $pdf->AliasNbPages();
        $pdf->Output();
        
        
        
    }else echo "File ini hanya bisa dibaca pada level User";
            
}else echo "Akses langsung tidak di izinkan";
    
?>