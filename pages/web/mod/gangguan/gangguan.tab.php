 <?php 
 if(!isset($_SESSION)) 
    { 
        session_start(); 
    } 
require("../../../../_db.php");
require("../../../../inc/function/hitung_jumlah_pelanggan.php");
require("../../../../inc/function/hitung_jumlah_data_item.php");
  ?>
  <ul class="nav nav-tabs">
 <li class="active"><a href="#activity" data-toggle="tab" onclick="dataall()"">&nbsp; Data &nbsp;</a></li>
                  <li><a href="#tab-gangguan" data-toggle="tab" onclick="datagangguan()">&nbsp; Gangguan &nbsp;<span class="label label-danger pull-left"><?php echo hitung_gangguan() ?></span> </a></li>
                  <li><a href="#tab-pending" data-toggle="tab" onclick="datapending()">&nbsp; Pending &nbsp;<span class="label label-primary pull-left"><?php echo hitung_pending(); ?></span></a></li>
                  <li><a href="#tab-Process" data-toggle="tab" onclick="dataProcess()">&nbsp; Process &nbsp;<span class="label label-warning pull-left"><?php echo hitung_Proccess(); ?></span> </a></li>
                  <li><a href="#tab-done" data-toggle="tab" onclick="datadone()">&nbsp; Done &nbsp;<span class="label label-success pull-left"><?php echo hitung_done(); ?></span> </a></li>
                  <li><a href="#tab-sutar-jalan" data-toggle="tab" onclick="datasutarjalan()">Sutar Jalan</a></li>
                  <?php if ($_SESSION['login_hash']=='krd' || $_SESSION['login_hash']=='cs'  || $_SESSION['login_hash']=='tek'){ ?>
                  <!--li><a href="#tab-add" data-toggle="tab" onclick="tabadd()">Tambah Perangkat</a></li-->
                  <?php } ?>
</ul>