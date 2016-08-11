<?php
////////////////////////////////
// PROGRAM 
// SKRIPSI MHT
// Refyandra
// gangguan.menu.php 
// edit 6 juni 2016
// usercase  ALL
// Fungsinya me-Redirec ke halaman home pada masing-masing user
/////////////////////////////////
if(!isset($_SESSION['login_hash'])) 
    { 
       // session_start(); 
    } 

//include("pages/".$_SESSION['login_hash']."/_home.php");
include("_home.php");
//include '_script.php';
?>