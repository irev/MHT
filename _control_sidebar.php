      <!-- Control Sidebar -->
      <aside class="control-sidebar control-sidebar-dark">
        <!-- Create the tabs -->
        <ul class="nav nav-tabs nav-justified control-sidebar-tabs">
          <li class="active">
            <a href="#control-sidebar-home-tab" data-toggle="tab"><i class="fa fa-home"></i></a>
          </li>
          <li>
            <a href="#control-sidebar-settings-tab" data-toggle="tab"><i class="fa fa-gears"></i></a>
          </li>
          <li>
            <a href="#control-sidebar-low-stok" data-toggle="tab"><i class="fa fa-arrow-down"></i></a>
          </li>
          <li>
            <a href="#control-sidebar-up-stok" data-toggle="tab"><i class="fa fa-arrow-up"></i></a>
          </li>
        </ul>
        <!-- Tab panes -->
        <div class="tab-content">
        <div class="tab-pane" id="control-sidebar-low-stok">
        <h3 class="control-sidebar-heading">STOK MENIPIS</h3>
        <ul class="control-sidebar-menu">
        <?php 
            $low_tok =mysql_query('SELECT data_persediaan.*,data_barang.nama_barang FROM `data_persediaan` join data_barang on data_persediaan.kode_barang=data_barang.kode_barang WHERE stok_tersedia < 10');
            while ( $data_low_tok =mysql_fetch_array($low_tok) ) {
              # code...
        ?>
              <li>
                <a href="javascript::;">
                  <i class="menu-icon fa fa-arrow-down bg-red"></i>
                  <div class="menu-info">
                    <h4 class="control-sidebar-subheading"><?php echo $data_low_tok['nama_barang'] ?></h4>
                    <p>Jumlah Stok : <?php echo $data_low_tok['stok_tersedia']; ?></p>
                  </div>
                </a>
              </li>
         <?php  }  ?>     
            </ul><!-- /.control-sidebar-menu -->
        </div>
          <!-- Home tab content -->
          <div class="tab-pane active" id="control-sidebar-home-tab">
            <!--h3 class="control-sidebar-heading">Recent Activity</h3-->
<div class="box-group" id="accordion">            
  <!-- Barang Keluar -->
<div class="panel box box-primary bg-black">
                      <div class="box-header with-border">
                        <h4 class="box-title">
                          <a data-toggle="collapse" data-parent="#accordion" href="#coll_keluar" aria-expanded="false" class="collapsed">
                            <i class="fa fa-cubes"></i> Barang Keluar
                          </a>
                        </h4>
                      </div>
                      <div id="coll_keluar" class="panel-collapse collapse" aria-expanded="false" style="height: 0px;">
                        <div class="box-body">

             <ul class="control-sidebar-menu">
        <?php 
            $qRecent =mysql_query('SELECT * FROM `data_faktur_berang_keluar` ORDER BY `data_faktur_berang_keluar`.`tgl` DESC LIMIT 5');
            while ( $recent =mysql_fetch_array($qRecent) ) {
              # code...
        ?>
              <li>
                <a href="laporan.php?keluar=cetak&kode_transaksi=<?php echo $recent['kode_transaksi']; ?>" target="_blank">
                  <i class="menu-icon fa fa-file-text bg-blue"></i>
                  <div class="menu-info">
                    <h4 class="control-sidebar-subheading"><?php echo $recent['kode_transaksi']; ?></h4>
                    <p><?php echo tgl_indonesia($recent['tgl']); ?></p>
                  </div>
                </a>
              </li>
         <?php } ?>     
            </ul><!-- /.control-sidebar-menu -->
                        </div>
                      </div>
                    </div>
<!-- END Barang Keluar -->
<!-- Barang Masuk -->
<div class="panel box box-success bg-black">
                      <div class="box-header with-border">
                        <h4 class="box-title">
                          <a data-toggle="collapse" data-parent="#accordion" href="#coll_masuk" aria-expanded="false" class="collapsed">
                            <i class="fa fa-cubes"></i> Barang Masuk
                          </a>
                        </h4>
                      </div>
                      <div id="coll_masuk" class="panel-collapse collapse" aria-expanded="false" style="height: 0px;">
                        <div class="box-body">
<ul class="control-sidebar-menu">
        <?php 
            $qRecent =mysql_query('SELECT * FROM `data_faktur_berang_masuk` ORDER BY `data_faktur_berang_masuk`.`tgl` DESC LIMIT 5');
            while ( $recent =mysql_fetch_array($qRecent) ) {
              # code...
        ?>
              <li>
                <a href="laporan.php?keluar=cetak&kode_transaksi=<?php echo $recent['kode_transaksi']; ?>" target="_blank">
                  <i class="menu-icon fa fa-file-text bg-green"></i>
                  <div class="menu-info">
                    <h4 class="control-sidebar-subheading"><?php echo $recent['kode_transaksi']; ?></h4>
                    <p><?php echo tgl_indonesia($recent['tgl']); ?></p>
                  </div>
                </a>
              </li>
         <?php } ?>     
            </ul><!-- /.control-sidebar-menu -->
                        </div>
                      </div>
                    </div>
<!-- END Barang Masuk -->                
<!-- STOK BARANG -->
<div class="panel box box-warning bg-black">
                      <div class="box-header with-border">
                        <h4 class="box-title">
                          <a data-toggle="collapse" data-parent="#accordion" href="#coll_low" aria-expanded="false" class="collapsed">
                            <i class="fa fa-cubes"></i> Stok Menipis
                          </a>
                        </h4>
                      </div>
                      <div id="coll_low" class="panel-collapse collapse" aria-expanded="false" style="height: 0px;">
                        <div class="box-body">
<ul class="control-sidebar-menu">
       <?php 
            $low_tok =mysql_query('SELECT data_persediaan.*,data_barang.nama_barang FROM `data_persediaan` join data_barang on data_persediaan.kode_barang=data_barang.kode_barang WHERE stok_tersedia < 10 LIMIT 10');
            while ( $data_low_tok =mysql_fetch_array($low_tok) ) {
              # code...
        ?>
              <li>
                <a href="javascript::;">
                  <i class="menu-icon fa fa-arrow-down bg-red"></i>
                  <div class="menu-info">
                    <h4 class="control-sidebar-subheading"><?php echo $data_low_tok['nama_barang'] ?></h4>
                    <p>Jumlah Stok : <?php echo $data_low_tok['stok_tersedia']; ?></p>
                  </div>
                </a>
              </li>
         <?php  }  ?>        
            </ul><!-- /.control-sidebar-menu -->
                        </div>
                      </div>
                    </div>
<!-- END LOW STATUS STOK BARANG -->
</div>
            <!--h3 class="control-sidebar-heading">Tasks Progress</h3>
            <ul class="control-sidebar-menu">
              <li>
                <a href="javascript::;">
                  <h4 class="control-sidebar-subheading">
                    Custom Template Design
                    <span class="label label-danger pull-right">70%</span>
                  </h4>
                  <div class="progress progress-xxs">
                    <div class="progress-bar progress-bar-danger" style="width: 70%"></div>
                  </div>
                </a>
              </li>
            </ul><!-- /.control-sidebar-menu -->

          </div><!-- /.tab-pane -->
          <!-- Stats tab content -->
          <div class="tab-pane" id="control-sidebar-stats-tab">Stats Tab Content</div><!-- /.tab-pane -->
          <!-- Settings tab content -->
          <div class="tab-pane" id="control-sidebar-settings-tab">
            <!--form method="post">
              <h3 class="control-sidebar-heading">General Settings</h3>
              <div class="form-group">
                <label class="control-sidebar-subheading">
                  Report panel usage
                  <input type="checkbox" class="pull-right" checked>
                </label>
                <p>
                  Some information about this general settings option
                </p>
              </div><!-- /.form-group -->
            <!--/form-->
            <h3>Backup Database</h3>
           <a href="?cat=krd&page=backup2" type="button" class="btn btn-warning pull-right" value="backup">Backup Database</a>


          </div><!-- /.tab-pane -->
        </div>
      </aside><!-- /.control-sidebar -->
      <!-- Add the sidebar's background. This div must be placed
           immediately after the control sidebar -->