<?php 
error_reporting(0);
//Buat log 
$refferer = $_SERVER['HTTP_REFERER']? $_SERVER['HTTP_REFERER']:'No Refferer';
$uri = $_SERVER['REQUEST_URI'];
$ip = $_SERVER['REMOTE_ADDR'];
$tanggal = date('Y-m-d H:i:s');
$data = $tanggal." - ".$ip." - ".$refferer." - ".$uri."\r\n";
file_put_contents('log_mht.txt', $data, FILE_APPEND);
//Buat log 
?>