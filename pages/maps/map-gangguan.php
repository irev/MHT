<!--script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"></script-->
<script type="text/javascript" src="pages/web/map/assets/js/markerclusterer_packed.js"></script>
<?php 
//include('_script.php');
 ?>
<section class="content">
<div class="row">
<div class="col-md-12">
    	<div id="tampilmap"></div>

</div>
</section>
<script type="text/javascript">
<!--

 //Ganti judul halaman
     $("#breadcrumb, #judulhal").text('Map Gangguan'); 
 //Tampil peta    
	 $('#tampilmap').load('pages/maps/map_g.php');
	 $('#kordinattersimpan').load('pages/maps/gangguan/list_map_gangguan.php');
	 $('#menumap').load('pages/maps/_map_menu.php');
	 
-->
</script>
<div onload="javascript:multi_koordinat();"></div>

