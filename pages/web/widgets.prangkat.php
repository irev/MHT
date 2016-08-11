<?php 
///
/// widgets.prangkat.php
require("../../_db.php");
require("../../inc/function/hitung_jumlah_pelanggan.php");
?>
<div class="col-md-12">
<div class="col-md-3">
<div class="info-box bg-navy disabled color-palette">
  <!-- Apply any bg-* class to to the icon to color it -->
  <span class="info-box-icon bg-red-active"><i class="fa fa-sign-out"></i></span>
  <div class="info-box-content bg-red">
    <span class="info-box-text">AKTIF</span>
    <span class="info-box-number"><?php echo hitung_aktif()?></span>
  </div><!-- /.info-box-content -->
  <div class="info-box-content">
  <a href="?cat=<?php echo $_SESSION['login_hash']; ?>&page=gangguan" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
  </div>
</div>
</div><!-- /.info-box -->
<div class="col-md-3">
<div class="info-box bg-navy disabled color-palette">
  <!-- Apply any bg-* class to to the icon to color it -->
  <span class="info-box-icon bg-red-active"><i class="fa fa-sign-out"></i></span>
  <div class="info-box-content bg-red">
    <span class="info-box-text">BARU</span>
    <span class="info-box-number"><?php echo hitung_baru()?></span>
  </div><!-- /.info-box-content -->
  <div class="info-box-content">
  <a href="?cat=<?php echo $_SESSION['login_hash']; ?>&page=gangguan" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
  </div>
</div>
</div><!-- /.info-box -->
<div class="col-md-3">
<div class="info-box bg-navy disabled color-palette">
  <!-- Apply any bg-* class to to the icon to color it -->
  <span class="info-box-icon bg-red-active"><i class="fa fa-sign-out"></i></span>
  <div class="info-box-content bg-red">
    <span class="info-box-text">CUTI</span>
    <span class="info-box-number"><?php echo hitung_cuti()?></span>
  </div><!-- /.info-box-content -->
  <div class="info-box-content">
  <a href="?cat=<?php echo $_SESSION['login_hash']; ?>&page=gangguan" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
  </div>
</div>
</div><!-- /.info-box -->
<div class="col-md-3">
<div class="info-box bg-navy disabled color-palette">
  <!-- Apply any bg-* class to to the icon to color it -->
  <span class="info-box-icon bg-red-active"><i class="fa fa-sign-out"></i></span>
  <div class="info-box-content bg-red">
    <span class="info-box-text">BLOCK</span>
    <span class="info-box-number"><?php echo hitung_block()?></span>
  </div><!-- /.info-box-content -->
  <div class="info-box-content">
  <a href="?cat=<?php echo $_SESSION['login_hash']; ?>&page=gangguan" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
  </div>
</div>
</div><!-- /.info-box -->
