<?php
////////////////////////////////
// PROGRAM SKR
// IPSI MHT
// Refyandra
// gangguan.menu.php 
// edit 6 juni 2016
// usercase  CUSTOMER SERVICE
/////////////////////////////////
require("../../../../_db.php");  
require("../../../../inc/function/hitung_jumlah_data_item.php");
session_start();
$idkaryawan = $_SESSION['id_karyawan'];
// hitung jumlah masing-masing tipe gangguan  selama 1 bulan 
$bulaini ='-'.date('m').'-';
$q_hitung_all       = mysql_fetch_array(mysql_query("SELECT COUNT(status_gangguan) as alls FROM `tb_gangguan` WHERE tgl_pelaporan like '%".$bulaini."%' "));
$q_hitung_gangguan  = mysql_fetch_array(mysql_query("SELECT COUNT(status_gangguan) as gangguan  FROM `tb_gangguan` WHERE status_gangguan='0' AND tgl_pelaporan like '%".$bulaini."%'"));
$q_hitung_Proccess  = mysql_fetch_array(mysql_query("SELECT COUNT(status_gangguan) as proccess  FROM `tb_gangguan` WHERE status_gangguan='1' AND tgl_pelaporan like '%".$bulaini."%'"));
$q_hitung_done      = mysql_fetch_array(mysql_query("SELECT COUNT(status_gangguan) as done      FROM `tb_gangguan` WHERE status_gangguan='2' AND tgl_pelaporan like '%".$bulaini."%'"));
$q_hitung_pending   = mysql_fetch_array(mysql_query("SELECT COUNT(status_gangguan) as pending   FROM `tb_gangguan` WHERE status_gangguan='3' AND tgl_pelaporan like '%".$bulaini."%'"));

$hitung_all      = $q_hitung_all['alls'];
$hitung_gangguan = $q_hitung_gangguan['gangguan'];
$hitung_Proccess = $q_hitung_Proccess['proccess'];
$hitung_done     = $q_hitung_done['done'];
$hitung_pending  = $q_hitung_pending ['pending'];


?>
<div class="box box-solid">
                <div class="box-header with-border">
                  <h3 class="box-title">Job List <?php echo hitung_semua() ?> </h3>
                  <div class="box-tools">
                    <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                  </div>
                </div>
                <div class="box-body no-padding">
                  <ul class="nav nav-pills nav-stacked">
                    <li><a href="#print" onclick="list_surat()"><i class="fa fa-file-text-o"></i> Surat Jalan <span class="label label-primary pull-right">12</span></a></li>
                    <li><a href="#"><i class="fa fa-trash-o"></i> Teknisi</a></li>
                  </ul>
                </div><!-- /.box-body -->
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
                    <li><a href="#list_gangguan" onclick="list_gangguan()"><i class="fa fa-thumbs-down list_gangguan"></i> Gangguan <span class="label label-danger pull-right"><?php echo $hitung_gangguan; ?></span></a></li>
                    <li><a href="#list_OnProccess" onclick="list_OnProccess()"><i class="fa fa-wrench"></i> On Proccess <span class="label label-warning pull-right"><?php echo $hitung_Proccess; ?></span></a></li>
                    <li><a href="#list_done" onclick="list_done()"><i class="fa fa-thumbs-up"></i> Done <span class="label label-success pull-right"><?php echo $hitung_done; ?></span></a></li>
                    <li><a href="#list_Pending" onclick="list_Pending()"><i class="fa fa-file-text-o"></i> Pending <span class="label label-primary pull-right"><?php echo $hitung_pending; ?></span></a></li>
                    <!--li><a href="#"><i class="fa fa-trash-o"></i> Trash</a></li-->
                  </ul>
                </div><!-- /.box-body -->
              </div>