<script src="js/jquery-ui.js"></script>
<script src="js/jquery-2.2.1.min.js"></script>
<!--script src="js/duplicateFields.js" type="text/javascript"></script-->
<h2>Entry Barang Keluar</h2>
<form name="form1" method="post" action="" autocomplete="on">
	<table width="50%" border="0" cellspacing="0" cellpadding="0">
		<tr>
			<td>Transaksi</td>
			<td><input type="text" name="tr" value="TR001" /></td>
		</tr>
		<tr>
			<td>Tanggal</td>
			<td><input type="text" name="tglr" id="datepicker" placeholder="Pilih tanggal.." /></td>
		</tr>
		<tr>
			<td width="40%">Kode Barang</td>
			<td width="60%"><label for="kodebarang"></label>
				<input type="text" name="kodebarang" id="kodebarang" placeholder="Pilih Barang.." onClick="window.open('http://localhost/bahanbaku/pages/web/viewbarang.php','popuppage','width=500,toolbar=0,resizable=0,scrollbars=no,height=400,top=100,left=100');">
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
			<td>&nbsp;</td>
			<td>
				<p></p><input type="submit" class="btn btn-primary" name="button" id="button" value="Tambah"></td>
		</tr>
	</table>
</form>
<tbody id="konten">
	<!-- nanti rows nya muncul di sini -->
</tbody>
<button type="submit" class="btn btn-default">Submit</button>
<script type="text/javascript">
$(document).ready(function() {
	var count = 0;
	$("#tambah").click(function() {
		count += 1;
		$('#container').append(
			'<tr class="records">' + '<td ><div id="' + count + '">' + count + '</div></td>' + '<td><input id="t1' + count + '" name="t1' + count + '" type="text" class="input-small"><font color="red">satuan milimeter</font></td>' + '<td><input id="t2' + count + '" name="t2' + count + '" type="text" class="input-small"><font color="red">satuan milimeter</font></td>' + '<td><input id="r_ksg' + count + '" name="r_ksg' + count + '" type="text" class="input-small"><font color="red">satuan milimeter</font></td>' + '<td><input id="kpk' + count + '" name="kpk' + count + '" type="text" class="input-small"><font color="red">satuan milimeter</font></td>' + '<td><input id="tr' + count + '" name="tr' + count + '" type="text" class="input-small"><font color="red">satuan milimeter</font></td>' + '<td><a class="remove_item" href="#" >Delete</a><a href="#" class="remove_item btn-xs btn-danger">Delete</a>' + '<input id="rows_' + count + '" name="rows[]" value="' + count + '" type="hidden"></td></tr>'
		);
	});

	$(".remove_item").live('click', function(ev) {
		if (ev.type == 'click') {
			$(this).parents(".records").fadeOut();
			$(this).parents(".records").remove();
		}
	});
});
</script>
<form id="id_form" action="mb_tangki_add.php" method="post">
	<table>
		<tr>
			<td colspan="2">
				<h3>Inputan Data Mobil Tangki</h3></td>
		</tr>
		<tr>
			<td width="150">No. Plat</td>
			<td><input type="text" class="input-small" /></td>
		</tr>
		<tr>
			<td width="150">Kap (KL)</td>
			<td><input type="text" class="input-small" /></td>
		</tr>
		<tr>
			<td width="150">No. SKHP</td>
			<td><input type="text" class="input-large" /></td>
		</tr>
		<tr>
			<td width="150">No. TUM</td>
			<td><input type="text" class="input-large" /></td>
		</tr>
		<tr>
			<td width="150">Masa Berlaku Tera</td>
			<td><input type="text" class="input-large" /></td>
		</tr>
		<tr>
			<td width="150">Jumlah Kompartemen </td>
			<td><input type="button" name="tambah" value="+" id="tambah" class="btn btn-info" /></td>
		</tr>
		<tr>
			<td colspan="2">
				<div class="table table-striped table-bordered table-hover">
					<table width="600" cellpadding="0" cellspacing="0">
						<tr>
							<td background="images/bt.png"><b>No</b></td>
							<td background="images/bt.png"><b>T1</b></td>
							<td background="images/bt.png"><b>T2</b></td>
							<td background="images/bt.png"><b>R Ksg</b></td>
							<td background="images/bt.png"><b>Kpk</b></td>
							<td background="images/bt.png"><b>TR</b></td>
							<td background="images/bt.png"><b>Aksi</b></td>
						</tr>
						<tbody id="container">
							<!-- nanti rows nya muncul di sini -->
						</tbody>
					</table>
				</div>
			</td>
		</tr>
		<tr>
			<td colspan="2"><button type="submit" class="btn btn-default">Submit</button></td>
		</tr>
	</table>
</form>
<?php
if(isset($_POST['button']))
{
	$newDate = date("Y-m-d", strtotime($_POST['tglr']));
	
	$q2=mysql_query("Select * from data_persediaan where kode_barang='".$_POST['kodebarang']."'");
	$rw=mysql_fetch_array($q2);
	$rc=mysql_num_rows($q2);
	if($rc==1)
	{
		if($_POST['qty'] <= $rw['stok_tersedia'])
		{
			$q=mysql_query("Insert into barang_keluar (`tgl`,`kode_barang`,`transaksi`,`jumlah`) values ('".$newDate."','".$_POST['kodebarang']."','".$_POST['tr']."','".$_POST['qty']."')") or die(mysql_error());
			if($q)
			{
				$q3=mysql_query("Update data_persediaan SET keluar=keluar + ".$_POST['qty'].",stok_tersedia=stok_tersedia - ".$_POST['qty']." Where kode_barang='".$_POST['kodebarang']."'");
				if($q3)
				{
					echo "Data sudah disimpan";
				}
			}
		}else{
		echo "'Stok barang kurang";
		}
	}else{
		echo "Mau jual, tapi barang kosong? Hellowwww..";
	}
}
?>
	<?php 

foreach ($_POST['nomor'] as $i)
{
	/*query insert ke database taruh disini
	mysql_query = "insert into tbl_barang (kd_brng,nm_brng,hrga)
	values('$_POST['kode_barang_'.$i]','$_POST['nama_barang_'.$i]','$_POST['harga_barang_'.$i]')";
	*/
	echo '<tr>
	<td>'.$_POST['kode_barang_'.$i].'</td>
	<td>'.$_POST['nama_barang_'.$i].'</td>
	<td>'.$_POST['harga_barang_'.$i].'</td>
	</tr>';
}
?>