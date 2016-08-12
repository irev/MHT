<?php 
include_once("../_db.php");
include_once("../widget/gangguan/hitung_jumlah_data_gangguan.php");
 ?>
<div class="col-md-3">
<div class="info-box bg-navy disabled color-palette">
  <!-- Apply any bg-* class to to the icon to color it -->
  <span class="info-box-icon bg-red-active"><i class="fa fa-sign-out"></i></span>
  <div class="info-box-content bg-red">
    <span class="info-box-text">Gangguan</span>
    <span class="info-box-number"><?php echo hitung_gangguan()?></span>
  </div><!-- /.info-box-content -->
  <div class="info-box-content">
  <a href="?cat=<?php echo $_SESSION['login_hash']; ?>&page=gangguan" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
  </div>
</div><!-- /.info-box -->
</div>
<div class="col-md-3">
<div class="info-box bg-navy disabled color-palette">
  <!-- Apply any bg-* class to to the icon to color it -->
  <span class="info-box-icon bg-green-active"><i class="fa fa-cubes"></i></span>
  <div class="info-box-content bg-green">
    <span class="info-box-text">Done</span>
    <span class="info-box-number"><?php echo hitung_done(); ?></span>
  </div><!-- /.info-box-content -->
  <div class="info-box-content ">
  <a href="?cat=<?php echo $_SESSION['login_hash']; ?>&page=gangguan" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
  </div>
</div><!-- /.info-box -->
</div>
<div class="col-md-3">
<div class="info-box bg-navy disabled color-palette">
  <!-- Apply any bg-* class to to the icon to color it -->
  <span class="info-box-icon  bg-aqua-active"><i class="fa fa-cube"></i></span>
  <div class="info-box-content bg-aqua">
    <span class="info-box-text">Pending</span>
    <span class="info-box-number"><?php echo hitung_pending(); ?></span>
  </div><!-- /.info-box-content -->
  <div class="info-box-content ">
  <a href="?cat=<?php echo $_SESSION['login_hash']; ?>&page=gangguan" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
  </div>
</div><!-- /.info-box -->
</div>
<div class="col-md-3">
<div class="info-box bg-navy disabled color-palette">
  <!-- Apply any bg-* class to to the icon to color it -->
  <span class="info-box-icon bg-yellow-active"><i class="fa fa-sign-in"></i></span>
  <div class="info-box-content bg-yellow">
    <span class="info-box-text">Proccess</span>
    <span class="info-box-number"><?php echo hitung_proccess(); ?></span>
  </div><!-- /.info-box-content -->
  <div class="info-box-content ">
  <a href="?cat=<?php echo $_SESSION['login_hash']; ?>&page=gangguan#list_OnProccess" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
  </div>
</div><!-- /.info-box -->
</div>

