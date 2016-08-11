<?php
//////////////////////////////
// PROGRAM SKRIPSI MHT
// Refyandra
// pelanggan.data.php 
// edit 6 juni 2016
// usercase CUSTOMER SERVICE
///////////////////////////////
require("../../../../_db.php"); 
?>
<div class="box box-primary">
                <div class="box-header with-border">
                  <h3 class="box-title">Data Pelangan ISP</h3>
                  <div class="box-tools pull-right">
                    
                  </div><!-- /.box-tools -->
                </div><!-- /.box-header -->
                <div class="box-body no-padding">
                  <div class="table-responsive mailbox-messages">
                    <table id="DataTablepelanggan" class="table table-hover table-striped">
                    <thead>
                      <tr>
                        <th>No</th>
                        <th></th>
                        <th>Kode</th>
                        <th>Nama</th>
                        <th>Nomor HP</th>
                        <th style="width: 300px;">Alamat</th>
                        <th style="width: 100px;">Paket</th>
                        <th style="width: 100px;">Perangkat</th>
                        <th>Awal pelanggan</th>
                        <th>Lama Berlangganan</th>
                        <th>Status</th>
                        <th style="width: 100px;">#</th>
                      </tr>
                    </thead>
<tbody>
	<?php 
		$i = 1;
		$query = mysql_query("SELECT tb_pelanggan.*, tb_paket.paket, tb_paket.keterangan, tb_perangkat.merek, tb_perangkat.mac_address, tb_perangkat.status as status_peragkat  FROM `tb_pelanggan` 
                          JOIN tb_paket 
                          ON tb_pelanggan.id_paket=tb_paket.id_paket
                          JOIN tb_perangkat
                          ON  tb_pelanggan.id_perangkat=tb_perangkat.id_perangkat
                          ORDER BY `tb_pelanggan`.`id_pelanggan` ASC");
		
		// tampilkan data pelanggan selama masih ada
		while($data = mysql_fetch_array($query)) {
      if($data['status']==0) {
        $status = '<span class="label label-primary pull-right">BARU</span>';
        $status_icon = "<i class='fa fa-user-plus text-primary'></i>";
      }
      elseif($data['status']==1) {
        $status = '<span class="label label-success pull-right">Aktif</span>';
        $status_icon = "<i class='fa fa-check-circle text-success'></i>";
      }
      elseif($data['status']==2) {
        $status = '<span class="label label-warning pull-right">CUTI</span>';
        $status_icon = "<i class='fa fa-warning text-warning'></i>";
      }
      elseif($data['status']==3) {
        $status = '<span class="label label-danger pull-right">BLOCK</span>';
        $status_icon = "<i class='fa fa-ban text-danger'></i>";
      } else {
        $status = "Tidak Aktif";
      }
	?>
	<tr>
		<td><?php echo $i ?></td>
		<td class="mailbox-star"><a href="#"><?php echo $status_icon ?></a></td>
		<td><?php echo $data['id_pelanggan'] ?></td>
    <td ><?php echo $data['nama'] ?> </td>
		<td ><?php echo "0".$data['hp'] ?> </td>
		<td class="mailbox-subject"><?php $kets=$data['alamat']; echo  textSingkat($kets,70); ?></td>
    <td style="background: #dafbe6;"><?php echo $data['paket']." <br><span class='label label-primary pull-center'>".$data['keterangan']."</span>" ?></td>
    <td style="background: #dafbe6;"><?php echo $data['merek']."<br><span class='label label-primary pull-center'>".$data['mac_address']."</span>" ?></td>
    <td class="mailbox-date"><?php echo tgl_indonesia($data['tgl_langganan']); ?></td>
		<td class="mailbox-date"><?php echo selisihwaktu($data['tgl_langganan']); ?></td>
		<td><?php echo $status ?></td>
    
		<td class="mailbox-attachment">
			<a href="#dialog-data" onclick="getform.ubah(<?php echo substr($data['id_pelanggan'],4) ?>)"  id="<?php echo $data['id_pelanggan'] ?>" class="btn btn-default btn-sm ubah" data-toggle="modal">
				<i class="fa fa-pencil"></i>
			</a>
			<a href="#" id="<?php echo $data['id_pelanggan'] ?>" onclick="getform.hapus(<?php echo substr($data['id_pelanggan'],4) ?>)" class="btn btn-default btn-sm hapus">
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
                   Data pelanggan
                  </div>
                </div>
              </div>

<script> 
$(function () {
   $("#DataTablepelanggan").DataTable({
    //"responsive": false,
      "ordering": true,
      "scrollY": "500px",
      "scrollX": true,
      "scrollCollapse": true,
      "fixedColumns":{
            "leftColumns": 3,
            "rightColumns": 3
        },
    //"autoWidth": false,
      "language": {
            "lengthMenu": " Tampil _MENU_ record per halaman",
            "zeroRecords": " Maaf - Data tidak ditemukan",
            "info": " Menampilkan halaman ke _PAGE_ dari _PAGES_ halaman",
            "infoEmpty": " Data tidak tersedia",
            "search": " Cari Data : ",
            "previus": " Cari Data : ",
            "next": " Cari Data : ",
            "infoFiltered": " (filtered from _MAX_ total records)"
        }

   });
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
