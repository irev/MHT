<!-- Morris charts -->
<?php 
//require("../../_db.php");
//include("../../_db.php");
//masuk
$qmasuk=mysql_query("SELECT sum(masuk) as masuk FROM `data_persediaan`");
$masuk=mysql_fetch_array($qmasuk);
//semua item
$qitems=mysql_query("SELECT  COUNT(kode_barang) as totbarang FROM `data_barang`");
$barang=mysql_fetch_array($qitems);
//total item
$qitem=mysql_query("SELECT count(kode_barang) as item FROM `data_persediaan`");
$item=mysql_fetch_array($qitem);
//total stok
$qtotal_stok=mysql_query("SELECT sum(stok_tersedia) as total_stok FROM `data_persediaan`");
$total_stok=mysql_fetch_array($qtotal_stok);
//masuk
$qmasuk=mysql_query("SELECT sum(masuk) as masuk FROM `data_persediaan`");
$masuk=mysql_fetch_array($qmasuk);
//keluar
$qkelur=mysql_query("SELECT sum(keluar) as keluar FROM `data_persediaan`");
$keluar=mysql_fetch_array($qkelur);

 ?> 
<div class="row">
<div class="col-md-12"> 

<div class="col-md-3">
<div class="info-box bg-navy disabled color-palette">
  <!-- Apply any bg-* class to to the icon to color it -->
  <span class="info-box-icon bg-red-active"><i class="fa fa-sign-out"></i></span>
  <div class="info-box-content bg-red">
    <span class="info-box-text">Gangguan</span>
    <span class="info-box-number"><?php echo hitung_gangguan()?></span>
  </div><!-- /.info-box-content -->
  <div class="info-box-content">
  <a href="?cat=<?php echo $_SESSION['login_hash']; ?>&page=#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
  </div>
</div><!-- /.info-box -->
</div>
<div class="col-md-3">
<div class="info-box bg-navy disabled color-palette">
  <!-- Apply any bg-* class to to the icon to color it -->
  <span class="info-box-icon bg-green-active"><i class="fa fa-cubes"></i></span>
  <div class="info-box-content bg-green">
    <span class="info-box-text">Done</span>
    <span class="info-box-number"><?php echo hitung_done(); ?></span>
  </div><!-- /.info-box-content -->
  <div class="info-box-content ">
  <a href="?cat=<?php echo $_SESSION['login_hash']; ?>&page=#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
  </div>
</div><!-- /.info-box -->
</div>
<div class="col-md-3">
<div class="info-box bg-navy disabled color-palette">
  <!-- Apply any bg-* class to to the icon to color it -->
  <span class="info-box-icon  bg-aqua-active"><i class="fa fa-cube"></i></span>
  <div class="info-box-content bg-aqua">
    <span class="info-box-text">Pending</span>
    <span class="info-box-number"><?php echo hitung_pending(); ?></span>
  </div><!-- /.info-box-content -->
  <div class="info-box-content ">
  <a href="?cat=<?php echo $_SESSION['login_hash']; ?>&page=#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
  </div>
</div><!-- /.info-box -->
</div>
<div class="col-md-3">
<div class="info-box bg-navy disabled color-palette">
  <!-- Apply any bg-* class to to the icon to color it -->
  <span class="info-box-icon bg-yellow-active"><i class="fa fa-sign-in"></i></span>
  <div class="info-box-content bg-yellow">
    <span class="info-box-text">Proccess</span>
    <span class="info-box-number"><?php echo hitung_proccess(); ?></span>
  </div><!-- /.info-box-content -->
  <div class="info-box-content ">
  <a href="?cat=<?php echo $_SESSION['login_hash']; ?>&page=#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
  </div>
</div><!-- /.info-box -->
</div>



<div id='mod1'>
<script type="text/javascript">
   $('#mod1').load('inc/mod/_user.php');

   function list_allgangguan(){
        $(this).addClass('active');
        $('#data-gangguan').load('pages/tek/mod/gangguan/gangguan.alldata.php');
    }
</script>



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
                    <p><a href="?cat=<?php echo $_SESSION['login_hash']; ?>&page=obat" class="btn btn-primary">Masuk</a> </p>
                  </div>
                </div>

<div class="thumbnail">
                  
                  <div class="caption">
                    <h3>Penerimaan Barang</h3>
                    <p>Menambahkan barang ataupun menerima barang untuk ditempatkan pada Gudang</p>
                    <p><a href="?cat=<?php echo $_SESSION['login_hash']; ?>&page=entry" class="btn btn-primary">Masuk</a> </p>
                  </div>
                </div>

<div class="thumbnail">
                  
                  <div class="caption">
                    <h3>Keluar Barang</h3>
                    <p>Mengurangi barang ataupun mengeluarkan barang untuk diproduksi </p>
                    <p><a href="?cat=<?php echo $_SESSION['login_hash']; ?>&page=sell" class="btn btn-primary">Masuk</a> </p>
                  </div>
                </div>

<div class="thumbnail">
                  
                  <div class="caption">
                    <h3>Laporan Bulanan</h3>
                    <p>Laporan bulanan untuk stok Gudang </p>
                    <p><a href="?cat=<?php echo $_SESSION['login_hash']; ?>&page=monthreporting" class="btn btn-primary">Masuk</a> </p>
                  </div>
                </div>
</div>

</div><!--COL 12-->
<!--/////////////-->

<div class=" col-md-12">
<?php 
$qtmlinedate=mysql_query('SELECT * FROM `barang_keluar` GROUP BY `tgl`'); 
//$qtmline=mysql_query('SELECT * FROM `data_faktur_berang_keluar`'); 
?>

<div class="nav-tabs-custom">
                <ul class="nav nav-tabs">

                  <li class="active"><a href="#timeline" data-toggle="tab" aria-expanded="true">Timeline</a></li>
                  <li class=""><a href="#settings" data-toggle="tab" aria-expanded="false">Settings</a></li>
                </ul>
                <div class="tab-content">

                  <div class="tab-pane active" id="timeline">
                    <!-- The timeline -->
                    <ul class="timeline timeline-inverse">
<?php 
while ( $tmdatadate = mysql_fetch_array($qtmlinedate)) {
?>                    
                      <!-- timeline time label -->
                      <li class="time-label">
                        <span class="bg-blue">
                         <?php $tgl=$tmdatadate['tgl']; echo tgl_indonesia($tmdatadate['tgl']) ?>
                        </span>
                      </li>
                      <!-- /.timeline-label -->

                       <!-- timeline item -->
                      <li>
                        <i class="fa fa-mail-forward bg-red"></i>

<?php 
$qtmline=mysql_query("SELECT * FROM `data_faktur_berang_keluar` WHERE tgl='$tgl'"); 
while ( $tmdata = mysql_fetch_array($qtmline)) {
?>                        
                        <div class="timeline-item">
                          <!--span class="time"><i class="fa fa-clock-o"></i> 12:05</span-->
                          <h3 class="timeline-header"><i class="fa fa-file-text"></i><a href="#"><b> <?php echo $tmdata['kode_transaksi'].'</a>    <i class="fa fa-user"></i> Pasien : <a href="#">'. $tmdata['penerima'] ?></b></a></h3>
                       <div class="timeline-body">
                       <table class="table table-bordered">
                        <tr>
                              <th style="width: 10px">#</th>
                              <th>Obat</th>
                              <th>Jumlah</th>
                              <th style="width: 40px">Label</th>
                        </tr>
                       <?php $kdtrn=$tmdata['kode_transaksi']; 
                       //echo "SELECT * FROM `barang_keluar` WHERE transaksi='$kdtrn'";
                       
            $qtmline2=mysql_query("SELECT barang_keluar.*, data_barang.nama_barang FROM `barang_keluar`JOIN data_barang on barang_keluar.kode_barang=data_barang.kode_barang WHERE transaksi='$kdtrn'"); 
            while ( $tmdata2 = mysql_fetch_array($qtmline2)) {
              echo '
              <tr><td>'.$tmdata2['kode_barang'].'</td><td>'.$tmdata2['nama_barang'].'</td><td>'.$tmdata2['jumlah'].'</td>';
            }
            ?>  
            </table>
                       </div>
                        </div><br>
<?php } ?>                   
     <hr>                 
<?php } ?>
   </li>
                   <!-- END timeline item -->

                      <li>
                        <i class="fa fa-clock-o bg-gray"></i>
                      </li>
                    </ul>
                  </div><!-- /.tab-pane -->

                  <div class="tab-pane" id="settings">
                    <form class="form-horizontal">
                      <div class="form-group">
                        <label for="inputName" class="col-sm-2 control-label">Name</label>
                        <div class="col-sm-10">
                          <input type="email" class="form-control" id="inputName" placeholder="Name">
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="inputEmail" class="col-sm-2 control-label">Email</label>
                        <div class="col-sm-10">
                          <input type="email" class="form-control" id="inputEmail" placeholder="Email">
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="inputName" class="col-sm-2 control-label">Name</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" id="inputName" placeholder="Name">
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="inputExperience" class="col-sm-2 control-label">Experience</label>
                        <div class="col-sm-10">
                          <textarea class="form-control" id="inputExperience" placeholder="Experience"></textarea>
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="inputSkills" class="col-sm-2 control-label">Skills</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" id="inputSkills" placeholder="Skills">
                        </div>
                      </div>
                      <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-10">
                          <div class="checkbox">
                            <label>
                              <input type="checkbox"> I agree to the <a href="#">terms and conditions</a>
                            </label>
                          </div>
                        </div>
                      </div>
                      <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-10">
                          <button type="submit" class="btn btn-danger">Submit</button>
                        </div>
                      </div>
                    </form>
                  </div><!-- /.tab-pane -->
                </div><!-- /.tab-content -->
              </div>
</div><!--END COL-->



</div><!--END ROW-->

<?php
include('_script.php');
ob_end_flush();
?> 

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

