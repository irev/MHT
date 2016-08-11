<?php
// panggil berkas koneksi.php
require 'koneksi.php';

// buat koneksi ke database mysql
koneksi_buka();

?>

<table class="table table-condensed table-bordered table-hover" cellpadding="0" cellspacing="0">
<thead>
	<tr>
		<th style="width:20px">#</th>
		<th style="width:120px">NIM</th>
		<th style="width:200px">Nama</th>
		<th>Alamat</th>
		<th style="width:120px">Kelas</th>
		<th style="width:120px">Status</th>
		<th style="width:40px"></th>
	</tr>
</thead>
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
		<td><?php echo $data['nama'] ?></td>
		<td><?php echo $data['alamat'] ?></td>
		<td><?php echo $data['kelas'] ?></td>
		<td><?php echo $status ?></td>
		<td>
			<a href="#dialog-mahasiswa" id="<?php echo $data['kd_mhs'] ?>" class="ubah" data-toggle="modal">
				<i class="icon-pencil"></i>
			</a>
			<a href="#" id="<?php echo $data['kd_mhs'] ?>" class="hapus">
				<i class="icon-trash"></i>
			</a>
		</td>
	</tr>
	<?php
		$i++;
		}
	?>
</tbody>
</table>

<?php 
// tutup koneksi ke database mysql
koneksi_tutup(); 
?>

