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
<?php
    require("../../../../_db.php");  
    $no=0;            
    $q_gangguan = mysql_query("SELECT tb_gangguan.*, tb_pelanggan.nama FROM `tb_gangguan` JOIN tb_pelanggan WHERE tb_gangguan.id_pelanggan=tb_pelanggan.id_pelanggan");
    while($gangguan = mysql_fetch_array($q_gangguan)){
    $no++;
?> 
<tr class="act">
      <td><?php echo $no; ?></td>
      <td class="mailbox-star"><a href="#"><i class="fa fa-star text-yellow"></i></a></td>
      <td ><a href="#"><?php echo  $gangguan['id_gangguan']; ?></a></td>
      <td class="mailbox-name"><a href="read-mail.html"><?php echo  $gangguan['pelapor']; ?></a></td>
      <td class="mailbox-subject"><b><?php echo  $gangguan['nama']; ?></b> - <?php echo  $gangguan['keterangan']; ?></td>
      <td class="mailbox-attachment"><?php echo  tgl_indonesia($gangguan['tgl_pelaporan']); ?></td>
      <td class="mailbox-date"><?php echo  selisihwaktu($gangguan['tgl_gangguan']); ?></td>
      <td >
          <a href="#dialog-gangguan" value="<?php echo $gangguan['id_gangguan'] ?>" id="<?php echo $gangguan['id_gangguan'] ?>" class="btn btn-default btn-sm ubah" data-toggle="modal"><i class="fa fa-pencil"></i></a>
          <a href="#dialog-gangguan" onclick="ubah()" value="<?php echo $gangguan['id_gangguan'] ?>" id="<?php echo $gangguan['id_gangguan'] ?>" class="btn btn-default btn-sm ubah" data-toggle="modal"><i class="fa fa-pencil"></i></a>
          <a href="#" onclick="getform.hapus()" value="<?php echo $gangguan['id_gangguan'] ?>" id="<?php echo $gangguan['id_gangguan'] ?>" class="btn btn-default btn-sm hapus">
          <i class="fa fa-trash"></i></a>
      </td>
</tr>
<?php } ?>   
<script type="text/javascript">
function getidnya(){
  //$('.ubah').on("click", function(){
  //console.log($(this).attr("id")+' uuu');
//});
}
</script>

                        
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


           