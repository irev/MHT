<?php $nama_halaman="Data Keluar" ?>
              <div class="box box-solid box-info">
                <div class="box-header">
                  <h3 class="box-title">Table Data Barang Keluar</h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                  <table id="data_barang_keluar" class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        <th>NO</th> 
                        <th>KODE FAKTUR</th>
                        <th>TANGGAL</th>
                        <th>NAMA BARANG</th>
                        <th>@HARGA</th>
                        <th>JUMLAH</th>
                        <th>SUB TOTAL</th>
                        
                      </tr>
                    </thead>
                    <tbody>
<?php
$no=0;
$sql = "SELECT barang_keluar.id_keluar, barang_keluar.tgl, barang_keluar.kode_barang, barang_keluar.transaksi, barang_keluar.jumlah,data_barang.nama_barang, data_barang.harga FROM `barang_keluar` JOIN `data_barang` WHERE barang_keluar.kode_barang=data_barang.kode_barang ";
$ex = mysql_query($sql);
 while($data = mysql_fetch_array($ex)){
$no++;
 ?>                
                      <tr>

                        <td><?php echo $no; // $data['id_keluar'] ?> </td>
                        <td> <?php echo $data['transaksi']; ?></td>
                        <td><?php echo $data['tgl']; ?></td>
                        <td><?php echo $data['nama_barang']; ?></td>
                        <td>Rp. <span style="float: right;"><?php echo $data['harga']; ?></span></td>
                        <td><center><?php echo $data['jumlah']; ?></center></td>
                        <td>Rp. <span style="float: right;"><?php echo $data['jumlah'] * $data['harga']; ?></span></td>
                      </tr>
<?php }  ?>                         
                      </tbody>
                    <tfoot>
                      <tr>
                        <th>NO</th> 
                        <th>KODE FAKTUR</th>
                        <th>TANGGAL</th>
                        <th>NAMA BARANG</th>
                        <th>@HARGA</th>
                        <th>JUMLAH</th>
                        <th>SUB TOTAL</th>
                      </tr>
                    </tfoot>
                  </table>
                </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col -->
          </div><!-- /.row -->
    <script src="js/jquery-2.2.1.min.js"></script>
    <script src="assets/plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="assets/plugins/datatables/dataTables.bootstrap.min.js"></script>
    <!-- InputMask -->
    <script type="text/javascript" src="assets/plugins/input-mask/jquery.inputmask.js"></script>
    <!-- page script -->
<script>
  $("#data_barang_keluar").DataTable({"lengthMenu": [ [5, 10, 15, 20, -1], [5, 10, 15, 20, "All"] ]});
</script>