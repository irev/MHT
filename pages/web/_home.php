<div class="row">
<div class="col-md-12"> 
<?php 

include_once("../../_db.php");
include_once("../../widget/function/hitung_jumlah_data_item.php");
 ?>
    <div id='widget_gangguan'></div>
    <!--div id='widget_perangkat'></div-->
    <div id='user_online'></div>

<div id="user_online"><div class="col-md-7">
                <div class="box box-danger">
                    <div class="box-header with-border">
                      <h3 class="box-title">Management Handling Troubleshoot</h3>
                      <div class="box-tools pull-right">
                        <!--span class="label label-danger">8 New Members</span-->
                        <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                        <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                      </div>
                    </div><!-- /.box-header -->
                    <div class="box-body " style="display: block;">
                    <strong>SELAMAT DATANG</strong><br>
                    Sistem Aplikasi Management Handling Troubleshoot ini akan membantu dalam pengkoodinasian teknisi yang akan melakukan penanganan terhadap komplain parapelanggan jaringan ISP Solok Media Net
                    </div><!-- /.box-body -->
                    <div class="box-footer text-center" style="display: block;">
                      <a href="javascript::" class="uppercase"></a>
                    </div><!-- /.box-footer -->
                  </div>
</div>
<script type="text/javascript">
$('img, .avatar').attr('width', '50');
$('img, .avatar').attr('height', '50');
</script></div>




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