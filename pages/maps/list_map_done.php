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

  $(".view").click(function(){
      $('html,body').scrollTop(0); 
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
$query = "SELECT `p`.*,`p`.`nama` as nm_pelanggan ,`g`.*,`g`.`keterangan` as komen,`b`.*,`c`.merek,`c`.mac_address,`c`.keterangan as pr_ket FROM `tb_pelanggan` as `p` INNER JOIN `tb_gangguan` as `g` ON `p`.`id_pelanggan`=`g`.`id_pelanggan` INNER JOIN `tb_perangkat` as `c` ON `p`.`id_perangkat`=`c`.`id_perangkat` INNER JOIN `tb_paket` as `b` ON `p`.`id_paket`=`b`.`id_paket` WHERE `g`.`status_gangguan`='2'  AND `p`.`nama` like '%".$nmLokasi."%' GROUP BY p.id_pelanggan";
//$query = "SELECT * FROM `tb_pelanggan` JOIN tb_paket WHERE tb_pelanggan.id_paket=tb_paket.id_paket AND nama like '%$nmLokasi%'"; 
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
                        	<a class="btn btn-xs bg-blue view" onclick="javascript:$('html,body').scrollTop(0);" href="javascript:load_peta.carikordinat(new google.maps.LatLng(<?php echo $koor['x']; ?>,<?php echo $koor['y']; ?>),icon_pin='<?php echo $koor['ikon']; ?>')"><i class="fa fa-map-marker"></i> View</a>
                        	</span>
                        	<span class="pull-left">
                        	<!--a href="#" class=" btn btn-xs bg-red delbutton" id="php echo $koor['nomor']; ?>"><i class="fa fa-map-marker"></i> (Hapus)</a-->
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
//$lokasi = mysql_query("SELECT * FROM `tb_pelanggan` JOIN tb_paket WHERE tb_pelanggan.id_paket=tb_paket.id_paket");
$lokasi = mysql_query("SELECT `p`.*,`p`.`nama` as nm_pelanggan ,`g`.*,`g`.`keterangan` as komen,`b`.*,`c`.merek,`c`.mac_address,`c`.keterangan as pr_ket FROM `tb_pelanggan` as `p` INNER JOIN `tb_gangguan` as `g` ON `p`.`id_pelanggan`=`g`.`id_pelanggan` INNER JOIN `tb_perangkat` as `c` ON `p`.`id_perangkat`=`c`.`id_perangkat` INNER JOIN `tb_paket` as `b` ON `p`.`id_paket`=`b`.`id_paket` WHERE g.status_gangguan='2' GROUP BY p.id_pelanggan");
//$lokasi = "SELECT `p`.*,`p`.`nama` as nm_pelanggan ,`g`.*,`g`.`keterangan` as komen,`b`.*,`c`.merek,`c`.mac_address,`c`.keterangan as pr_ket FROM `tb_pelanggan` as `p` INNER JOIN `tb_gangguan` as `g` ON `p`.`id_pelanggan`=`g`.`id_pelanggan` INNER JOIN `tb_perangkat` as `c` ON `p`.`id_perangkat`=`c`.`id_perangkat` INNER JOIN `tb_paket` as `b` ON `p`.`id_paket`=`b`.`id_paket` WHERE g.status_gangguan='3' GROUP BY p.id_pelanggan";

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
                          <a class="btn btn-xs bg-blue view" href="javascript:load_peta.carikordinat(new google.maps.LatLng(<?php echo $koor['x']; ?>,<?php echo $koor['y']; ?>),icon_pin='<?php echo $koor['ikon']; ?>', new load_peta.ambildatabase('<?php echo $koor['id_pelanggan']; ?>'))"><i class="fa fa-map-marker"></i> View</a>
                        	<!--a class="btn btn-xs bg-blue" href="javascript:ambildatabase('<?php echo $koor['id_pelanggan']; ?>')"><i class="fa fa-map-marker"></i> View 2</a-->
                        	</span>
                        	<span class="pull-left">
                        	<!--a href="#" class=" btn btn-xs bg-red delbutton" id="<?php echo $koor['nomor']; ?>"><i class="fa fa-map-marker"></i> (Hapus)</a-->
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
  
