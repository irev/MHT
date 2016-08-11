<?php
ob_start();
include("pages/gudang/barangview.php");
//no faktur auto
$qkdf = mysql_query("SELECT MAX(kode_barang) as kodex FROM data_barang");
   $data=mysql_fetch_array($qkdf);
   $kodef = $data['kodex'];
   $nourut = substr($kodef, 2, 3);
   //$nourut++;
   if ($nourut==0){
    $nourut=1;
    $notr =sprintf("%03s", $nourut) ; 
   }else{
    $nourut++;
    $notr = sprintf("%03s", $nourut) ; 
   }
  //end no faktur auto 

if(isset($_GET['act']))
{
	echo $_POST['jenis'];
$rs=mysql_query("Insert into data_barang (`kode_barang`, `nama_barang`, `jenis_barang`, `harga`, `harga_jual`) values ('BR".$notr."','".$_POST['namabarang']."','".$_POST['jenis']."','".$_POST['modalbarang']."','".$_POST['hjual']."')") or die(mysql_error());
	if($rs)
	{
		
		echo "<script>window.location='?cat=gudang&page=barang'</script>";
	}
}


//no faktur auto
$qkdf2 = mysql_query("SELECT MAX(id) as kodex FROM satuan");
   $data2=mysql_fetch_array($qkdf2);
   $kodef2 = $data2['kodex'];
   $nourut2 = substr($kodef2, 0, 2);
   //$nourut++;
   if ($nourut2==0){
    $nourut2=1;
    $notr2 =sprintf("%03s", $nourut2) ; 
   }else{
    $nourut2++;
    $notr2 = sprintf("%03s", $nourut2) ; 
   }
  //end no faktur auto 

if(isset($_GET['act2']))
{
	if($_POST['satuan']!==''){
		$rs2=mysql_query("Insert into satuan (`id`,`nm_satuan`) values ('".$notr2."','".$_POST['satuan']."')") or die(mysql_error());
		if($rs2)
		{	
			echo "<script>window.location='?cat=gudang&page=barang'</script>";
		}
	}else{
		echo '<script>bootbox.alert("Your message here…");</scrip>'; 
	}
}

?>

<?php
if(isset($_GET['del']))
{
	$ids=$_GET['id'];
	$ff=mysql_query("Delete from data_barang Where sha1(kode_barang)='".$ids."'");
	if($ff)
	{
		echo "<script>window.location='?cat=gudang&page=barang'</script>";
	}
}
ob_end_flush();
?>

