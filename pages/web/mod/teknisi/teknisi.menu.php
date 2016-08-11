<?php
////////////////////////////////
// PROGRAM SKR
// IPSI MHT
// Refyandra
// pelanggan.menu.php 
// edit 6 juni 2016
// usercase  CUSTOMER SERVICE
/////////////////////////////////
session_start();
if(!isset($_SESSION['login_hash']))
{
  echo "What your looking for..??";
}else{
require("../../../../_db.php");  
require("../../../../inc/function/hitung_jumlah_pelanggan.php");


$idkaryawan = $_SESSION['id_karyawan'];
?>
<div class="box box-solid">
                <div class="box-header with-border">
                  <h3 class="box-title">Job List </h3>
                  <div class="box-tools">
                    <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                  </div>
                </div>
                <div class="box-body no-padding">
                  <ul class="nav nav-pills nav-stacked">
                    <li><a href="#Surat_Jalan" onclick="list_surat()"><i class="fa fa-file-text-o"></i> Surat Jalan</a></li>
                  </ul>
                </div>
                <div class="box-body no-padding">
                  <ul class="nav nav-pills nav-stacked">
                    <li><a href="#Teknisi" onclick="list_teknisi()"><i class="fa fa-male"></i> Teknisi</a></li>
                  </ul>
                </div>
                <div class="box-body no-padding">
                  <ul class="nav nav-pills nav-stacked">
                    <li><a href="#Teknisi" onclick="list_teknisi()"><i class="fa fa-male"></i> Perangkat</a></li>
                  </ul>
                </div>
    <?php 
    if ($_SESSION['login_hash']=='krd' || $_SESSION['login_hash']=='cs'){
    ?>
                <div class="box-body no-padding">
                  <ul class="nav nav-pills nav-stacked">
                    <li><a href="#print" onclick="teknisi_baru()"><i class="fa fa-user-plus"></i> Tambah Karyawan <span class="label label-primary pull-right">+</span></a></li>
                 </ul>
                </div>
              
     <?php } ?>
</div> 
<!--div class="box box-solid">
                <div class="box-header with-border">
                  <h3 class="box-title">Teknisi</h3>
                  <div class="box-tools">
                    <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                  </div>
                </div>
                <div class="box-body no-padding">
                  <ul class="nav nav-pills nav-stacked">
                    <li><a href="#list_pelanggan" onclick="list_pelanggan()"><i class="fa fa-users list_pelanggan"></i> All <span class="label label-default pull-right"><?php echo hitung_semua_pel() ?></span></a></li>
                    <li><a href="#list_Aktif" onclick="list_pelanggan('1')"><i class="fa fa-check-circle"></i> Aktif <span class="label label-success pull-right"><?php echo hitung_aktif(); ?></span></a></li>
                    <li><a href="#list_Cuti" onclick="list_pelanggan('2')"><i class="fa  fa-warning"></i> Cuti <span class="label label-warning pull-right"><?php echo hitung_cuti(); ?></span></a></li>
                    <li><a href="#list_Block" onclick="list_pelanggan('3')"><i class="fa fa-ban list_pelanggan"></i> Block <span class="label label-danger pull-right"><?php echo hitung_block() ?></span></a></li>
                    <li><a href="#list_Baru" onclick="list_pelanggan('0')"><i class="fa  fa-user-plus"></i> Baru <span class="label label-primary pull-right"><?php echo hitung_baru(); ?></span></a></li-->
                    <!--li><a href="#"><i class="fa fa-trash-o"></i> Trash</a></li-->
                  <!--/ul>
                </div><!--/.box-body -->
              <!--/div-->

<?php  } ?>              