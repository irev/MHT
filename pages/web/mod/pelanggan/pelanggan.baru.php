<?php
//////////////////////////////
// PROGRAM SKRIPSI MHT
// Refyandra
// pelanggan.data.php 
// edit 6 juni 2016
// usercase CUSTOMER SERVICE
///////////////////////////////
require("../../../../_db.php"); 
?>
<div class="box box-primary">
                <div class="box-header with-border">
                  <h3 class="box-title">Data Pelangan Aktif</h3>
                  <div class="box-tools pull-right">

                  </div><!-- /.box-tools -->
                </div><!-- /.box-header -->
                <div class="box-body no-padding">
                  <div class="mailbox-messages">
                    <table id="DataTablepelanggan-baru" class="table table-hover table-striped">
                    <thead>
                      <tr>
                        <th>No</th>
                        <th>Status</th>
                        <th>Nama</th>
                        <th>Nomor HP</th>
                        <th style="min-width: 50%;">Alamat</th>
                        <th>Paket</th>
                        <th>Perangkat</th>
                        <th>Awal pelanggan</th>
                        <th>Lama Berlangganan</th>
                      </tr>
                    </thead>
<tbody>
  <?php 
    $i = 1;
    $query = mysql_query("SELECT tb_pelanggan.*, tb_paket.paket, tb_paket.keterangan, tb_perangkat.merek, tb_perangkat.mac_address, tb_perangkat.status as status_peragkat  FROM `tb_pelanggan` 
                          JOIN tb_paket 
                          ON tb_pelanggan.id_paket=tb_paket.id_paket
                          JOIN tb_perangkat
                          ON  tb_pelanggan.id_perangkat=tb_perangkat.id_perangkat
                          where tb_pelanggan.status ='0'
                          ORDER BY `tb_pelanggan`.`id_pelanggan` ASC");
    
    // tampilkan data pelanggan selama masih ada
    while($data = mysql_fetch_array($query)) {
      if($data['status']==0) {
        $status = 'BARU';
        $btclass = ' btn-success ';
        $status_icon = "<i class='fa fa-user-plus text-primary'></i>";
      }
      elseif($data['status']==1) {
        $status = 'Aktif';
        $btclass = ' btn-success ';
        $status_icon = "<i class='fa fa-check-circle text-success'></i>";
      }
      elseif($data['status']==2) {
        $status = 'CUTI';
        $btclass = ' btn-warning ';
        $status_icon = "<i class='fa fa-warning text-warning'></i>";
      }
      elseif($data['status']==3) {
        $status = 'BLOCK';
        $btclass = ' btn-danger ';
        $status_icon = "<i class='fa fa-ban text-danger'></i>";
      } else {
        $status = "Tidak Aktif";
      }
  ?>
  <tr>
    <td><?php echo $i ?></td>
     <!--td class="mailbox-attachment">
      <a href="#edit_pelanggan" onclick="getform.ubah(<?php echo "'".$data['id_pelanggan']."'" ?>)"  id="<?php echo $data['id_pelanggan'] ?>" class="btn btn-default btn-sm ubah">
        <i class="fa fa-pencil"></i>
      </a> 
      <a href="#dialog-data" onclick="getform.ubah(<?php echo substr($data['id_pelanggan'],4) ?>)"  id="<?php echo $data['id_pelanggan'] ?>" class="btn btn-default btn-sm ubah" data-toggle="modal">
        <i class="fa fa-pencil"></i>
      </a>
      <a href="#" id="<?php echo $data['id_pelanggan'] ?>" onclick="getform.hapus(<?php echo substr($data['id_pelanggan'],4) ?>)" class="btn btn-default btn-sm hapus">
        <i class="fa fa-trash"></i>
      </a>
    </td-->
    <td class="mailbox-star">
      <div class="input-group-btn">
                      <button type="button" class="btn btn-success dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><?php echo $status_icon ?> <?php echo $status ?> <span class="fa fa-caret-down"></span></button>
                      <ul class="dropdown-menu">
                        <li>
                              <a href="#edit_pelanggan" onclick="getform.ubah(<?php echo "'".$data['id_pelanggan']."'" ?>)"  id="<?php echo $data['id_pelanggan'] ?>" class="btn btn-default btn-sm ubah">
                               <i class="fa fa-pencil"></i> Edit
                              </a> 
                        </li>
                        <li>
                              <a href="#" id="<?php echo $data['id_pelanggan'] ?>" onclick="getform.hapus(<?php echo substr($data['id_pelanggan'],4) ?>)" class="btn btn-default btn-sm hapus">
                              <i class="fa fa-trash"></i> Hapus
                              </a>
                        </li>
                        <li><a href="#">Something else here</a></li>
                        <li class="divider"></li>
                        <li><a href="#">Separated link</a></li>
                      </ul>
                    </div>
                    
    </td>
    <td ><?php echo $data['nama'] ?> </td>
    <td ><?php echo "0".$data['hp'] ?> </td>
    <td class="mailbox-subject" style="width: 100%;"><?php $kets=$data['alamat']; echo  textSingkat($kets,70); ?></td>
    <td style="background: #dafbe6;"><?php echo $data['paket']." <br><span class='label label-primary pull-center'>".$data['keterangan']."</span>" ?></td>
    <td style="background: #dafbe6;"><?php echo $data['merek']."<br><span class='label label-primary pull-center'>".$data['mac_address']."</span>" ?></td>
    <td class="mailbox-date"><?php echo tgl_indonesia($data['tgl_langganan']); ?></td>
    <td class="mailbox-date"><?php echo selisihwaktu($data['tgl_langganan']); ?></td>
  
    
   
  </tr>
  <?php
    $i++;
    }
  ?>
 </tbody>
                    </table><!-- /.table -->
                  </div><!-- /.mail-box-messages -->
                </div><!-- /.box-body -->
                <div class="box-footer no-padding">
                  <div class="mailbox-controls">
                 
                  </div>
                </div>
              </div>

<script> 
$(function () {
   $("#DataTablepelanggan-baru").DataTable({
    "fixedColumns": false,
    "responsive": false,
      "ordering": true,
      //"scrollY": false,
      "scrollX": false,
      "scrollCollapse": true,
      "fixedColumns":{
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
  });
</script>
