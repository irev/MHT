<?php 
  //jalankan query menampilkan data per blok $offset dan $per_hal
$query = mysql_query("SELECT data_barang.kode_barang, data_barang.nama_barang, data_barang.jenis_barang, data_persediaan.stok_tersedia, data_barang.harga,data_barang.harga_jual
FROM data_barang LEFT JOIN data_persediaan ON data_barang.kode_barang = data_persediaan.kode_barang GROUP BY data_barang.kode_barang
ORDER BY `data_persediaan`.`stok_tersedia` ASC");
?>
<div class="row">
<div class="col-md-12">
  <div class="box box box-solid box-primary">
    <div class="box-header">
      <h1 class="box-title"><i class="fa fa-cubes"></i> DATA BARANG</h1>
      <div class="pull-right">
        <a type="button" class="btn btn-success" href="dashboard.php?cat=gudang&page=barang_masuk"><i class="glyphicon glyphicon-plus"></i> STOK BARANG </a>
        <a type="button" class="btn btn-success" onclick="add_barang()"><i class="glyphicon glyphicon-plus"></i> BARANG </a>
        <a type="button" class="btn btn-success" onclick="add_satuan()"><i class="glyphicon glyphicon-plus"></i> Satuan </a>
      </div>
    </div>
    <!-- /.box-header -->
    <div class="box-body">
      <table id="data_barang" class="table table-bordered table-striped">
        <thead>
          <tr>
            <th>NO</th>
            <th>KODE</th>
            <th>NAMA BARANG</th>
            <th>UNIT</th>
            <th>STOK</th>
            <th>@HARGA</th>
            <th>TOTAL MODAL</th>
            <th>H JUAL</th>
            <th>#</th>
          </tr>
        </thead>
        <tbody>
          <?php
$no=0;
while($result = mysql_fetch_array($query)){
$no++;
$brg = $result['nama_barang'];
?>
            <tr>
              <td>
                <?php echo $no; ?>
              </td>
              <td>
                <?php echo $result['kode_barang']; ?>
              </td>
              <td>
                <?php echo $result['nama_barang']; ?>
              </td>
              <td>
                <?php echo $result['jenis_barang']; ?>
              </td>
              <td>
                <?php if($result['stok_tersedia'] <= 0 ){echo '<a class="btn btn-xs btn-danger" href="?cat=gudang&page=barang_masuk"> <i class="fa fa-fw fa-thumbs-down"></i>Stok Kosong '.$result['stok_tersedia'].' </a>';}else if($result['stok_tersedia']<=10){echo '<a class="btn btn-xs btn-warning" href="?cat=gudang&page=barang_masuk"> <i class="fa fa-fw fa-thumbs-down"></i>Stok tipis = '.$result['stok_tersedia'].' </a>';}else{ echo $result['stok_tersedia'];}?>
              </td>
              <td>
                <?php echo number_format($result['harga'],0,',-','.');?>
              </td>
              <td class="tot">
                <?php echo number_format($result['stok_tersedia'] * $result['harga'],0,',-','.'); ?>
              </td>
              <td>
                <?php if($result['harga'] > $result['harga_jual']){
                  $rugi=$result['harga_jual']-$result['harga']; echo '<a class="btn btn-xs btn-danger" href="?cat=gudang&page=barangedit&id='.sha1($result['kode_barang']).' "> <i class="fa fa-fw fa-thumbs-down"></i>Rugi = Rp. '.$rugi.' </a>';}else{  echo number_format($result['harga_jual'],0,',-','.');}?>
              </td>
              <td>
                <a class="btn btn-xs btn-success" href="?cat=gudang&page=barangedit&id=<?php echo sha1($result['kode_barang']); ?>"><i class="fa fa-fw fa-pencil"></i> Edit</a> -
                <a class="btn btn-xs btn-danger" href="?cat=gudang&page=barang&del=1&id=<?php echo sha1($result['kode_barang']); ?>" onclick="return confirm('Anda Yakin, menghapus barang  <?php echo $brg;?> ?')"> <i class="fa fa-fw fa-trash"></i> Hapus</a>
              </td>
            </tr>
            <?php
}
?>
        </tbody>
        <tfoot>
          <tr>
            <th>NO</th>
            <th>KODE</th>
            <th>NAMA BARANG</th>
            <th>UNIT</th>
            <th>STOK</th>
            <th>@HARGA</th>
            <th>TOTAL MODAL</th>
            <th>TOTAL MODAL</th>
            <th></th>
          </tr>
        </tfoot>
      </table>
    </div>
    <!-- /.box-body -->
  </div>
  <!-- /.box -->
</div>
<?php
include('_script.php');
ob_end_flush();
?> 

    <script src="assets/plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="assets/plugins/datatables/dataTables.bootstrap.min.js"></script>
    <!-- SlimScroll -->
<!--script src="assets/plugins/slimScroll/jquery.slimscroll.min.js"></script>
    <!-- FastClick -->
<!--script src="assets/plugins/fastclick/fastclick.min.js"></script>
    <!-- page script -->
<!--script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <!-- page script -->
<script>
 $(".select2").select2();
 $("#data_barang").DataTable({"lengthMenu": [ [5, 10, 15, 20, -1], [5, 10, 15, 20, "All"] ]});


function add_barang() {
  //  save_method = 'add';
  $('#form1')[0].reset(); // reset form on modals
  $('.form-group').removeClass('has-error'); // clear error class
  $('.help-block').empty(); // clear error string
  $('#edit_form').modal('show'); // show bootstrap modal
  //$('.modal-title').text(''); // Set Title to Bootstrap modal title
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
        <h3 class="modal-title"><i class="fa fa-cubes"></i> Tambah Nama Barang</h3>
      </div>
      <div class="modal-body form">
        <form class="form-horizontal" id="form1" name="form1" onsubmit="return validateForm1()" method="post" action="?cat=gudang&page=barang&act=1">
          <input type="hidden" value="" name="id" />
          <div class="form-body">
            <div class="alert alert-success">
              <strong>Daftarkan Baru..!</strong>
            </div>
            <!--INPUT-->
            <div class="form-group">
              <label for="namabarang" class="col-sm-2 control-label">Nama</label>
              <div class="col-sm-10">
                <input class="form-control" name="namabarang" id="namabarang" placeholder="Nama Barang" type="text" autocomplete="off" required>
              </div>
            </div>
            <div class="form-group">
              <label for="satuan" class="col-sm-2 control-label">Satuan</label>
              <div class="col-sm-10">
        
                  <select class="form-control select2" name="jenis" id="jenis" required>
                  <option value=''>-= Pilih Satuan Barang =-</option>
<?php
  $no=0;   $ex = mysql_query("SELECT * FROM `satuan`");
    while($data = mysql_fetch_array($ex)){
    $no++;
echo '<option value="'.$data['nm_satuan'].'">'. $data['nm_satuan']."</option>";
 } 
?>
                  </select>

               
              </div>
            </div>
            <div class="form-group">
              <label for="modalbarang" class="col-sm-2 control-label">Modal</label>
              <div class="col-sm-10">
                <input class="form-control" name="modalbarang" id="modalbarang" placeholder="Modal Barang" type="text" autocomplete="off" required>
              </div>
            </div>
            <div class="form-group">
              <label for="hjual" class="col-sm-2 control-label">Harga Jual</label>
              <div class="col-sm-10">
                <input class="form-control" name="hjual" id="hjual" placeholder="Harga Jual" type="text" autocomplete="off" required>
              </div>
            </div>
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
<script type="text/javascript">
function add_satuan() {
  //  save_method = 'add';
  $('#form2')[0].reset(); // reset form on modals
  $('.form-group').removeClass('has-error'); // clear error class
  $('.help-block').empty(); // clear error string
  $('#satuan_form').modal('show'); // show bootstrap modal
  $('#satuan_form').modal('handleUpdate');
  //$('.modal-title').text('Tambah Satuan'); // Set Title to Bootstrap modal title
}

function validateForm2() {
  var x = document.forms["form2"]["satuan"].value;
  if (x == null || x == "") {
    alert("Name must be filled out");
    return false;
  }
}
</script>


<!-- Bootstrap modal -->
<div class="modal fade modal-primary" id="satuan_form" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h3 class="modal-title"><i class="fa fa-cube"></i> Tambah Satuan</h3>
      </div>
      <div class="modal-body form">
        <form class="form-horizontal" id="form2" name="form2" onsubmit="return validateForm2()" method="post" action="?cat=gudang&page=barang&act2=1">
          <input type="hidden" value="" name="id" />
          <div class="form-body">
            <!--INPUT-->
            <div class="form-group">
              <label for="satuan" class="col-sm-2 control-label">Satuan</label>
              <div class="col-sm-10">
                <input class="form-control" name="satuan" id="satuan" placeholder="Sauan Barang" type="text" autocomplete="off" required/>
              </div>
            </div>
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
</div>