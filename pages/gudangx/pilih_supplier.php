<?php
//no faktur auto
$qkdf = mysql_query("SELECT MAX(kode_supplier) as kodex FROM data_supplier");
   $data=mysql_fetch_array($qkdf);
   $kodef = $data['kodex'];
   echo $nourut = substr($kodef, 8, 5);
   if ($nourut==0){
    $nourut=1;
    $notr =sprintf("%05s", $nourut) ; 
   }else{
    $nourut++;
    $notr = sprintf("%05s", $nourut) ; 
   }
  // echo $nobru;

 /// Input Prosess
 if(isset($_POST['submit'])){


 }  
?> 


 <link rel="stylesheet" href="assets/plugins/select2/select2.min.css">
 <link rel="stylesheet" href="assets/plugins/datatables/dataTables.bootstrap.css">
 <div class="col-md-12">
          <!-- SELECT2 EXAMPLE -->
          <div class="box box-default">
            <div class="box-header with-border">
              <h3 class="box-title">DATA SUPPLIER</h3>
              <div class="box-tools pull-right">
                <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
              </div>
            </div><!-- /.box-header -->
            <div class="box-body">
              <div class="row">
                <div class="col-md-6">
<!--PILIH SUPPLIER-->
                  <div class="form-group">
                    <label for="satuan" class="col-sm-3 control-label">Nama Supplier :</label>
                    <div class="col-sm-7" data-toggle="tooltip" title="Pilih supplier">
                    <select class="form-control select2" data-toggle="tooltip" title="Pilih supplier yang sudah ada" style="width: 100%;">
                      		<option selected="selected">Alabama</option>
                      		<option>Alaska</option>
                      		<option>California</option>
                      		<option>Delaware</option>
                      		<option>Tennessee</option>
                      		<option>Texas</option>
                      		<option>Washington</option>
                    	</select> 
                    </div>
                    	 <a class="btn btn-success" data-toggle="tooltip" title="Tambah Supplier Baru"  onclick="add_supplier()"><i class="glyphicon glyphicon-plus"></i></a>
                  </div><!-- /.form-group -->
<!--END PILIH SUPPLIER-->                  
                </div><!-- /.col -->
              </div><!-- /.row -->
            </div><!-- /.box-body -->

<!--TABEL SUPPLIER-->
                <div class="box-body">
                  <table id="tabel_supplier" class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        <th>NO</th> 
                        <th>KODE FAKTUR</th>
                        <th>SUPPLIER</th>
                        <th>PENERIMA</th>
                        <th>TANGGAL</th>
                        <th>BIAYA TRANSAKSI</th>
                        <th></th>
                      </tr>
                    </thead>
                    <tbody>
<?php
//$kode_transaksi = $_GET['kode_transaksi'];
$no=0;
$sql = "SELECT * FROM `data_faktur_berang_masuk` ORDER BY `data_faktur_berang_masuk`.`tgl` DESC "; 
$ex = mysql_query($sql);
 while($data = mysql_fetch_array($ex)){
$no++;
 ?>                
                      <tr>
                        <td><?php echo $no; // $data['id_masuk'] ?> </td>
                        <td> <?php echo $data['kode_transaksi']; ?></td>
                        <td><?php echo $data['supplier']; ?></td>
                        <td><?php echo $data['penerima']; ?></td>
                        <td><center><?php echo $data['tgl']; ?></center></td>
                        <td>Rp. <?php echo $data['total']; ?></td>
                        <td><span style="float: right;"><a href="dashboard.php?cat=gudang&page=faktur&kode_transaksi=<?php echo $data['kode_transaksi']; ?>" >View</a></span></td>
                      </tr>
<?php }  ?>                         
                      </tbody>
                    <tfoot>
                      <tr>
                        <th>NO</th> 
                        <th>KODE FAKTUR</th>
                        <th>DARI</th>
                        <th>PENERIMA</th>
                        <th>TANGGAL</th>
                        <th>JUMLAH</th>
                        <th></th>
                      </tr>
                    </tfoot>
                  </table>
                </div><!-- /.box-body -->

          </div><!-- /.box -->
</div>



<!-- Form modal Supplier -->
<div class="modal fade" id="supplier_form" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h3 class="modal-title"></h3>
            </div>
            <div class="modal-body form">
               <form class="form-horizontal" id="form_supplier" name="form_supplier" onsubmit="return validateFormSupplier()" method="post" action="?cat=gudang&page=barang&act2=1">
                    <input type="hidden" value="" name="id"/> 
                 <div class="form-body">
                <!--INPUT-->    	
					<div class="form-group">
            			<label for="satuan" class="col-sm-3 control-label">Nama Supplier</label>
                		<div class="col-sm-6">
                			<div class="input-group">
                      			<div class="input-group-addon">
                        			<i class="fa fa-building"></i>
                        		</div>
            				<input class="form-control" name="nama" id="nama" placeholder="Nama Supplier" type="text" autocomplete="off" required/>
                			</div>
                		</div>
    				</div>
					<div class="form-group">
            			<label for="satuan" class="col-sm-3 control-label">Alamat</label>
                		<div class="col-sm-6">
                			<div class="input-group">
                      			<div class="input-group-addon">
                        			<i class="fa fa-map-o"></i>
                        		</div>
            				<input class="form-control" name="alamat" id="alamat" placeholder="Alamat Supplier" type="text" autocomplete="off" required/>
                			</div>
                		</div>
    				</div>
    				<div class="form-group">
            			<label for="satuan" class="col-sm-3 control-label">Email</label>
                		<div class="col-sm-6">
                			<div class="input-group">
                      			<div class="input-group-addon">
                        			<i class="fa fa-envelope"></i>
                      			</div>
            				<input class="form-control" name="email" id="email" placeholder="Email Supplier" type="Email" autocomplete="off"/>
                			</div>
                		</div>
    				</div>
    				<div class="form-group">
            			<label for="satuan" class="col-sm-3 control-label">Telepon</label>
                		<div class="col-sm-6">
                			<div class="input-group">
                      			<div class="input-group-addon">
                        			<i class="fa fa-phone"></i>
                        		</div>
            			<input type="text" name="telepon" class="form-control inputmask" placeholder="Telepon Supplier" autocomplete="off" required/>
                			</div>
                		</div>
    				</div>
    				<div class="form-group">
            			<label for="satuan" class="col-sm-3 control-label">Status</label>
                		<div class="col-sm-6">
                			<div class="input-group">
                      			<div class="input-group-addon">
                        			<i class="fa fa-shield"></i>
                        		</div>
            			<select class="form-control" name="status" autocomplete="off" required/>
            				<option value="">Pilih Status Supplier</option>
            				<option value="aktif">Aktif</option>
            				<option value="block">Black List</option>
            			</select>
                			</div>
                		</div>
    				</div>

    			<!--END INPUT--> 	
                 </div>
                 
            </div>
            <div class="modal-footer">
             <input type="submit" class="btn btn-primary" name="button" id="button" value="Simpan">&nbsp;&nbsp;
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
            </div>
           </form>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<!-- END Form modal Supplier -->


<script src="assets/plugins/jQuery/jQuery-2.1.4.min.js"></script>
    <script src="assets/plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="assets/plugins/datatables/dataTables.bootstrap.min.js"></script>
    <!-- SlimScroll -->
    <script src="assets/plugins/slimScroll/jquery.slimscroll.min.js"></script>
    <!-- FastClick -->
    <script src="assets/plugins/fastclick/fastclick.min.js"></script>
    <!-- Select2 -->
    <script src="assets/plugins/select2/select2.full.min.js"></script>
    <!-- InputMask -->
    <script src="assets/plugins/input-mask/jquery.inputmask.js"></script>
    <script src="assets/plugins/input-mask/jquery.inputmask.date.extensions.js"></script>
    <script src="assets/plugins/input-mask/jquery.inputmask.extensions.js"></script>
    <!-- page script -->

<script type="text/javascript">

 	$("#tabel_supplier").DataTable({"lengthMenu": [ [5, 10, 15, 20, -1], [5, 10, 15, 20, "All"] ]});
 	$(".select2").select2();
 	$('.inputmask').inputmask({
  	mask: ['099-999-999-999', '+62-99-999-999-999']
	});
 	//$('[data-toggle="tooltip"]').tooltip(); 
</script>





<!-- Form modal Supplier -->
<script type="text/javascript">
function add_supplier()
{
  //  save_method = 'add';
    $('#form_supplier')[0].reset(); // reset form on modals
    $('.form-group').removeClass('has-error'); // clear error class
    $('.help-block').empty(); // clear error string
    $('#supplier_form').modal('show'); // show bootstrap modal
    $('.modal-title').text('Tambah Data Supplier'); // Set Title to Bootstrap modal title
}

function alidateFormSupplier() {
    var x = document.forms["form_supplier"]["satuan"].value;
    if (x == null || x == "") {
        alert("Name must be filled out");
        return false;
    }
}

</script>


  

