<?php
////////////////////////////////
// PROGRAM SKR
// IPSI MHT
// Refyandra
// gangguan.menu.php 
// edit 6 juni 2016
// usercase  CUSTOMER SERVICE
/////////////////////////////////


session_start();

$idkaryawan = $_SESSION['id_karyawan'];
require("../../../../_db.php");  
require("../../../../inc/function/hitung_jumlah_data_item.php");
require("../../../../inc/function/hitung_jumlah_pelanggan.php");
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
                    <li><a href="#Surat_Jalan" onclick="list_surat()"><i class="fa fa-file-text-o"></i> Surat Jalan <span class="label label-primary pull-right">12</span></a></li>
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
    if ($_SESSION['login_hash']=='krd' && $_SESSION['login_hash']=='cs'){
    ?>
                <div class="box-body no-padding">
                  <ul class="nav nav-pills nav-stacked">
                    <li><a href="#print" onclick="pelanggan_baru()"><i class="fa fa-user-plus"></i> Tambah Pelanggan <span class="label label-primary pull-right">+</span></a></li>
                 </ul>
                </div>
              
     <?php } ?>
</div> 

<div class="box box-solid">
                <div class="box-header with-border">
                  <h3 class="box-title">Gangguan</h3>
                  <div class="box-tools">
                    <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                  </div>
                </div>
                <div class="box-body no-padding">
                  <ul class="nav nav-pills nav-stacked">
                    <li><a href="#list_gangguan" onclick="list_allgangguan()"><i class="fa fa-folder list_gangguan"></i> All </a></li>
                    <li><a href="#list_gangguan" onclick="list_gangguan()"><i class="fa fa-thumbs-down list_gangguan"></i> Gangguan <span class="label label-danger pull-right"><?php echo hitung_gangguan() ?></span></a></li>
                    <li><a href="#list_OnProccess" onclick="list_OnProccess()"><i class="fa fa-wrench"></i> On Process <span class="label label-warning pull-right"><?php echo hitung_Proccess(); ?></span></a></li>
                    <li><a href="#list_done" onclick="list_done()"><i class="fa fa-thumbs-up"></i> Done <span class="label label-success pull-right"><?php echo hitung_done(); ?></span></a></li>
                    <li><a href="#list_Pending" onclick="list_Pending()"><i class="fa fa-file-text-o"></i> Pending <span class="label label-primary pull-right"><?php echo hitung_pending(); ?></span></a></li>
                    <!--li><a href="#"><i class="fa fa-trash-o"></i> Trash</a></li-->
                  </ul>
                </div><!-- /.box-body -->
              </div>