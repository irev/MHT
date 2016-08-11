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
    function ditail_teknisi(){
      // $('#data-title').addClass('hide');
        $('#header-title').addClass('hide');
        $('#data-teknisi').addClass('hide');
        $('#data-teknisi2').removeClass('hide');
        $('#data-teknisi2').load('pages/web/mod/teknisi/teknisi.detail.php');
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
		<div id="data-teknisi"></div>
	</div>
        <div id="data-teknisi2"></div>
	</div>
</section>

<!-- awal untuk modal dialog -->
<div id="dialog-data" class="modal fade modal-primary" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
 <div class="modal-dialog">
    <div class="modal-content">
	<div class="modal-header">
		<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
		<h3 id="myModalLabel">Tambah Data</h3>
	</div>
	<!-- tempat untuk menampilkan form  -->
	<div class="modal-body">
	</div>
	<div class="modal-footer">
        <button class="btn btn-success" data-dismiss="modal" aria-hidden="true">Selesai</button>
		<button class="btn btn-danger" onclick="batal()" data-dismiss="modal" aria-hidden="true">Batal</button>
		<button id="simpan-data" class="btn btn-success">Simpan</button>
	</div>
	</div>
	</div>
</div>
<!-- akhir kode modal dialog -->
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
