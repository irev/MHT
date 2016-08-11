<?php 
if(!isset($_SESSION['login_hash']))
{
  echo "PAGES 404";
  echo "<script>window.location='dashboard.php?cat=web&page=404'</script>";
}else{
 
if(isset($_GET['kode_transaksi'])){
       $kd = $_GET['kode_transaksi'];
}else{ $kd = 0;}

$kode_transaksi = mysql_real_escape_string(htmlentities($kd,ENT_QUOTES,'WINDOWS-1252'));

$sql4 = "SELECT data_faktur_berang_keluar.*,barang_keluar.*, data_barang.nama_barang, data_barang.harga_jual,data_barang.jenis_barang FROM `data_faktur_berang_keluar` JOIN `barang_keluar` ON data_faktur_berang_keluar.kode_transaksi=barang_keluar.transaksi JOIN data_barang ON barang_keluar.kode_barang=data_barang.kode_barang WHERE data_faktur_berang_keluar.`kode_transaksi`='".$kode_transaksi."'";
$exe4 = mysql_query($sql4); 
$data4 = mysql_fetch_array($exe4); 
echo $cekdata= mysql_num_rows($sql4);
    
?>
 <section class="invoice">
  <!-- title row -->
  <div class="row">
    <div class="col-xs-12">
      <h2 class="page-header">
                <i class="fa fa-globe"></i> TOKO ELEKTRONIK.
                <small class="pull-right">Date: <?php $tgl = date_create($dataf['tgl']); echo date_format($tgl, "d/m/Y"); ?></small>
              </h2>
    </div>
    <!-- /.col -->
  </div>
<?php
$sql4 = "SELECT data_faktur_berang_keluar.*,barang_keluar.*, data_barang.nama_barang, data_barang.harga_jual,data_barang.jenis_barang FROM `data_faktur_berang_keluar` JOIN `barang_keluar` ON data_faktur_berang_keluar.kode_transaksi=barang_keluar.transaksi JOIN data_barang ON barang_keluar.kode_barang=data_barang.kode_barang WHERE data_faktur_berang_keluar.`kode_transaksi`='".$kode_transaksi."'";
$exe4 = mysql_query($sql4); 
$data4 = mysql_fetch_array($exe4);           
?>
    <!-- info row -->
    <div class="row invoice-info">
      <div class="col-sm-4 invoice-col">
        From
        <address>
                <strong><?php echo $data4['kode_user']?></strong>
                 <br>Alamat : <?php echo $data4['alamat']?><br>
                Kota : <?php echo $data4['alamat']?><br>
                Telepon : <?php echo $data4['tlpn']?><br>
                Email : <?php echo $data4['email']?>
              </address>
      </div>
      <!-- /.col -->
      <div class="col-sm-4 invoice-col">
        To
        <address>
                <strong><?php echo $data4['nm_supplier']?></strong>
                <br>Alamat : <?php echo $data4['alamat']?><br>
                Kota : <?php echo $data4['alamat']?><br>
                Telepon : <?php echo $data4['tlpn']?><br>
                Email : <?php echo $data4['email']?>
              </address>
      </div>
      <!-- /.col -->
      <div class="col-sm-4 invoice-col">
        <b>Invoice #<?php echo $dataf['transaksi']; ?></b><br>
        <br>
        <!--b>Order ID:</b> 4F3S8J<br-->
        <b>Tgl Faktur :</b>
        <?php $tgl = date_create($dataf['tgl']); echo date_format($tgl, "d/m/Y"); ?><br>
        <!--b>Account:</b> 968-34567-->
      </div>
      <!-- /.col -->
    </div>
    <!-- /.row -->
    <!-- Table row -->
    <div class="row">
      <div class="col-xs-12 table-responsive">
        <table class="table table-striped">
          <thead>
            <tr>
              <th>No</th>
              <th>Produk</th>
              <th>Jumlah</th>
              <th>Unit</th>
              <th>Harga / Unit
              </th>
              <th>Subtotal</th>
            </tr>
          </thead>
          <tbody>
            <?php
$no=0;
$sql2 = "SELECT data_faktur_berang_keluar.*,barang_keluar.*, data_barang.nama_barang, data_barang.harga_jual,data_barang.jenis_barang FROM `data_faktur_berang_keluar` JOIN `barang_keluar` ON data_faktur_berang_keluar.kode_transaksi=barang_keluar.transaksi JOIN data_barang ON barang_keluar.kode_barang=data_barang.kode_barang WHERE data_faktur_berang_keluar.`kode_transaksi`='".$kode_transaksi."'";
$exe = mysql_query($sql2);
 while($data = mysql_fetch_array($exe)){
 $no++; 
?>
              <tr>
                <td>
                  <?php echo $no ?>
                </td>
                <td>
                  <?php echo $data['nama_barang']; ?>
                </td>
                <td>
                  <?php echo $data['jumlah']; ?>
                </td>
                <td>
                  <?php echo $data['jenis_barang']; ?>
                </td>
                <td>
                  <?php $hrg=$data['harga_jual']; echo "Rp. ".number_format( $hrg, 0 , ",",".") . " ,-";?>
                </td>
                <td>
                  <?php $stb= $data['harga_jual']*$data['jumlah']; echo "Rp. ". number_format( $stb, 0 , ",",".") . " ,-"; ?>
                </td>
              </tr>
              <?php }?>
          </tbody>
        </table>
      </div>
      <!-- /.col -->
    </div>
    <!-- /.row -->
    <div class="row">
      <!-- accepted payments column -->
      <div class="col-xs-6">
        <p class="lead">Metode Pembayaran :</p>
        <!-- Metode Pembayaran -->
        <!--img src="assets/dist/img/credit/visa.png" alt="Visa">
        <img src="assets/dist/img/credit/mastercard.png" alt="Mastercard">
        <img src="assets/dist/img/credit/american-express.png" alt="American Express">
        <img src="assets/dist/img/credit/paypal2.png" alt="Paypal"-->
        <p class="text-muted well well-sm no-shadow" style="margin-top: 10px;">
          Catatan :
          <br/>...........................
          <br/>...........................
          <br/>
        </p>
      </div>
      <!-- /.col -->
      <div class="col-xs-6">
        <p class="lead">Pembayaran
          <?php echo Date('d/m/Y');?>
        </p>
        <div class="table-responsive">
          <table class="table">
            <tbody>
              <tr>
                <!--th style="width:50%">Subtotal:</th>
                    <td>$250.30</td>
                  </tr>
                  <tr>
                    <th>Tax (9.3%)</th>
                    <td>$10.34</td>
                  </tr>
                  <tr>
                    <th>Shipping:</th>
                    <td>$5.80</td>
                  </tr-->
                <?php
$sql3 = "SELECT sum(`tot_biaya`) as bayar FROM `barang_keluar` WHERE `transaksi`='".$kode_transaksi."'";
$exe3 = mysql_query($sql3); 
$data3 = mysql_fetch_array($exe3);           
?>
                  <tr>
                    <th><h4>Total:</h4></th>
                    <td>
                      <h4 class="pull-right"><?php $byr = $data3['bayar']; echo 'Rp. '.number_format( $byr, 0 , ",",".") . " ,-"; ?></h4></td>
                  </tr>
            </tbody>
          </table>
        </div>
      </div>
      <!-- /.col -->
    </div>
    <!-- /.row -->
    <!-- this row will not appear when printing -->
    <div class="row no-print">
      <div class="col-xs-12">

        &nbsp;&nbsp;<button class="btn btn-success" onclick="goBack()"><i class="fa fa-backward"></i> Kembali</button>&nbsp;&nbsp;
        &nbsp;&nbsp;<a class="btn btn-success pull-right" href="invoice-print.html" target="_blank" ><i class="fa fa-print"></i>&nbsp;&nbsp;Print&nbsp;&nbsp;</a>&nbsp;&nbsp;
        &nbsp;&nbsp;<button class="btn btn-primary pull-right" style="margin-right: 5px;"><i class="fa fa-download"></i> Generate PDF</button>&nbsp;&nbsp;
        &nbsp;&nbsp;<!--button class="btn btn-success pull-right" style="margin-right: 5px;"><i class="fa fa-credit-card"></i> Submit Payment</button-->&nbsp;&nbsp;


      </div>
    </div>
</section>
<?php 

}

include('_script.php'); 
?>
<script>
function goBack() {
    window.history.back();
}
</script>
