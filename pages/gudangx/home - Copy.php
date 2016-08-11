<!-- Morris charts -->
<?php 
$qtotal_stok = "SELECT sum(stok_tersedia) as total_stok FROM `data_persediaan`";
$total_stok=mysql_query($qtotal_stok);
 ?> 
<div class="row">
<div class="col-md-12"> 

<div class="col-md-3">
<div class="info-box bg-navy disabled color-palette">
  <!-- Apply any bg-* class to to the icon to color it -->
  <span class="info-box-icon  bg-aqua-active"><i class="fa fa-cube"></i></span>
  <div class="info-box-content bg-aqua">
    <span class="info-box-text">Total Item</span>

    <span class="info-box-number"><?php echo $total_stok['total_stok']; ?></span>
  </div><!-- /.info-box-content -->
  <div class="info-box-content ">
  <a href="?cat=gudang&page=barang" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
  </div>
</div><!-- /.info-box -->
</div>
<div class="col-md-3">
<div class="info-box bg-navy disabled color-palette">
  <!-- Apply any bg-* class to to the icon to color it -->
  <span class="info-box-icon bg-green-active"><i class="fa fa-cubes"></i></span>
  <div class="info-box-content bg-green">
    <span class="info-box-text">Total Stok</span>
    <span class="info-box-number">93,139</span>
  </div><!-- /.info-box-content -->
  <div class="info-box-content ">
  <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
  </div>
</div><!-- /.info-box -->
</div>
<div class="col-md-3">
<div class="info-box bg-navy disabled color-palette">
  <!-- Apply any bg-* class to to the icon to color it -->
  <span class="info-box-icon bg-yellow-active"><i class="fa fa-sign-in"></i></span>
  <div class="info-box-content bg-yellow">
    <span class="info-box-text">Stok In</span>
    <span class="info-box-number">93,139</span>
  </div><!-- /.info-box-content -->
  <div class="info-box-content ">
  <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
  </div>
</div><!-- /.info-box -->
</div>
<div class="col-md-3">
<div class="info-box bg-navy disabled color-palette">
  <!-- Apply any bg-* class to to the icon to color it -->
  <span class="info-box-icon bg-red-active"><i class="fa fa-sign-out"></i></span>
  <div class="info-box-content bg-red">
    <span class="info-box-text">Stok Out</span>
    <span class="info-box-number">93,139</span>
  </div><!-- /.info-box-content -->
  <div class="info-box-content">
  <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
  </div>
</div><!-- /.info-box -->
</div>

<div class="col-md-6">  
             <!-- BAR CHART -->
              <div class="box box-success hide">
                <div class="box-header with-border">
                  <h3 class="box-title">Barang Keluar Per Tahun</h3>
                  <div class="box-tools pull-right">
                    <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                    <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                  </div>
                </div>
                <div class="box-body chart-responsive">
                  <div class="chart" id="bar-chart" style="height: 300px;"></div>
                  <div id="response">ss</div>
                </div><!-- /.box-body -->
              </div><!-- /.box -->
</div><!-- /.col -->


<div class=" col-md-6 hide">
<div class="thumbnail">
                  
                  <div class="caption">
                    <h3>Barang</h3>
                    <p>Halaman untuk menambah,mengubah dan menghapus data barang</p>
                    <p><a href="?cat=gudang&page=barang" class="btn btn-primary">Masuk</a> </p>
                  </div>
                </div>

<div class="thumbnail">
                  
                  <div class="caption">
                    <h3>Penerimaan Barang</h3>
                    <p>Menambahkan barang ataupun menerima barang untuk ditempatkan pada Gudang</p>
                    <p><a href="?cat=gudang&page=entry" class="btn btn-primary">Masuk</a> </p>
                  </div>
                </div>

<div class="thumbnail">
                  
                  <div class="caption">
                    <h3>Keluar Barang</h3>
                    <p>Mengurangi barang ataupun mengeluarkan barang untuk diproduksi </p>
                    <p><a href="?cat=gudang&page=sell" class="btn btn-primary">Masuk</a> </p>
                  </div>
                </div>

<div class="thumbnail">
                  
                  <div class="caption">
                    <h3>Laporan Bulanan</h3>
                    <p>Laporan bulanan untuk stok Gudang </p>
                    <p><a href="?cat=gudang&page=monthreporting" class="btn btn-primary">Masuk</a> </p>
                  </div>
                </div>
</div>


<!--/////////////-->
</div>
</div>


    <script src="assets/plugins/jQuery/jQuery-2.1.4.min.js"></script>
    <!-- Bootstrap 3.3.5 -->
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <!-- Morris.js charts -->
    <script src="assets/plugins/morris/raphael/raphael-min.js"></script>
    <script src="assets/plugins/morris/morris.min.js"></script>
    <!-- FastClick -->
    <script src="assets/plugins/fastclick/fastclick.min.js"></script>
 <!-- SlimScroll -->
    <script src="assets/plugins/slimScroll/jquery.slimscroll.min.js"></script>

<script type="text/javascript">
function realisasi(){

  $("#response").hide(); //sebagai div response (gaya2 loading image aja :D)

  $.ajax({
        url: "pages/gudang/kurfa/data.php", //ambil data dari data.php
      cache: false, //data ga di simpan ke browser
      type: "GET", //tipe sinkron GET, bisa pake post, terserah aja
      dataType: "json", //data tipe nya sebagai json
      timeout:3000, //set 3 detik respon, jika lama berarti gagal
       beforeSend: function() {
        $("#response").show(); //penggaya loading muncul ;D
        $('#response').html("<img src='assets/img/ajax-loader.gif'/>");  
      },

    success : function (data) {
        var bar = new Morris.Bar({
          element: 'bar-chart',
          resize: true,
          data: data,
          barColors: ['#00a65a','#f0a65a'],
          xkey: 'y',
          ykeys: ['jumlah'],
          labels: ['Barang Keluar'],
          hideHover: 'auto'
        });
         $("#response").hide();
    }
 });
}

$(document).ready(function()
{  
realisasi(); //nah nanti dipanggil di sini
});               

</script>

