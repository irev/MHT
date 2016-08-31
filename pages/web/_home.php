
<?php 

include_once("../../_db.php");
include_once("../../widget/function/hitung_jumlah_data_item.php");
 ?>

 <!--div id='widget_perangkat'></div-->
    <div id='widget_pelanggan_perangkat_gangguan'></div>
    <!--div id='widget_pelanggan'></div-->
    <!--div id='widget_gangguan'></div-->
    <div id='user_online'></div>
    <div id='widget_all_tabel'></div>

<div class="row">
<div class="col-md-12"> 
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
                    
                    <div class="col-md-4">
                    <img class="gambar" src="assets/img/logo_smn.jpg" width="220" height="220">
                    </div>
                    <div class="col-md-8">
                    Sistem Aplikasi Management Handling Troubleshoot ini akan membantu penanganan terhadap komplain parapelanggan ISP Solok Media Net.
                    </div>
                    </div><!-- /.box-body -->
                    <div class="box-footer text-center" style="display: block;">
                      <a href="javascript::" class="uppercase"></a>
                    </div><!-- /.box-footer -->
                  </div>
</div>
<script type="text/javascript">
//$('img, .avatar').attr('width', '50');
//$('img, .avatar').attr('height', '50');
$('.avatar').attr('width', '50');
$('.avatar').attr('height', '50');
</script></div>




</div>
</div><!-- /.row -->


<script type="text/javascript">
//daftar link widget pada home
//var widlink_user     = "inc/mod/_user.php";
var widget_pelanggan_perangkat_gangguan     = "widget/widget_pelanggan_perangkat_gangguan.php";
var widlink_user     = "widget/widget_user.php";
var widlink_gangguan = "widget/widget_gangguan.php";
var widget_pelanggan = "widget/widget_pelanggan.php";
var widget_perangkat = "widget/widget_perangkat.php";
var widget_all_tabel = "widget/widget_all_tabel.php";


//Load widget pada awal loading halaman
   
   $('#widget_pelanggan_perangkat_gangguan').load(widget_pelanggan_perangkat_gangguan);
   $('#user_online').load(widlink_user);
   $('#widget_gangguan').load(widlink_gangguan);
   $('#widget_pelanggan').load(widget_pelanggan);
   $('#widget_perangkat').load(widget_perangkat);
   $('#widget_all_tabel').load(widget_all_tabel);

   function widget(){ 
       $('#widget_pelanggan_perangkat_gangguan').load(widget_pelanggan_perangkat_gangguan);
       $('#user_online').load(widlink_user);
       $('#widget_gangguan').load(widlink_gangguan);
       $('#widget_pelanggan').load(widget_pelanggan);
       $('#widget_perangkat').load(widget_perangkat);
       $('#widget_all_tabel').load(widget_all_tabel);

      // console.info("setInterval 3000 dari _home.php utk load inc/mod/_user.php ");
    }



    window.onload =widget;
    setInterval(widget, 3000);
</script>