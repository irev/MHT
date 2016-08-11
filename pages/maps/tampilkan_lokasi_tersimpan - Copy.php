<script type="text/javascript">
	$(document).ready(function() {
		$(".delbutton").click(function(){
		 var element = $(this);
		 var del_id = element.attr("id");
		 var info = 'nomor=' + del_id;
		 if(confirm("Anda yakin akan menghapus?"))
		 {
			 $.ajax({
			 type: "POST",
			 url : "pages/maps/hapus_lokasi.php",
			 data: info,
			 success: function(){
			 }
			 });	
		 $(this).parents(".list").animate({ opacity: "hide" }, "slow");
 			}
		 return false;
		 });
	})
	</script>



 <div class="box-group box-solid no-border" id="accordion">
                    <div class="panel">	

<?php
// Load data tempat tersimpan
//include('koneksi.php');
include('../../_db.php');
if(isset($_GET['lokasi'])){
$nmLokasi = $_GET['lokasi'];
$query = "SELECT * FROM `tb_pelanggan` JOIN tb_paket WHERE tb_pelanggan.id_paket=tb_paket.id_paket AND nama like '%$nmLokasi%'"; 
$lokasi = mysql_query($query);

if (mysql_num_rows($lokasi) > 0) {
?>

 <div class="box-group box-solid no-border" id="accordion">
      <div class="panel">	
<?php	
$no=0;	
while($koor=mysql_fetch_array($lokasi)){
$no++;	
?>
<span class="list">
 <ul class="nav nav-pills nav-stacked no-border">
                            <li >
                          		<a data-toggle="collapse" data-parent="#accordion" href="#collapse<?php echo $no; ?>" aria-expanded="false" class="collapsed">
                          		<i class="fa fa-map-marker"></i>
                            	<?php echo $koor['nama']; ?>
                            	<i class="fa fa-angle-right pull-right"></i>
                          		</a>
                             </li>
                         </ul>
 
 							

                      <div id="collapse<?php echo $no; ?>" class="panel-collapse collapse" aria-expanded="false" style="height: 0px;">
                       <div  class="box-body">
                       		<span class="pull-right">
                        	<a class="btn btn-xs bg-blue" href="javascript:carikordinat(new google.maps.LatLng(<?php echo $koor['x']; ?>,<?php echo $koor['y']; ?>),icon_pin='<?php echo $koor['ikon']; ?>')"><i class="fa fa-map-marker"></i> View</a>
                        	</span>
                        	<span class="pull-left">
                        	<a href="#" class=" btn btn-xs bg-red delbutton" id="<?php echo $koor['nomor']; ?>"><i class="fa fa-map-marker"></i> (Hapus)</a>
                        	</span>
                      </div>
                      </div>
</span>
<?php
}
}else{
	echo '<ul class="nav nav-pills nav-stacked">
		 <li class="list"><a>Nama Repeater <span style="color:#FF0000;">"'.$nmLokasi.'"</span> Tidak diemukan</a></li>
		 </ul>
		 ';
}

}else{

?>
</div>
</div>
 <div class="box-group box-solid no-border" id="accordion">
      <div class="panel">	
<?php	
$no=0;
$lokasi = mysql_query("SELECT * FROM `tb_pelanggan` JOIN tb_paket WHERE tb_pelanggan.id_paket=tb_paket.id_paket");
while($koor=mysql_fetch_array($lokasi)){
$no++;
?>
                 
 <span class="list">                       
                          <ul class="nav nav-pills nav-stacked no-border">
                            <li>
                          		<a data-toggle="collapse" data-parent="#accordion" href="#collapse<?php echo $no; ?>" aria-expanded="false" class="collapsed">
                          		<i class="fa fa-map-marker"></i>
                            	<?php echo $koor['nama']; ?>
                            	<i class="fa fa-angle-right pull-right"></i>
                          		</a>
                             </li>
                         </ul>
 
 							

                      <div id="collapse<?php echo $no; ?>" class="panel-collapse collapse" aria-expanded="false" style="height: 0px;">
                       <div  class="box-body">
                       		<span class="pull-right">
                        	<a class="btn btn-xs bg-blue" href="javascript:carikordinat(new google.maps.LatLng(<?php echo $koor['x']; ?>,<?php echo $koor['y']; ?>),icon_pin='<?php echo $koor['ikon']; ?>')"><i class="fa fa-map-marker"></i> View</a>
                        	</span>
                        	<span class="pull-left">
                        	<a href="#" class=" btn btn-xs bg-red delbutton" id="<?php echo $koor['nomor']; ?>"><i class="fa fa-map-marker"></i> (Hapus)</a>
                        	</span>
                      </div>
                      </div>
</span>
                  


<?php
}
?>
  </div>
</div>

<?php
}
?>
  
