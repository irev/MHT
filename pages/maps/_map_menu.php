<?php
////////////////////////////////
// PROGRAM SKR
// IPSI MHT
// Refyandra
// gangguan.menu.php 
// edit 6 juni 2016
// usercase KOORDINATOR
/////////////////////////////////
session_start();
$idkaryawan = $_SESSION['id_karyawan'];
?>
<div class="box box-solid">
                <div class="box-header with-border">
                  <h3 class="box-title">JOB LIST</h3>
                  <div class="box-tools">
                    <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                  </div>
                </div>
                <div class="box-body no-padding">
                  <ul class="nav nav-pills nav-stacked">
                    <li><a href="#list_Pending" onclick="list_surat()"><i class="fa fa-file-text-o"></i> Surat Jalan <span class="label label-primary pull-right">12</span></a></li>
                    <!--li><a href="#"><i class="fa fa-trash-o"></i> Trash</a></li-->
                  </ul>
                </div><!-- /.box-body -->
              </div>

<div class="box box-solid">
                <div class="box-header with-border">
                  <h3 class="box-title">Folders</h3>
                  <div class="box-tools">
                    <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                  </div>
                </div>
                <div class="box-body no-padding">
                  <ul class="nav nav-pills nav-stacked">
                    <li><a href="#list_gangguan" onclick="multi_koordinat()"><i class="fa fa-folder list_gangguan"></i> All LOKASI </a></li>
                    <li><a href="#list_gangguan" onclick="multi_koordinat_P(0)"><i class="fa fa-folder list_gangguan"></i> Lokasi Proses </a></li>
                    <li><a href="#list_gangguan" onclick="multi_koordinat_P(1)"><i class="fa fa-folder list_gangguan"></i> DONE </a></li>
                    <li><a href="#list_gangguan" onclick="multi_koordinat_D()"><i class="fa fa-thumbs-down list_gangguan"></i> multi_koordinat_D <span class="label label-danger pull-right">12</span></a></li>
                    <li><a href="dashboard.php?cat=maps&page=map-proses"><i class="fa fa-wrench"></i> Dalam Perbaikan <!--span class="label label-warning pull-right">65</span--></a></li>
                    <li><a href="dashboard.php?cat=maps&page=map-gangguan"><i class="fa fa-thumbs-up"></i> Daerah Gangguan  <span class="label label-success pull-right">12</span></a></li>
                    <li><a href="#list_Pending" onclick="list_Pending()"><i class="fa fa-file-text-o"></i> Pending <span class="label label-primary pull-right">12</span></a></li>
                    <!--li><a href="#"><i class="fa fa-trash-o"></i> Trash</a></li-->
                  </ul>
                </div><!-- /.box-body -->
              </div>