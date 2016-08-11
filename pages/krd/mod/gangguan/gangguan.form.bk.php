<?php
require("../../../../_db.php"); 
// buat koneksi ke database mysql

//no faktur auto
   $qkdf = mysql_query("SELECT MAX(id_surat) as kodex FROM tb_surat_jalan_teknisi");
   $datas=mysql_fetch_array($qkdf);
   $kodef = $datas['kodex'];
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
// tangkap variabel kd_gang
$kd_gang = 'MT'.sprintf("%05s",$_POST['id']);

// query untuk menampilkan mahasiswa berdasarkan kd_gang
$data = mysql_fetch_array(mysql_query("SELECT tb_gangguan.*, tb_pelanggan.* FROM `tb_gangguan` JOIN tb_pelanggan WHERE tb_gangguan.id_pelanggan=tb_pelanggan.id_pelanggan AND id_gangguan='$kd_gang'"));
//echo "SELECT tb_gangguan.*, tb_pelanggan.nama, tb_pelanggan.alamat FROM `tb_gangguan` JOIN tb_pelanggan WHERE tb_gangguan.id_pelanggan=tb_pelanggan.id_pelanggan AND id_gangguan='$kd_gang'";
// jika kd_gang > 0 / form ubah data
$q_id_surat = mysql_fetch_row(mysql_query("SELECT * FROM `tb_surat_jalan_teknisi` WHERE id_gangguan='$kd_gang'"));
if($q_id_surat !=0) { 
//if(substr($kd_gang, 2, 5) != 0) { 
echo'<script>alert("EDIT");</script>';	
	$id_gangguan = $data['id_gangguan'];
	$pelapor = $data['pelapor'];
	$pelanggan = $data['nama'];
	$id_pelanggan = $data['id_pelanggan'];
	$tgl_gangguan = $data['tgl_gangguan'];
	$tgl_pelaporan = $data['tgl_pelaporan'];
	$ket = $data['keterangan'];
	$alamat = $data['alamat'];
	$kd_status = $data['status'];
	$tgl_langganan = $data['tgl_langganan'];
	$telepon = $data['hp'];
	$id_surat = "SJ".$notr;
	if($data['status']==1) {
		$status = "Aktif";
	} else {
		$status = "Tidak Aktif";
	}

//form tambah data
} else {
	echo'<script>alert("buat baru");</script>';	

	$id_gangguan = $data['id_gangguan'];
	$pelapor = $data['pelapor'];
	$pelanggan = $data['nama'];
	$id_pelanggan = $data['id_pelanggan'];
	$tgl_gangguan = $data['tgl_gangguan'];
	$tgl_pelaporan = $data['tgl_pelaporan'];
	$ket = $data['keterangan'];
	$alamat = $data['alamat'];
	$kd_status = $data['status'];
	$tgl_langganan = $data['tgl_langganan'];
	$telepon = $data['hp'];
	$id_surat = "SJ".$notr;
	if($data['status']==1) {
		$status = "Aktif";
	} else {
		$status = "Tidak Aktif";
	}





	$id_surat = "SJ".$notr;
	$tgl_gangguan = date('Y-m-d');
	$tgl_pelaporan = "";

}

?>
<div class="box box-primary">
                <div class="box-header with-border">
                  <h3 class="box-title">Ditel Gangguan</h3>
                </div><!-- /.box-header -->
                <div class="box-body">
<div class="row invoice-info" style="color: black">
            <div class="col-sm-4 invoice-col">
              <i class="fa fa-user margin-r-5"></i>Pelanggan :
              <address>
                <strong><?php echo $pelanggan ?></strong><br>
                 <b><?php echo $alamat ?></b><br>
                Telepon :  <b><?php echo $telepon ?></b><br>
                Berlangganan : <b><?php echo $tgl_langganan ?></b><br>
              </address>
            </div><!-- /.col -->
            <div class="col-sm-4 invoice-col">
              <i class="fa fa-file-text margin-r-5"></i>Status Berlangganan :
              <address>
               Status : <span class="label label-success"><strong>Aktif</strong></span><br> 
               Type Paket :  <b></b><br>
               Berlangganan Sejak : <b><?php echo $tgl_langganan ?></b><br>
              </address>
            </div><!-- /.col -->
            <div class="col-sm-4 invoice-col">
               <i class="fa fa-info margin-r-5"></i><b>Request Perbaikan #<?php echo $id_gangguan ?></b><br>
              <br>
              Pelapor : <b><?php echo $pelapor ?></b><br>
              Telepon : <b><?php echo $telepon ?></b><br>
              Tanggal pelaporan : <b><?php echo $tgl_pelaporan ?></b><br>
              Tanggal Gangguan  : <b><?php echo $tgl_gangguan ?></b><br>
            </div><!-- /.col -->
            <div class="col-sm-12 invoice-col">
            <hr>
            	<b>Keterangan Pelaporan :<b> <br>
            	<img class="direct-chat-img" src="assets/img/pelapor.png" alt="message user image">
            	<div class="direct-chat-text">
                <?php echo $ket ?>
              	</div>
            </hr>
            </div>
          </div>
                    <span class="label label-danger">UI Design</span>
                    <span class="label label-success">Coding</span>
                    <span class="label label-info">Javascript</span>
                    <span class="label label-warning">PHP</span>
                    <span class="label label-primary">Node.js</span>
                  </p>


                </div><!-- /.box-body -->
              </div>

<form class="form-horizontal" id="form-mahasiswa">

<input type="text" id="kd" class="form-control" name="kd" value="<?php echo $kd_gang ?>" style="display: none;">
<input type="text" id="kd" class="form-control" name="kd" value="<?php echo $id_surat ?>">
<input type="text" id="status" class="form-control" name="status" value="1" style="display: none;">	
 <hr>	
<!-- form surat dari krd-->
	<div class="form-group">
		<label for="id" class="col-sm-2 control-label">Kode Gangguan</label>
			<div class=" col-sm-10 controls">
			<input type="text" id="kode" class="form-control" name="kode" readonly="" value="<?php echo $id_gangguan ?>">
		</div>
	</div>
	<div class="form-group">
		<label for="id" class="col-sm-2 control-label">Pilih Teknisi</label>
			<div class=" col-sm-10 controls">
			<select class="form-control" name="teknisi">
				<?php 
				// tampilkan untuk form ubah mahasiswa
				if($kd_gang > 0) { ?>
					<option value="<?php echo $id_pelanggan ?>">Pilih Peknisi</option>
				<?php } 
				$query = mysql_query("SELECT * FROM `tb_karyawan`");
				while($data2 = mysql_fetch_array($query)) {
					$namateknisi = $data2['nama'];
					echo "<option value=".$data2['id_karyawan'].">".$namateknisi."</option>";
				}
				?>
			</select>
		</div>
	</div>
<!-- /.form surat dari krd-->
	<div class="form-group">
		<label for="id" class="col-sm-2 control-label">Tgl Gangguan</label>
			<div class=" col-sm-10 controls">
			<input type="text" id="tgl_gangguan" class="form-control" name="tgl_gangguan" value="<?php echo date('Y-m-d') ?>">
		</div>
	</div>
 <hr>



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
				// tampilkan untuk form ubah mahasiswa
				if($kd_gang > 0) { ?>
					<option value="<?php echo $id_pelanggan ?>"><?php echo $pelanggan ?></option>
				<?php } 
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
			<input type="text" id="tgl_gangguan" class="form-control" name="tgl_gangguan" value="<?php echo $tgl_gangguan ?>">
		</div>
	</div>
	<div class="form-group">
		<label for="id" class="col-sm-2 control-label">Tgl Pelaporan</label>
			<div class=" col-sm-10 controls">
			<input type="text" id="tgl_pelaporan" class="form-control" name="tgl_pelaporan" value="<?php echo $tgl_pelaporan ?>">
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
				if($kd_gang > 0) { ?>
					<option value="<?php echo $kd_status ?>"><?php echo $status ?></option>
				<?php } ?>
				<option value="0">Aktif</option>
				<option value="0">Tidak Aktif</option>
			</select>
		</div>
	</div-->
</form>

<?php
// tutup koneksi ke database mysql
//koneksi_tutup();
?>
