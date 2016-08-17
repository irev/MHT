<div class="box box-primary">
                <div class="box-header with-border">
                  <h3 class="box-title">Daftar Gangguan Telah Diperbaiki</h3>
                  <div class="box-tools pull-right">
                    <div class="has-feedback">
                      <input type="text" class="form-control input-sm" placeholder="Search Mail">
                      <span class="glyphicon glyphicon-search form-control-feedback"></span>
                    </div>
                  </div><!-- /.box-tools -->
                </div><!-- /.box-header -->
                <div class="box-body no-padding">
                  <div class="table-responsive mailbox-messages">
<table id="DataTableDone" class="table table-hover table-striped">
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
    $q_gangguan = mysql_query("SELECT tb_gangguan.*, tb_pelanggan.nama FROM `tb_gangguan` JOIN tb_pelanggan WHERE tb_gangguan.id_pelanggan=tb_pelanggan.id_pelanggan AND  tb_gangguan.`status_gangguan`='2' ORDER BY `tb_gangguan`.`id_gangguan` DESC");
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
        $status_icon = "<i class='fa fa-star text-primary'></i>";
      } else {
        $status = "Tidak Aktif";
      }
    $no++;
?> 
<tr>
      <td><?php echo $no; ?></td>
      <td class="mailbox-star"><a href="#"><?php echo $status_icon ?></a></td>
      <td ><a class="ditel" href="#" onclick="ditel()" id="<?php echo  $gangguan['id_gangguan']; ?>"><?php echo  $gangguan['id_gangguan']; ?></a></td>
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
                  Data Gangguan Done
                  </div>
                </div>
              </div>

<!-- kode modal dialog -->
<div id="ditel-gangguan" class="modal">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                    <h4 class="modal-title">Ditel Gangguan</h4>
                  </div>
                  <div class="modal-body">
                  <div class="load-ditel"></div>
                    <p>One fine body…</p>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                  </div>
                </div><!-- /.modal-content -->
              </div><!-- /.modal-dialog -->
            </div>
<!-- akhir kode modal dialog -->              

<script type="text/javascript">
  $('#DataTableDone').DataTable({
    "autoWidth": true,
      "language": {
            "lengthMenu"   : " Tampil _MENU_ record per halaman",
            "zeroRecords"  : " Maaf - Data tidak ditemukan",
            "info"         : " Menampilkan halaman ke _PAGE_ dari _PAGES_ halaman",
            "infoEmpty"    : " Data tidak tersedia",
            "search"       : " Cari Data : ",
            "previus"      : " Cari Data : ",
            "next"         : " Cari Data : ",
            "infoFiltered" : " (filtered from _MAX_ total records)"
        }
    });
</script>