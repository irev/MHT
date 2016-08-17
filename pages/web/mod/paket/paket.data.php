<?php
//////////////////////////////
// PROGRAM SKRIPSI MHT
// Refyandra
// gangguan.data.php 
// edit 6 juni 2016
// usercase CUSTOMER SERVICE
///////////////////////////////
require("../../../../_db.php"); 
if(!isset($_SESSION)) 
    { 
        session_start(); 
    }else{} 
?>

                    <table id="DataTableGangguan" class="table table-hover table-striped">
                    <thead>
                      <tr>
                        <th style="max-width: 5px;">No</th>
                        <th>Kode</th>
                        <th>Pin Icon</th>
                        <th>Nama Paket</th>
                        <th>Bandwidth</th>
                        <th style="min-width: 100px;"></th>
                      </tr>
                    </thead>
<tbody>
	<?php 
		$i = 1;
		//$query = mysql_query("SELECT tb_gangguan.*, tb_pelanggan.nama FROM `tb_gangguan` JOIN tb_pelanggan WHERE tb_gangguan.id_pelanggan=tb_pelanggan.id_pelanggan AND  tb_gangguan.`status_gangguan`='0' ORDER BY `tb_gangguan`.`id_gangguan` DESC");
		$query = mysql_query("SELECT * FROM `tb_paket` ORDER BY `tb_paket`.`keterangan` ASC");
		// tampilkan data gangguan selama masih ada
  
		while($data = mysql_fetch_array($query)) {
      /*
      if($data['status_gangguan']==0) {
        $status = '<span class="label label-danger pull-right">REQUEST</span>';
        $status_icon = "<i class='fa fa-volume-up text-danger'></i>";
      }
      elseif($data['status_gangguan']==1) {
        $status = '<span class="label label-warning pull-right">PROCCESS</span>';
        $status_icon = "<i class='fa fa-star-o text-warning'></i>";
      }
      elseif($data['status_gangguan']==2) {
        $status = '<span class="label label-success pull-right">DONE</span>';
        $status_icon = "<i class='fa fa-star text-success'></i>";
      }
      elseif($data['status_gangguan']==3) {
        $status = '<span class="label label-primary pull-right">PENDING</span>';
        $status_icon = "<i class='fa fa-star text-primary'></i>";
      } else {
        $status = "Tidak Aktif";
      }
      */
  $ikon=$data['ikon'];
  $pin_icon = '<img src="assets/icon/'.$ikon.'" alt="Mountain View" style="width:28px;height:28px;">';
  
	?>
	<tr>
		<td><?php echo $i ?></td>
		<td><?php echo $data['id_paket'] ?></td>
    <td class="mailbox-star"><a href="#"><?php echo $pin_icon ?></a></td>
		<td ><strong><a href="#"><?php echo $data['paket'] ?></a></strong></td>
		<td class="mailbox-subject"><b><?php $kets=$data['keterangan']; echo  textSingkat($kets,70); ?></b></td>
		<td class="mailbox-attachment">
			<a href="#dialog-data" onclick="getform.ubah(<?php echo substr($data['id_paket'],3) ?>)"  id="<?php echo $data['id_paket'] ?>" class="btn btn-default btn-sm ubah" data-toggle="modal">
				<i class="fa fa-pencil"></i>
			</a>
			<a href="#<?php echo $data['paket'] ?>" id="<?php echo $data['id_paket'] ?>" onclick="getform.hapus(<?php echo substr($data['id_paket'],3) ?>)" class="btn btn-default btn-sm hapus">
				<i class="fa fa-trash"></i>
			</a>
		</td>
	</tr>
	<?php
		$i++;
		}
	?>
 </tbody>


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
