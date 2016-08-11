
<!-- INCLUDE JS,CSS -->

<!-- LIHAT AJA DULU file data.php biar ngerti -->


<!--script src="rapa.js"></script-->


<script src="raphael-min.js"></script>

 <!-- jQuery 2.1.4 -->
<script src="http://localhost/skripsi/assets//plugins/jQuery/jQuery-2.1.4.min.js"></script>
<script src="http://localhost/skripsi/assets/plugins/morris/morris.min.js"></script>
<link rel="stylesheet" href="http://localhost/skripsi/assets/bootstrap/css/bootstrap.min.css">
    <!-- Morris charts -->
<link rel="stylesheet" href="http://localhost/skripsi/assets/plugins/morris/morris.css">
<!-- BIKIN Javascript dulu -->

<script>

function realisasi(){

  //$("#response").hide(); //sebagai div response (gaya2 loading image aja :D)

  $.ajax({

    url: "data.php", //ambil data dari data.php

    cache: false, //data ga di simpan ke browser

    type: "GET", //tipe sinkron GET, bisa pake post, terserah aja

    dataType: "json", //data tipe nya sebagai json

    timeout:3000, //set 3 detik respon, jika lama berarti gagal

    beforeSend: function() {

           $("#response").show(); //penggaya loading muncul ;D

 $('#response').html("<img src='ajax-loader.gif' />");  
},

    success : function (data) {

var bar = new Morris.Bar({
          element: 'contoh-chart',
          resize: true,
          data: data,
          barColors: ['#00a65a','#f0a65a'],
          xkey: 'penerima',
          ykeys: ['jumlah','jumlah','jumlah'],
          labels: ['B.Keluar','penerima','jumlah'],
          hideHover: 'auto'
        });
 }

 });

 }

$(document).ready(function()

{  
realisasi(); //nah nanti dipanggil di sini

});               

</script>

<div class="row">

<div class="box-header">

<h3 class="box-title"></h3>

</div>

<div class="box-body chart-responsive">

<div id="response">ss</div>

<div class="chart" id="contoh-chart" style="height: 300px;"></div>

</div>

</div>