<?php
////////////////////////////////
// PROGRAM SKRIPSI MHT
// Refyandra
// gangguan.form.php 
// edit 6 juni 2016
// usercase CUSTOMER SERVICE
/////////////////////////////////
require("../../../../_db.php"); 

 $kd_mhs = 'MT'.sprintf("%05s",$_POST['id']);

// query untuk menampilkan berdasarkan kd
$data = mysql_fetch_array(mysql_query("SELECT tb_gangguan.*, tb_pelanggan.nama, tb_pelanggan.alamat FROM `tb_gangguan` JOIN tb_pelanggan WHERE tb_gangguan.id_pelanggan=tb_pelanggan.id_pelanggan AND id_gangguan='$kd_mhs'"));
// jika kd > 0 / form ubah data
if(substr($kd_mhs, 2, 5) != 0) { 
//echo'<script>alert("EDIT");</script>';	
	$id_gangguan = $data['id_gangguan'];
	$pelapor = $data['pelapor'];
	$pelanggan = $data['nama'];
	$id_pelanggan = $data['id_pelanggan'];
	$tgl_gangguan = $data['tgl_gangguan'];
	$tgl_pelaporan = $data['tgl_pelaporan'];
	$ket = $data['keterangan'];
	$alamat = $data['alamat'];
	$kd_status = $data['status_gangguan'];
	
	if($data['status_gangguan']==1) {
		$status = "Aktif";
	} else {
		$status = "Tidak Aktif";
	}

//form tambah data
} else {
	//echo'<script>alert("buat baru");</script>';	
//no faktur auto
   $qkdf = mysql_query("SELECT MAX(id_gangguan) as kodex FROM tb_gangguan");
   $data=mysql_fetch_array($qkdf);
   $kodef = $data['kodex'];
   $nourut = substr($kodef, 2, 5);
   //$nourut++;
   if ($nourut==0){
    $nourut=1;
    $notr =sprintf("%05s", $nourut) ; 
   }else{
    $nourut++;
    $notr = sprintf("%05s", $nourut) ; 
   }
  //end no faktur auto 
	$id_gangguan = "MT".$notr;
	$pelapor ="";
	$pelanggan ="";
	$tgl_gangguan = date('Y-m-d H:i:s');
	$tgl_pelaporan = date('Y-m-d H:i:s');
	$ket = "";
	$alamat = "";
	$status = "";
	$id_pelanggan="";
}

?>
<form class="form-horizontal" id="form-gangguan">
<input type="text" id="kd" class="form-control" name="kd" value="<?php echo $kd_mhs ?>" style="display: none;">
<input type="text" id="status" class="form-control" name="status" value="0" style="display: none;">	
	<div class="form-group">
		<label for="id" class="col-sm-2 control-label">Kode</label>
			<div class=" col-sm-10 controls">
			<input type="text" id="kode" class="form-control" name="kode" readonly="" value="<?php echo $id_gangguan ?>">
		</div>
	</div>
	<div class="form-group">
		<label for="id" class="col-sm-2 control-label">Pelalpor</label>
			<div class=" col-sm-10 controls">
			<input type="text" id="pelapor" class="form-control" name="pelapor" value="<?php echo $pelapor ?>">
		</div>
	</div>
	<div class="form-group">
		<label for="id" class="col-sm-2 control-label">pelanggan</label>
			<div class=" col-sm-10 controls">
			<select class="form-control" name="pelanggan">
				<?php 
				echo '<option value="'.$id_pelanggan.'">'.$pelanggan.'</option>';
				$query = mysql_query("SELECT * FROM tb_pelanggan");
				while($data2 = mysql_fetch_array($query)) {
					$nama = $data2['nama']."] ";
					echo "<option value=".$data2['id_pelanggan'].">".$data2['id_pelanggan']." [".$nama." ".$data2['alamat']."</option>";
				}
				?>
			</select>
		</div>
	</div>
	<div class="form-group">
		<label for="id" class="col-sm-2 control-label">Tgl Gangguan</label>
			<div class=" col-sm-10 controls">
			<input type="text" id="tgl_gangguan" class="form-control" name="tgl_gangguan" data-inputmask="'alias': 'dd/mm/yyyy'" data-mask="" value="<?php echo $tgl_gangguan ?>">
		</div>
	</div>
	<div class="form-group">
		<label for="id" class="col-sm-2 control-label">Tgl Pelaporan</label>
			<div class=" col-sm-10 controls">
			<input type="text" id="tgl_pelaporan" class="form-control" name="tgl_pelaporan" data-inputmask="'alias': 'dd/mm/yyyy'" data-mask="" value="<?php echo $tgl_pelaporan ?>">
		</div>
	</div>
	<div class="form-group">
		<label for="id" class="col-sm-2 control-label">Keterangan</label>
			<div class=" col-sm-10 controls">
			<textarea id="keterangan" class="form-control" name="keterangan"><?php echo $ket ?></textarea>
		</div>
	</div>
	<!--div class="form-group">
		<label for="id" class="col-sm-2 control-label">Status</label>
			<div class=" col-sm-10 controls">
			<select class="form-control" name="status" readonly>
				<?php 
				// tampilkan untuk form ubah mahasiswa
				if($kd_mhs > 0) { ?>
					<option value="<?php echo $kd_status ?>"><?php echo $status ?></option>
				<?php } ?>
				<option value="0">Aktif</option>
				<option value="0">Tidak Aktif</option>
			</select>
		</div>
	</div-->
</form>
<?php
//include('../../../../_script.php');
?> 
<script type="text/javascript">
	$("#datemask2").inputmask("mm/dd/yyyy", {"placeholder": "mm/dd/yyyy"});
</script>
<script type="text/javascript" src="assets/plugins/select2/select2.full.min.js"></script>  
