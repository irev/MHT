<!DOCTYPE html>
<?php
//ob_start("ob_gzhandler");
session_start();
ob_start();
echo "Tunggu Sebentar...";

if(!isset($_SESSION['login_hash']))
{
  echo " 404  Tunggu Sebentar...";
  // $_COOKIE['id'];
  //echo "PAGES 404";
  echo'<div class="overlay"><i class="fa fa-refresh fa-spin"></i></div> Please wait...';
  echo "<script>window.location='index.php'</script>";
  echo '<script>alert("ERROR"); </script>';
  
}else{
require("_db.php");
$idkar = $_SESSION['id_karyawan'];
mysql_query("UPDATE `tb_karyawan` SET online='1' WHERE id_karyawan='$idkar'");
include_once("inc/function/hitung_jumlah_data_item.php");
if (mode =='0'){
    error_reporting(0);
}else{
  $mode = msg;
    error_reporting();
}
if(!isset($_SESSION['login_hash']) && !isset($_SESSION['login_name'])){
   echo "<script>window.location='logout.php'</script>";
}
if ($_SESSION['rememberme']=='off'){
    $session_logout = $_SESSION['session_off']; //it means 1 jam. 
     //and then cek the time session 
    if($session_logout >= $_SESSION['session_time']){ 
        //user session time is up 
       //destroy the session 
      session_destroy(); 
     //redirect to login page 
     header("Location:index.php"); 
    } 
}

?>
  <head style="min-width: 360px;">
  <title id="web-title"><?php echo title ?></title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="">
  <meta name="author" content="meedun"> 
  <?php include("_css.php"); ?>
  <?php include("_js.php"); ?>  
  <script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"></script>
  <link rel="shortcut icon" href="favicon.png"/>
  </head>


  <!--body class="skin-green fixed " style="min-width: 360px;"-->
  <body class="skin-green fixed layout-top-nav" style="min-width: 360px;">
  <!--body class="hold-transition sidebar-mini skin-green fixed sidebar-collapse" style="min-width: 360px;" -->
    <div id="navbar-header"></div>
    <?php include("_header2.php"); ?>
    <!--HEADER--> 
    <?php //include("_main-nav.php");
    // echo $_SESSION['rememberme']; echo $_SESSION['session_time'];?>
    <div class="wrapper">
     
      <!--NAVIGASI MENU UTAMA-->
      <!-- =============================================== -->
      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
          <i class="fa fa-calendar"></i>

            <?php if (isset($_GET['page'])==null){
              echo "<span id='judulhal'>Dashboard<span>"; 
              }else { $hari = Date("d "); echo tgl_indonesia(Date("Y-m-d"));}
            ?>
            <small></small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li>
              <a href="#">
                <?php  if (isset($_GET['cat'])==null){
              echo "Dashboard";
              }else { echo strtoupper($_GET['cat']); }

            ?>
              </a>
            </li>
            <li id="breadcrumb">
              <?php  if (isset($_GET['page'])==null){
              echo "";
              }else 
              { echo strtoupper($_GET['page']); }

            ?>
            </li>
          </ol>
        </section>
        <section class="content">
          <!--div class="row">
            <div class="col-md-12"-->
<?php
        $v_cat = (isset($_REQUEST['cat'])&& $_REQUEST['cat'] !=NULL)?$_REQUEST['cat']:'';
        $v_page = (isset($_REQUEST['page'])&& $_REQUEST['page'] !=NULL)?$_REQUEST['page']:'';
        if(file_exists("pages/".$v_cat."/".$v_page.".php"))
        {
          include("pages/".$v_cat."/".$v_page.".php");
        }else{
          //include("pages/web/homepage.php");
          
          //echo $v_cat;
         // echo "<script>showpage('pages/web/homepage.php');</script>";
        }      
?>
<div id="main"></div>

        </section>
        <!-- /.content -->
      </div>
 
      <!-- /.content-wrapper -->
      <?php  include("_footer.php"); ?>
      <!-- /.control-sidebar-bg --> 
      <?php include("_control_sidebar.php"); ?>
      
      <div class="control-sidebar-bg"></div> 

    </div>
    <!-- ./wrapper -->
    <?php 
   //    include("_script.php"); 
    ?>
    <div id="main2"></div>
   

<script type="text/javascript">

  </script>
  </body>
  </html>
  <?php } ?>