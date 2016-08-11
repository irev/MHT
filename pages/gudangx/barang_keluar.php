<style type="text/css">
  body{
    min-width: 8px;
  }
</style>
  

<?php
//no faktur auto
$qkdf = mysql_query("SELECT MAX(transaksi) as kodex FROM barang_keluar");
   $data=mysql_fetch_array($qkdf);
   $kodef = $data['kodex'];
   $nourut = substr($kodef, 8, 5);
   if ($nourut==0){
    $nourut=1;
    $notr =sprintf("%05s", $nourut) ; 
   }else{
    $nourut++;
    $notr = sprintf("%05s", $nourut) ; 
   }
  // echo $nobru;

?> 
<div class="col-md-12">
    <div class="row">
        

        <div class="box-footer clearfix">
            <a href="javascript::;" class="btn btn-sm btn-social btn-primary btn-flat pull-right" >
                <i class="icon fa fa-cubes"></i>  Barang Masuk
            </a>
            <a href="javascript::;" class="btn btn-sm btn-social btn-primary btn-flat pull-right" >
                <i class="icon fa fa-truck"></i> Barang Keluar
            </a>
            <a href="javascript::;" class="btn btn-sm btn-social btn-primary btn-flat pull-right" >
                <i class="icon fa fa-truck"></i> Barang Keluar
            </a>
        </div>
        <br/>

<div class="progress active"></div>

        <!-- general form elements -->
        <div id"primary" class="box box-solid box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">
                    <i class="icon fa fa-truck"></i> Barang Keluar 
                </h3>
            </div>
            <!-- /.box-header -->
            <form id="id_form_k" action="Javascript:;" method="post"><!----BEGIN FORM---->
                <div class="box-tools "></div>
                <div class="table table-striped table-bordered table-hover">
                    <div class="slimScrollBar ScrollBar" style="min-width: 200px; max-width: 200%;" >
                        <table class="table table-striped ">
                            <tr>
                                <td colspan="3">
                                    <div class="form-group">
                                        <label>Pelanggan : </label>
                                        <input id="pelanggan" style="width: 50%;" name="pelanggan" required />
                                    </div>
                                    <!-- /.form-group -->
                                </td>
                                <td colspan="2">
                                    <td colspan="3">
                                        <strong>
                                            No Faktur : 
                                            <?php echo "BK".date('ymd')."
                                            <u>".$notr."</u>" ?>
                                        </strong>
                                    </td>
                                </td>
                            </tr>
                            <tr>
                                <th>No</th>
                                <th>Kode Barang</th>
                                <th>Nama Barang</th>
                                <th>Stok</th>
                                <th>Harga @</th>
                                <th>Jumlah</th>
                                <th>Total</th>
                                <th>Aksi</th>
                            </tr>
                            <tbody id="container">
                                <tr class="records">
                                    <td>
                                        <div id="1" class="urut">1</div>
                                    </td>
                                    <td class="kdbrang">
                                        <input title="kd_1" style="width: 100px;" readonly placeholder="Pilih Barang.." id="kd_1" name="kd_1" onclick="loadbarang.barang(1)" class="input" type="text" onfocus="loadbarang.hitung_harga(1)" autocomplete="off" required value=""/>
                                    </td>
                                    <td style="width: 50%;">
                                        <input style="width: 100%;" placeholder="Pilih Barang.." id="nama_1" onclick="loadbarang.barang(1)" name="nama_1" class="input" type="text" onfocus="loadbarang.hitung_harga(1)" readonly autocomplete="off" required/>
                                    </td>
                                    <td style="width: 10%;">
                                        <input style="width: 100%; text-align: right" placeholder="Pilih Barang.." id="stok_1" onclick="loadbarang.barang(1)" name="stok_1" class="input" type="text" onfocus="loadbarang.hitung_harga(1)"  autocomplete="off" required/>
                                    </td>
                                    <td style="width: 20%;">Rp. 
                                        <input style="width: 70%; text-align: right;" value="0" id="harga_1" name="harga_1" class="harga input" onkeyup="loadbarang.hitung_harga(1)" onclick="loadbarang.hitung_harga(1)" type="text" readonly autocomplete="off" required/>  X
                                    </td>
                                    <td style="width: 50px;">
                                        <input style="text-align: center; width: 50px; background-color: #fff;" onkeyup="loadbarang.hitung_harga(1)"  onclick="loadbarang.hitung_harga(1)" id="jumlah_1" value="0" name="jumlah_1" class="jumlah_1 input" value="" type="text" autocomplete="off" required/>
                                    </td>
                                    <td class="totitem" style="width: 20%;">Rp. 
                                        <input style=" text-align: right;" id="sum1" class="sum1" value="0" id="subtot_1" name="subtot_1" onclick="loadbarang.totalbelanja()" type="text"  readonly autocomplete="off" required/>
                                    </td>
                                    <td style="width: 20%;">
                                        <span class="label label-danger">
                                            <a id="remove_item" class="remove" href="#" style="text-decoration: none; color: #fff;">
                                                <i class="fa fa-fw fa-trash"></i>Delete
                                            </a>
                                        </span>
                                        <input id="a_stok_1" name="a_stok_1" value="" type="hidden">
                                        <input id="rows_1" name="rows[]" value="1" type="hidden">
                                        
                                    </td>
                                    </tr>
                                    <!-- nanti tambah rows  nya muncul di sini -->
                                </tbody>
                           
                                <tfoot>
                                    <tr>
                                        <td colspan="2">
                                            <input type="button" name="add_btn" class="btn btn-success" value="+ INPUT" id="add_btn" class="btn add_btn" />
                                        </td>
                                        <td colspan="4">
                                            <h4 style="text-align: right;"> update harga jual belum
                                                <strong>JUMLAH TOTAL : Rp. </strong>
                                            </h4>
                                        </td>
                                        <td class="total-combat" style="text-align: right;" >
                                            <b> 0</b>
                                        </td>
                                        <td >
                                            <input type="button" name="add_btn" class="btn btn-success pull-right" value="+ INPUT" id="add_btn2" class="btn add_btn" hidden/>
                                        </td>
                                    </tr>
                                </tfoot>
                            </table>
                        </div> 
                        </div>
                        <div class="box-footer">
                            <button type="reset" class="btn btn-default">Reset</button>
                     
                                <!-- checkbox -->
                                <div class="pull-right" >
                                    <label >
                                        <input id="petugas" name="petugas" <?php echo 'value="'.$_SESSION['login_name'].'"' ?> type="hidden">
                                        <input type="checkbox" id="cek-barang" name="validasi" required>
                                            <span>Data sudah benar!</span>
                                        </label>
                                        <input  type="submit" id="proses" class="btn btn-primary" name="submit" value="Save"  />
                                    </div>
                                
                            </div>
                        </div>
                    </form><!----END FORM---->
                </div>
                <div class="msg"></div>
            </div>
        </div>



<?php
include('_script.php');
ob_end_flush();
?> 
></script>
    <script src="pages/proses/js/p_proses_k.js"></script>
    <script type="text/javascript" src="pages/gudang/js/jquery_append_out.js"></script>
    <script type="text/javascript" src="pages/gudang/js/formbarang/barang_k.js"></script>
    <!-- date-picker -->
    <!--script src="assets/plugins/datepicker/bootstrap-datepicker.js"></script-->
 <script>
  var idnya = $(".records .urut").attr('id');
  loadbarang.hitung_harga(idnya);

  $(".jumlah").on("keydown keyup", function() {
    loadbarang.hitung_harga(idnya);
  });
$('#tanggal').Zebra_DatePicker({
  dateFormat: "yy-mm-dd",
            'days': ['Minggu', 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu'],
            'months': ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'],
            'lang_clear_date': 'Clear',
            'show_select_today': 'Today'
        });
  </script>       