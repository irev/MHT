<?php 
    if(!isset($_SESSION)) 
    { 
        session_start(); 
    } 
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
            <li><a href="#">Link</a></li>
            <li><a href="dashboard.php?cat=web&page=Pelanggan">Pelanggan</a></li>
            <li><a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false">MAP <span class="caret"></span></a>
               <ul class="dropdown-menu" role="menu">
                    <li><a href="dashboard.php?cat=maps&page=index">Lokasi Repeater</a></li>
                    <li><a href="dashboard.php?cat=maps&page=map_pelanggan">Lokasi Pelanggan</a></li>
                    <li><a href="dashboard.php?cat=maps&page=map-gangguan">Lokasi Gangguan</a></li>
                    <li class="divider"></li>
                    <li><a href="#" onclick="javascript:showpage('pages/maps/index.php');">Lokasi Repieter(jv)</a></li>
                    <li><a href="#" onclick="javascript:showpage('pages/maps/map_pelanggan.php');">Lokasi Pelanggan(jv)</a></li>
                    <li><a href="#" onclick="javascript:showpage('pages/maps/perangkat.php');">perangkat(jv)</a></li>
                    <li><a href="#" onclick="javascript:showpage('pages/maps/map-gangguan.php');">Lokasi Request Gangguan(jv)</a></li>
               </ul>
            </li>
          
           <li class="dropdown">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false">Master Data <span class="caret"></span></a>
                  <ul class="dropdown-menu" role="menu">
                    <li><a href="dashboard.php?cat=web&page=pelanggan">Daftar Pelanggan</a></li>
                    <li><a href="dashboard.php?cat=web&page=teknisi">Daftar Teknisi</a></li>
                    <li><a href="dashboard.php?cat=web&page=perangkat">Daftar Perangkat</a></li>
                    <li><a href="dashboard.php?cat=web&page=paket">Daftar Paket</a></li>
                    <li class="divider"></li>
                    <li><a href="#" onclick="javascript:showpage('pages/web/pelanggan2.php');">Pelanggan(jv) ok</a></li>
                    <li><a href="#" onclick="javascript:showpage('pages/web/perangkat.php');">perangkat(jv) ok</a></li>
                    <li><a href="#" onclick="javascript:showpage('pages/web/Gangguan.php');">Gangguan (jv) ok</a></li>
                    <li><a href="#" onclick="javascript:showpage('pages/web/teknisi.php');">teknisi(jv)</a></li>
                    <li><a href="#" onclick="javascript:showpage('pages/web/paket.php');">Paket(jv)</a></li>
                    <li class="divider"></li>
                    <li><a href="#">One more separated link</a></li>
                  </ul>
            </li>
           <li class="dropdown">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false">Laporan<span class="caret"></span></a>
                  <ul class="dropdown-menu" role="menu">
                    <li><a href="dashboard.php?cat=web&page=pelanggan">Gangguan</a></li>
                    <li><a href="#"  onclick="javascript:showpage('pages/laporan.php');">Perbaikan</a></li>
                    <li class="divider"></li>
                    <li><a href="#" onclick="javascript:showpage('pages/web/Gangguan.php');">Gangguan (jv)</a></li>
                    <li><a href="#" onclick="javascript:showpage('pages/web/pelanggan2.php');">PELANGGAN (jv)</a></li>
                    <li><a href="#" onclick="javascript:showpage('pages/web/tabel.php');">Data Tabel test (jv)</a></li>
                    <li><a href="#">Separated link</a></li>
                    <li class="divider"></li>
                    <li><a href="#">One more separated link</a></li>
                  </ul>
            </li>
 </ul>
<!--END MENU ATAS-->
        </div><!--container-->
      
          <div class="navbar-custom-menu">
            <ul class="nav navbar-nav"> 
            
              <?php include('mod/mod_stok.php'); ?>
              <?php include('mod/mod_nol_stok.php'); ?>
              <!-- Tasks: style can be found in dropdown.less -->
              <li class="dropdown tasks-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <i class="fa fa-flag-o"></i>
                  <span class="label label-danger">9</span>
                </a>
                <ul class="dropdown-menu">
                  <li class="header">You have 9 tasks</li>
                  <li>
                    <!-- inner menu: contains the actual data -->
                    <ul class="menu">
                      <li><!-- Task item -->
                        <a href="#">
                          <h3>
                            Design some buttons
                            <small class="pull-right">20%</small>
                          </h3>
                          <div class="progress xs">
                            <div class="progress-bar progress-bar-aqua" style="width: 20%" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
                              <span class="sr-only">20% Complete</span>
                            </div>
                          </div>
                        </a>
                      </li><!-- end task item -->
                    </ul>
                  </li>
                  <li class="footer">
                    <a href="#">View all tasks</a>
                  </li>
                </ul>
              </li>
              <!-- User Account: style can be found in dropdown.less -->
              <li class="dropdown user user-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
            <?php  $img_q= mysql_fetch_array(mysql_query("SELECT tb_karyawan.avatar,tb_karyawan.bagian, tb_karyawan.hp as login_hp FROM tb_karyawan WHERE id_karyawan='".$_COOKIE['id']."'"));
                 $img = 'assets/img/user/'.$img_q['avatar'];
                echo  '<img src="'.$img.'" class="img-circle" alt="User Image" style="width:25px; height:25px;">'; 

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
                    <div class="col-xs-4 text-center">
                      <a href="dashboard.php?cat=web&page=Profile">Profile</a>
                    </div>
                    <div class="col-xs-4 text-center">
                      <a href="#">Sales</a>
                    </div>
                    <div class="col-xs-4 text-center">
                      <a href="#">Friends</a>
                    </div>
                  </li>
                  <!-- Menu Footer-->
                  <li class="user-footer">
                    <div class="pull-left">
                      <!--a href="#" class="btn btn-default btn-flat">Profile</a-->
                      <a href="dashboard.php?cat=web&page=chgpwd" class="btn btn-default btn-flat">Ganti Password</a>
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
