<?php
//////////////////////////////
// PROGRAM SKRIPSI MHT
// Refyandra
// pelanggan.data.php 
// edit 6 juni 2016
// usercase CUSTOMER SERVICE
///////////////////////////////
require("../../../../_db.php"); 

session_start();
if(!isset($_SESSION['login_hash'])){
  echo "<script>alert('anda harus login dulu..!');
             window.location =".baseurl.";
        </script>";
} 
$login=$_SESSION['login_hash'];
 $st=$_GET['status'];
?>
    <!--Data table-->
    <link rel="stylesheet" href="assets/plugins/datatables/dataTables.bootstrap.css">
    <div class="box-body no-padding">
        <div class="mailbox-messages table-responsive">
            <table id="TabelPerangkat" class="table table-hover table-striped">
                <thead>
                    <tr>
                        <th>No</th>
                        <?php if ($login=='krd' || $login=='cs' &&  $st==0){ 
                          echo "<th></th>";  
                        }else{

                          }?>
                        <th>Id Perangkat </th>
                        <th>Merek </th>
                        <th>Mac Address</th>
                        <th>TGL. Pembelian</th>
                        <th>Status</th>
                        <th>Di Pakai</th>
                    </tr>
                </thead>
<tbody>
<?php 

  if($_GET['status'] !== "undefined"){
       $st=$_GET['status'];
       $kt=$_GET['ket'];
  if($st==0){
    // stok perangkat
    //$queryA = mysql_query("SELECT *,tb_perangkat.keterangan as ket_perangkat  FROM `tb_perangkat`");
    $queryA = mysql_query("SELECT *,tb_perangkat.keterangan as ket_perangkat, tb_perangkat.status as stsp FROM `tb_perangkat`
                           LEFT JOIN `tb_pelanggan` ON (`tb_perangkat`.`id_perangkat`=`tb_pelanggan`.`id_perangkat`) 
                          ");
  } 
  elseif($st==0 && $_GET['ket']==1) {
    $queryA = mysql_query("SELECT *,tb_perangkat.keterangan as ket_perangkat  FROM `tb_perangkat` where status='0' AND keterangan='$kt'");
  }
  elseif($_GET['ket']==1) {
    # code...
    $queryA = mysql_query("SELECT *,tb_perangkat.keterangan as ket_perangkat, tb_perangkat.status as stsp FROM `tb_perangkat` 
                           LEFT JOIN `tb_pelanggan` ON `tb_perangkat`.`id_perangkat`=`tb_pelanggan`.`id_perangkat` 
                           WHERE tb_perangkat.keterangan='BAIK' AND tb_perangkat.status='1'");
  } 
  elseif($st==1 && $kt=='STOK') {
    $queryA = mysql_query("SELECT *,tb_perangkat.keterangan as ket_perangkat FROM `tb_perangkat` WHERE  keterangan!='rusak' && status='0'");     
  }
  elseif($st==1 &&   $kt=='BARU') {
   // $queryA = mysql_query("SELECT *,tb_perangkat.keterangan as ket_perangkat FROM `tb_perangkat` WHERE  `keterangan`='$kt'");     
   $queryA = mysql_query("SELECT *,tb_perangkat.keterangan as ket_perangkat, tb_perangkat.status as stsp FROM `tb_perangkat` 
                           LEFT JOIN `tb_pelanggan` ON `tb_perangkat`.`id_perangkat`=`tb_pelanggan`.`id_perangkat` 
                           WHERE tb_perangkat.keterangan='BARU'");
  }
  elseif($st==1 && $_GET['ket']=='BAIK') {
    //$queryA = mysql_query("SELECT *,tb_perangkat.keterangan as ket_perangkat FROM `tb_perangkat` WHERE `keterangan`='$kt'"); 
    $queryA = mysql_query("SELECT *,tb_perangkat.keterangan as ket_perangkat, tb_perangkat.status as stsp FROM `tb_perangkat` 
                           LEFT JOIN `tb_pelanggan` ON `tb_perangkat`.`id_perangkat`=`tb_pelanggan`.`id_perangkat` 
                           WHERE tb_perangkat.keterangan='BAIK'");    
  }
  elseif($st=1 && $_GET['ket']=='RUSAK') {
    $queryA = mysql_query("SELECT *,tb_perangkat.keterangan as ket_perangkat FROM `tb_perangkat` WHERE `keterangan`='$kt'");     
  }

  } 
    $i = 1;

    // tampilkan data pelanggan selama masih ada
    while($dataA = mysql_fetch_array($queryA)) {
      if($dataA['status']==0) {
        $status = ' BARU ';
        $btclass = ' btn-success ';
        $status_icon = "<i class='fa fa-user-plus text-primary'></i>";
      }
      elseif($dataA['status']==1) {
        $status = 'AKTIF';
        $btclass = ' btn-success ';
        $status_icon = "<i class='fa fa-check-circle text-success'></i>";
      }
      elseif($dataA['status']==2) {
        $status = ' CUTI ';
        $btclass = ' btn-warning ';
        $status_icon = "<i class='fa fa-warning text-warning'></i>";
      }
      elseif($dataA['status']==3) {
        $status = 'BLOCK';
        $btclass = ' btn-danger ';
        $status_icon = "<i class='fa fa-ban text-danger'></i>";
      } else {
        $status = "Tidak Aktif";
      }
// Keterangan perangkat
      if ($dataA['ket_perangkat']=='BAIK') {
        # code...
        $ket_perangkat="<span class='label label-success pull-center'>".$dataA['ket_perangkat']."</span>";
        $rusak="no";
      }elseif ($dataA['ket_perangkat']=='RUSAK') {
        # code...
        $ket_perangkat="<span class='label label-danger pull-center'>".$dataA['ket_perangkat']."</span>";
        $rusak="ya";
      }elseif ($dataA['ket_perangkat']=='BARU') {
        # code...
        $ket_perangkat="<span class='label label-primary pull-center'>".$dataA['ket_perangkat']."</span>";
        $rusak="no";
      }
      elseif ($dataA['ket_perangkat']=='BARU' && $dataA['status']=='0') {
        # code...
        $ket_perangkat="<span class='label label-primary pull-center'>".$dataA['ket_perangkat']."</span>";
        $rusak="no";
      }


  ?>
<tr>
  <td class="mailbox-subject" style="width: 5%;">
       <center><?php echo $i ?></center>
  </td>
 
<?php if ($login=='krd' || $login=='cs' &&  $st==0){ ?>
  <td class="mailbox-star" style="width: 5%;">
    <a href="#tab-edit" data-toggle="tab" class="btn btn-default btn-sm ubah" <?php $idpr = $dataA['id_perangkat']; echo 'onclick="getform.ubah(\''.$dataA[0].'\')"' ?> id="<?php echo $dataA[0] ?>">
      <i class="fa fa-gear"></i> 
    </a>
   <a  href="#tab-add" data-toggle="tab" class="btn btn-default btn-sm hapus" id="<?php echo $dataA['id_perangkat'] ?>" onclick="getform.hapus(<?php echo substr($dataA['id_perangkat'],4) ?>)">
      <i class="fa fa-trash"></i> 
   </a>
  <!--                                      
                            <div class="input-group-btn ">
                                <button type="button" class="btn <?php echo $btclass ?> dropdown-toggle col-md-12" data-toggle="dropdown" aria-expanded="false"><?php echo $status_icon ?> <?php echo $status ?> <span class="fa fa-caret-down"></span></button>
                                <ul class="dropdown-menu">
                                    <li>
                                        <a href="#tab-edit" data-toggle="tab" <?php $idpr = $dataA['id_perangkat']; echo 'onclick="getform.ubah(\''.$idpr.'\')"' ?> id="<?php echo $dataA['id_perangkat'] ?>" class="ubah">
                                            <i class="fa fa-pencil"></i> Edit
                                        </a>
                                    </li>
                                    <li class="divider"></li>
                                    <li>
                                        <a  href="#tab-add" data-toggle="tab" id="<?php echo $dataA['id_perangkat'] ?>" onclick="getform.hapus(<?php echo substr($dataA['id_perangkat'],4) ?>)" class="hapus">
                                            <i class="fa fa-trash"></i> Hapus
                                        </a>
                                    </li>
                                </ul>
                            </div> 
  //-->                          
  </td>
                            <?php }else{ ?>
                            <div class="input-group-btn ">
                            <p>--</p>
                                <!--button type="button" class="btn <?php echo $btclass ?> dropdown-toggle col-md-12"><?php echo $status_icon ?> <?php echo $status ?> </button-->
                            </div> <?php  } ?>
 
  <td class="mailbox-subject" style="width: 10%;"><?php echo $dataA[0] ; ?></td>
  <td class="mailbox-subject" style="width: 10%;"><?php echo $dataA['merek']; ?></td>
  <td class="mailbox-subject" style="width: 10%;"><?php echo "<span class='label label-primary pull-center'>".$dataA['mac_address']."</span>"; ?></td>
  <td class="mailbox-subject" style="width: 10%;">
      <?php $kets= tgl_indonesia($dataA['tgl_masuk']); echo  textSingkat($kets,70); ?>
  </td>
  <td class="mailbox-subject" style="width: 10%;">
      <?php echo $ket_perangkat; ?>
  </td>
  <td class="mailbox-subject" style="width: 10%;">
      <?php   if(!isset($dataA['nama']) && $rusak=='no'){
                if(isset($dataA['nama'])){
                echo '  <i class="fa fa-archive text-primary"></i> Tersedia'.$dataA['nama'];
                }else{
                echo '  <i class="fa fa-archive text-primary"></i> Tersedia';
                }
              }
              elseif(!isset($dataA['nama']) && $dataA['status']=='0'){
                echo '  <i class="fa fa-archive text-primary"></i> Tidak Tersedia ';
              }
              elseif(isset($dataA['nama']) && $rusak=='ya'){
                echo '  <i class="fa  fa-minus-square text-danger"></i> --';
              }
              else{
                $kets=$dataA['nama'];  echo '<i class="fa fa-user"></i> '. textSingkat($kets,70); 
              }
      ?>
  </td>

</tr>
<?php 
$i++; } 
$jumlahData = mysql_num_rows($queryA);
if($jumlahData==0){
echo '<td class="mailbox-subject" style="width: 10%;"><center>Data kosong</center></td>';
echo '<td class="mailbox-subject" style="width: 10%;"><center>Data kosong</center></td>';
echo '<td class="mailbox-subject" style="width: 10%;"><center>Data kosong</center></td>';
echo '<td class="mailbox-subject" style="width: 10%;"><center>Data kosong</center></td>';
echo '<td class="mailbox-subject" style="width: 10%;"><center>Data kosong</center></td>';
echo '<td class="mailbox-subject" style="width: 10%;"><center>Data kosong</center></td>';
echo '<td class="mailbox-subject" style="width: 10%;"><center>Data kosong</center></td>';
}
?>

</tbody>
</table>
<!-- /.table -->
</div>
<!-- /.mail-box-messages -->

<div class="box-footer no-padding">
    <div class="mailbox-controls">
<?php echo ' Login Akses = '.login_stat; ?>
    </div>
</div>
</div>

<script>
$('#TabelPerangkat').DataTable();
function dataTabel(){
   $('.dataTables_length').addClass('col-xs-3');
   $('.dataTables_info').addClass('col-xs-4');
   $('.paginate_previous').addClass('btn-flat btn-default');
   $('.paginate_next').addClass('btn-flat btn-default');
   $('.paginate_button').addClass('btn-flat btn-default btn-group');
   $('.current').addClass('btn-flat btn-primary btn-group');
}    
    window.onload =dataTabel;
    setInterval(dataTabel, 3000);
 /*
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
        */
    </script>