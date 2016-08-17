<?php
include "config.php";
$waktu = date("H:i d M Y");
$dari = htmlspecialchars($_POST['dari']);
$pesan = htmlspecialchars($_POST['pesan']);
$kirim = mysql_query("INSERT INTO tabel_pesan VALUES(null,'$waktu','$dari','budi','$pesan','N')");
if($kirim){
    echo "Pesan berhasil dikirim";
}else{
    echo "gagal";
}
?>
