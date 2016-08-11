<?php
////////////////////////////////
// PROGRAM SKRIPSI MHT
// Refyandra
// web/mod/gangguan.surat.php 
// edit 6 juni 2016
// usercase CUSTOMER SERVICE
/////////////////////////////////
require("../../../../_db.php"); 
?>
<div class="box box-primary">
                <div class="box-header with-border">
                  <h3 class="box-title">Surat Jalan Teknisi</h3>
                  <div class="box-tools pull-right">
                   
                  </div><!-- /.box-tools -->
                </div><!-- /.box-header -->
                <div class="box-body">
                  <div class="table-responsive mailbox-messages">
                    <table id="DataTableGangguan" class="table table-hover table-striped">
                    <thead>
                      <tr>
                        <th>No</th>
                        <th></th>
                        <th>Kode</th>
                        <th style="width: 100px;">Teknisi</th>
                        <th style="width: 100px;">Tanggal</th>
                        <th>Pelapor</th>
                        <th style="width: 100px;">Pelanggan</th>
                        <th>Nomor Hp</th>
                        <th>Laporan</th>
                        <th>Status</th>
                        <th style="width: 150px;">Aksi</th>
                      </tr>
                    </thead>            
<tbody>
	<?php 
		$i = 1;
		$query = mysql_query("SELECT * FROM `tb_surat_jalan_teknisi` ORDER BY `tb_surat_jalan_teknisi`.`id_surat` DESC");
		
		// tampilkan data gangguan selama masih ada
		while($data = mysql_fetch_array($query)) {
      if($data['status']==0) {
        $status = '<span class="label label-danger pull-right">REQUEST</span>';
        $status_icon = "<i class='fa fa-volume-up text-danger'></i>";
      }
      elseif($data['status']==1) {
        $status = '<span class="label label-warning pull-right">PRINT</span>';
        $status_icon = "<i class='fa fa-star-o text-warning'></i>";
      }
      elseif($data['status']==2) {
        $status = '<span class="label label-success pull-right">DONE</span>';
        $status_icon = "<i class='fa fa-star text-success'></i>";
      }
      elseif($data['status']==3) {
        $status = '<span class="label label-primary pull-right">PENDING</span>';
        $status_icon = "<i class='fa fa-star text-primary'></i>";
      } else {
        $status = "Tidak Aktif";
      }
	?>
	<tr>
		<td><?php echo $i ?></td>
		<td class="mailbox-star">
    </td>
    <td><?php echo $data['id_surat'] ?></td>
    <td>
      <?php 
        $qkaryawan = mysql_query("SELECT * FROM `tb_karyawan` where id_karyawan='".$data['id_karyawan']."'");
        $karyawan = mysql_fetch_array($qkaryawan);
        echo $karyawan['nama']; 
      ?>
    </td>

		<td>
      <?php 
        $q2 = mysql_query("SELECT * FROM `tb_surat_jalan_teknisi` where id_gangguan='".$data['id_gangguan']."'");
        $dq2 = mysql_fetch_array($q2);
        echo tgl_indonesia($dq2['tgl_surat']); 
      ?>
    </td>
    <td>
      <?php 
        $q3 = mysql_query("SELECT * FROM `tb_gangguan` where id_gangguan='".$data['id_gangguan']."'");
        $dq3 = mysql_fetch_array($q3);
        echo $dq3['pelapor']; 
      ?>
    </td>
    <td>
      <?php 
        $q4 = mysql_query("SELECT tb_gangguan.id_gangguan, tb_pelanggan.nama, tb_pelanggan.alamat, tb_pelanggan.hp FROM `tb_gangguan` JOIN tb_pelanggan WHERE tb_gangguan.id_pelanggan=tb_pelanggan.id_pelanggan AND id_gangguan='".$data['id_gangguan']."'");
        $dq4 = mysql_fetch_array($q4);
        echo $dq4['nama']; 
      ?>
    </td>
		<td >
    <?php echo $dq4['hp'];  ?>
    </td>
		<td class="mailbox-date"><?php echo selisihwaktu($dq2['tgl_surat']); ?></td>
		<td><?php echo $status ?></td>
		<td class="pull-right">
    <?php 
    $idg= substr($data['id_gangguan'],5);
    $ids= substr($data['id_surat'],5);
    ?>
			<a href="#dialog-data" onclick="getform.print(<?php echo$idg ?>,<?php echo$ids ?>)"  id="<?php echo $data['id_surat'] ?>" class="btn btn-info btn-sm ubah" data-toggle="modal" style="width: 100%;">
				<i class="fa fa-print"></i> Print
			</a>
			<!--a href="#" id="<?php echo $data['id_surat'] ?>" onclick="getform.hapus(<?php echo substr($data['id_surat'],5) ?>)" class="btn btn-default btn-sm hapus">
				<i class="fa fa-trash"></i>
			</a-->
		</td>
	</tr>
	<?php
		$i++;
		}
  if($i == 1){ 
    echo "<tr><td colspan='9'><div align='center'> Belum Ada Data </div></td></tr>";
  }
	?>
 </tbody>
                    </table><!-- /.table -->
                  </div><!-- /.mail-box-messages -->
                </div><!-- /.box-body -->
               <div class="box-footer no-padding">
                  <div class="mailbox-controls">
                  Surat Jalan
                  </div>
                </div>
              </div>

