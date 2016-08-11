<?php
////////////////////////////////
// PROGRAM SKRIPSI MHT
// Refyandra
// gangguan.data.php 
// edit 6 juni 2016
// usercase KOORDINATOR
/////////////////////////////////
require("../../../../_db.php"); 


if(!isset($_SESSION['login_hash']) && $_SESSION['login_hash']!=='krd'){
  echo "<script>window.location='index.php'</script>";
}

?>
<div class="box box-primary">
                <div class="box-header with-border">
                  <h3 class="box-title">REQUEST PERBAIKAN GANGGUAN</h3>
                  <div class="box-tools pull-right">

                  </div><!-- /.box-tools -->
                </div><!-- /.box-header -->
                <div class="box-body">

                  <div class="table-responsive mailbox-messages">
                    <table  id="DataTableGangguan" class="table table-hover table-striped">
                    
                    <thead>
                      <tr>
                        <th>No</th>
                        <th>#</th>
                        <th>Kode</th>
                        <th style="width: 100px;">Pelapor</th>
                        <th style="width: 100px;">Keterangan Gangguan</th>
                        <th style="width: 100px;">Awal Gangguan</th>
                        <th>Waktu</th>
                        <th>Status</th>
                        <th style="width: 100px;">Aksi</th>
                      </tr>
                    </thead>
                   

<tbody>

	<?php
		$i = 1;
		$query = mysql_query("SELECT tb_gangguan.*, tb_pelanggan.nama FROM `tb_gangguan` JOIN tb_pelanggan WHERE tb_gangguan.id_pelanggan=tb_pelanggan.id_pelanggan AND  tb_gangguan.`status_gangguan`='0' ORDER BY `tb_gangguan`.`id_gangguan` DESC");
		
		// tampilkan data gangguan selama masih ada
		while($data = mysql_fetch_array($query)) {
      
      if($data['status_gangguan']==0) {
        $status = '<span class="label label-danger pull-right">REQUEST</span>';
        $status_icon = "<i class='fa fa-volume-up text-danger'></i>";
      }
      elseif($data['status_gangguan']==1) {
        $status = '<span class="label label-warning pull-right">PROCCESS</span>';
        $status_icon = "<i class='fa fa-star-o text-warning'></i>";
      }
      elseif($data['status']==2) {
        $status = '<span class="label label-success pull-right">DONE</span>';
        $status_icon = "<i class='fa fa-star text-success'></i>";
      }
      elseif($data['status_gangguan']==3) {
        $status = '<span class="label label-primary pull-right">PENDING</span>';
        $status_icon = "<i class='fa fa-star text-primary'></i>";
      } else {
        $status = "Tidak Aktif";
      }
      
	?>
	<tr>
		<td><?php echo $i ?></td>
		<td class="mailbox-star"><a href="#"><?php echo $status_icon ?></a></td>
		<td><?php echo $data['id_gangguan'] ?></td>
		<td ><?php echo $data['pelapor'] ?> </td>
		<td class="mailbox-subject"><b><?php echo $data['nama'] ?></b> - <?php echo  $data['keterangan']; ?></td>
		<td class="mailbox-date"><?php echo tgl_indonesia($data['tgl_pelaporan']); ?></td>
		<td class="mailbox-date"><?php echo selisihwaktu($data['tgl_gangguan']); ?></td>
		<td><?php echo $status ?></td>
		<td>
			<a href="#dialog-mahasiswa" onclick="getform.ubah(<?php echo substr($data['id_gangguan'],5) ?>,0)"  id="<?php echo $data['id_gangguan'] ?>" class="btn btn-danger btn-* ubah" data-toggle="modal" style="width: 100%;">
				<i class="fa fa-pencil"></i> Buat Surat
			</a>
			<!--a href="#" id="<?php echo $data['id_gangguan'] ?>" onclick="getform.hapus(<?php echo substr($data['id_gangguan'],5) ?>)" class="btn btn-default btn-sm hapus">
				<i class="fa fa-trash"></i>
			</a-->
		</td>
	</tr>
	<?php
		$i++;
		}
  if($i == 1){ 
   // echo "<tr><td colspan='9'><div align='center'> Belum Ada Data </div></td></tr>";
  }
  
	?>
 </tbody>         
                   
                    </table><!-- /.table --> 
                    </div><!-- /.mail-box-messages -->
                </div><!-- /.box-body -->
                <div class="box-footer no-padding">
                  <div class="mailbox-controls">
                  Gangguan
                  </div>
                </div>
              </div>


<script>
$(function () {
   $("#DataTableGangguan").DataTable();
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false
    });
  });
</script>