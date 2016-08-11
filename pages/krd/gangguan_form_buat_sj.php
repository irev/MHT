<?php
////////////////////////////////
// PROGRAM SKRIPSI MHT
// Refyandra
// gangguan.form.php 
// edit 6 juni 2016
// usercase KOORDINATOR
/////////////////////////////////
require("../../_db.php"); 

// Penomoran automatis 
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
// $kd_s = sprintf("%05s",$_POST['ids']);


// query untuk menampilkan mahasiswa berdasarkan kd_gang
$data = mysql_fetch_array(mysql_query("SELECT tb_gangguan.*, tb_pelanggan.* FROM `tb_gangguan` JOIN tb_pelanggan WHERE tb_gangguan.id_pelanggan=tb_pelanggan.id_pelanggan AND id_gangguan='$kd_gang'"));
// jika kd_gang > 0 / form ubah data
$q_id_surat = mysql_fetch_array(mysql_query("SELECT * FROM `tb_surat_jalan_teknisi` WHERE id_gangguan='$kd_gang'"));
$row_id_surat = mysql_fetch_row(mysql_query("SELECT * FROM `tb_surat_jalan_teknisi` WHERE id_gangguan='$kd_gang'"));
if($row_id_surat !=0) { 
//if(substr($kd_gang, 2, 5) != 0) { 
echo'<script>$("#myModalLabel").html("Edit Surat Jalan");</script>';	
	$id_gangguan = $data['id_gangguan'];
	$pelapor = $data['pelapor'];
	$pelanggan = $data['nama'];
	$id_pelanggan = $data['id_pelanggan'];
	$tgl_gangguan = $data['tgl_gangguan'];
	$tgl_pelaporan = $data['tgl_pelaporan'];
	$ket = $data['keterangan'];
	$alamat = $data['alamat'];
	$kd_status = $data['status_gangguan'];
	$tgl_langganan = $data['tgl_langganan'];
	$telepon = $data['hp'];
	$id_surat = $q_id_surat['id_surat'];
	if($data['status_gangguan']==1) {
		$status = "Aktif";
	} else {
		$status = "Tidak Aktif";
	}
  $status_gangguan =$data['status_gangguan'];
//form tambah data
} else {
	$id_gangguan = $data['id_gangguan'];
	$pelapor = $data['pelapor'];
	$pelanggan = $data['nama'];
	$id_pelanggan = $data['id_pelanggan'];
	$tgl_gangguan = $data['tgl_gangguan'];
	$tgl_pelaporan = $data['tgl_pelaporan'];
	$ket = $data['keterangan'];
	$alamat = $data['alamat'];
	$kd_status = $data['status_gangguan'];
	$tgl_langganan = $data['tgl_langganan'];
	$telepon = $data['hp'];
	$id_surat = "SJ".$notr;
	if($data['status_gangguan']==1) {
		$status = "Aktif";
	} else {
		$status = "Tidak Aktif";
	}
    $status_gangguan =$data['status_gangguan'];
	$tgl_gangguan = date('Y-m-d');
	$tgl_pelaporan = "";

}

?>

<script type="text/javascript">
	function pilihtek(){
      var tek = $('#teknisi').val();
      var teks = $('#kode').val();
      // document.write(tek);
      console.log(tek + teks);
	} 
</script>
<p>Form ini digunakan untuk penunjukan petugas/teknisi yang akan melakukan perbaikan kelapangan</p>

<form class="form-horizontal" id="form-mahasiswa">
<input type="text" id="kd" class="form-control" name="kd" value="<?php echo $id_gangguan ?>" style="display: none;">
<input type="text" id="kdsurat" class="form-control" name="kdsurat" value="<?php echo $id_surat ?>" style="display: none;">
<input type="text" id="status" class="form-control" name="status" value="3" style="display: none;">	
<input type="text" id="status_gangguan" class="form-control" name="status_gangguan" value="<?php echo $status_gangguan ?>" style="display: none;">	

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
			<select id="teknisi"  class="form-control" name="teknisi" onclick="pilihtek()">
			<option value="">.:: PILIH TEKNISI ::.</option>
<?php 
                $querys = mysql_query("SELECT * FROM `tb_karyawan` WHERE `login_hash`='tek'");
				while($data3 = mysql_fetch_array($querys)) {
					$namateknisi = $data3['nama'];
					$idteknisi = $data3['id_karyawan'];
					echo '<option value="'.$idteknisi.'">'.$idteknisi.' - '.$namateknisi.'</option>';
				}
?>
			</select>
		</div>
	</div>
<!-- /.form surat dari krd-->
	<div class="form-group">
		<label for="id" class="col-sm-2 control-label">Tgl Gangguan</label>
			<div class=" col-sm-10 controls">
			<input type="text" id="tgl_surat" class="form-control" name="tgl_surat" value="<?php echo date('Y-m-d') ?>">
		</div>
	</div>
 <hr>
</form>




<div class="box box-primary">
                <div class="box-header with-border">
                  <h3 class="box-title">Ditel Gangguan</h3>
                </div><!-- /.box-header -->
                <div class="box-body">
<div class="row invoice-info" style="color: black">
            <div class="col-sm-4 invoice-col">
              <i class="fa fa-user margin-r-5"></i>Pelanggan :
              <address>
                <strong><?php echo $pelanggan; ?></strong><br>
                 <b><?php echo $alamat; ?></b><br>
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


