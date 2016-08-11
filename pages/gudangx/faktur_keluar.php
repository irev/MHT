

<div class="row">
    <div class="box-footer clearfix">
                <a href="javascript::;" class="btn btn-sm btn-social btn-primary btn-flat pull-right" ><i class="icon fa fa-cubes"></i>  Barang Masuk</a>
                <a href="javascript::;" class="btn btn-sm btn-social btn-primary btn-flat pull-right" ><i class="icon fa fa-truck"></i> Barang Keluar</a>
                <a href="javascript::;" class="btn btn-sm btn-social btn-primary btn-flat pull-right" ><i class="icon fa fa-truck"></i> Barang Keluar</a>
    </div>
</div>
<br/>

<div class="row">
<div class="col-md-12">

    <link rel="stylesheet" href="assets/plugins/datatables/dataTables.bootstrap.css">
              <div class="box box-solid box-info">
                <div class="box-header">
                  <h3 class="box-title"><i class="fa fa-arrow-circle-left"></i> History Transaksi Barang Keluar</h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                  <table id="tabel_faktur_k" class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        <th>NO</th> 
                        <th>KODE FAKTUR</th>
                        <th>KASIR</th>
                        <th>PENERIMA</th>
                        <th>TANGGAL</th>
                        <th>BIAYA TRANSAKSI</th>
                        <th></th>
                      </tr>
                    </thead>
                    <tbody>
<?php
//$kode_transaksi = $_GET['kode_transaksi'];
$no=0;
$sql = "SELECT * FROM `data_faktur_berang_keluar` ORDER BY `data_faktur_berang_keluar`.`tgl` DESC "; 
$ex = mysql_query($sql);
 while($data = mysql_fetch_array($ex)){
$no++;
 ?>                
                      <tr>
                        <td><?php echo $no; // $data['id_keluar'] ?> </td>
                        <td> <?php echo $data['kode_transaksi']; ?></td>
                        <td><?php echo $data['kode_user']; ?></td>
                        <td><?php echo $data['penerima']; ?></td>
                        <td><center><?php echo $data['tgl']; ?></center></td>
                        <td>Rp. <?php echo $data['total']; ?></td>
                        <td>
                        <div class="pull-right">
                        <a class="btn btn-xs btn-primary" href="laporan.php?keluar=cetak&kode_transaksi=<?php echo $data['kode_transaksi']; ?>" target="_blank"><i class="fa fa-print"></i> Cetak</a>
                        <a class="btn btn-xs btn-info" href="#" target="_blank"><i class="fa fa-print"></i> View </a>
                        <a class="btn btn-xs btn-danger" href="?cat=gudang&page=faktur_keluar&del=1&id=<?php echo sha1($data['kode_transaksi']); ?>" onclick="return confirm('Anda Yakin, menghapus No Faktur = <?php echo $data['kode_transaksi'];?> ?')"><i class="fa fa-trash-o" ></i> Delete </a>
                        </div>
                        </td>
                      </tr>
<?php }  ?>                         
                      </tbody>
                    <tfoot>
                      <tr>
                        <th>NO</th> 
                        <th>KODE FAKTUR</th>
                        <th>DARI</th>
                        <th>PENERIMA</th>
                        <th>TANGGAL</th>
                        <th>JUMLAH</th>
                        <th></th>
                      </tr>
                    </tfoot>
                  </table>
                </div><!-- /.box-body -->
              </div><!-- /.box -->
</div><!-- /.col -->
</div><!-- /.ROW -->


<?php
include('_script.php');
ob_end_flush();
?> 
 <script>

  //  $("#example1").DataTable({"lengthMenu": [ [5, 10, 15, 20, -1], [5, 10, 15, 20, "All"] ]});
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false
    });
$('#tabel_faktur_k').DataTable( {
        "lengthMenu": [ [5, 10, 15, 20, -1], [5, 10, 15, 20, "semua"] ],
        "language": {
            "lengthMenu": "Tampil _MENU_ baris",
            "zeroRecords": "Tidak ditemukan - maaf",
            "info": "Halaman _PAGE_ dari _PAGES_",
            "infoEmpty": "Tidak ada catatan yang tersedia",
            "infoFiltered": "(Tampil dari _MAX_ total data)",
            "search":"Cari :",
            "next":" Lanjut",
            "previos":" Kembali"
        }
    } );
</script>

<?php
if(isset($_GET['del']))
{
  $ids=$_GET['id'];
  $ff=mysql_query("DELETE FROM `data_faktur_berang_keluar` WHERE sha1(kode_transaksi)='".$ids."'");
  if($ff)
  {
    echo "<script>window.location='?cat=gudang&page=faktur_keluar'</script>";
  }
}
ob_end_flush();
?>