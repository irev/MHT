<?php
////////////////////////////////
// PROGRAM SKRIPSI MHT
// Refyandra
// gangguan.form.done.php 
// edit 10 Agust 2016
// usercase Teknsi 
/////////////////////////////////
require("../../../../_db.php"); 
session_start();
 $kd_mhs = 'MT'.sprintf("%05s",$_POST['id']);

// query untuk menampilkan berdasarkan kd
//$data = mysql_fetch_array(mysql_query("SELECT tb_gangguan.*, tb_pelanggan.nama, tb_pelanggan.alamat FROM `tb_gangguan` JOIN tb_pelanggan WHERE tb_gangguan.id_pelanggan=tb_pelanggan.id_pelanggan AND id_gangguan='$kd_mhs'"));
$data = mysql_fetch_array(mysql_query("SELECT * FROM `v_perbaikan` WHERE id_gangguan='$kd_mhs'"));
// jika kd > 0 / form ubah data
if(substr($kd_mhs, 2, 5) == 0) { 
//echo'<script>alert("EDIT");</script>';	
	$id_gangguan   = $data['id_gangguan'];
	$pelapor       = $data['pelapor'];
	$pelanggan     = $data['nama'];
	$hp     = $data['hp'];
	$id_pelanggan  = $data['id_pelanggan'];
	$tgl_gangguan  = $data['tgl_gangguan'];
	$tgl_pelaporan = $data['tgl_pelaporan'];
	$ket           = $data['keterangan'];
	$alamat        = $data['alamat'];
	$kd_status     = $data['status_gangguan'];
	
	if($data['status_gangguan']==1) {
		$status = "Aktif";
	} else {
		$status = "Tidak Aktif";
	}

//form tambah data
} else {
	//echo'<script>alert("buat baru");</script>';	
//no faktur auto
   $qkdf = mysql_query("SELECT MAX(id_perbaikan) as kodex FROM tb_data_perbaikan");
   $data2=mysql_fetch_array($qkdf);
   $kodef = $data2['kodex'];
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
	$id_perbaikan  = "DN".$notr;
	$id_surat      = $data['id_surat'];
	$id_gangguan   = $data['id_gangguan'];
	$pelapor       = $data['pelapor'];
	$pelanggan     = $data['nama'];
	$hp    		   = $data['hp'];
	$tgl_gangguan  = $data['tgl_gangguan'];
	$tgl_pelaporan = $data['tgl_pelaporan'];
	$tgl_selesai	= date('Y-m-d H:i:s');
	$ket           = "";
	$alamat        = $data['alamat'];
	$status        = "";
	$id_pelanggan  = "";
}

?>
<form class="form-horizontal" id="form-gangguan">
<input type="text" id="kd" class="form-control" name="kd" value="<?php echo $kd_mhs ?>" style="display: none;">
<input type="text" id="status" class="form-control" name="status" value="0" style="display: none;">	
	<div class="form-group">
		<label for="id" class="col-sm-2 control-label">Teknisi</label>
		<div class=" col-sm-10 controls">
			<h4><?php echo  $_SESSION['id_karyawan']." - ".$_SESSION['login_name']; ?></h4>
			</div>
	</div>
	<hr>
	<!--
	<div class="form-group">
		<label for="kodeg" class="col-sm-2 control-label">Kode</label>
		<div class=" controls">
			<label for="id"    class="control-label"> ID Perbaikan: <font color="black"><?php echo $id_perbaikan;?></font></label>
			<label for="kodes" class="control-label"> | ID Surat:     <font color="black"><?php echo $id_surat;?></font></label>
			<label for="kodeg" class="control-label"> | ID Gangguan:  <font color="black"><?php echo $id_gangguan;?></font></label>
		</div>
	</div>
	//-->
		<div class="form-group">
		<label for="kodeg" class="col-sm-1 control-label"></label>
		<div class="col-sm-3 invoice-col">
              <strong>Informasi Pelanggan</strong>
              <address>
              <table>
              	<tr>
              		<td width="100">Nama</td>
              		<td width="100">: <font color="black"><?php echo $pelanggan;?></font></td>
              	</tr>
				<tr>
              		<td>Kontak</td>
              		<td>: <font color="black"><?php echo $hp;?></font></td>
              	</tr>
              					<tr>
              		<td>alamat</td>
              		<td>: <font color="black"><?php echo $alamat;?></font></td>
              	</tr>
              	<tr>
              		<td>Pelapor</td>
              		<td>: <font color="black"><?php echo $pelapor;?></font></td>
              	</tr>              	
              </table>  
              </address>
        </div>
        <div class="col-sm-3 invoice-col">
              <strong>Kode Perbaikan</strong>
              <address>
              <table>
              	<tr>
              		<td width="100">ID Perbaikan</td>
              		<td width="100">: <font color="black"><?php echo $id_perbaikan;?></font></td>
              	</tr>
              	<tr>
              		<td>ID Surat</td>
              		<td>: <font color="black"><?php echo $id_surat;?></font></td>
              	</tr>
				<tr>
              		<td>ID Gangguan</td>
              		<td>: <font color="black"><?php echo $id_gangguan;?></font></td>
              	</tr>              	
              </table>
            <!--
                <label for="id"    class="control-label"> ID Perbaikan: <font color="black"><?php echo $id_perbaikan;?></font></label><br>
				<label for="kodes" class="control-label"> ID Surat:     <font color="black"><?php echo $id_surat;?></font></label><br>
				<label for="kodeg" class="control-label"> ID Gangguan:  <font color="black"><?php echo $id_gangguan;?></font></label>
			//-->
              </address>
        </div>
        <div class="col-sm-4 invoice-col">
              <strong>Waktu</strong>
              <address>
              <table>
              	<tr>
              		<td width="100">Tgl Pelaporan</td>
              		<td width="100">: <font color="black"><?php echo tgl_indonesia($tgl_pelaporan); ?></font></td>
              	</tr>
				<tr>
              		<td>Tgl Gangguan</td>
              		<td>: <font color="black"><?php echo selisihwaktu($tgl_gangguan);?></font></td>
              	</tr>
              	<tr>
              		<td>Tgl Selesai</td>
              		<td>: <font color="black"><?php echo tgl_indonesia(date('Y-m-d'));?></font></td>
              	</tr>              	
              </table>  
              </address>
        </div>
        </div>
        <hr>
		<div class=" col-sm-12 controls">
		<!-- INPUT kode-->
		id perbaikan
		id surt
		keterangan
		tgl selesai
		<input type = "text" id="id_perbaikan" class="form-control" name="id_perbaikan" readonly=""  value="<?php echo $id_perbaikan; ?>"  style="display: none;">
		<input type = "text" id="id_surat" 	   class="form-control" name="id_surat" 	readonly=""  value="<?php echo $id_surat;     ?>"  style="display: none;">
		<input type = "text" id="id_gangguan"  class="form-control" name="id_gangguan"  readonly=""  value="<?php echo $id_gangguan;  ?>"  style="display: none;">
			<!--INPUT Waktu-->
		<input type = "text" id="tgl_pelaporan" class="form-control" name="tgl_pelaporan" data-inputmask="'alias': 'dd/mm/yyyy'" data-mask="" value="<?php echo $tgl_pelaporan ?>" readonly style="display: none;">
		<input type = "text" id="tgl_gangguan"  class="form-control" name="tgl_gangguan"  data-inputmask="'alias': 'dd/mm/yyyy'" data-mask="" value="<?php echo $tgl_gangguan  ?>" readonly style="display: none;">
		<input type = "text" id="tgl_selesai"   class="form-control" name="tgl_selesai"   data-inputmask="'alias': 'dd/mm/yyyy'" data-mask="" value="<?php echo $tgl_selesai   ?>" readonly style="display: none;">
		<!--INPUT TEST Kode-->
		<input       type = "text" id="kodes"         class="form-control" name="kode"   readonly=""  value="<?php echo 'id_perbaikan= '.$id_perbaikan ?>"  style="display: block;">
		<input       type = "text" id="kodes"         class="form-control" 			name="kodes" readonly=""   value="<?php  echo 'id_surat= '.$id_surat    ?>"  style="display: block;">
		<input       type = "text" id="kodeg"         class="form-control" 			name="kodeg" readonly=""   value="<?php  echo 'id_gangguan= '.$id_gangguan ?>"  style="display: block;">
		<!--INPUT TEST Waktu-->
		<input 		type = "text" id="tgl_pelaporan" class="form-control" name="tgl_pelaporan" data-inputmask="'alias': 'dd/mm/yyyy'" data-mask="" value="<?php echo 'tgl_pelaporan= '. $tgl_pelaporan ?>" readonly style="display: block;">
		<input 		type = "text" id="tgl_gangguan"  class="form-control" name="tgl_gangguan"  data-inputmask="'alias': 'dd/mm/yyyy'" data-mask="" value="<?php echo 'tgl_gangguan= '.$tgl_gangguan  ?>" readonly style="display: block;">
		<input 		type = "text" id="tgl_selesai"   class="form-control" name="tgl_selesai"   data-inputmask="'alias': 'dd/mm/yyyy'" data-mask="" value="<?php echo 'tgl_selesai= '.$tgl_selesai   ?>" readonly style="display: block;">
		
		</div>
	</div>
	<div class="form-group" hidden="true">
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

			<div class=" col-sm-3 controls">
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
