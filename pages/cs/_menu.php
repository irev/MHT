<?php if($_SESSION['login_hash']=="cs"){ ?>
            <li class="treeview">
              <a href="<?php echo $baseurl."dashboard.php"; ?>">
                <i class="fa  fa-archive"></i> <span>Dashboard</span> 
              </a>
            </li>
            <li class="treeview">
              <a href="#">
                <i class="fa fa-dashboard"></i> <span>Pelanggan</span> <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><?php echo '<a href="dashboard.php?cat='.$_SESSION['login_hash'].'&page=Pelanggan"><i class="fa fa-cubes"></i> Daftar Pelanggan</a>'?></li>
                <li><?php echo'<a href="dashboard.php?cat='.$_SESSION['login_hash'].'&page=status"><i class="fa fa-tag"></i> Status Pelanggan</a>'?></li>
                <li><?php echo'<a href="dashboard.php?cat='.$_SESSION['login_hash'].'&page=jenis_pelaporan"><i class="fa fa-tag"></i> Pelangan Baru</a>'?></li>
              </ul>
            </li>
            <li class="treeview">
              <a href="#">
                <i class="fa fa-dashboard"></i><span>MAP</span> <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><?php echo '<a href="dashboard.php?cat=maps&page=index"><i class="fa fa-cubes"></i> Lokasi Repeater</a>'?></li>
                <li><?php echo'<a href="dashboard.php?cat='.$_SESSION['login_hash'].'&page=status"><i class="fa fa-tag"></i> Status Pelanggan</a>'?></li>
                <li><?php echo'<a href="dashboard.php?cat='.$_SESSION['login_hash'].'&page=jenis_pelaporan"><i class="fa fa-tag"></i> Pelangan Baru</a>'?></li>
              </ul>
            </li>
            <li class="treeview">
              <a href="#">
                <i class="fa fa-dashboard"></i> <span>Master</span> <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><?php echo '<a href="dashboard.php?cat='.$_SESSION['login_hash'].'&page=gangguan"><i class="fa fa-cubes"></i> Ganguan</a>'?></li>
                <li><?php echo'<a href="dashboard.php?cat='.$_SESSION['login_hash'].'&page=status"><i class="fa fa-tag"></i> Satuan</a>'?></li>
                <li><?php echo'<a href="dashboard.php?cat='.$_SESSION['login_hash'].'&page=jenis_pelaporan"><i class="fa fa-tag"></i> Jenis</a>'?></li>
              </ul>
            </li>
            
            <li class="treeview">
              <a href="#">
                <i class="fa fa-exchange"></i> <span>Transakasi</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">

                <li><a href="dashboard.php?cat=web&page=all"><i class="fa fa-shopping-cart"></i> <span>ALL MAP</span></a></li>
                <li><a href="dashboard.php?cat=mapsv2&page=index"><i class="fa fa-sign-in"></i> <span>Pemetaan Tower</span></a></li>
                <li><a href="dashboard.php?cat=petugas&page=obat_keluar"><i class="fa fa-sign-out"></i> <span>Obat Keluar</span></a></li>

              </ul>
            </li>

            <li class="treeview">
              <a href="#">
                <i class="fa fa-clock-o"></i> <span>History</span> <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="dashboard.php?cat=petugas&page=History_Masuk"><i class="fa fa-mail-reply text-aqua"></i>Obat Masuk</a></li>
                <li><a href="dashboard.php?cat=petugas&page=History_keluar"><i class="fa fa-mail-forward text-aqua"></i>Obat Keluar</a></li>

              </ul>
            </li>

            <li class="treeview">
              <a href="#">
                <i class="fa fa-files-o"></i> <span>Laporan</span> <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <!--li><a href="dashboard.php?cat=petugas&page=lap"><i class="fa fa-sign-in"></i> <span>Laporan Harian</span></a></li>
                <li><a href="dashboard.php?cat=petugas&page=lap_k"><i class="fa fa-sign-in"></i> <span>Laporan </span></a></li-->
                <li><a href="dashboard.php?cat=petugas&page=laporanbulanan"><i class="fa fa-calendar"></i> <span>PAKAI OBAT BULANAN</span></a></li>
                <li><a href="dashboard.php?cat=petugas&page=laporanstokobname"><i class="fa fa-calendar"></i> <span>STOK OPNAME</span></a></li>
                <li><a href="dashboard.php?cat=petugas&page=laporanharian"><i class="fa fa-calendar"></i> <span>BON OBAT POLIKLINIK</span></a></li>
                <!--lli><a href="dashboard.php?cat=petugas&page=sell"><i class="fa fa-sign-out"></i> <span>Barang Keluar</span></a></li-->
              </ul>
            </li>

             <li class="treeview">
              <a href="dashboard.php?cat=web&page=logout">
                <i class="fa fa-toggle-on"></i><span>Log Out</span>
              </a>
            </li>
     <?php } ?> 