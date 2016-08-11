<?php 
// memanggil berkas koneksi.php
//require("../../../../_db.php");  

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>jquery - php crud</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="">
	<meta name="author" content="">

	<link rel="shortcut icon" href="favicon.png"/>
	<!--link href="css/bootstrap.min.css" rel="stylesheet" media="screen"-->
</head>

<body>

<div class="navbar navbar-static-top">
	<div class="navbar-inner">
		<div class="container">
			<a class="brand" href="http://umsida.ac.id">Univ. Muhammadiyah Sidoarjo</a>
		</div>
	</div>
</div>
<section class="content">
    <div class="row">
<h3>Data Gangguan 
			<a href="#dialog-mahasiswa" id="0" class="btn btn-success tambah" data-toggle="modal">
				<i class="fa fa-plus"></i> Tambah Data
			</a>
		</h3>


    <div class="col-md-3">
    <div id="menu-gangguan"></div>
    </div>
     <div class="col-md-9">
		<!-- tempat untuk menampilkan data mahasiswa -->
		<div id="data-mahasiswa"></div>
	</div>
	</div>
</section>

<!-- awal untuk modal dialog -->
<div id="dialog-mahasiswa" class="modal fade modal-primary" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
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
include('_script.php');

?> 
<!-- memanggil berkas javascript yang dibutuhkan -->
<!--script src="/jquery-1.8.3.min.js"></script-->
<!--script src="pages/cs/js/bootstrap.min.js"></script-->
<script src="pages/cs/aplikasi.js"></script>

</body>
</html>
