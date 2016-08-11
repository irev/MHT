


<div class="row">
<div class="col-md-12">
    <div class="col-md-3">
    	<div id="menumap"></div>
	</div>
	<div class="col-md-9">
    	<div id="tampilmap"></div>
</div>
</div>
<?php 
include('_script.php');
 ?>
<script type="text/javascript">
    function multi_koordinat_A(){
	 $('#tampilmap').load('pages/maps/map_gangguan_s.php');
	 multi_koordinat();
	}
	 function multi_koordinat_D(){
		 $('#tampilmap').load('pages/maps/map_p.php');
	     $('#kordinattersimpan').load('pages/maps/proses/list_map_proses.php');
	      multi_koordinat_P(0);
	 }
	 $("button").click(function(){
        $("#div1").load("demo_test.txt");
      });
	 
//	 $('#kordinattersimpan').load('pages/maps/list_map_ganggun.php');
	 $('#menumap').load('pages/maps/_map_menu.php');
</script>

