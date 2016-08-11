
<?php if($_SESSION['login_hash']=="krd"){ ?>
            <li class="treeview">
              <a href="#">
                <i class="fa fa-dashboard"></i> <span>Master Data </span> <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><?php echo '<a href="dashboard.php?cat=web&page=Pelanggan"><i class="fa fa-tag"></i> Daftar Pelanggan</a>'?></li>
                <li><?php echo'<a href="dashboard.php?cat=web&page=Teknisi"><i class="fa fa-tag"></i> Daftar Teknisi</a>'?></li>
                <li><?php echo'<a href="dashboard.php?cat=web&page=jenis_pelaporan"><i class="fa fa-tag"></i> Daftar Perangkat</a>'?></li>
                <li><?php echo'<a href="dashboard.php?cat=web&page=jenis_pelaporan"><i class="fa fa-tag"></i> Daftar Paket</a>'?></li>
              </ul>
            </li>
            <li class="treeview">
              <a href="#">
                <i class="fa fa-dashboard"></i><span>MAP</span> <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><?php echo '<a onclick="peta_awal()" href="dashboard.php?cat=maps&page=index"><i class="fa fa-tag"></i> Lokasi Repeater</a>'?></li>
                <li><?php echo'<a href="dashboard.php?cat='.$_SESSION['login_hash'].'&page=status"><i class="fa fa-tag"></i> Lokasi Pelanggan</a>'?></li>
                <li><?php echo'<a href="dashboard.php?cat='.$_SESSION['login_hash'].'&page=jenis_pelaporan"><i class="fa fa-tag"></i> Lokasi Gangguan</a>'?></li>
              </ul>
            </li>
            <li class="treeview">
              <a href="#">
                <i class="fa fa-dashboard"></i> <span>Maintenance</span> <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><?php echo '<a href="dashboard.php?cat='.$_SESSION['login_hash'].'&page=gangguan"><i class="fa fa-tag"></i> Requst</a>'?></li>
                <li><?php echo'<a href="dashboard.php?cat='.$_SESSION['login_hash'].'&page=status"><i class="fa fa-tag"></i> Riwayat Perangkat</a>'?></li>
                <li><?php echo'<a href="dashboard.php?cat='.$_SESSION['login_hash'].'&page=jenis_pelaporan"><i class="fa fa-tag"></i> Jenis</a>'?></li>
              </ul>
            </li>
     <?php } ?> 