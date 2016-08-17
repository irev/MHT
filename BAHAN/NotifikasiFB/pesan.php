<?php
session_start();
$userid = $_SESSION['userid'];
include "config.php";
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
<h1>Halaman Pesan</h1>
<?php
$no = $_GET['no'];
$pesan = mysql_query("SELECT * FROM tabel_pesan WHERE nomor=$no
AND kepada='$userid'");
while($p = mysql_fetch_array($pesan)){
    echo "FROM : <br>".$p['dari']."<p>";
    echo "WAKTU : <br>".$p['waktu']."<p>";
    echo "PESAN :<BR>".$p['pesan']."<p>";
}
//set sudah dibaca = Y kalau sudah dibaca
$update = mysql_query("UPDATE tabel_pesan SET sudahbaca='Y'
WHERE nomor=$no AND kepada='$userid'");

?>

</div>
</body>

</html></style>
