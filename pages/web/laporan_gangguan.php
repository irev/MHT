<section class="content">
<div class="row">

<div class="col-md-12">

<?php 
include_once('../../_db.php');
?>
<?php 
if (isset($_POST['priode'])) {
 	# code...
 	echo "tampil tampi ";
 	echo "<script>alert('tampil');</script>";
 } 
 ?>
<div class="col-md-4">
<div class="box">
<div class="box-body">
<form method="POST" id="form-priode">
<div class="col-md-12">
<div class="form-group col-xs-12">
<label class="form-control">Dari</label>
</div>
<div class="form-group col-xs-3">
	<select name="tgl" class="input-sm">
		<?php 
		echo "<option value='".date('d')."'>".date('d')."</option>";
		for ($tgl=1; $tgl <= 31; $tgl++) { 
			# code tampil bulan...
			echo "<option value='".$tgl."'>".$tgl."</option>";
		} ?>
	</select>
</div>
<div class="form-group col-xs-4">
	<select name="bln" class="input-sm">
	<?php 
			echo "<option value='".date('m')."'>".nm_bulanIndonesia(date('m'))."</option>";
	for ($bln=1; $bln <= 12; $bln++) { 
			# code tampil bulan...
			echo "<option value='".$bln."'>".nm_bulanIndonesia($bln)."</option>";
		} ?>
	</select>
</div>
<div class="form-group col-xs-4">
	<select name="thn" class="input-sm">
		<?php 
		echo "<option value='".date('Y')."'>".date('Y')."</option>";
		for ($i=2016; $i <= 2020; $i++) { 
			# code tampil tahun...
			echo "<option>".$i."</option>";
		} ?>
	 </select>
</div>
</div>	 
<!--SAMPAI SAMPAI //-->	
<div class="col-md-12">
<div class="form-group col-xs-12">
<label class="form-control">Sampai</label>
</div>
<div class="form-group col-xs-3">
	<select name="tgl_s" class="input-sm">
		<?php 
		echo "<option value='".date('d')."'>".date('d')."</option>";
		for ($tgl=1; $tgl <= 31; $tgl++) { 
			# code tampil bulan...
			echo "<option value='".$tgl."'>".$tgl."</option>";
		} ?>
	</select>
</div>
<div class="form-group col-xs-4">
	<select name="bln_s" class="input-sm">
	<?php 
			echo "<option value='".date('m')."'>".nm_bulanIndonesia(date('m'))."</option>";
	for ($bln=1; $bln <= 12; $bln++) { 
			# code tampil bulan...
			echo "<option value='".$bln."'>".nm_bulanIndonesia($bln)."</option>";
		} ?>
	</select>
</div>
<div class="form-group col-xs-4">
	<select name="thn_s" class="input-sm">
		<?php 
		echo "<option value='".date('Y')."'>".date('Y')."</option>";
		for ($i=2016; $i <= 2020; $i++) { 
			# code tampil tahun...
			echo "<option>".$i."</option>";
		} ?>
	 </select>
</div>	
<div class="box-footer">
</div>
</form>
<input type="button" id="tampil" value="Tampil" class="btn btn-primary pull-right">
</div>
</div>
</div>
</div>


<div class="col-md-8">
<div class="box">
<div class="box-body">
<div id="tampil-laporan">Tampil Laporan</div>
<!--iframe src="pages/web/mod/laporan/generate_gangguan.php" width='100%' height='500'></iframe-->
</div>
</div>
</div>
<div class="col-md-7">
<div class="box">
<!--iframe src="pages/web/mod/laporan/generate_perbaikan.php" width='100%' height='500'></iframe-->
</div>
</div>

</div>
</div>
</section>
<script type="text/javascript">
	$("#breadcrumb, #judulhal").text('Laporan Gangguan'); 
	$("#tampil").on("click",function() {
       alert("Tampilkan Laporan Gangguan");
       var priode = $("#form-priode").serialize();
       console.log(priode);
       $("#tampil-laporan").html('<iframe src="pages/web/mod/laporan/generate_gangguan.php?'+priode+'" width="100%" height="500"></iframe>');
    });
</script>