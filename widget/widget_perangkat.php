<?php 
include_once("../_db.php");
include_once("../widget/pelanggan/hitung_jumlah_data_pelanggan.php");
?>
<div class="row">
<div class="col-md-12"> 
 <div class="col-lg-2 col-xs-4">
              <!-- small box -->
              <div class="small-box bg-navy">
                <div class="inner">
                  <h3><?php echo hitungPrangkatTot(); ?></h3>
                  <p>Total Perangkat</p>
                </div>
                <div class="icon">
                  <i class="fa fa-cubes"></i>
                </div>
                <!--a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a-->
              </div>
</div>
 <div class="col-lg-2 col-xs-4">
              <!-- small box -->
              <div class="small-box bg-yellow">
                <div class="inner">
                  <h3><?php echo hitungPrangkatStok(); ?></h3>
                  <p>Stok Perangkat</p>
                </div>
                <div class="icon">
                  <i class="fa fa-cubes"></i>
                </div>
                <!--a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a-->
              </div>
</div>
<div class="col-lg-2 col-xs-4">
              <!-- small box -->
              <div class="small-box bg-green">
                <div class="inner">
                  <h3><?php echo hitungPrangkatAktif(); ?></h3>
                  <p>Perangkat Aktif</p>
                </div>
                <div class="icon">
                  <i class="fa fa-cubes"></i>
                </div>
                <!--a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a-->
              </div>
</div>
 <div class="col-lg-2 col-xs-4">
              <!-- small box -->
              <div class="small-box bg-blue">
                <div class="inner">
                  <h3><?php echo hitungPrangkatBaru(); ?></h3>
                  <p>Perangkat Baru</p>
                </div>
                <div class="icon">
                  <i class="fa fa-cubes"></i>
                </div>
                <!--a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a-->
              </div>
</div>
<div class="col-lg-2 col-xs-4">
              <!-- small box -->
              <div class="small-box bg-purple">
                <div class="inner">
                  <h3><?php echo hitungPrangkatBaik(); ?></h3>
                  <p>Perangkat Baik</p>
                </div>
                <div class="icon">
                  <i class="fa fa-cubes"></i>
                </div>
                <!--a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a-->
              </div>
</div>
 <div class="col-lg-2 col-xs-4">
              <!-- small box -->
              <div class="small-box bg-red">
                <div class="inner">
                  <h3><?php echo hitungPrangkatRusak(); ?></h3>
                  <p>Perangkat Rusak</p>
                </div>
                <div class="icon">
                  <i class="fa fa-cubes"></i>
                </div>
                <!--a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a-->
              </div>
</div>

</div>
</div>