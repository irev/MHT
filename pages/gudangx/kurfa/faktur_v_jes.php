<script src="raphael-min.js"></script>
 <!-- jQuery 2.1.4 -->
<script src="http://localhost/skripsi/assets//plugins/jQuery/jQuery-2.1.4.min.js"></script>
<script src="http://localhost/skripsi/assets/plugins/morris/morris.min.js"></script>
<link rel="stylesheet" href="http://localhost/skripsi/assets/bootstrap/css/bootstrap.min.css">
    <!-- Morris charts -->
<link rel="stylesheet" href="http://localhost/skripsi/assets/plugins/morris/morris.css">
<!-- BIKIN Javascript dulu -->
<?php
  $json_url = 'http://localhost/skripsi/pages/gudang/kurfa/faktur_jes.php?kt=BM16031600013';
  $ch = curl_init ($json_url);
  $options = array(
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_HTTPHEADER => array('Content-type: application/json'),
  );
  curl_setopt_array ($ch, $options); // setting curl options
  $result = curl_exec($ch); // getting json result string
  
  $decode = json_decode($result, true);
  foreach ($decode['artikel'] as $row) {
    echo "<div id='content'>";
    echo "<p id='judul'>".$row['idt'] ."</p>";
    echo "<p id='isi'>".$row['jumlah'] ."</p>";
    echo "<p id='tanggal'>".$row['penerima'] ."</p>";
    echo "</div>";
  }
  
?>



<script type='text/javascript'>
$(document).ready(function(){
// $.getJSON('http://localhost/skripsi/pages/gudang/kurfa/faktur_jes.php?kt=BM16031600013', function (data) {
 //   $.each(data.artikel, function (index, value) {
 //       $.each(this.artikel, function () {
 //           console.log(this.text);
 //       });
  //  });
//});

    
 $.getJSON('http://localhost/skripsi/pages/gudang/kurfa/faktur_jes.php?kt=BM16031600017', function(data) {
        document.getElementById("form_json").innerHTML=data.artikel[0].idt + " " + data.artikel[0].idt+"-  -"+ data.artikel[0].idt;

  });

 });



//json string for testing
var jsonstr = '{"id":"743222825", "name":"Oscar Jara"}';
//{"artikel":[{"y":"BM16031600013","jumlah":"sdsdasd","penerima":"gudang"}]} 
//parse json
var data = JSON.parse(jsonstr);

//print in console
document.write("My name is: " + data.name + " and my id is: " + data.id);

///////////////////// CONTOH 3

 $.getJSON('http://localhost/skripsi/pages/gudang/kurfa/faktur_jes.php?kt=BM16031600017', function(response) {
     $('#result').html(response.artikel[0].idt);
     $('#result2').html(response.artikel[0].idt);
     $('#result3').html(response.artikel[0].idt);
  });

///////////////////// CONTOH 4
$.getJSON('http://localhost/skripsi/pages/gudang/kurfa/faktur_jes.php?kt=BM16031600017', function(data) {
  $('.items').hide();
  var items = [];

  $.each(data.artikel, function(key, val) {
    items.push('<li id="' + key + '"><a href="'
    + val.jumlah + '">'
    + val.jumlah + '</a> <br /> post at '
    + val.jumlah + '</li>');
  });

 $('.loading').hide();
   $('.items').fadeIn();

  $('<ul/>', {
    'class': 'my-new-list',
    html: items.join('')
  }).delay(3000).appendTo('.items');
})


</script>


<div id="form_json">dd</div>
<div id="placeholder"></div>
<br/>
CONTOH 3
<div id="result"></div>
<div id="result2"></div>
<div id="result3"></div>
<br/>
CONTOH 4
<div class="items">CONTOH 4</div>