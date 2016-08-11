<?php 
//////////////////////////////
// PROGRAM SKRIPSI MHT
// Refyandra
// gangguan.php 
// edit 6 juni 2016
// usercase CUSTOMER SERVICE
///////////////////////////////

?>
<script type="text/javascript">
	    //Fungsi Menu
    function list_allgangguan(){
        $(this).addClass('active');
        $('#data-gangguan').load('pages/cs/mod/gangguan/gangguan.alldata.php');
    }
    function list_gangguan(){
        $(this).addClass('active');
        $('#data-gangguan').load('pages/cs/mod/gangguan/gangguan.data.php');
    }  
    function list_done(){
        $(this).addClass('active');
        //$(this).removeClass("tot");
        $('#data-gangguan').load('pages/cs/mod/gangguan/gangguan.done.php');
    }
    function list_OnProccess(){
        $(this).addClass('active');
        $('#data-gangguan').load('pages/cs/mod/gangguan/gangguan.OnProccess.php');
    } 
    function list_Pending(){
        $(this).addClass('active');
        $('#data-gangguan').load('pages/cs/mod/gangguan/gangguan.pending.php');
    }
    function list_surat(){
        $(this).addClass('active');
        $('#data-gangguan').load('pages/cs/mod/gangguan/gangguan.surat.php');
        $('#data-gangguan2').load('pages/cs/mod/gangguan/gangguan.surat.print.php');
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
<h3>Data Gangguan 
			<a href="#dialog-data" id="0" class="btn btn-success tambah" data-toggle="modal">
				<i class="fa fa-plus"></i> Tambah Data
			</a>
		</h3>


    <div class="col-md-3">
    <div id="menu-gangguan"></div>
    </div>
     <div class="col-md-9">
		<!-- tempat untuk menampilkan data  -->
		<div id="data-gangguan"></div>
		<div id="data-gangguan2"></div>
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
		<button class="btn btn-danger" data-dismiss="modal" aria-hidden="true">Batal</button>
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
	$("#datemask2").inputmask("mm/dd/yyyy", {"placeholder": "mm/dd/yyyy"});
</script>
<script src="pages/cs/mod/gangguan/js/aplikasi.js"></script>
