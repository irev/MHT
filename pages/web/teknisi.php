<?php 
//////////////////////////////
// PROGRAM SKRIPSI MHT
// Refyandra
// web/teknisi.php 
// edit 21 juni 2016
// usercase CUSTOMER SERVICE
///////////////////////////////
if(!isset($_SESSION)) 
    { 
        session_start(); 
    } 
require("../../_db.php");
require("../../inc/function/hitung_jumlah_pelanggan.php");
if(!isset($_SESSION['login_hash']) && !isset($_SESSION['login_name'])){
   echo "<script>window.location='".baseurl."logout.php'</script>";
}
?>
<script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"></script>
<script type="text/javascript">
	    //Fungsi Menu
    function list_allteknisi(){
        $(this).addClass('active');
        $('#data-teknisi').load('pages/cs/mod/teknisi/teknisi.alldata.php');
    }
    function list_teknisi(){
        $(this).addClass('active');
        $('#data-teknisi').load('pages/cs/mod/teknisi/teknisi.data.php');
    }  
    function list_done(){
        $(this).addClass('active');
        //$(this).removeClass("tot");
        $('#data-teknisi').load('pages/cs/mod/teknisi/teknisi.done.php');
    }
    function list_OnProccess(){
        $(this).addClass('active');
        $('#data-teknisi').load('pages/cs/mod/teknisi/teknisi.OnProccess.php');
    } 
    function list_Pending(){
        $('data-title').removeClass('hide');
        $('#data-teknisi').load('pages/cs/mod/teknisi/teknisi.pending.php');
    }

    //Pemanggilan data surat 
    function list_surat(){
        $('#header-title').addClass('hide');
        $('#data-teknisi2').addClass('hide');
        $('#data-title').html(" Surat Jalan");
        $('#web-title').html("<?php echo title ?> | Surat Jalan");
        $('#data-teknisi2').removeClass('hide');
        $('#data-teknisi2').load('pages/web/mod/surat/gangguan.surat.php');
    }
    list_teknisi();
    //TEKNISI 
    function list_teknisi(){
        $('#data-title').html("Data Karyawan"); 
        $('#web-title').html("<?php echo title ?> | Data Karyawan");
        $('#header-title').removeClass('hide');
        $('#data-teknisi2').addClass('hide');
        $('#data-teknisi').removeClass('hide');
        $('#data-teknisi').load('pages/web/mod/teknisi/teknisi.data.php');
    }      

    function teknisi_baru(){
        $('#data-title').html("Input Data Karyawan"); 
        $('#web-title').html("<?php echo title ?> | Input Data Karyawan");
        $('#data-teknisi2').addClass('hide');
        $('#data-teknisi').removeClass('hide');
        $('#data-teknisi').load('pages/web/mod/teknisi/teknisi.form.php');
    }  
    function list_baru(){
        $('#data-teknisi').load('pages/web/mod/teknisi/teknisi.baru.php');
    } 
    function list_aktif(){
        $('#data-teknisi').load('pages/web/mod/teknisi/teknisi.aktif.php');
    } 
    function list_cuti(){
        $('#data-teknisi').load('pages/web/mod/teknisi/teknisi.cuti.php');
    }  
    function list_block(){
        $('#data-teknisi').load('pages/web/mod/teknisi/teknisi.block.php');
    }  
    function datateknisi(){
        $('#data-teknisi').load('pages/web/mod/teknisi/teknisi.data.php');
    }
    function ditail_teknisi(idk){
        var url = 'pages/web/mod/teknisi/teknisi.detail.php';
        $.post(url,{idk:idk}, function(data){
            $(".modal-body").html(data).show();
        });

    } 


</script>
<section class="content">
<div class="row">
<!--h3>Data teknisi 
			<a href="#dialog-data" id="0" class="btn btn-success tambah" data-toggle="modal">
				<i class="fa fa-plus"></i> Tambah Data
			</a>
</h3-->
    <div class="col-md-3">
    <div id="menu-teknisi"></div>
    </div>
     <div class="col-md-9">
     <div id="header-title" class="box box-primary">
                <div class="box-header with-border">
                  <h3 id="data-title" class="box-title">Data Teknisi</h3>
                  <div class="box-tools pull-right">

                  </div><!-- /.box-tools -->
                </div><!-- /.box-header -->
		<!-- tempat untuk menampilkan data  -->
		<div id="data-teknisi1"></div>
	</div>
        <div id="data-teknisi2"></div>
</div>

<!-- awal untuk modal dialog -->
<div id="dialog-data" class="modal fade modal-primary" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
 <div class="modal-dialog">
    <div class="modal-content">
	<div class="modal-header">
		<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
		<h3 id="myModalLabel">Data Teknisi</h3>
	</div>
    <div class="modal-body">
	<!-- tempat untuk menampilkan form  -->
        <div id="modal-data-teknisi"></div>
    </div>
	<div class="modal-footer">
        <button class="btn btn-danger" onclick="batal()" data-dismiss="modal" aria-hidden="true">Tutup</button>
    <!--
        <button class="btn btn-success" data-dismiss="modal" aria-hidden="true">Selesai</button>
		<button id="simpan-data" class="btn btn-success">Simpan</button>
    //-->
	</div>
	</div>
	</div>
</div>
<!-- akhir kode modal dialog -->

 <div class="col-md-12">
              <div class="nav-tabs-custom">
                <ul class="nav nav-tabs">
                  <li class="active"><a href="#activity" data-toggle="tab"  onclick=""><i class="fa fa-info"></i> Informasi</a></li>
                  <li><a href="#tab-teknisi" data-toggle="tab" onclick="datateknisi()"><i class="fa fa-inbox"></i> Data Paket</a></li>
                  <li><a href="#tab-aktif" data-toggle="tab" onclick="dataaktif()"></a></li>
                  <li><a href="#tab-baru" data-toggle="tab" onclick="databaru()"></a></li>
                  <li><a href="#tab-baik" data-toggle="tab" onclick="databaik()"></a></li>
                  <li><a href="#tab-rusak" data-toggle="tab" onclick="datarusak()"></a></li>
                  <?php if ($_SESSION['login_hash']=='krd' || $_SESSION['login_hash']=='cs'){ ?>
                  <li><a href="#tab-add" data-toggle="tab" onclick="tabadd()"> </a></li>
                  <?php } ?>
                  <li><a href="#settings" data-toggle="tab" onclick="databarux()"></a></li>
                <li>
                    <a href="#dialog-data" data-toggle="modal" id="0" class="tambah btn btn-app bg-warning  pull-right" >
     <i class="fa fa-plus"></i> Tambah Paket
    </a>    </li>

                </ul>
                <div class="tab-content">
                  <div class="active tab-pane" id="activity">
                    <!-- Post -->
                    <div class="alert alert-info alert-dismissable">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <h4><i class="icon fa fa-info"></i> Master Data Paket!</h4>
                    Daftar nama paket internet yang di tawarkan pada pelanggan.
                    <ul>
                        <li><strong>Icon Pin</strong> : berupa ikon yang akan di tampilka pada peta (pelanggan ditampilkan berdsarkan type paket yang digunakan)  </li> 
                        <li><strong>Bandwidth</strong> : (disebut juga Data Transfer atau Site Traffic) adalah besar data yang keluar+masuk/upload+download ke pelanggan, satuan yang dipakai pada sistem ini yaitu <strong>Mbps</strong></li> 

                    </ul> 
<!-- ul#nav>li.item$*4>a{item $} -->

                  </div>
                    <!-- Post -->
                  </div><!-- /.tab-pane -->
                  <div class="tab-pane" id="tab-teknisi">
                    <!-- Post -->
                        <div id="data-teknisi"></div>
                    <!-- Post -->
                  </div><!-- /.tab-pane -->
                  <div class="tab-pane" id="tab-aktif">
                    <!-- Post -->
                        <div id="data-aktif" ></div>
                    <!-- Post -->
                  </div><!-- /.tab-pane -->
                  <div class="tab-pane" id="tab-baru">
                    <!-- Post -->
                        <div id="data-baru"></div>
                    <!-- Post -->
                  </div><!-- /.tab-pane -->
                  <div class="tab-pane" id="tab-baik">
                    <!-- Post -->
                        <div id="data-baik"></div>
                    <!-- Post -->
                  </div><!-- /.tab-pane -->
                  <div class="tab-pane" id="tab-rusak">
                    <!-- Post -->
                        <div id="data-rusak"></div>
                    <!-- Post -->
                  </div><!-- /.tab-pane -->
                  <div class="tab-pane" id="tab-add">
                    <!-- Post -->
                        <div id="data-add"></div>
                    <!-- Post -->
                  </div><!-- /.tab-pane -->
                  <div class="tab-pane" id="tab-edit">
                    <!-- The timeline -->
                         <div id="edit-data"></div>
                  </div><!-- /.tab-pane -->

                  <div class="tab-pane" id="settings">

                </div>     
                  </div><!-- /.tab-pane -->
                </div><!-- /.tab-content -->
              </div><!-- /.nav-tabs-custom -->
 </div><!-- /.col Data TAB-->
 </div>
    </div>
</section>



<?php 
//include('_script.php');
?>
<script type="text/javascript">
function batal(){
    $("#koorX").val('');
    $("#koorY").val('');
    }
	$("#datemask2").inputmask("mm/dd/yyyy", {"placeholder": "mm/dd/yyyy"});
</script>
<script src="pages/web/mod/teknisi/js/aplikasi.js"></script>
