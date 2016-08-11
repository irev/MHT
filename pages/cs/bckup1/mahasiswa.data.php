<?php
// panggil berkas koneksi.php
require 'koneksi.php';

// buat koneksi ke database mysql
koneksi_buka();

?>
<div class="box box-primary">
                <div class="box-header with-border">
                  <h3 class="box-title">DAFTAR GANGGUAN</h3>
                  <div class="box-tools pull-right">
                    <div class="has-feedback">
                      <input type="text" class="form-control input-sm" placeholder="Search Mail">
                      <span class="glyphicon glyphicon-search form-control-feedback"></span>
                    </div>
                  </div><!-- /.box-tools -->
                </div><!-- /.box-header -->
                <div class="box-body no-padding">
                  <div class="mailbox-controls">
                    <!-- Check all button -->
                    <button class="btn btn-default btn-sm checkbox-toggle" onclick="add_gangguan()"><i class="glyphicon glyphicon-plus"></i></button>
                    <div class="btn-group">
                      <button class="btn btn-default btn-sm tambah" ><i class="fa fa-trash-o"></i></button>
                      <button class="btn btn-default btn-sm"><i class="fa fa-reply"></i></button>
                      <button class="btn btn-default btn-sm"><i class="fa fa-share"></i></button>
                    </div><!-- /.btn-group -->
                    <button class="btn btn-default btn-sm" onclick="load_list_gangguan()"><i class="fa fa-refresh"></i></button>
                    <div class="pull-right">
                      1-50/200
                      <div class="btn-group">
                        <button class="btn btn-default btn-sm"><i class="fa fa-chevron-left"></i></button>
                        <button class="btn btn-default btn-sm"><i class="fa fa-chevron-right"></i></button>
                      </div><!-- /.btn-group -->
                    </div><!-- /.pull-right -->
                  </div>
                  <div class="table-responsive mailbox-messages">
                    <table class="table table-hover table-striped">
                    <thead>
                      <tr>
                        <th>No</th>
                        <th>status</th>
                        <th>Kode</th>
                        <th>Pelapor</th>
                        <th>Keterangan Gangguan</th>
                        <th>Awal Gangguan</th>
                        <th>Waktu</th>
                        <th>#</th>
                      </tr>
                    </thead>
                      <tbody>

<tbody>
	<?php 
		$i = 1;
		$query = mysql_query("SELECT * FROM mahasiswa");
		
		// tampilkan data mahasiswa selama masih ada
		while($data = mysql_fetch_array($query)) {
			if($data['status']==1) {
				$status = "Aktif";
			} else {
				$status = "Tidak Aktif";
			}
	?>
	<tr>
		<td><?php echo $i ?></td>
		<td><?php echo $data['nim'] ?></td>
		<td><?php echo $data['nim'] ?></td>
		<td><?php echo $data['nama'] ?></td>
		<td><?php echo $data['alamat'] ?></td>
		<td><?php echo $data['kelas'] ?></td>
		<td><?php echo $status ?></td>
		<td>
			<a href="#dialog-mahasiswa" onclick="getform.ubah(<?php echo $data['kd_mhs'] ?>)"  id="<?php echo $data['kd_mhs'] ?>" class="ubah" data-toggle="modal">
				<i class="fa fa-pencil"></i>
			</a>
			<a href="#" id="<?php echo $data['kd_mhs'] ?>" onclick="getform.hapus(<?php echo $data['kd_mhs'] ?>)" class="hapus">
				<i class="fa fa-trash"></i>
			</a>
		</td>
	</tr>
	<?php
		$i++;
		}
	?>
 </tbody>
                    </table><!-- /.table -->
                  </div><!-- /.mail-box-messages -->
                </div><!-- /.box-body -->
                <div class="box-footer no-padding">
                  <div class="mailbox-controls">
                    <!-- Check all button -->
                    <button class="btn btn-default btn-sm checkbox-toggle"><i class="fa fa-square-o"></i></button>
                    <div class="btn-group">
                      <button class="btn btn-default btn-sm"><i class="fa fa-trash-o"></i></button>
                      <button class="btn btn-default btn-sm"><i class="fa fa-reply"></i></button>
                      <button class="btn btn-default btn-sm"><i class="fa fa-share"></i></button>
                    </div><!-- /.btn-group -->
                    <button class="btn btn-default btn-sm"><i class="fa fa-refresh"></i></button>
                    <div class="pull-right">
                      1-50/200
                      <div class="btn-group">
                        <button class="btn btn-default btn-sm"><i class="fa fa-chevron-left"></i></button>
                        <button class="btn btn-default btn-sm"><i class="fa fa-chevron-right"></i></button>
                      </div><!-- /.btn-group -->
                    </div><!-- /.pull-right -->
                  </div>
                </div>
              </div>

<?php 
// tutup koneksi ke database mysql
koneksi_tutup(); 
?>

