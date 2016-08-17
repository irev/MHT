<?php 
//////////////////////////////
// PROGRAM SKRIPSI MHT
// Refyandra
// pelanggan.php 
// edit 22 juni 2016
// usercase ALL
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
<!--script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"></script-->
<script type="text/javascript">

	    //Fungsi Menu
    function list_allpelanggan(){
        $(this).addClass('active');
        $('#data-pelanggan').load('pages/web/mod/pelanggan/pelanggan.alldata.php');
    }
    function list_pelanggan(){
        $(this).addClass('active');
        $('#data-pelanggan').load('pages/web/mod/pelanggan/pelanggan.data.php');
    }  
    function list_done(){
        $(this).addClass('active');
        //$(this).removeClass("tot");
        $('#data-pelanggan').load('pages/web/mod/pelanggan/pelanggan.done.php');
    }
    function list_OnProccess(){
        $(this).addClass('active');
        $('#data-pelanggan').load('pages/web/mod/pelanggan/pelanggan.OnProccess.php');
    } 
    function list_Pending(){
        $(this).addClass('active');
        $('#data-pelanggan').load('pages/web/mod/pelanggan/pelanggan.pending.php');
    }
    //Pemanggilan data surat 
    function list_surat(){
        $('#header-title').removeClass('hide');
        $('#data-pelanggan2').addClass('hide');
        $('#data-title').html(" Surat Jalan"); 
        $('#data-pelanggan').load('pages/web/mod/pelanggan/pelanggan.surat.php');
    }
    
    //TEKNISI 
    function list_teknisi(){
        $('#data-title').html("Data Teknisi"); 
        $('#header-title').removeClass('hide');
        $('#data-pelanggan2').addClass('hide');
        $('#data-pelanggan').load('pages/web/mod/teknisi/teknisi.data.php');
    } 
    function ditail_teknisi(){
        $('#header-title').addClass('hide');
        $('#data-pelanggan2').removeClass('hide');
        $('#data-pelanggan2').load('pages/web/mod/teknisi/teknisi.detail.php');
    }        

    //Pelanggan Baru
    function pelanggan_baru(){
        $('#data-pelanggan').load('pages/web/mod/pelanggan/pelanggan.form.php');
    }  
    function list_pelanggan(pel){
        console.log(pel);
        $('#header-title').removeClass('hide');
        $('#data-pelanggan2').addClass('hide');
        $('#data-pelanggan').load('pages/web/mod/pelanggan/pelanggan.aktif.php?pelanggan='+pel);
                if(pel==0){
        $('#data-title').html("Data Pelangan Baru"); 
        }else if(pel==1){
        $('#data-title').html("Data Pelangan Aktif"); 
        }else if(pel==2){
        $('#data-title').html("Data Pelangan Cuti"); 
        }else if(pel==3){
        $('#data-title').html("Data Pelangan Block"); 
        }else{
            $('#data-title').html("Data Pelangan"); 
        } 
    } 
</script>
<section class="content">
<div class="row">
<!--h3>Data pelanggan 
			<a href="#dialog-data" id="0" class="btn btn-success tambah" data-toggle="modal">
				<i class="fa fa-plus"></i> Tambah Data
			</a>
</h3-->


    <div class="col-md-3">
    <div id="menu-pelanggan"></div>
    </div>
     <div class="col-md-9">
            <div id="header-title"class="box box-primary">
                <div class="box-header with-border">
                  <h3 id="data-title" class="box-title">Data Pelanggan</h3>
                  <div class="box-tools pull-right">

                  </div><!-- /.box-tools -->
                </div><!-- /.box-header -->
		<!-- tempat untuk menampilkan data  -->
		<div id="data-pelanggan"></div>
     </div>   
	    <div id="data-pelanggan2"></div> 


	</div><!-- /.col -->
</section><!-- /section -->

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


$(function () {
   $("#DataTableGangguan").DataTable();
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false
    });
  });

</script>


<script src="pages/web/mod/pelanggan/js/aplikasi.js"></script>
