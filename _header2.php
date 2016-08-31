<?php 
    if(!isset($_SESSION)) 
    { 
        session_start(); 
    }else{} 
if(!isset($_SESSION['login_hash']) && !isset($_SESSION['login_name'])){
   echo "<script>window.location='logout.php'</script>";
}
     ?>
<style type="text/css">
     .main-header .title-app {
      float: left;
      background-color: transparent;
      background-image: none;
      padding: 15px 0px;
      font-family: fontAwesome;
      color: #fff;
      font-size: calc(0.55em + 1vmin);
      min-width: 360px;" 
}
     </style>
      <header class="main-header" style="/*min-width: 460px;*/" >

        <!-- Header Navbar: style can be found in header.less -->
        <!--nav class="navbar navbar-static-top" role="navigation"-->
        <nav class="navbar navbar-static-top" >
        <div class="container">
            <div class="navbar-header">
                     <!-- Logo -->
        <a href="<?php echo $baseurl.'dashboard.php'; ?>" class="navbar-brand">
          <!-- mini logo for sidebar mini 50x50 pixels -->
          <span class="logo-mini"><b>SMN</b></span>
          <!-- logo for regular state and mobile devices -->
          <span class="logo-lg"><b>Solok Media Net</b></span>
        </a>
              
              <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-collapse" aria-expanded="true">
                <i class="fa fa-bars"></i>
              </button>
            </div>
          <!-- Sidebar toggle button-->
          <!--a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </a-->

          <!--span class="title-app">Management Handling Troubleshoot 2</span-->
           <?php echo $mode; ?>
           <div class="navbar-collapse pull-left collapse" id="navbar-collapse" aria-expanded="false" style="height: 1px;">
           <!--MENU ATAS-->
            <ul class="nav navbar-nav">
            <!--li><a href="#">Link</a></li-->
            <!--li><a href="dashboard.php?cat=web&page=Pelanggan">Pelanggan</a></li-->
            <li><a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-map-marker"></i> MAP <span class="caret"></span></a>
               <ul class="dropdown-menu" role="menu">
               <!--
                    <li><a href="dashboard.php?cat=maps&page=index">Lokasi Repeater</a></li>
                    <li><a href="dashboard.php?cat=maps&page=map_pelanggan">Lokasi Pelanggan</a></li>
                    <li><a href="dashboard.php?cat=maps&page=map-gangguan">Lokasi Gangguan</a></li>
                //-->    
                    <li class="divider"></li>
                    <li><a href="#Map_gangguan" onclick="javascript:showpage('pages/maps/map-pelanggan.php');"><i class="fa fa-map-marker"></i> Map Pelanggan</a></li>
                    <!--li><a href="#Map_gangguan" onclick="javascript:showpage('pages/maps/map-gangguan.php');"><i class="fa fa-map-marker"></i>Request</a></li>
                    <li><a href="#Map_Pending" onclick="javascript:showpage('pages/maps/map-pending.php');"><i class="fa fa-map-marker"></i>Pending </a></li>
                    <li><a href="#Map_Proses" onclick="javascript:showpage('pages/maps/map-proses.php');"><i class="fa fa-map-marker"></i>Proses</a></li>
                    <li><a href="#Map_Done" onclick="javascript:showpage('pages/maps/map-done.php');"><i class="fa fa-map-marker"></i>Done</a></li>
                 <!--   
                    <li><a href="#Map_Repeater" onclick="javascript:showpage('pages/maps/index.php');">Repeater (jv)</a></li>
                    <li><a href="#Map_Pelanggan" onclick="javascript:showpage('pages/maps/map_pelanggan.php');">Lokasi Pelanggan(jv) lg coding</a></li>
                    <li><a href="#Map_Pelanggan" onclick="javascript:showpage('pages/maps/index.php');">Lokasi Pelanggan index(jv) lg coding</a></li>
                    <li><a href="#Map_Perangkat" onclick="javascript:showpage('pages/maps/perangkat.php');">perangkat(jv)</a></li>
                    <li><a href="#Map_gangguan" onclick="javascript:showpage('pages/maps/map-gangguan.php');">Lokasi Request Gangguan(jv)</a></li>
                    <li><a href="#Map_gangguan" onclick="javascript:showpage('pages/maps/map_g.php');">Lokasi Request Gangguan(jv)</a></li>
                    -->
                     <li class="divider"></li>
               </ul>
            </li>
 <?php if($_SESSION['login_hash']=='krd'){ ?> 
           <li class="dropdown">
                  <a href="#Master_Data_Koordinator" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-folder"></i> MasterData <span class="caret"></span></a>
                  <ul class="dropdown-menu" role="menu">
                    <li class="divider"></li>
                    <li><a href="#Data_Pelanggan" onclick="javascript:showpage('pages/web/pelanggan2.php');"><i class="fa fa-user"></i>Data Pelanggan</a></li>
                    <li><a href="#Data_Perangkat" onclick="javascript:showpage('pages/web/perangkat.php');"><i class="fa fa-rss"></i>Data Perangkat</a></li>
                    <!--li><a href="#Data_Gangguan" onclick="javascript:showpage('pages/web/Gangguan.php');"><i class="fa fa-sign-out"></i>Data Gangguan*</a></li-->
                    <li><a href="#Data_Karyawan" onclick="javascript:showpage('pages/web/teknisi.php');"><i class="fa fa-user-secret"></i>Data Karyawan</a></li>
                    <li><a href="#Data_Paket" onclick="javascript:showpage('pages/web/paket.php');"><i class="fa fa-cubes"></i>Data Paket</a></li>
                    <li class="divider"></li>
                    <li><a href="#"></a></li>
                  </ul>
            </li> 
<?php } if($_SESSION['login_hash']=='cs' || $_SESSION['login_hash']=='tek'){ ?>   
         
           <li class="dropdown">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-folder"></i> Data<span class="caret"></span></a>
                  <ul class="dropdown-menu" role="menu">
                    <li class="divider"></li>
                    <li><a href="#Data_Pelanggan" onclick="javascript:showpage('pages/web/pelanggan2.php');"><i class="fa fa-user"></i>Data Pelanggan</a></li>
                    <li><a href="#Data_Perangkat" onclick="javascript:showpage('pages/web/teknisi.php');"><i class="fa fa-user-secret"></i>Data Karyawan*</a></li>
                    <li><a href="#Data_Gangguan" onclick="javascript:showpage('pages/web/perangkat.php');"><i class="fa fa-rss"></i>Data Perangkat</a></li>
                    <li><a href="#Data_Karyawan" onclick="javascript:showpage('pages/web/paket.php');"><i class="fa fa-cubes"></i>Data Paket</a></li>
                    <li class="divider"></li>
                    <li><a href="#"></a></li>
                  </ul>
            </li>
<?php } ?>  
            <li class="dropdown">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-wrench"></i>  Gangguan<span class="caret"></span></a>
                  <ul class="dropdown-menu" role="menu">
                    <li class="divider"></li>
                       <li><a href="#" onclick="javascript:showpage('pages/web/Gangguan.php');"><i class="fa fa-wrench"></i> Gangguan</a></li>
                    <li class="divider"></li>
                    <li><a href="#"></a></li>
                  </ul>
            </li>          
           <li class="dropdown">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-file-text"></i> Laporan<span class="caret"></span></a>
                  <ul class="dropdown-menu" role="menu">
                  <!--  
                    <li><a href="#" onclick="javascript:showpage('pages/web/mod/laporan/generate_gangguan.php');">* Gangguan (jv)</a></li>
                    <li><a href="dashboard.php?cat=web&page=pelanggan">Gangguan</a></li>
                    <li><a href="#"  onclick="javascript:showpage('pages/laporan.php');">Perbaikan</a></li>
                  //-->  
                    <li class="divider"></li>
                    <li><a href="#" onclick="javascript:showpage('pages/web/laporan_perbaikan.php');"><i class="fa fa-file-text"></i> Perbaikan </a></li>
                    <li><a href="#" onclick="javascript:showpage('pages/web/laporan_gangguan.php');"><i class="fa fa-file-text"></i> Gangguan </a></li>
                  <!--
                    <li><a href="#" onclick="javascript:showpage('pages/web/Gangguan.php');">Gangguan (jv)</a></li>
                    <li><a href="#" onclick="javascript:showpage('pages/web/pelanggan2.php');">PELANGGAN (jv)</a></li>
                    <li><a href="#" onclick="javascript:showpage('pages/web/tabel.php');">Data Tabel test (jv)</a></li>
                    <li><a href="#">Separated link</a></li>
                    //-->
                    <li class="divider"></li>
                    
                  </ul>
            </li>
 </ul>
<!--END MENU ATAS-->
        </div><!--container-->
      
          <div class="navbar-custom-menu">
            <ul class="nav navbar-nav"> 
            
              <?php //include('mod/mod_stok.php'); ?>
              <?php //include('mod/mod_nol_stok.php'); ?>
              <!-- Tasks: style can be found in dropdown.less -->

              <!-- User Account: style can be found in dropdown.less -->
              <li class="dropdown user user-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
            <?php  $img_q= mysql_fetch_array(mysql_query("SELECT tb_karyawan.avatar,tb_karyawan.bagian, tb_karyawan.hp as login_hp FROM tb_karyawan WHERE id_karyawan='".$_COOKIE['id']."'"));
                 $img = 'assets/img/user/'.$img_q['avatar'];
                echo  '<img src="'.$img.'" class="img-circle" id="menu-avatar" alt="User Image" style="width:25px; height:25px;">'; 

             ?>
                  <span class="hidden-xs">
      <?php  echo "<small>Hallo ".$_SESSION['login_name']."</small>"; ?>
                  </span>
                </a>
                <ul class="dropdown-menu">
                  <!-- User image -->
                  <li class="user-header">
                    <img src="<?php echo $img ?>" class="img-circle" alt="User Image">
                    <p>
                      <?php  echo login_stat; ?>               
                      <small><?php echo '0'. $img_q['login_hp'];?></small>
                    </p>
                  </li>
                  <!-- Menu Body -->
                  <li class="user-body">
                    <div class="col-xs-12 text-center">
                      <a class="btn btn-primary btn-xs col-xs-12" href="#Profile" onclick="javascript:showpage('pages/web/mod/teknisi/teknisi.profile.php');">Profile</a>                    
                    </div>
                    <!--div class="col-xs-4 text-center">
                      <a href="#">Sales</a>
                    </div>
                    <div class="col-xs-4 text-center">
                      <a href="#">Friends</a>
                    </div-->
                  </li>
                  <!-- Menu Footer-->
                  <li class="user-footer">
                    <div class="pull-left">
                      <!--a href="#" class="btn btn-default btn-flat">Profile</a-->
                     <a href="#ganti_password" class="btn btn-default btn-flat" onclick="javascript:showpage('pages/web/chgpwd.php');">Ganti Password</a>
                    </div>

                    <div class="pull-right">
                      <a href="dashboard.php?cat=web&page=logout" class="btn btn-default btn-flat">Sign out</a>
                    </div>
                  </li>
                </ul>
              </li>
              <!-- Control Sidebar Toggle Button -->
              <li>
                <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
              </li>
            </ul>
          </div>
        </nav>
      </header>

