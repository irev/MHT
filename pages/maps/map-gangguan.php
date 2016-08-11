<!--script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"></script-->
<script type="text/javascript" src="pages/web/map/assets/js/markerclusterer_packed.js"></script>
<?php 
//include('_script.php');
 ?>

<div class="row">
<div class="col-md-12">
    <div class="col-md-3">
    	<div id="menumap"></div>
	</div>
	<div class="col-md-9">
    	<div id="tampilmap"></div>
</div>
</div>

<script type="text/javascript">
<!--
	 $('#tampilmap').load('pages/maps/map_g.php');
	 $('#kordinattersimpan').load('pages/maps/gangguan/list_map_gangguan.php');
	 $('#menumap').load('pages/maps/_map_menu.php');
	 
-->
</script>
<div onload="javascript:multi_koordinat();"></div>

