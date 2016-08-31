<?php 
include_once("../_db.php");
include_once("../widget/pelanggan/hitung_jumlah_data_pelanggan.php");
?>
<div class="row">
<div class="col-md-12"> 
<div class="col-lg-3 col-xs-3">
              <!-- small box -->
              <div class="small-box bg-green">
                <div class="inner">
                  <h3><?php echo hitung_aktif(); ?></h3>
                  <p>Pelanggan Aktif</p>
                </div>
                <div class="icon">
                  <i class="fa fa-user"></i>
                </div>
                <!--a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a-->
              </div>
</div>
 <div class="col-lg-3 col-xs-3">
              <!-- small box -->
              <div class="small-box bg-blue">
                <div class="inner">
                  <h3><?php echo hitung_baru(); ?></h3>
                  <p>Pelanggan Baru</p>
                </div>
                <div class="icon">
                  <i class="fa fa-user"></i>
                </div>
                                <!--a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a-->
              </div>
</div>
 <div class="col-lg-3 col-xs-3">
              <!-- small box -->
              <div class="small-box bg-yellow">
                <div class="inner">
                  <h3><?php echo hitung_cuti(); ?></h3>
                  <p>Pelanggan Cuti</p>
                </div>
                <div class="icon">
                  <i class="fa fa-user"></i>
                </div>
                                <!--a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a-->
              </div>
</div>
 <div class="col-lg-3 col-xs-3">
              <!-- small box -->
              <div class="small-box bg-red">
                <div class="inner">
                  <h3><?php echo hitung_block(); ?></h3>
                  <p>Pelanggan Block</p>
                </div>
                <div class="icon">
                  <i class="fa fa-user"></i>
                </div>
                                <!--a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a-->
              </div>
</div>

</div>
</div>