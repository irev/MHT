<?php
////////////////////////////////
// PROGRAM SKRIPSI MHT
// Refyandra
// gangguan.php 
// edit 6 juni 2016
// usercase TEKNISI
///////////////////////////////// 
include('_script.php');
?>
<script type="text/javascript">
	    //Fungsi Menu
    function list_allgangguan(){
        $(this).addClass('active');
        $('#data-gangguan').load('pages/krd/mod/gangguan/gangguan.alldata.php');
    }
    function list_gangguan(){
        $(this).addClass('active');
        $('#data-gangguan').load('pages/krd/mod/gangguan/gangguan.data.php');
    }  
    function list_done(){
        $(this).addClass('active');
        //$(this).removeClass("tot");
        $('#data-gangguan').load('pages/krd/mod/gangguan/gangguan.done.php');
    }
    function list_OnProccess(){
        $(this).addClass('active');
        $('#data-gangguan').load('pages/krd/mod/gangguan/gangguan.OnProccess.php');
    } 
    function list_Pending(){
        $(this).addClass('active');
        $('#data-gangguan').load('pages/krd/mod/gangguan/gangguan.pending.php');
    } 
    function list_surat(){
        $(this).addClass('active');
        $('#data-gangguan').load('pages/krd/mod/gangguan/gangguan.surat.php');
    } 

</script>

<section class="content">
    <div class="row">
<h3>Data Gangguan</h3>

    <div class="col-md-2">
    <div id="menu-gangguan"></div>
    </div>
     <div class="col-md-10">
		<!-- tempat untuk menampilkan data mahasiswa -->
		<div id="data-gangguan"></div>
	</div>
	</div>
</section>

<!-- awal untuk modal dialog -->
<div id="dialog-mahasiswa" class="modal fade modal-success" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
 <div class="modal-dialog">
    <div class="modal-content">
	<div class="modal-header">
		<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
		<h3 id="myModalLabel">Tambah Data Mahasiswa</h3>
	</div>
	<!-- tempat untuk menampilkan form mahasiswa -->
	<div class="modal-body"></div>
	<div class="modal-footer">
		<button class="btn btn-danger" data-dismiss="modal" aria-hidden="true">Batal</button>
		<button id="simpan-mahasiswa" class="btn btn-success">Simpan</button>
	</div>
	</div>
	</div>
</div>
<!-- akhir kode modal dialog -->
<?php 


?>

<!-- memanggil berkas javascript yang dibutuhkan -->
<!--script src="/jquery-1.8.3.min.js"></script-->
<!--script src="pages/cs/js/bootstrap.min.js"></script-->
<script src="pages/krd/mod/gangguan/js/aplikasi.js"></script>
