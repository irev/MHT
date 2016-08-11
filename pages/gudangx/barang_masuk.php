<style type="text/css">
body {
  min-width: 8px;
}
.popover-title {
    color: blue;
    font-size: 15px;
}
.popover-content {
    color: red;
    font-size: 10px;
}
input.error{border:1px solid red; color: red;}
.error{color:orange; padding-left: 20px;}
label.error{background:url('assets/img/unchecked.gif') no-repeat;padding-left:16px;margin-left:.3em;}
/*label.valid{background:url('assets/img/checked.gif') no-repeat;display:block;width:16px;height:16px;}*/
</style>
<!--link rel="stylesheet" href="assets/plugins/daterangepicker/daterangepicker-bs3.css"-->
<div class="row">
  <div class="col-md-12">

<?php
ob_start();
//NO faktur PENOMORAN OTOMATIS
$qkdf = mysql_query("SELECT MAX(transaksi) as kodex FROM barang_masuk");
   $data=mysql_fetch_array($qkdf);
   $kodef = $data['kodex'];
   $nourut = substr($kodef, 8, 5);
   $nourut++;
   if ($nourut==0){
    $nourut=1;
    $notr =sprintf("%05s", $nourut) ; 
   }else{
    $nourut++;
    $notr = sprintf("%05s", $nourut) ; 
   }
//proses 
?>
  
<!--div class="col-md-12">      
        <a class="btn btn-sm btn-primary"><i class="icon fa fa-truck"></i>  Primary</a>
        <a class="btn btn-sm btn-social btn-dropbox pull-right "><i class="fa fa-dropbox"></i> okok</a>
         <a class="btn btn-sm btn-social btn-primary btn-flat pull-right" ><i class="icon fa fa-truck"></i>  Primary</a>

<div class="box box-footer clearfix"> 

</div-->    


<div class="row">
<div class="box-footer clearfix">
                <a href="javascript::;" class="btn btn-sm btn-social btn-primary btn-flat pull-right" ><i class="icon fa fa-cubes"></i>  Barang Masuk</a>
                <a href="javascript::;" class="btn btn-sm btn-social btn-primary btn-flat pull-right" ><i class="icon fa fa-truck"></i> Barang Keluar</a>
                <a href="javascript::;" class="btn btn-sm btn-social btn-primary btn-flat pull-right" ><i class="icon fa fa-truck"></i> Barang Keluar</a>
</div>
<br/>
 
<div class="col-md-12">
<!-- progress bar -->
   <div class="progress active"></div>
<!-- END progress bar -->   
        <!-- general form elements -->
        <div class="box box-solid box-success">
          <div class="box-header with-border">
            <h3 class="box-title"><i class="icon fa fa-truck"></i> Barang Masuk</h3>
          </div>
          <!-- /.box-header -->
          <form id="id_form_m" action="Javascript:;" method="post">
            <div class="box-tools">
            </div>
            <div class="table table-striped table-bordered table-hover ">
            <div class="slimScrollBar ScrollBar" style="min-width: 200px; max-width: 200%;" >
              <table class="table table-striped">
                <tr>
                  <td colspan="8">
                    <div class="row">
                      <!-- Nama Supplier : <input id="supplier" name="supplier" type="text" autocomplete="off" required>-->
                      <div class="form-group">
                        <div class="col-xs-2">
                          <label>Nama Supplier:</label>
                        </div>
                        <div class="col-xs-6" data-toggle="tooltip" data-placement="bottom" title="Pilih supplier yang telah terdaftar!" >
                          <select class=" form-control select2" id="supplier" name="supplier" required>
                          <option selected="selected" value=""><b>Pilih Supplier</b></option>
                      <?php 
                          $exes=mysql_query("SELECT * FROM data_supplier");
                          while($data_supp= mysql_fetch_array($exes)){
                            echo '<option value="'.$data_supp["kode_supplier"].'">'.$data_supp["nm_supplier"].'</option>'; 
                           } 
                      ?>
                    </select>
                      <input name="penerima" value=<?php echo '"'.$_SESSION['login_name'].'"'?> type="hidden">
                      <input id="nof" name="nof" value= <?php  echo '"BM'.date('ymd').$notr.'"'?> type="hidden">
                        </div>
                        <div class="col-xs-1">
                          <a class="btn btn-success pull-left" id="addsup" onclick="loadbarang.addsup()" data-toggle="tooltip" data-placement="bottom" title="Tambah Supplier Baru!"><i class="fa fa-users"></i></a>
                        </div>
                    <div class="col-xs-3">   
                      <strong>No Faktur : <?php  echo "BM".date('ymd')."<u>".$notr."</u>"?></strong>
                    </div>
                   </div>
                   </div>
                   </td>
                </tr>
                <tr>
                  <th>No</th>
                  <th>Tanggal</th>
                  <th>Kode Barang</th>
                  <th>Nama Barang</th>
                  <th>Harga Modal@</th>
                  <th>Jumlah</th>
                  <th>Total</th>
                  <th>Aksi</th>
                </tr>
                <tbody id="container">
                  <tr class="records">
                    <td>
                      <div id="1" class="urut">1</div>
                    </td>
                    <td><input id="tanggal" data-date-end-date="0d" class="input tanggal" style="width: 100px;" placeholder="Pilih Tanggal.." name="tgl_1" type="text"></td>
                    <td class="kdbrang">
                    <input style="width: 100px;" placeholder="Pilih Barang.." id="kd_1" name="kd_1" onclick="loadbarang.barang(1)" class="input" type="text" onfocus="loadbarang.hitung_harga(1)" readonly required>
                    </td>
                    <td style="width: 50%;"><input style="width: 100%;" placeholder="Pilih Barang.." id="nama_1" onclick="loadbarang.barang(1)" name="nama_1" class="input" type="text" readonly onfocus="loadbarang.hitung_harga(1)" required></td>
                    <td style="width: 20%;">
                    <div class="input-group">
                    <div class="input-group-addon">
                        <i style="width: 20px;">Rp.</i>
                      </div>
                      <input placeholder="00.-" style="width: 100px; text-align: right;" value="" id="harga_1" onkeyup="loadbarang.hitung_harga(1)" name="harga_1" class="harga input" onclick="loadbarang.hitung_harga(1)" type="text" autocomplete="off" required>
                      </div>
                      </td>
                    <td style="width: 50px;"><input style="text-align: center; width: 50px; background-color: #fff;" onpaste="loadbarang.hitung_harga(1)" onkeyup="loadbarang.hitung_harga(1)" onclick="loadbarang.hitung_harga(1)"  id="jumlah_1" name="jumlah_1" class="jumlah_1 input" value="" type="text" autocomplete="off" required></td>
                    <td class="totitem" style="width: 20%;">
                      <div class="input-group">
                    <div class="input-group-addon">
                        <i style="width: 20px;">Rp.</i>
                      </div>
                    <input style="text-align: right;" id="sum1" class="sum1" placeholder="00.-"  value="" name="input" onclick="loadbarang.totalbelanja()" type="text" readonly required>
                    </div>
                    </td>
                    <td style="width: 20%;"><span class="label label-danger"><a onclick="" id="remove_item" class="remove" href="#" style="text-decoration: none; color: #fff;"><i class="fa fa-fw fa-trash"></i>Delete</a></span>
                      <input id="rows_1" name="rows[]" value="1" type="hidden"></td>
                  </tr>
                  <!-- nanti tambah rows  nya muncul di sini -->
                </tbody>
                <tbody>
                  <tr>
                    <td colspan="4"><input type="button" name="add_btn" class="btn btn-success" value="+ " id="add_btn" class="btn" /></td>
                    <td colspan="2">
                      <h4 style="text-align: right;"><strong>JUMLAH TOTAL : Rp. </strong></h4></td>
                    <td class="total-combat"><b> 0</b></td>
                    <td><input type="button" name="add_btn2" class="btn btn-success" value="+" id="add_btn2" class="btn" /></td>
                  </tr>
                </tbody>
              </table>
</div><!--slimScrollBar-->
              <div class="box-footer">
                <button type="reset" class="btn btn-default">Reset</button>
                <!-- checkbox -->
                <div class="pull-right">
                  <input type="checkbox" name="validasi" id="cek-barang" required>
                  <label>Data sudah benar!  </label>
                  <input type="button" class="btn btn-primary" id="proses" name="submit" value="Save" />
                </div>
              </div>
            </div>
          </form>
        </div>
        </div>
      </div>
  </div>
</div>
<!--AND row-->


<form id="form_supp" method="POST" action="">
<div class="modal fade in modal-success" id="add_sup" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <h4 class="modal-title"><i class="fa fa-user"></i> Supplier</h4>
      </div>
      <div class="modal-body">
        <div id="logerror"></div>


<!--LOADING -->
      <div class="progress active"> 
          <!--div class="progress-bar progress-bar-striped" role="progressbar" aria-valuenow="0" aria-valuetransitiongoal="40" aria-valuemin="0" aria-valuemax="100" style="width: 0%;">
        0% 
      </div-->
      </div>
<!--LOADING -->
        <div class="form-group">
                <label>Nama Supplier: *</label>
                <div class="input-group">
                      <div class="input-group-addon">
                        <i class="fa fa-user"></i>
                      </div>
                      <input name="nama" type="text" placeholder="Input Nama " class="form-control required required" data-toggle="tooltip" title="Nama Supplier!" required>
                </div>
                <label>Alamat: *</label>
                <div class="input-group">
                      <div class="input-group-addon">
                        <i class="fa fa-home"></i>
                      </div>
                      <input name="alamat" type="text" placeholder="Input Alamat " data-toggle="tooltip" title="Alamat Supplier!" class="form-control required" data-inputmask="" data-mask="" required>
                </div>
                <label>Email: *</label>
                <div class="input-group">
                      <div class="input-group-addon">
                        <i class="fa fa-envelope"></i>
                      </div>
                      <input name="email" id="field" type="email" placeholder="Input Email " data-toggle="tooltip" title="Email Supplier!" class="form-control required" data-inputmask="" data-mask="" >
                </div>
                <label>Telepon: *</label>
                <div class="input-group">
                      <div class="input-group-addon">
                        <i class="fa fa-phone"></i>
                      </div>
                      <input type="text" name="tel" placeholder="Input Telepon " data-toggle="tooltip" title="Input Nomor telepon atau HP!" class="form-control required" data-inputmask="'mask': ['089999999999','0999-999999','029-999999']" data-mask="" required>
                </div>    
                <div class="input-group">  
                <br/>
                <code style="float:left;"> 
                <label>  Status Aktif!</label>
                  <input type="checkbox" name="status" class="flat-red" checked>
                </code>
                </div>                                  
        </div>
      </div>
      <div class="modal-footer">
        <a href="#" class="btn btn-default" data-toggle="popover" data-placement="top" data-content="Vivamus sagittis lacus vel augue laoreet rutrum faucibus." title="" data-original-title="Popover on top">Popover on top</a>   
        <button type="button" class="btn btn-default" data-dismiss="modal">x Close</button>
        <button type="Reset" class="btn btn-default">RESET</button>
        <input type="button" id="simpan_supp" name="submit" class="btn btn-primary" value="SIMPAN"/>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
</form>
</div><!--barang masuk-->

<div class="msg"></div>
<?php
include('_script.php');
ob_end_flush();
?> 
<!--PAGE SCRIPT BARANG-->
<script type="text/javascript" src="pages/gudang/js/jquery_append_in.js"></script>
<script src="pages/proses/js/p_proses.js"></script>
<script src="pages/proses/js/p_proses_m.js"></script>
<script type="text/javascript" src="pages/gudang/js/formbarang/barang_m.js"></script>
<!--PAGE SCRIPT END-->
<script>
  var idnya = $(".records .urut").attr('id');
  loadbarang.hitung_harga(idnya);

  $(".jumlah").on("keydown keyup", function() {
    loadbarang.hitung_harga(idnya);
  });
//$("[data-mask]").inputmask();
/*
    jQuery.validator.setDefaults({
      debug: false,
      success: "valid",
      messages:'ooo'
    });
*/

$('#tanggal').Zebra_DatePicker({
  dateFormat: "yy-mm-dd",
            'days': ['Minggu', 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu'],
            'months': ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'],
            'lang_clear_date': 'Clear',
            'show_select_today': 'Today'
        });
</script>

