<?php
session_start();
//misal anda login sebagai user dengan id=budi
$_SESSION['userid'] = "budi";
?>
<html>
<head>
<title>Notifikasi</title>
<link rel="stylesheet" href="gaya.css" type="text/css">
<script type="text/javascript" src="jquery-1.4.3.min.js"></script>
<script type="text/javascript" src="notifikasi.js"></script>
</head>

<body topmargin="0" leftmargin="0">
<div id="kepala">
<span id="pesan">
Pesan
<span id="notifikasi"></span>
</span>
<span id="home"><a href="index.php" class="home">Home</a></span>
</div>
<div id="info">
    <div id="loading"><br>Loading...<img src="loading.gif"></div>
    <div id="konten-info">
    </div>
</div>

<div id="content">
<h1>Selamat Datang</h1>
<h2><?php echo $_SESSION['userid'];?></h2>
PHP adalah bahasa scripting server-side, artinya di jalankan di server,
kemudian outputnya dikirim ke client (browser)
PHP digunakan untuk membuat aplikasi web
PHP mendukung banyak database (MySQL, Informix, Oracle, Sybase, Solid,
PostgreSQL, Generic ODBC, dll.)
<p>
<script>
function buka(){
open('formpesan.html','form','menubar=no,width=300,height=300');
}
</script>
[ <a href="#" onClick="buka()">Tes kirim pesan ke budi</a> ]       <br>
<br>
<br>
<br>
<a href="http://hotbenp.wordpress.com" target="_blank">www.hotbenp.wordpress.com</a>
</div>
</body>

</html></style>
