<?php 
if(!isset($_SESSION)) 
    { 
        session_start(); 
    }else{}
?>
<div class="box box-primary">
                <div class="box-header with-border">
                  <h3 class="box-title">Dafta Gangguan Sedang Diproses</h3>
                  <div class="box-tools pull-right">
                 </div><!-- /.box-tools -->
                </div><!-- /.box-header -->
                <div class="box-body no-padding">
                  <div class="table-responsive mailbox-messages">
                    <table id="DataTableproses" class="table table-hover table-striped">
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
                        <?php if($_SESSION['login_hash']=='tek'){ ?>
                        <th></th>
                        <?php }?>
                      </tr>
                    </thead>
                      <tbody>
<?php
    require("../../../../_db.php");  
    $no=0;            
    $q_gangguan = mysql_query("SELECT tb_gangguan.*, tb_pelanggan.nama FROM `tb_gangguan` JOIN tb_pelanggan WHERE tb_gangguan.id_pelanggan=tb_pelanggan.id_pelanggan AND  tb_gangguan.`status_gangguan`='1' ORDER BY `tb_gangguan`.`id_gangguan` DESC");
    // tampilkan data gangguan selama masih ada
    while($gangguan = mysql_fetch_array($q_gangguan)){
      if($gangguan['status_gangguan']==0) {
        $status = '<span class="label label-danger pull-right">REQUEST</span>';
        $status_icon = "<i class='fa fa-star text-danger'></i>";
      }
      elseif($gangguan['status_gangguan']==1) {
        $status = '<span class="label label-warning pull-right">PROCCESS</span>';
        $status_icon = "<i class='fa fa-wrench text-warning'></i>";
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
      <td ><a href="#"><?php echo  $gangguan['id_gangguan']; ?></a></td>
      <td class="mailbox-name"><a href="#"><?php echo  $gangguan['pelapor']; ?></a></td>
      <td class="mailbox-subject"><b><?php echo  $gangguan['nama']; ?></b> - <?php $kets=$gangguan['keterangan']; echo  textSingkat($kets,70); ?></td>
      <td class="mailbox-attachment"><?php echo  tgl_indonesia($gangguan['tgl_pelaporan']); ?></td>
      <td class="mailbox-date"><?php echo  selisihwaktu($gangguan['tgl_gangguan']); ?></td> 
      <td><?php echo $status ?></td>
     
      <?php if($_SESSION['login_hash']=='tek'){ ?> 
      <td>
      <a href="#dialog-data"  class="btn btn-primary btn-sm" data-toggle="modal" data-toggle="tooltip" data-placement="top" title="Selesaikan" onclick="getform.done(<?php echo substr($gangguan['id_gangguan'],5) ?>)" id="<?php echo $gangguan['id_gangguan'] ?>">
      <i class="fa fa-thumbs-up pull-right"></i>
          </a>
     </td>
       <?php } ?>   
     
</tr>

<?php } ?>   


                        
                      </tbody>
                    </table><!-- /.table -->
                  </div><!-- /.mail-box-messages -->
                </div><!-- /.box-body -->
                <div class="box-footer no-padding">
                 <div class="mailbox-controls">
                   Data Gangguan Sedang diproses
                  </div>
                </div>
              </div>
  
<script type="text/javascript">
      $('[data-toggle="tooltip"]').tooltip();
</script>