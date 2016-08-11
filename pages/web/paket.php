<?php 
//////////////////////////////
// PROGRAM SKRIPSI MHT
// Refyandra
// paket.php 
// edit 6 juni 2016
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

<script type="text/javascript" src="assets/msdropdown/js/jquery.dd.min.js"></script>
<script type="text/javascript">
	    //Fungsi Menu
    function list_allpaket(){
        $(this).addClass('active');
        $('#data-paket').load('pages/web/mod/paket/paket.alldata.php');
    }
    function list_paket(){
        $(this).addClass('active');
        $('#data-paket').load('pages/web/mod/paket/paket.data.php');
    }  
    function list_done(){
        $(this).addClass('active');
        //$(this).removeClass("tot");
        $('#data-paket').load('pages/web/mod/paket/paket.done.php');
    }
    function list_OnProccess(){
        $(this).addClass('active');
        $('#data-paket').load('pages/web/mod/paket/paket.OnProccess.php');
    } 
    function list_Pending(){
        $(this).addClass('active');
        $('#data-paket').load('pages/web/mod/paket/paket.pending.php');
    }
    function list_surat(){
        $('#header-title').removeClass('hide');
        $('#data-pelanggan2').addClass('hide');
        $('#data-title').html(" Surat Jalan"); 
        $('#data-paket').load('pages/web/mod/surat/paket.surat.php');
        //$('#data-paket2').load('pages/web/mod/paket/paket.surat.print.php');
    }

    //TEKNISI 
    function list_teknisi(){
        $('#data-title').html("Data Teknisi"); 
        $('#header-title').removeClass('hide');
        $('#data-paket2').addClass('hide');
        $('#data-paket').load('pages/web/mod/teknisi/teknisi.data.php');
    } 
    function ditail_teknisi(){
        $('#header-title').addClass('hide');
        $('#data-paket2').removeClass('hide');
        $('#data-paket2').load('pages/web/mod/teknisi/teknisi.detail.php');
    }        
</script>


	<meta charset="utf-8">
	<title>jquery - php crud</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="">
	<meta name="author" content="">

	<link rel="shortcut icon" href="favicon.png"/>
	<!--link href="css/bootstrap.min.css" rel="stylesheet" media="screen"-->
</head>

<body>
<section class="content">
    <div class="row">

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
        <button class="btn btn-danger" data-dismiss="modal" aria-hidden="true">Batal</button>
        <button id="simpan-data" class="btn btn-success">Simpan</button>
    </div>
    </div>
    </div>
</div>
<!-- akhir kode modal dialog -->

    
    <div class="col-md-3">

    <div class="form-group">
    <a href="#dialog-data" id="0" class="col-md-12 btn btn-success tambah" data-toggle="modal">
                <i class="fa fa-plus"></i> Tambah Data
    </a>
    <br>
    </div>
    <div id="menu-paket"></div>
    </div>
     <div class="col-md-9">
            <div id="header-title"class="box box-primary">
                <div class="box-header with-border">
                  <h3 id="data-title" class="box-title">Data Paket Internet</h3>
                  <div class="box-tools pull-right">

                  </div><!-- /.box-tools -->
                </div><!-- /.box-header -->
		<!-- tempat untuk menampilkan data  -->
		<div id="data-paket"></div>

		
	</div>
    <div id="data-paket2"></div>
	</div>
</section>
<?php 
//include('_script.php');
?>


<script src="pages/web/mod/paket/js/aplikasi.js"></script>
