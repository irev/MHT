    <link rel="stylesheet" href="assets/plugins/datatables/dataTables.bootstrap.css">
              <div class="box">
                <div class="box-header">
                  <h3 class="box-title">Table Data Barang Masuk</h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                  <table id="data_barang_masuk" class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        <th>NO</th> 
                        <th>KODE FAKTUR</th>
                        <th>TANGGAL</th>
                        <th>NAMA BARANG</th>
                        <th>@ HARGA (Rp)</th>
                        <th>SATUAN</th>
                        <th>JUMLAH</th>
                        <th>SUB TOTAL (Rp)</th>
                        <th>SUB TOTAL(Rp)</th>
                      </tr>
                    </thead>
                    <tbody>
<?php
$no=0;
$sql = "SELECT barang_masuk.id_masuk, barang_masuk.tgl, barang_masuk.kode_barang, barang_masuk.transaksi, barang_masuk.jumlah, data_barang.nama_barang, data_barang.satuan, barang_masuk.harga_satuan FROM `barang_masuk` JOIN `data_barang` WHERE barang_masuk.kode_barang=data_barang.kode_barang ";
$ex = mysql_query($sql);
 while($data = mysql_fetch_array($ex)){
$no++;
 ?>                
                      <tr>
                        <td><?php echo $no; // $data['id_masuk'] ?> </td>
                        <td> <?php echo $data['transaksi']; ?></td>
                        <td><?php echo $data['tgl']; ?></td>
                        <td><?php echo $data['nama_barang']; ?></td>
                        <td><span style="float: right;"><?php $harga=$data['harga_satuan']; echo number_format($harga , 0 , '.' , '.'); ?></span></td>
                        <td><center><?php echo $data['satuan']; ?></center></td>
                        <td><center><?php echo $data['jumlah']; ?></center></td>
                        <td><span style="float: right;"><?php  $subtot=$data['jumlah'] * $data['harga_satuan']; echo number_format($subtot , 0 , '.' , '.'); ?></span></td>
                        <td><span style="float: right;"><?php  $subtot=$data['jumlah'] * $data['harga_satuan']; echo number_format($subtot , 0 , '.' , '.'); ?></span></td>
                      </tr>
<?php }  ?>                         
                      </tbody>
                    <tfoot>
                      <tr>
                        <th>NO</th> 
                        <th>KODE FAKTUR</th>
                        <th>TANGGAL</th>
                        <th>NAMA BARANG</th>
                        <th>@ HARGA (Rp)</th>
                        <th>SATUAN</th>
                        <th>JUMLAH</th>
                        <th>SUB TOTAL (Rp)</th>
                        <th>SUB TOTAL</th>
                      </tr>
                    </tfoot>
                  </table>
                </div><!-- /.box-body -->
              </div><!-- /.box -->
            <!--/div><!-- /.col -->
          <!--/div><!-- /.row -->
    <script src="js/jquery-2.2.1.min.js"></script>
    <script src="js/jquery.validate.min.js"></script>
    <script src="js/validate.min.js"></script>
    <script src="assets/plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="assets/plugins/datatables/dataTables.bootstrap.min.js"></script>
    <!-- InputMask -->
    <script type="text/javascript" src="assets/plugins/input-mask/jquery.inputmask.js"></script>
    <!-- page script -->
<script>
 $("#data_barang_masuk").DataTable({"lengthMenu": [ [5, 10, 15, 20, -1], [5, 10, 15, 20, "All"] ]});
</script>