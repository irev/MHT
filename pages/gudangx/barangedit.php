

<?php
ob_start();
if(isset($_GET['id']))
{
	$rs=mysql_query("Select * from data_barang where sha1(kode_barang)='".$_GET['id']."'");
	$row=mysql_fetch_array($rs);
?>
<div class="row">
<div class="col-md-6">

    <div class="box box-primary">
	<div class="box-header with-border">
           <h3 class="box-title">EDIT BARANG</h3>
        </div>
<form role="form" name="form1" class="form" method="post" action="?cat=gudang&page=barangedit&id=<?php echo $_GET['id']; ?>&edit=1">

                <div class="box-body">
                  <div class="form-group">
                    <label>Nama Barang:</label>
                    <div class="input-group">
                      <div class="input-group-addon">
                        <i class="fa fa-cube"></i>
                      </div>
      						<input class="form-control pull-right" type="text" name="namabarang" id="namabarang" value="<?php echo $row['nama_barang']; ?>">
                    </div><!-- /.input group -->
                  </div><!-- /.form group -->

<!-- Date range -->
                  <div class="form-group">
                    <label>Satuan Barang:</label>
                    <div class="input-group">
                      <div class="input-group-addon">
                        <i class="fa fa-cubes"></i>
                      </div>
     						<select class="form-control pull-right" name="jenis" id="jenis">
                    <option value=<?php echo '"'.$row['jenis'].'"'; ?>><?php echo $row['jenis']; ?></option>
<?php
		$no=0;
		$sql = "SELECT * FROM `satuan`";
		$ex = mysql_query($sql);
 		while($data = mysql_fetch_array($ex)){
		$no++;
?> 
        					<option value=<?php echo '"'.$data['nm_satuan'].'"';?>><?php echo $data['nm_satuan'];?></option>
<?php } ?>
      						</select>
                    </div><!-- /.input group -->
                  </div><!-- /.form group -->
 				
                 <div class="form-group">
                    <label>Modal Barang:</label>
                    <div class="input-group">
                      <div class="input-group-addon">
                        <i >Rp.</i>
                      </div>
                  <input class="form-control pull-right" type="text" name="modalbarang" id="modalbarang" value="<?php echo $row['harga']; ?>">
                    </div><!-- /.input group -->
                  </div><!-- /.form group -->

                 <div class="form-group">
                    <label>Harga Jual:</label>
                    <div class="input-group">
                      <div class="input-group-addon">
                        <i >Rp. </i>
                      </div>
                  <input class="form-control pull-right" type="text" name="hjual" id="hjual" value="<?php echo $row['harga_jual']; ?>">
                    </div><!-- /.input group -->
                  </div><!-- /.form group -->                  

</div><!-- /.box-body -->



 				    <div class="box-footer">
                  		<div class="pull-right">
      					<input type="submit" class="btn btn-primary" name="button" id="button" value="Ubah">&nbsp;&nbsp;<input type="reset" class="btn btn-danger" name="reset" id="reset" value="Batal" onclick="window.location='?cat=gudang&page=barang'">
                  		</div>
                  	</div>
 				</form>
</div><!-- /.box -->
</div><!-- /.col -->


<div class="col-md-6">
    <div class="box box-solid box-info">
        <div class="box-header with-border">
           <h3 class="box-title">Ditel Barang</h3>
        </div>
                <div class="box-body">


<!-- Info Stok  -->
<?php
//$sql1 = mysql_query("SELECT data_persediaan.stok_awal, data_persediaan.masuk, data_persediaan.keluar, data_persediaan.stok_tersedia, data_barang.nama_barang, data_barang.kode_barang FROM `data_persediaan` JOIN data_barang ON data_barang.kode_barang=data_persediaan.kode_barang GROUP BY kode_barang "); 
$sql1 = mysql_query("SELECT data_persediaan.stok_awal, data_persediaan.masuk, data_persediaan.keluar, data_persediaan.stok_tersedia, data_barang.nama_barang, data_barang.kode_barang FROM `data_persediaan` JOIN data_barang ON data_barang.kode_barang=data_persediaan.kode_barang WHERE sha1(data_persediaan.kode_barang)='".$_GET['id']."'");
$hasil = mysql_fetch_array($sql1);

?>
<div class="info-box bg-red">
  <span class="info-box-icon"><i class="fa fa-cubes"></i></span>
  <div class="info-box-content">
    <span class="info-box-number">Stok Barang  <span class="badge bg-green">3</span></span>
    <span class="info-box-text"><?php if($hasil['stok_awal']==0){echo "Standar Stok Awal: 0";}else{echo "Standar Stok Awal : ".$hasil['stok_awal'];}?> | <?php if($hasil['masuk']==0){echo "Masuk : 0";}else{ echo "Masuk : ".$hasil['masuk'];}?> | <?php if($hasil['keluar']==0){echo "Keluar : 0";}else{echo "Keluar : ".$hasil['keluar'];}?> 
    <?php 
    if($hasil['stok_awal']==0){
    	echo "0%";
    }
    else{
    	$persen = "0";
    		$stok_kini = (($hasil['masuk']-$hasil['keluar'])/$hasil['stok_awal'])*100; 
    		$persen    = $hasil['stok_awal']/100; 
    		echo " | ".intval($stok_kini)."%";    	
    }
    ?>

    </span>
    


    <!-- The progress section is optional -->
    <div class="progress">
      <div class="progress-bar" style=<?php if($hasil['stok_awal']==0){echo '"width:"2%;"';}else{ echo "width:".intval($stok_kini)."%";}?>></div>
    </div>
    <span class="progress-description">
      <?php if($hasil['stok_awal']==0){echo '0%';}else{ echo intval($stok_kini)."%";}?> Increase in 30 Days
    </span>
  </div><!-- /.info-box-content -->
</div><!-- /.info-box -->
<!-- Info Stok  -->



<div class="info-box bg-blue">
  <span class="info-box-icon"><i class="fa fa-cubes"></i></span>
  <div class="info-box-content">
    <span class="info-box-text">Stok Barang</span>
    <span class="info-box-number"><?php echo $hasil['stok_awal']?> | <?php echo $hasil['masuk']?> | <?php echo $hasil['keluar']?> <?php $persen='0'; $stok_kini = (($hasil['masuk']-$hasil['keluar'])/$hasil['stok_awal'])*100; $persen = $hasil['stok_awal']/100; echo " | ". intval($stok_kini) ; ?></span>
    <!-- The progress section is optional -->
    <div class="progress">
      <div class="progress-bar" style=<?php echo "width:".intval($stok_kini)."%"?>></div>
    </div>
    <span class="progress-description">
      <?php echo intval($stok_kini)."%"?> Increase in 30 Days
    </span>
  </div><!-- /.info-box-content -->
</div><!-- /.info-box -->
<!-- Info Stok  -->



                	
 				</div><!-- /.box-body -->
					<div class="box-footer">
                		<div class="pull-right">
                			ditel barang
                		</div>
                	</div>
</div><!-- /.box -->
</div><!-- /.col -->

</div><!-- /.box-body -->



<?php
include('_script.php');
ob_end_flush();
}else{
	echo "<script>window.location='?cat=gudang&page=barang'</script>";
}
?>
<?php
if(isset($_GET['edit']))
{
	
	$rs=mysql_query("Update data_barang SET nama_barang='".$_POST['namabarang']."',jenis_barang='".$_POST['jenis']."',harga='".$_POST['modalbarang']."',harga_jual='".$_POST['hjual']."' Where sha1(kode_barang)='".$_GET['id']."'");
	if($rs)
	{
		echo "<script>window.location='?cat=gudang&page=barang'</script>";
	}
}
?>

<script type="text/javascript">
	$(".info-box-content").hide();
	$(".info-box-content").show('slow', function() {	
	});
</script>

