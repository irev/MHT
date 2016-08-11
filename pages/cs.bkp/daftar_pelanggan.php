<!--PAGE GANGGUAN-->
<!-- Main content -->
        <section class="content">
          <div class="row">
            <div class="col-xs-12">
              <div class="box">
                <div class="box-header">
                  <h3 class="box-title">Daftar Pelanggan</h3>
    <!--Button Model-->
    <div class="pull-right">
        <!--a type="button" class="btn btn-success" href="dashboard.php?cat=petugas&page=obat_masuk"><i class="glyphicon glyphicon-plus"></i> Pelanggan </a--->
        <a type="button" class="btn btn-success" onclick="add_gangguan()"><i class="glyphicon glyphicon-plus"></i> Gangguan </a>
        <a type="button" class="btn btn-success" onclick="add_satuan()"><i class="glyphicon glyphicon-plus"></i> status </a>
    </div>
    <!--//Button Model-->
                </div><!-- /.box-header -->
                <div class="box-body">
                  <table id="example1" class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        <th>No</th>
                        <th>Kode</th>
                        <th>Tanggal</th>
                        <th>Nama</th>
                        <th>Alamat</th>
                        <th>Perangkat</th>
                        <th>IP Address</th>
                        <th>Paket</th>
                       
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td>1</td>
                        <td>CL00001</td>
                        <td>12-06-2016</td>
                        <td><a href="#">Danang Ginanjar</a></td>
                        <td>Sawah Suduik</td>
                        <td>Ubiquity</td>
                        <td>192.168.12.10</td>
                        <td>Personal</td>
                      </tr>
                      <tr>
                        <td>2</td>
                        <td>CL00002</td>
                        <td>12-06-2016</td>
                        <td><a href="#">Bujang Palala</a></td>
                        <td>Saok Laweh</td>
                        <td>TP-Link</td>
                        <td>192.168.12.18</td>
                        <td>Office</td>
                      </tr>

                    </tfoot>
                  </table>
                </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col -->
          </div><!-- /.row -->

<!--footer-->
<?php
include('_script.php');
ob_end_flush();
?> 


<script>
function add_gangguan() {
  //  save_method = 'add';
  $('#form1')[0].reset(); // reset form on modals
  $('.form-group').removeClass('has-error'); // clear error class
  $('.help-block').empty(); // clear error string
  $('#edit_form').modal('show'); // show bootstrap modal
  //$('.modal-title').text(''); // Set Title to Bootstrap modal title
  $('[data-toggle="popover"]').popover();
}

function validateForm1() {
  var x = document.forms["form1"]["namabarang"].value;
  if (x == null || x == "") {
    alert("Name must be filled out");
    return false;
  }
}
</script>
<!-- Bootstrap modal -->
<div class="modal fade modal-primary" id="edit_form" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h3 class="modal-title"><i class="fa fa-cubes"></i> Tambah Gagguan Jaringan</h3>
      </div>
      <div class="modal-body form">
        <form class="form-horizontal" id="form1" name="form1" onsubmit="return validateForm1()" method="post" action="?cat=petugas&page=obat&act=1">
          <input type="hidden" value="" name="id" />
          <div class="form-body">
            <!--div class="alert alert-success">
              Pastikan nama obat yang akan didaftarkan, belum pernah terdaftar sebelumnya..!
            </div-->
            <!--INPUT-->
            <div class="form-group">
              <label for="namabarang" class="col-sm-2 control-label">Nama</label>
              <div class="col-sm-10">
                <input class="form-control" name="namabarang" id="namabarang" placeholder="Nama Pelapor" type="text" autocomplete="off" required>
              </div>
            </div>
            <!--div class="form-group">
              <label for="bagian" class="col-sm-2 control-label">Bagian</label>
              <div class="col-sm-10">
        
                  <select class="form-control select2" name="bagian" id="bagian" required>
                  <option value=''>-= Pilih bagian Obat =-</option>
                  <option value='1'>bagian</option>
<?php
 //  $no=0;   
 //  $ex = mysql_query("SELECT * FROM `bagian`");
 //  while($data = mysql_fetch_array($ex)){
 //  $no++;
 //  echo '<option value="'.$data['id_bagian'].'">'. $data['bagian']."</option>";
 //} 
?>
                  </select>
              </div>
            </div-->
 <div class="form-group">
              <label for="satuan" class="col-sm-2 control-label">Pelanggan</label>
              <div class="col-sm-10">
                  <select class="form-control select2" style="width: 100%" name="jenis" id="jenis" data-toggle="tooltip" data-placement="bottom" title="Pilih supplier yang telah terdaftar!" required>
                  <option value=''>  -= Pelanggan Terdaftar Atas Nama =-  </option>
<?php
  $no=0;   
  $jen = mysql_query("SELECT * FROM `jenis_obat` ORDER BY `id_jenis` DESC");
    while($jenis = mysql_fetch_array($jen)){
    $no++;
    echo '<option class="col-sm-10" value="'.$jenis['id_jenis'].'" data-toggle="popover" data-trigger="hover" title="Deskripsi OBAT" data-content="'.$jenis['ket'].'">'. $jenis['jenis'].'</option>';
 } 
?>
                  </select>    
 </div>
 </div>
      


            <div class="form-group">
              <label for="satuan" class="col-sm-2 control-label">Status</label>
              <div class="col-sm-10">
        
                  <select class="form-control select2" style="width:100%" name="satuan" id="satuan" required>
                  <option value=''>-= Pilih Status =-</option>
<?php
  $no=0;   
  $ex = mysql_query("SELECT * FROM `satuan`");
    while($data = mysql_fetch_array($ex)){
    $no++;
    echo '<option value="'.$data['id_satuan'].'">'. $data['satuan']."</option>";
 } 
?>
                  </select>
              </div>
            </div>

            <!--div class="form-group">
              <label for="modalbarang" class="col-sm-2 control-label">Modal</label>
              <div class="col-sm-10">
                <input class="form-control" name="modalbarang" id="modalbarang" placeholder="Modal Barang" type="text" autocomplete="off" >
              </div>
            </div>
            <div class="form-group">
              <label for="hjual" class="col-sm-2 control-label">Harga Jual</label>
              <div class="col-sm-10">
                <input class="form-control" name="hjual" id="hjual" placeholder="Harga Jual" type="text" autocomplete="off" >
              </div>
            </div-->
            <!--END INPUT-->
          </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
        <input type="submit" class="btn btn-success" name="button" id="button" value="Simpan">&nbsp;&nbsp;
      </div>
      </form>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
<!-- /.modal -->
<!-- End Bootstrap modal -->

<script>
  $(function () {
    $("#example1").DataTable();
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