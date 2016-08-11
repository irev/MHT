<script src="js/jquery-ui.js"></script>
<h2>Entry Barang Masuk</h2>
<form name="form1" method="post" action="" autocomplete="on">

<table width="50%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td>Tanggal</td>
    <td><input type="text" name="tglr" id="datepicker" placeholder="Pilih tanggal.." /></td>
  </tr>
  <tr>
    <td width="40%">Kode Barang</td>
    <td width="60%"><label for="kodebarang"></label>
      <input type="text" name="kodebarang" id="kodebarang" placeholder="Pilih Barang.."  onClick="window.open('http://localhost/bahanbaku/pages/web/viewbarang.php','popuppage','width=500,toolbar=0,resizable=0,scrollbars=no,height=400,top=100,left=100');">
     
</td>
  </tr>
  <tr>
    <td>Nama Barang</td>
    <td><input name="namabarang" type="text" id="namabarang" readonly="readonly"></td>
  </tr>
  <tr>
    <td>QTY</td>
    <td><input type="text" name="qty" id="qty"></td>
  </tr>
  <tr>
    <td>Harga</td>
    <td><input type="text" name="harga" id="harga"></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td><p></p><input type="submit" class="btn btn-primary" name="button" id="button" value="Tambah"></td>
  </tr>

</table>
</form>

<?php
if(isset($_POST['button']))
{
	$newDate = date("Y-m-d", strtotime($_POST['tglr']));
  $q=mysql_query("Insert into barang_masuk (`tgl`,`kode_barang`,`jumlah`) values ('".$newDate."','".$_POST['kodebarang']."','".$_POST['qty']."')") or die(mysql_error());
	$q=mysql_query("Update data_barang SET harga='".$_POST['harga']."' WHERE kode_barang='".$_POST['kodebarang']."'") or die(mysql_error());
	$q2=mysql_query("Select * from data_persediaan where kode_barang='".$_POST['kodebarang']."'");
	$rc=mysql_num_rows($q2);
	if($rc==1)
	{
		$q3=mysql_query("Update data_persediaan SET masuk=masuk + ".$_POST['qty'].",stok_tersedia=stok_tersedia + ".$_POST['qty']." Where kode_barang='".$_POST['kodebarang']."'");
		if($q3)
		{
			echo "Data sudah disimpan";
		}
	}else{
		$q4=mysql_query("Insert into data_persediaan (`kode_barang`,`stok_awal`,`masuk`,`stok_tersedia`) values ('".$_POST['kodebarang']."','".$_POST['qty']."','".$_POST['qty']."','".$_POST['qty']."')");
		if($q4)
		{
			echo "Data sudah disimpan";
		}
	}
}
?>
