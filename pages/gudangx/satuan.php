
<div class="row" ><div class="col-md-12">
<!--BOX-->
<div class="box box-solid box-info">
<div class="box-header with-border">
<h3 class="box-title">Satuan Barang </h3><div class="pull-right"><a href="#" class="btn btn-xs btn-success " onclick="add_satuan()"><i class="fa fa-plus"></i><strong> SATUAN </strong></a></div>
</div>
<div class="box-body">
<!--BOX BODY-->
<table id="satuan_barang" class="table table-bordered table-striped">
	<thead>
	<tr>
		<th>No</th>
		<th>Nama Satuan</th>
		<th><center>Isi</center></th>
		<th>Action</th>
	</tr>
	</thead>
	<tbody>
<?php 
$no=0;
$stu = mysql_query('SELECT * FROM satuan');
while ($satuan=mysql_fetch_array($stu)) {
	$no++;
	# code...
 ?>
	<tr>
		<td><?php echo $no; ?></td>
		<td><?php echo $satuan['nm_satuan']; ?></td>
		<td><center><?php echo $satuan['isi']; ?></center></td>
		<td>
			<div class="pull-right">
			<a href="#" class="btn btn-xs btn-info" <?php echo 'onclick="edit_satuan('.$satuan['id'].', \''.$satuan['nm_satuan'].'\', '.$satuan['isi'].')"';?>><i class="fa fa-pencil"></i>  Edit</a>
			<a href="?cat=gudang&page=satuan&del=1&id=<?php echo sha1($satuan['id']); ?>" onclick="return confirm('Anda Yakin, menghapus satuan barang  <?php echo $satuan['nm_satuan'];?> ?')" class="btn btn-xs btn-danger"><i class="fa fa-trash-o"></i>  Delete</a>
			</div>
		</td>
	</tr>

<?php 
}
?>
</tbody>
</table>


<!--END BOX BODY-->
</div>
</div>
<!--END BOX-->

</div></div>
<?php 
include('_script.php');
 ?>

<script src="assets/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="assets/plugins/datatables/dataTables.bootstrap.min.js"></script>
<script>

function add_satuan() {
  //  save_method = 'add';
  $('#form2')[0].reset(); // reset form on modals
  $('.form-group').removeClass('has-error'); // clear error class
  $('.help-block').empty(); // clear error string
  $('#satuan_form').modal('show'); // show bootstrap modal
  $('#satuan_form').modal('handleUpdate');
  $('.modal-title').text('Tambah Satuan Barang'); // Set Title to Bootstrap modal title
  document.getElementById("button").value = 'Simpan';
}

function edit_satuan(id, nama, isi){
  var id=id; 
  var nama=nama; 
  var isi=isi;
  console.log(id + nama + isi);
  document.getElementById("idsatuan").value = id;
  document.getElementById("satuan").value= nama;
  document.getElementById("isi").value = isi;
  document.getElementById("button").value = 'Ubah';
//  $('#form2')[0].reset(); // reset form on modals
  $('.form-group').removeClass('has-error'); // clear error class
  $('.help-block').empty(); // clear error string
  $('#satuan_form').modal('show'); // show bootstrap modal
  $('#satuan_form').modal('handleUpdate');
  $('.modal-title').text('Edit Satuan Barang'); // Set Title to Bootstrap modal title
}
$("#satuan_barang").DataTable({"lengthMenu": [ [10, 15, 20, -1], [10, 15, 20, "Semua"] ]});
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
        <form class="form-horizontal" id="form2" name="form2" onsubmit="return validateForm2()" method="post" action="?cat=gudang&page=satuan&act2=1">
          <input type="hidden" value="" name="id" id="idsatuan"/>
          <div class="form-body">
            <!--INPUT-->
            <div class="form-group">
              <label for="satuan" class="col-sm-2 control-label">Satuan</label>
              <div class="col-sm-10">
                <input class="form-control" name="satuan" id="satuan" placeholder="Sauan Barang" type="text" autocomplete="off" required/>
              </div>
            </div>
            <div class="form-group">
              <label for="satuan" class="col-sm-2 control-label">Isi</label>
              <div class="col-sm-10">
                <input class="form-control" name="isi" id="isi" placeholder="isi Barang" type="number" min="1" value="1" autocomplete="off" required/>
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


<?php 
if(isset($_GET['act2']))
{
	if($_POST['satuan']!=='' && $_POST['button']=='Simpan'){
	  $rs2=mysql_query("Insert into satuan (`id`,`nm_satuan`, isi) values ('".$notr2."','".$_POST['satuan']."','".$_POST['isi']."')") or die(mysql_error());
		if($rs2)
		{	
			echo "<script>window.location='?cat=gudang&page=satuan'</script>";
		}
	}

	else if($_POST['button']=='Ubah'){
	$rsx=mysql_query("UPDATE `satuan` SET nm_satuan='".$_POST['satuan']."' , isi='".$_POST['isi']."'  WHERE id='".$_POST['id']."'") or die(mysql_error());
		if($rsx)
		{	
			echo "<script>window.location='?cat=gudang&page=satuan'</script>";
		}
	}else{
		echo '<script>bootbox.alert("Your message here…");</scrip>'; 
	}
}
?>

 <?php
if(isset($_GET['del']))
{
	$ids=$_GET['id'];
	$ff=mysql_query("Delete from satuan Where sha1(id)='".$ids."'");
	if($ff)
	{
		echo "<script>window.location='?cat=gudang&page=satuan'</script>";
	}
}
ob_end_flush();
?>