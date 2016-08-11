<?php
// panggil file koneksi db
require("../../../../_db.php");  
// tangkap variabel kd_data
echo $kd_data = $_POST['id'];
// query untuk menampilkan gangguan berdasarkan kd_data
$q=mysql_query("SELECT tb_gangguan.*, tb_pelanggan.nama, tb_pelanggan.alamat FROM `tb_gangguan` JOIN tb_pelanggan WHERE tb_gangguan.id_pelanggan=tb_pelanggan.id_pelanggan AND id_gangguan='$kd_data'");

$data = mysql_fetch_array($q);

// jika kd_data > 0 / form ubah data
if($kd_data !== 0) { 
	$id = $data['id_gangguan'];
	$pelapor = $data['pelapor'];
	$pelanggan = $data['id_pelanggan'];
	$nama = $data['nama'];
	$alamat = $data['alamat'];
	$tgl_pelaporan = $data['tgl_pelaporan'];
	$tgl_gangguan = $data['tgl_gangguan'];
	$ket = $data['keterangan'];

	if($data['status']==1) {
		$status = "Aktif";
	} else {
		$status = "Tidak Aktif";
	}

//form tambah data
}
else { 
	$id ="q";
	$pelapor ="s";
	$pelanggan ="";
	$tglp=date('Y-d-m');
	$tgl_pelaporan = $tglp;
	$tgl_gangguan ="";
	$ket = "";
	$status ="";
}

?>

<form class="form-horizontal" id="form-gangguan">
	 <div class="form-group">
		<label for="id" class="col-sm-2 control-label">ID</label>
		<div class=" col-sm-10 controls">
			<?php echo'<input type="text" id="id" class="form-control" name="id" value="th66'.$id.'" readonly>';?>
		</div>
	</div>
	 <div class="form-group">
		 <label for="pelapor" class="col-sm-2 control-label">pelapor</label>
		<div class=" col-sm-10 controls">
			<input type="text" id="pelapor" class="form-control" placeholder="Nama pelapor" name="pelapor" value="<?php echo $pelapor ?>">
		</div>
	</div>

  	<div class="form-group">
  		<label for="pelanggan" class="col-sm-2 control-label">Pelanggan</label>
  		<div class="col-sm-10 controls">
  		<select class="form-control select2" style="width: 100%" name="pelanggan" id="pelanggan" data-toggle="tooltip" data-placement="bottom" title="Pilih pelanggan terdaftar!" required>
  		<?php echo "<option value=".$pelanggan.">  ".$nama."   ".$alamat."</option>"; ?>  


	<?php
  		$no=0;   
  			$pel = mysql_query("SELECT * FROM `tb_pelanggan` ORDER BY `nama` DESC");
    		while($pelang = mysql_fetch_array($pel)){
    		$no++;
    		echo '<option class="col-sm-10" value="'.$pelang['id_pelanggan'].'" data-toggle="popover" data-trigger="hover" title="Nama Pelanggan Saat Mendaftar" data-content="'.$pelang['nama'].'">'. $pelang['nama'].' | ' .$pelang['alamat'].'</option>';
 			} 
	?>
		</select>
		</div>
	</div>


	<div class="form-group">
		 <label for="pelapor" class="col-sm-2 control-label">Tanggal Pelaporan</label>
		<div class=" col-sm-10 controls">
			<input type="text" name="tgl_pelapor" id="tgl_pelapor" class="form-control" placeholder="Nama Pelaporan" value="<?php echo $tgl_pelaporan ?>">
		</div>
	</div>
	<div class="form-group">
		 <label for="pelapor" class="col-sm-2 control-label">Tanggal gangguan</label>
		<div class=" col-sm-10 controls">
			<input type="text" id="tgl_gangguan" class="form-control" placeholder="Nama gangguan" name="tgl_gangguan" value="<?php echo $tgl_gangguan ?>">
		</div>
	</div>
	<div class="form-group">
		 <label for="pelapor" class="col-sm-2 control-label">Keterangan</label>
		<div class=" col-sm-10 controls">
			<textarea class="form-control" id="ket" name="ket"><?php echo $ket ?></textarea>
		</div> 
	</div>

	<div class="form-group">
		 <label for="status" class="col-sm-2 control-label">Status</label>
		<div class=" col-sm-10 controls">
			<select class="form-control" name="status">
				<?php 
				// tampilkan untuk form ubah gangguan
				if($kd_data > 0) { ?>
					<option value="<?php echo $kd_status ?>"><?php echo $status ?></option>
				<?php } ?>
				<option value="1">Aktif</option>
				<option value="0">Tidak Aktif</option>
			</select>
		</div>
	</div>
</form>

<?php
// tutup koneksi ke database mysql
//koneksi_tutup();
?>
