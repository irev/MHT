<?php 
if(!isset($_SESSION)) 
    { 
        session_start(); 
    }else{}
?>


    <link rel="stylesheet" href="assets/plugins/datatables/dataTables.bootstrap.css">

<div class="box box-primary">
                <div class="box-header with-border">
                  <h3 class="box-title">Daftar Gangguan Belum Diperbaiki</h3>
                  <br>
                 <div class="direct-chat-msg right"> 
                 <img class="direct-chat-img" src="assets/img/cs.jpg" alt="message user image">
                 <div class="direct-chat-text">
                  KETERANGAN:
                  <ul>
                  <li>Belum diproses oleh teknisi</li>
                  <li>Surat jalan belum dicetak</li>
                  </ul>
                  </div>
                  </div>  
                  <div class="box-tools pull-right">

                  </div><!-- /.box-tools -->
                </div><!-- /.box-header -->
                <div class="box-body no-padding">
                  <div class="table-responsive mailbox-messages">
 <table id="DataTablePending" class="table table-hover table-striped">
                    <thead>
                      <tr>
                        <th>No</th>
                        <th></th>
                        <th>Kode</th>
                        <th>Pelapor</th>
                        <th>Keterangan Gangguan</th>
                        <th>Awal Gangguan</th>
                        <th>Waktu</th>
                        <th>Status</th>
                      </tr>
                    </thead>
                      <tbody>
<?php
    require("../../../../_db.php");  
    $no=0;            
    $q_gangguan = mysql_query("SELECT tb_gangguan.*, tb_pelanggan.nama FROM `tb_gangguan` JOIN tb_pelanggan WHERE tb_gangguan.id_pelanggan=tb_pelanggan.id_pelanggan AND  tb_gangguan.`status_gangguan`='3' ORDER BY `tb_gangguan`.`id_gangguan` DESC");
    while($gangguan = mysql_fetch_array($q_gangguan)){
      if($gangguan['status_gangguan']==0) {
        $status = '<span class="label label-danger pull-right">REQUEST</span>';
        $status_icon = "<i class='fa fa-star text-danger'></i>";
      }
      elseif($gangguan['status_gangguan']==1) {
        $status = '<span class="label label-warning pull-right">PROCCESS</span>';
        $status_icon = "<i class='fa fa-star-o text-warning'></i>";
      }
      elseif($gangguan['status_gangguan']==2) {
        $status = '<span class="label label-success pull-right">DONE</span>';
        $status_icon = "<i class='fa fa-star text-success'></i>";
      }
      elseif($gangguan['status_gangguan']==3) {
        $status = '<span class="label label-primary pull-right">PENDING</span>';
        $status_icon = "<i class='fa fa-star-half-empty text-primary'></i>";
      } else {
        $status = "Tidak Aktif";
      }
    $no++;
?> 
<tr>
      <td><?php echo $no; ?></td>
      <td class="mailbox-star"><a href="#"><?php echo $status_icon ?></a></td>
      <td ><a href="#"><?php echo  $gangguan['id_gangguan']; ?></a></td>
      <td class="mailbox-name"><a href="read-mail.html"><?php echo  $gangguan['pelapor']; ?></a></td>
      <td class="mailbox-subject"><b><?php echo  $gangguan['nama']; ?></b> - <?php $kets=$gangguan['keterangan']; echo  textSingkat($kets,70); ?></td>
      <td class="mailbox-attachment"><?php echo  tgl_indonesia($gangguan['tgl_pelaporan']); ?></td>
      <td class="mailbox-date"><?php echo  selisihwaktu($gangguan['tgl_gangguan']); ?></td> 
      <td><?php echo $status ?></td>
</tr>
<?php } ?>   


                      </tbody>
                    </table><!-- /.table -->
                  </div><!-- /.mail-box-messages -->
                </div><!-- /.box-body -->
                <div class="box-footer no-padding">
                  <div class="mailbox-controls">
                   Data Gangguan pending
                  </div>
                </div>
              </div>




 
<script>
  <!--
 $('.paginate_button').addClass('btn');
   $('#DataTablePending').DataTable({
    "autoWidth": true,
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
  -->
</script>  