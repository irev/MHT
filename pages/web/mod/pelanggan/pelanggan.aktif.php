<?php
//////////////////////////////
// PROGRAM SKRIPSI MHT
// Refyandra
// pelanggan.data.php 
// edit 6 juni 2016
// usercase CUSTOMER SERVICE
///////////////////////////////
require("../../../../_db.php"); 
//$bk = baseurl."index.php";
error_reporting(0);
if(!isset($_SESSION['login_hash'])) 
{ 
  session_start(); 
}
if(!isset($_SESSION['login_hash'])){
  echo "<script>alert('anda harus login dulu..!');</script>";
  header("Location:".baseurl);
} 
?>
<script>
   $("#TabelPelangganb").DataTable();
   $('.dataTables_length').addClass('col-xs-3');
   $('.dataTables_info').addClass('col-xs-4');
   $('.paginate_previous').addClass('btn btn-default');
   $('.paginate_next').addClass('btn btn-default');
   $('.paginate_button').addClass('btn btn-default btn-group');
   $('.paginate_button').addClass('btn btn-default btn-group');

</script>
    <!--Data table-->
    <link rel="stylesheet" href="assets/plugins/datatables/dataTables.bootstrap.css">
    <div class="box-body no-padding">
        <div class="mailbox-messages">
            <table id="TabelPelangganb" class="table table-hover table-striped ">
                <thead>
                    <tr>
                        <th> No</th>
                        <th >Sataus</th>
                        <th ></th>
                        <th > Nama</th>
                        <th >HP</th>
                        <th >Alamat</th>
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
  $st = mysql_real_escape_string($_GET['pelanggan']);
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
<?php echo $i // nomor urut ?>
</td>
<?php if ($_SESSION['login_hash']=='krd' || $_SESSION['login_hash']=='cs'){ ?>
<script>
  function ubahStaPel(kdpl){
  var dilogstat =  $(
      '<div id="ubahStatus" title="Status Pelanggan" hidden>'+
      '<center>'+
      '<div id="status_pel"></div>'+
      '<a class="btn btn-success aktif" onclick="statusPel(\''+kdpl+'\',\'1\')"><i class="fa fa-check-circle"></i> AKTIF</a>&nbsp'+
      '<a class="btn btn-warning cuti" onclick="statusPel(\''+kdpl+'\',\'2\')"><i class="fa fa-warning"></i> CUTI</a>&nbsp'+
      '<a class="btn btn-danger block" onclick="statusPel(\''+kdpl+'\',\'3\')"><i class="fa fa-ban"></i> BLOCK</a>'+
      '</center>'+           
      '</div>'

    ).dialog({
      //autoOpen: false,
      modal: true,
      resizable: false,
      buttons: {
        "OK": function() {
          $( dilogstat ).dialog( "close" );
          var main  = "pages/web/mod/pelanggan/pelanggan.aktif.php";
          var baru  = "pages/web/mod/pelanggan/pelanggan.aktif.php?pelanggan=0";
          var aktif = "pages/web/mod/pelanggan/pelanggan.aktif.php?pelanggan=1";
          var cuti  = "pages/web/mod/pelanggan/pelanggan.aktif.php?pelanggan=2";
          var block = "pages/web/mod/pelanggan/pelanggan.aktif.php?pelanggan=3";

          $("#data-pelanggan").load(main);
          $('#data-baru').load(baru);
          $('#data-aktif').load(aktif);
          $('#data-cuti').load(cuti);
          $('#data-block').load(block);
          //$('#status_pel').text('di ubah');
        },
        Batal: function() {
          $( dilogstat ).dialog( "close" );
        }
      },
    });
  }

function statusPel(a,b){
  var v_idpel =a; 
  var v_stat=b;
  var url= "pages/web/mod/pelanggan/pelanggan.input.php";
  var main = "pages/web/mod/pelanggan/pelanggan.aktif.php";
  //$.post(url,{idpel:v_idpel, stat:v_stat},function(){}); 
   $.ajax({
      url: url,
      method: "POST",
       dataType: 'html',
       data:{idpel:v_idpel, stat:v_stat},
         success: function(html) {
          // $('#status_pel').append(html);
           $('#status_pel').text();
           console.log(html);

            //$('#loading').hide();
            //$('#loading').hide();  
            alert(html);  
            sudah();    
                }
            });
}

function sudah(){
$('Status Sudah diubah').dialog({
  modal: true
});  
}
</script>
<?php } ?>
 <td>
 <?php if ($_SESSION['login_hash']=='krd' || $_SESSION['login_hash']=='cs'){ ?>
  <a  href="#dialog-datax" class="btn btn-default btn-sm <?php echo $btclass; ?> btn-sm hapus" id="<?php echo $dataA['id_pelanggan'] ?>" onclick="ubahStaPel(<?php echo substr($dataA['id_pelanggan'],4) ?>)">
      <?php echo $status_icon ?>
    </a>
<?php }  ?>
 </td>
 <td class="mailbox-star">
    <?php  
     if ($_SESSION['login_hash']=='krd' || $_SESSION['login_hash']=='cs'){
      ?>
    <a href="#tab-edit" data-toggle="tab" class="btn btn-default btn-sm" <?php $idpr = $dataA['id_pelanggan']; echo 'onclick="getform.ubah(\''.$idpr.'\')"' ?> id="<?php echo $dataA['id_pelanggan'] ?>">
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
                            <div class="input-group-btn">
                                <button type="button" class="btn btn-sm  <?php echo $btclass ?> dropdown-toggle col-md-12"><?php echo $status_icon ?> <?php echo $status ?> </button>

                            </div>
                            <?php  } ?>
                        </td>
                        <td>
                            <?php echo "<a href='#' onclick='profile()'>".$dataA['nama']."</a>"; ?> </td>
                        <td>
                            <?php echo "0".$dataA['hp'] ?> </td>
                        <td class="mailbox-subject" style="width: 20%;">
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
        $("#TabelPelanggan").DataTable({
            "fixedColumns": false,
            "responsive": true,
            "ordering": true,
            //"scrollY": false,
            "scrollX": true,
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