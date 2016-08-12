<?php 
//////////////////////////////
// PROGRAM SKRIPSI MHT
// Refyandra
// paket.php 
// edit 6 juni 2016
// usercase CUSTOMER SERVICE
///////////////////////////////
if(!isset($_SESSION)) 
    { 
        session_start(); 
    } 
require("../../_db.php");
require("../../inc/function/hitung_jumlah_pelanggan.php");
if(!isset($_SESSION['login_hash']) && !isset($_SESSION['login_name'])){
   echo "<script>window.location='".baseurl."logout.php'</script>";
}
?>

<script type="text/javascript" src="assets/msdropdown/js/jquery.dd.min.js"></script>
<script type="text/javascript">
<!--
	    //Fungsi Menu
    function list_allpaket(){
        $(this).addClass('active');
        $('#data-paket').load('pages/web/mod/paket/paket.alldata.php');
    }
    function list_paket(){
        $(this).addClass('active');
        $('#data-paket').load('pages/web/mod/paket/paket.data.php');
    }  
    function list_done(){
        $(this).addClass('active');
        //$(this).removeClass("tot");
        $('#data-paket').load('pages/web/mod/paket/paket.done.php');
    }
    function list_OnProccess(){
        $(this).addClass('active');
        $('#data-paket').load('pages/web/mod/paket/paket.OnProccess.php');
    } 
    function list_Pending(){
        $(this).addClass('active');
        $('#data-paket').load('pages/web/mod/paket/paket.pending.php');
    }
    function list_surat(){
        $('#header-title').removeClass('hide');
        $('#data-pelanggan2').addClass('hide');
        $('#data-title').html(" Surat Jalan"); 
        $('#data-paket').load('pages/web/mod/surat/paket.surat.php');
        //$('#data-paket2').load('pages/web/mod/paket/paket.surat.print.php');
    }
    //TEKNISI 
    function list_teknisi(){
        $('#data-title').html("Data Teknisi"); 
        $('#header-title').removeClass('hide');
        $('#data-paket2').addClass('hide');
        $('#data-paket').load('pages/web/mod/teknisi/teknisi.data.php');
    } 
    function ditail_teknisi(){
        $('#header-title').addClass('hide');
        $('#data-paket2').removeClass('hide');
        $('#data-paket2').load('pages/web/mod/teknisi/teknisi.detail.php');
    } 
//-->       
</script>


<section class="content">
    <div class="row">

    <div class="col-md-3">
    <a href="#dialog-data" data-toggle="modal" id="0" class="btn btn-app tambah" >
     <i class="fa fa-plus"></i> Tambah Paket
    </a>
    <div id="menu-pakets"></div>
    </div>

 <div class="col-md-12">
              <div class="nav-tabs-custom">
                <ul class="nav nav-tabs">
                  <li class="active"><a href="#activity" data-toggle="tab"  onclick="dataall()"">Informasi</a></li>
                  <li><a href="#tab-paket" data-toggle="tab" onclick="datapaket()">Data Paket</a></li>
                  <li><a href="#tab-aktif" data-toggle="tab" onclick="dataaktif()"></a></li>
                  <li><a href="#tab-baru" data-toggle="tab" onclick="databaru()"></a></li>
                  <li><a href="#tab-baik" data-toggle="tab" onclick="databaik()"></a></li>
                  <li><a href="#tab-rusak" data-toggle="tab" onclick="datarusak()"></a></li>
                  <?php if ($_SESSION['login_hash']=='krd' || $_SESSION['login_hash']=='cs'){ ?>
                  <li><a href="#tab-add" data-toggle="tab" onclick="tabadd()"> </a></li>
                  <?php } ?>
                  <li><a href="#settings" data-toggle="tab" onclick="databarux()"></a></li>
                </ul>
                <div class="tab-content">
                  <div class="active tab-pane" id="activity">
                    <!-- Post -->
                    <div class="alert alert-info alert-dismissable">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <h4><i class="icon fa fa-info"></i> Master Data Paket!</h4>
                    Daftar nama paket internet yang di tawarkan pada pelanggan.
                    <ul>
                        <li><strong>Icon Pin</strong> : berupa ikon yang akan di tampilka pada peta (pelanggan ditampilkan berdsarkan type paket yang digunakan)  </li> 
                        <li><strong>Bandwidth</strong> : (disebut juga Data Transfer atau Site Traffic) adalah besar data yang keluar+masuk/upload+download ke pelanggan, satuan yang dipakai pada sistem ini yaitu <strong>Mbps</strong></li> 

                    </ul> 
<!-- ul#nav>li.item$*4>a{item $} -->

                  </div>
                    <!-- Post -->
                  </div><!-- /.tab-pane -->
                  <div class="tab-pane" id="tab-paket">
                    <!-- Post -->
                        <div id="data-paket"></div>
                    <!-- Post -->
                  </div><!-- /.tab-pane -->
                  <div class="tab-pane" id="tab-aktif">
                    <!-- Post -->
                        <div id="data-aktif"></div>
                    <!-- Post -->
                  </div><!-- /.tab-pane -->
                  <div class="tab-pane" id="tab-baru">
                    <!-- Post -->
                        <div id="data-baru"></div>
                    <!-- Post -->
                  </div><!-- /.tab-pane -->
                  <div class="tab-pane" id="tab-baik">
                    <!-- Post -->
                        <div id="data-baik"></div>
                    <!-- Post -->
                  </div><!-- /.tab-pane -->
                  <div class="tab-pane" id="tab-rusak">
                    <!-- Post -->
                        <div id="data-rusak"></div>
                    <!-- Post -->
                  </div><!-- /.tab-pane -->
                  <div class="tab-pane" id="tab-add">
                    <!-- Post -->
                        <div id="data-add"></div>
                    <!-- Post -->
                  </div><!-- /.tab-pane -->
                  <div class="tab-pane" id="tab-edit">
                    <!-- The timeline -->
                         <div id="edit-data"></div>
                  </div><!-- /.tab-pane -->

                  <div class="tab-pane" id="settings">

                </div>     
                  </div><!-- /.tab-pane -->
                </div><!-- /.tab-content -->
              </div><!-- /.nav-tabs-custom -->
 </div><!-- /.col Data TAB-->

<!-- awal untuk modal dialog -->
<div id="dialog-data" class="modal fade modal-primary" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
 <div class="modal-dialog">
    <div class="modal-content">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <h3 id="myModalLabel">Tambah Data</h3>
    </div>
    <!-- tempat untuk menampilkan form  -->
    <div class="modal-body">
    </div>
    <div class="modal-footer">
        <button class="btn btn-danger" data-dismiss="modal" aria-hidden="true">Batal</button>
        <button id="simpan-data" class="btn btn-success">Simpan</button>
    </div>
    </div>
    </div>
</div>
<!-- akhir kode modal dialog -->

</div>
</section>



<?php 
include('_script.php');
?>


<script src="pages/web/mod/paket/js/aplikasi.js"></script>
