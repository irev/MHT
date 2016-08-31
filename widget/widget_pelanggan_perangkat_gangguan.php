<?php 
include_once("../_db.php");
include_once("../widget/pelanggan/hitung_jumlah_data_pelanggan.php");
?>
<div class="row">
<div class="col-md-12"> 
 <div class="col-lg-4 col-xs-6">
              <!-- small box -->
              <div class="small-box bg-yellow">
                <div class="inner">
                  <h3><?php echo jumlahPelanggan(); ?></h3>
                  <p>Jumlah Pelanggan</p>
                </div>
                <div class="icon">
                  <i class="fa fa-user"></i>
                </div>
                <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
              </div>
</div>
 <div class="col-lg-4 col-xs-6">
              <!-- small box -->
              <div class="small-box bg-blue">
                <div class="inner">
                  <h3><?php echo jumlahPerangkat(); ?></h3>
                  <p>Jumlah Perangkat</p>
                </div>
                <div class="icon">
                  <i class="fa fa-rss"></i>
                </div>
                <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
              </div>
</div>
<div class="col-lg-4 col-xs-6">
              <!-- small box -->
              <div class="small-box bg-red">
                <div class="inner">
                  <h3><?php echo hitungKomplain(); ?></h3>
                  <p>Jumlah Gangguan</p>
                </div>
                <div class="icon">
                  <i class="fa fa-wrench"></i>
                </div>
                <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
              </div>
</div>
<!--div class="col-lg-3 col-xs-6">
              
              <div class="small-box bg-green">
                <div class="inner">
                  <h3><?php echo jumlahPerangkat(); ?></h3>
                  <p>Gangguan</p>
                </div>
                <div class="icon">
                  <i class="fa fa-rss"></i>
                </div>
                <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
              </div>
</div-->
</div>
</div>