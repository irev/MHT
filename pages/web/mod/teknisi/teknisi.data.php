<?php
//////////////////////////////
// PROGRAM SKRIPSI MHT
// Refyandra
// karyawan.data.php 
// edit 6 juni 2016
// usercase CUSTOMER SERVICE
///////////////////////////////
///
require("../../../../_db.php"); 
session_start();
if(!isset($_SESSION['login_hash']))
{
  echo "What your looking for..??";
}else{
?>

                <div class="box-body with-padding">
                  <div class="table-responsive mailbox-messages">
                    <table id="DataTablekaryawan" class="table table-hover table-striped">
                    <thead>
                      <tr>
                        <th>No</th>
                        <th>Kode</th>
                        <th>foto</th>
                        <th  style="width: 300px;">Nama</th>
                        <th>Nomor HP</th>
                        <th style="width: 300px;">Alamat</th>
                        <th style="width: 100px;">Jabatan</th>
                        <th>Status</th>
                        <th style="width: 300px;">#</th>
                      </tr>
                    </thead>
<tbody>
  <?php 
    $i = 1;
    $query = mysql_query("SELECT * FROM `tb_karyawan` ORDER BY `tb_karyawan`.`id_karyawan` DESC");
    
    // tampilkan data karyawan selama masih ada
    while($data = mysql_fetch_array($query)) {
      if($data['online']==0) {
        $status = '<span class="label label-default pull-right">Offline</span>';
        $status_icon = "<i class='fa fa-user-plus text-default'></i>";
      }
      elseif($data['online']==1) {
        $status = '<span class="label label-success pull-right">Online</span>';
        $status_icon = "<i class='fa fa-check-circle text-success'></i>";
      }
      elseif($data['online']==2) {
        $status = '<span class="label label-warning pull-right">Logout</span>';
        $status_icon = "<i class='fa fa-warning text-warning'></i>";
      }
      elseif($data['online']==3) {
        $status = '<span class="label label-danger pull-right">BLOCK</span>';
        $status_icon = "<i class='fa fa-ban text-danger'></i>";
      } else {
        $status = "Tidak Aktif";
      }
      //bagian / jabatan karyawan 
    
      if($data['bagian']=='Koordinator') {
        $bagian = '<span class="label label-default pull-center">Koordinator</span>';
        $status_icon = "<i class='fa fa-user-plus text-default'></i>";
      }
      elseif($data['bagian']=='Customer Service') {
        $bagian = '<span class="label label-success pull-center">Customer Service</span>';
        $status_icon = "<i class='fa fa-check-circle text-success'></i>";
      }
      elseif($data['bagian']=='Teknisi') {
        $bagian = '<span class="label label-warning pull-center">Teknisi</span>';
        $status_icon = "<i class='fa fa-warning text-warning'></i>";
      }
      elseif($data['bagian']=='Kolektor') {
        $bagian = '<span class="label label-danger pull-center">Kolektor</span>';
        $status_icon = "<i class='fa fa-ban text-danger'></i>";
      } else {
        $bagian = "Tidak Aktif";
      }
      //$ava=$data['avatar'];
      if($data['avatar']=='' ?:  $avatar=$data['avatar']);
      
  ?>
  <tr>
    <td><?php echo $i ?></td>
    <!--td class="mailbox-star"><a href="#"><?php echo $status_icon ?></a></td-->
    <td><?php echo $data['id_karyawan'] ?></td>
    <td><img  width="50" height="50" src="assets/img/user/<?php echo $avatar ?>"/></td>
    <td ><?php echo $data['nama'] ?> </td>
    <td ><?php echo "0".$data['hp'] ?> </td>
    <td class="mailbox-subject"><?php $kets=$data['alamat']; echo  textSingkat($kets,70); ?></td>
    <td style="background: #dafbe6;"><?php echo $bagian ?></td>
    <!--td><?php echo $data['online']."<br><span class='label label-primary pull-center'>".$data['online']."</span>" ?></td-->
    <!--td class="mailbox-date"><?php echo tgl_indonesia($data['tgl_langganan']); ?></td-->
    <!--td class="mailbox-date"><?php echo selisihwaktu($data['tgl_langganan']); ?></td-->
    <td><?php echo $status ?></td>
    
    <td class="mailbox-attachment">
    <?php 
    if ($_SESSION['login_hash']=='krd'){
    ?>
    <a href="#dialog-data" onclick="getform.ubah(<?php echo substr($data['id_karyawan'],4) ?>)"  id="<?php echo $data['id_karyawan'] ?>" class="btn btn-default btn-sm ubah" data-toggle="modal">
        <i class="fa fa-pencil"></i>
      </a> 
      <a href="#ditail_teknisi" data-toggle="modal" onclick="ditail_teknisi(<?php echo "'".$data['id_karyawan']."'"; ?>)"  id="<?php echo $data['id_karyawan'] ?>" class="btn btn-default btn-sm ubah">
        <i class="fa fa-search"></i>
      </a>
      <a href="#"  id="<?php echo $data['id_karyawan'] ?>" onclick="hapus(<?php echo substr($data['id_karyawan'],4) ?>)" class="btn btn-default btn-sm hapus">
        <i class="fa fa-trash"></i>
      </a>
     <?php }else{  ?>
      <a href="#ditail_teknisi" data-toggle="modal"  onclick="ditail_teknisi(<?php echo "'".$data['id_karyawan']."'"; ?>)"  id="<?php echo $data['id_karyawan'] ?>" class="btn btn-default btn-sm ubah">
        <i class="fa fa-search"></i>
      </a>
      <?php } ?>
    </td>
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
           
<script> 
$(function () {
   $("#DataTablekaryawan").DataTable({
    //"responsive": false,
      "ordering": true,
      "scrollY": false,//"1000px",
      "scrollX": false,
      "scrollCollapse": true,
      "fixedColumns":{
            "leftColumns": 3,
            "rightColumns": 3
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

<?php if ($_SESSION['login_hash']=='krd'){ ?>
<script type="text/javascript">
  
        // ketika tombol hapus ditekan
        $('.hapus').on("click", function(){
            var url = "pages/web/mod/teknisi/teknisi.input.php";
            // ambil nilai id dari tombol hapus
            kd_pel = this.id;
            
            // tampilkan dialog konfirmasi
            var answer = confirm("Apakah anda ingin mengghapus data ini?");
            console.info( kd_pel );
            // ketika ditekan tombol ok
            if (answer) {
                // mengirimkan perintah penghapusan ke berkas input.php
                $.post(url, {hapus: kd_pel} ,function() {
                    // tampilkan data yang sudah di perbaharui
                    // ke dalam <div id="data"></div>
                    $("#data-teknisi").load(main);
                   //$("#menu-teknisi").load(main2);
                });
            }
        });
</script>
<?php 
}
}
?>
