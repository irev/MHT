<?php
ob_start();
include("pages/petugas/obatview.php");
//no faktur auto
$qkdf = mysql_query("SELECT MAX(kode_obat) as kodex FROM tb_obat");
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
  
//$rs=mysql_query("Insert into data_barang (`kode_barang`, `nama_barang`, `jenis_barang`,`satuan`,`harga`, `harga_jual`) values ('BR".$notr."','".$_POST['namabarang']."','".$_POST['jenis']."','".$_POST['satuan']."','".$_POST['modalbarang']."','".$_POST['hjual']."')") or die(mysql_error());
$rs=mysql_query("INSERT INTO `tb_obat`(`kode_obat`, `nama_obat`, `jenis`, `satuan`) VALUES('OB".$notr."','".$_POST['namabarang']."','".$_POST['jenis']."','".$_POST['satuan']."')") or die(mysql_error());
	  mysql_query("INSERT INTO `stok_obat` (`kode_obat`, `stok_bulan_lalu`, `stok_masuk`, `stok_terpakai`, `stok_tersedia`) values ('OB".$notr."','0','0','0','0')");
  if($rs)
	{
		echo "<script>window.location='?cat=petugas&page=obat'</script>";
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
		$rs2=mysql_query("Insert into `satuan` (`id_satuan`,`satuan`,`isi`) values ('','".$_POST['satuan']."','".$_POST['isi']."')") or die(mysql_error());
		if($rs2)
		{	
			echo "<script>window.location='?cat=petugas&page=obat'</script>";
		}
	}else{
		echo '<script>bootbox.alert("Your message here…!");</scrip>'; 
	}
}

?>

<?php
if(isset($_GET['del']))
{
	$ids=$_GET['id'];
	$ff=mysql_query("Delete from tb_obat Where sha1(kode_obat)='".$ids."'");
	if($ff)
	{
		echo "<script>window.location='?cat=petugas&page=obat'</script>";
	}
}
ob_end_flush();
?>

