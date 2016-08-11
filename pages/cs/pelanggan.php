<?php 
//////////////////////////////
// PROGRAM SKRIPSI MHT
// Refyandra
// pelanggan.php 
// edit 6 juni 2016
// usercase CUSTOMER SERVICE
///////////////////////////////

?>

<script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"></script>
<script type="text/javascript">
	    //Fungsi Menu
    function list_allpelanggan(){
        $(this).addClass('active');
        $('#data-pelanggan').load('pages/cs/mod/pelanggan/pelanggan.alldata.php');
    }
    function list_pelanggan(){
        $(this).addClass('active');
        $('#data-pelanggan').load('pages/cs/mod/pelanggan/pelanggan.data.php');
    }  
    function list_done(){
        $(this).addClass('active');
        //$(this).removeClass("tot");
        $('#data-pelanggan').load('pages/cs/mod/pelanggan/pelanggan.done.php');
    }
    function list_OnProccess(){
        $(this).addClass('active');
        $('#data-pelanggan').load('pages/cs/mod/pelanggan/pelanggan.OnProccess.php');
    } 
    function list_Pending(){
        $(this).addClass('active');
        $('#data-pelanggan').load('pages/cs/mod/pelanggan/pelanggan.pending.php');
    }
    function list_surat(){
        $(this).addClass('active');
        $('#data-pelanggan').load('pages/cs/mod/pelanggan/pelanggan.surat.php');
    }

    //TEKNISI 
    function list_teknisi(){
        $('#data-pelanggan').load('pages/web/mod/teknisi/teknisi.data.php');
    } 
    function ditail_teknisi(){
        $('#data-pelanggan').load('pages/web/mod/teknisi/teknisi.detail.php');
    }        


    //
    function pelanggan_baru(){
        $('#data-pelanggan').load('pages/cs/mod/pelanggan/pelanggan.form.php');
    }  
    function list_baru(){
        $('#data-pelanggan').load('pages/web/mod/pelanggan/pelanggan.baru.php');
    } 
    function list_aktif(){
        $('#data-pelanggan').load('pages/web/mod/pelanggan/pelanggan.aktif.php');
    } 
    function list_cuti(){
        $('#data-pelanggan').load('pages/web/mod/pelanggan/pelanggan.cuti.php');
    }  
    function list_block(){
        $('#data-pelanggan').load('pages/web/mod/pelanggan/pelanggan.block.php');
    }  
</script>
<section class="content">
<div class="row">
<!--h3>Data pelanggan 
			<a href="#dialog-data" id="0" class="btn btn-success tambah" data-toggle="modal">
				<i class="fa fa-plus"></i> Tambah Data
			</a>
</h3-->


    <div class="col-xs-3">
    <div id="menu-pelanggan"></div>
    </div>
     <div class="col-xs-9">
		<!-- tempat untuk menampilkan data  -->
		<div id="data-pelanggan"></div>
	</div>
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
include('_script.php');
?>
<script type="text/javascript">
function batal(){
    $("#koorX").val('');
    $("#koorY").val('');
    }
	$("#datemask2").inputmask("mm/dd/yyyy", {"placeholder": "mm/dd/yyyy"});
</script>
<script src="pages/cs/mod/pelanggan/js/aplikasi.js"></script>
