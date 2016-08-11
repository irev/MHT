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
			 url : "hapus_lokasi.php",
			 data: info,
			 success: function(){
			 }
			 });	
		 $(this).parents(".content").animate({ opacity: "hide" }, "slow");
 			}
		 return false;
		 });
	})
	</script>

<?php

// Load data tempat tersimpan
include('koneksi.php');
if(isset($_GET['lokasi'])){
$nmLokasi = $_GET['lokasi'];
$query = "select * from kordinat_gis where nama_tempat like '%$nmLokasi%'"; 
$lokasi = mysql_query($query);

if (mysql_num_rows($lokasi) > 0) {
while($koor=mysql_fetch_array($lokasi)){
	?>
<ul class="nav nav-pills nav-stacked">
    <li><a href="javascript:carikordinat(new google.maps.LatLng(<?php echo $koor['x']; ?>,<?php echo $koor['y']; ?>))"><i class="fa fa-map-marker"></i><?php echo $koor['nama_tempat']; ?><i class="fa fa-angle-right pull-right"></i></a>
    	<!--span class="pull-right badge bg-blue"><a href="#" class="
	delbutton" id="<?php echo $koor['nomor']; ?>">(Hapus)</a></span-->	
	</li>
</ul>	
	<?php
}
}else{
	echo '<ul class="nav nav-pills nav-stacked">
		 <li><a>Nama Repeater <span style="color:#FF0000;">"'.$nmLokasi.'"</span> Tidak diemukan</a></li>
		 </ul>
		 ';
}

}else{
$lokasi = mysql_query("select * from kordinat_gis");
while($koor=mysql_fetch_array($lokasi)){
	?>
<ul class="nav nav-pills nav-stacked">
    <li><a href="javascript:carikordinat(new google.maps.LatLng(<?php echo $koor['x']; ?>,<?php echo $koor['y']; ?>))"><i class="fa fa-map-marker"></i><?php echo $koor['nama_tempat']; ?><i class="fa fa-angle-right pull-right"></i></a>
    	<!--span class="pull-right badge bg-blue"><a href="#" class="
	delbutton" id="<?php echo $koor['nomor']; ?>">(Hapus)</a></span-->	
	</li>
</ul>	
	<?php
}
}
?>


