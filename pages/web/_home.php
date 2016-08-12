<div class="row">
<div class="col-md-12"> 
<?php 

include_once("../../_db.php");
include_once("../../widget/function/hitung_jumlah_data_item.php");
 ?>
    <div id='widget_gangguan'></div>
    <div id='widget_perangkat'></div>
    <div id='user_online'></div>

</div>
</div><!-- /.row -->


<script type="text/javascript">
//daftar link widget pada home
//var widlink_user     = "inc/mod/_user.php";
var widlink_user     = "widget/widget_user.php";
var widlink_gangguan = "widget/widget_gangguan.php";
var widget_perangkat = "widget/widget_perangkat.php";


//Load widget pada awal loading halaman
   
   $('#user_online').load(widlink_user);
   $('#widget_gangguan').load(widlink_gangguan);
   $('#widget_perangkat').load(widget_perangkat);

   function widget_user_online(){ 
       $('#user_online').load(widlink_user);
       $('#widget_gangguan').load(widlink_gangguan);
       $('#widget_perangkat').load(widget_perangkat);

       console.info("setInterval 3000 dari _home.php utk load inc/mod/_user.php ");
    }



    window.onload =widget_user_online;
    setInterval(widget_user_online, 3000);
</script>