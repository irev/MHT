<?php
//////////////////////////////
// PROGRAM SKRIPSI MHT
// Refyandra
// pelanggan.data.php 
// edit 6 juni 2016
// usercase CUSTOMER SERVICE
///////////////////////////////
require("../../../../_db.php"); 
$bk = baseurl."index.php";
error_reporting(0);
if(!isset($_SESSION['login_hash'])) 
{ 
  session_start(); 
}
if(!isset($_SESSION['login_hash'])){
  echo "<script>alert('anda harus login dulu..!');</script>";
 
  header("Location:".$bk);
} 
?>
    <!--Data table-->
    <link rel="stylesheet" href="assets/plugins/datatables/dataTables.bootstrap.css">
    <div class="box-body no-padding">
        <div class="mailbox-messages">
            <table id="DataTablepelangganAktif" class="table table-hover table-striped">
                <thead>
                    <tr>
                        <th> No</th>
                        <th style="min-width: 50px;">Sataus</th>
                        <th style="min-width: 100px;"></th>
                        <th> Nama</th>
                        <th>HP</th>
                        <th style="min-width: 40%;">Alamat</th>
                        <th>Paket</th>
                        <th>Perangkat</th>
                        <th>Awal pelanggan</th>
                        <th>Berlangganan</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                    /* JOIN tb_perangkat
                          ON  tb_pelanggan.id_perangkat=tb_perangkat.id_perangkat 
                          */
  echo  $st = mysql_real_escape_string($_GET['pelanggan']);
  if(!isset($_GET['pelanggan']) && !isset($_GET['id'])){
   // $st=$_GET['pelanggan'];
 $queryA = mysql_query("SELECT tb_pelanggan.*, tb_paket.paket, tb_paket.keterangan, tb_perangkat.merek, tb_perangkat.mac_address, tb_perangkat.status as status_peragkat  FROM `tb_pelanggan` 
                        LEFT  JOIN tb_paket 
                          ON tb_pelanggan.id_paket=tb_paket.id_paket
                        LEFT  JOIN tb_perangkat
                          ON  tb_pelanggan.id_perangkat=tb_perangkat.id_perangkat
                          ORDER BY `tb_pelanggan`.`id_pelanggan` ASC");
  }
  elseif(isset($_GET['id'])){
        $queryA = mysql_query("SELECT tb_pelanggan.*, tb_paket.paket, tb_paket.keterangan, tb_perangkat.merek, tb_perangkat.mac_address, tb_perangkat.status as status_peragkat  FROM `tb_pelanggan`
                        LEFT  JOIN tb_paket 
                          ON tb_pelanggan.id_paket=tb_paket.id_paket
                        LEFT  JOIN tb_perangkat
                          ON  tb_pelanggan.id_perangkat=tb_perangkat.id_perangkat 
                          where tb_pelanggan.status ='".$st."'
                          ORDER BY `tb_pelanggan`.`id_pelanggan` ASC");                

  }else{

        $queryA = mysql_query("SELECT tb_pelanggan.*, tb_paket.paket, tb_paket.keterangan  
        , tb_perangkat.merek, tb_perangkat.mac_address, tb_perangkat.status as status_peragkat 
        FROM `tb_pelanggan`
                        LEFT  JOIN tb_paket 
                          ON tb_pelanggan.id_paket=tb_paket.id_paket
                        LEFT  JOIN tb_perangkat
                          ON  tb_pelanggan.id_perangkat=tb_perangkat.id_perangkat 
                          where tb_pelanggan.status ='".$st."'
                          ORDER BY `tb_pelanggan`.`id_pelanggan` ASC");
        echo 'tampil semua ';
  }  
    $i = 1;
    // tampilkan data pelanggan selama masih ada
    while($dataA = mysql_fetch_array($queryA)) {
      if($dataA['status']==0) {
        $status = ' BARU ';
        $btclass = ' btn-primary ';
        $status_icon = "<i class='fa fa-user-plus'></i>";
      }
      elseif($dataA['status']==1) {
        $status = 'AKTIF';
        $btclass = ' btn-success ';
        $status_icon = "<i class='fa fa-check-circle'></i>";
      }
      elseif($dataA['status']==2) {
        $status = ' CUTI ';
        $btclass = ' btn-warning ';
        $status_icon = "<i class='fa fa-warning'></i>";
      }
      elseif($dataA['status']==3) {
        $status = 'BLOCK';
        $btclass = ' btn-danger ';
        $status_icon = "<i class='fa fa-ban'></i>";
      } else {
        $status = "Tidak Aktif";
      }

//cek paket 
      if ($dataA['paket']==NULL){
          # jika null
          $paket='';
          $ket_paket="<span class='label label-danger pull-center'>DITAK ADA</span>";
        }else{
          $paket=$dataA['paket'];
          $ket_paket="<span class='label label-primary pull-center'>".$dataA['keterangan']."</span>";

        }

// cek perangkat
     $queryB =  mysql_query("SELECT * FROM tb_pelanggan LEFT JOIN `tb_perangkat` ON tb_perangkat.id_perangkat=tb_pelanggan.id_perangkat where tb_pelanggan.id_pelanggan='".$dataA['id_pelanggan']."'");
      while($dataB = mysql_fetch_array($queryB)) {
        if ($dataB['merek']==NULL){
          # jika null
          $merek='';
          $mac_address="<span class='label label-danger pull-center'>DITAK ADA</span>";
        }else{
          $merek=$dataB['merek'];
          $mac_address="<span class='label label-primary pull-center'>".$dataB['mac_address']."</span>";

        }
     }

  ?>
                    <tr>
                        <td>
                            <?php echo $i ?>

                        </td>
                        <!--td class="mailbox-attachment">
      <a href="#edit_pelanggan" onclick="getform.ubah(<?php echo "'".$dataA['id_pelanggan']."'" ?>)"  id="<?php echo $dataA['id_pelanggan'] ?>" class="btn btn-default btn-sm ubah">
        <i class="fa fa-pencil"></i>
      </a> 
      <a  href="#tab-add" data-toggle="tab"  onclick="getform.ubah(<?php echo substr($dataA['id_pelanggan'],4) ?>)"  id="<?php echo $dataA['id_pelanggan'] ?>" class="btn btn-default btn-sm ubah">
        <i class="fa fa-pencil"></i>
      </a>
      <a href="#" id="<?php echo $dataA['id_pelanggan'] ?>" onclick="getform.hapus(<?php echo substr($dataA['id_pelanggan'],4) ?>)" class="btn btn-default btn-sm hapus">
        <i class="fa fa-trash"></i>
      </a>
    </td //-->

 <td>
       <a  href="#" class="btn  <?php echo $btclass; ?> btn-sm hapus" id="<?php echo $dataA['id_pelanggan'] ?>" onclick="alert(<?php echo substr($dataA['id_pelanggan'],4) ?>)">
      <?php echo $status_icon ?>
    </a>
 </td>
 <td class="mailbox-star">
    <?php  
     if ($_SESSION['login_hash']=='krd' || $_SESSION['login_hash']=='cs'){
      ?>
    <a href="#tab-edit" data-toggle="tab" class="btn btn-default btn-sm ubah" <?php $idpr = $dataA['id_pelanggan']; echo 'onclick="getform.ubah(\''.$idpr.'\')"' ?> id="<?php echo $dataA['id_pelanggan'] ?>">
      <i class="fa fa-gear"></i> 
    </a>
    <a  href="#tab-add" data-toggle="tab" class="btn btn-default btn-sm hapus" id="<?php echo $dataA['id_pelanggan'] ?>" onclick="getform.hapus(<?php echo substr($dataA['id_pelanggan'],4) ?>)">
      <i class="fa fa-trash"></i> 
    </a>
<!--                           
                            <div class="input-group-btn ">
                                <button type="button" class="btn <?php echo $btclass ?> dropdown-toggle col-md-12" data-toggle="dropdown" aria-expanded="false"><?php echo $status_icon ?> <?php echo $status ?> <span class="fa fa-caret-down"></span></button>
                                <ul class="dropdown-menu">
                                    <li>
                                        <a href="#tab-edit" data-toggle="tab" <?php $idpl = $dataA['id_pelanggan']; echo 'onclick="getform.ubah(\''.$idpl.'\')"' ?> id="<?php echo $dataA['id_pelanggan'] ?>" class="ubah">
                                            <i class="fa fa-pencil"></i> Edit
                                        </a>
                                    </li>
                                    <li class="divider"></li>
                                    <li>
                                        <a  href="#tab-add" data-toggle="tab" id="<?php echo $dataA['id_pelanggan'] ?>" onclick="getform.hapus(<?php echo substr($dataA['id_pelanggan'],4) ?>)" class="hapus">
                                            <i class="fa fa-trash"></i> Hapus
                                        </a>
                                    </li>
                                </ul>
                            </div>
//-->                            
                            <?php }else{ ?>
                            <div class="input-group-btn ">
                                <button type="button" class="btn <?php echo $btclass ?> dropdown-toggle col-md-12"><?php echo $status_icon ?> <?php echo $status ?> </button>

                            </div>
                            <?php  } ?>
                        </td>
                        <td>
                            <?php echo "<a href='#' onclick='profile()'>".$dataA['nama']."</a>"; ?> </td>
                        <td>
                            <?php echo "0".$dataA['hp'] ?> </td>
                        <td class="mailbox-subject" style="width: 100%;">
                            <?php $kets=$dataA['alamat']; echo  textSingkat($kets,70); ?>
                        </td>
                        <td style="background: #dafbe6;">
                            <?php echo $paket." <br>".$ket_paket; ?></td>
                        <td style="background: #dafbe6;">
                            <?php echo $merek."<br>".$mac_address; ?></td>
                        <td class="mailbox-date">
                            <?php echo tgl_indonesia($dataA['tgl_langganan']); ?>
                        </td>
                        <td class="mailbox-date">
                            <?php echo selisihwaktu($dataA['tgl_langganan']); ?>
                        </td>
                    </tr>
                    <?php
    $i++;
    }
  ?>
                </tbody>
            </table>
            <!-- /.table -->
        </div>
        <!-- /.mail-box-messages -->

        <div class="box-footer no-padding">
            <div class="mailbox-controls">
 
            </div>
            <?php echo $_SESSION['login_hash'];?>
        </div>
    </div>

    <script>
        $("#DataTablepelanggan-aktifx").DataTable({
            "fixedColumns": false,
            "responsive": false,
            "ordering": true,
            //"scrollY": false,
            "scrollX": false,
            "scrollCollapse": true,
            "fixedColumns": {
                "leftColumns": 1,
                "rightColumns": 1
            },
            //"autoWidth": false,
            "language": {
                "lengthMenu": " Tampil _MENU_ record per halaman",
                "zeroRecords": " Maaf - Data tidak ditemukan",
                "info": " Menampilkan halaman ke _PAGE_ dari _PAGES_ halaman",
                "infoEmpty": " Data tidak tersedia",
                "search": " Cari Data : ",
                "previus": " Cari Data : ",
                "next": " Cari Data : ",
                "infoFiltered": " (filtered from _MAX_ total records)"
            }

        });
        $('#example2').DataTable({
            "paging": true,
            "lengthChange": false,
            "searching": false,
            "ordering": true,
            "info": true,
            "autoWidth": false
        });
    </script>