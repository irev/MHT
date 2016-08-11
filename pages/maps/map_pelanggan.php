<!--script src="//maps.googleapis.com/maps/api/js?sensor=false" type="text/javascript"></script-->
<script type="text/javascript" src="pages/web/map/assets/js/markerclusterer_packed.js"></script>
<!--script type="text/javascript" src="jquery.js"></script-->
<?php 
include('../../_db.php');
//include('../../_script.php');
?>
<script type="text/javascript">
var peta;
var koorAwal = new google.maps.LatLng(-0.7864794500552789, 100.65369380638003);
var icon_pin ='assets/icon/icon-tower-induk.png';
function peta_awal(){
 
   console.log(set_icon_tanda(jenis));
    set_icon_tanda(jenis);
    var settingpeta = {
        zoom: 11,
        center: koorAwal,
        icon: icon_pin,
        mapTypeId: google.maps.MapTypeId.ROADMAP 
        };
    peta = new google.maps.Map(document.getElementById("kanvaspeta"),settingpeta);
    google.maps.event.addListener(peta,'click',function(event){
        tandai(event.latLng);
    }); 
    loadDataLokasiTersimpan();
}

function setjenis(jns){
    jenis = jns;
    console.log('setjenis '+ jenis);
}

function set_icon_tanda(jenisnya){
    console.log(jenisnya);
    switch(jenisnya){
        case "tower":
            icon_pin = 'assets/icon/tower1.png';
            break;
        case "pelanggan":
            icon_pin = 'assets/icon/client_home.png';
            break;
        case  "kantor":
            icon_pin = 'assets/icon/townhouse.png';
            break;
         
            console.log( jenisnya +'icon_pin '+icon_pin);
    }
}


// Removes the markers from the map, but keeps them in the array.
function clearMarkers() {
  tanda.setMap(null);
}
function tandai(lokasi){
   clearMarkers();
   set_icon_tanda(jenis);
   console.log('tandai lokasi '+ jenis +' '+set_icon(jenis)); 
    $("#koorX").val(lokasi.lat());
    $("#koorY").val(lokasi.lng());
    tanda = new google.maps.Marker({
        position: lokasi,
        map: peta,
        icon: icon_pin
    });
    
}

$(document).ready(function(){
    $("#simpanpeta").click(function(){
        var koordinat_x = $("#koorX").val();
        var koordinat_y = $("#koorY").val();
        var nama_tempat = $("#namaTempat").val();   
        var jenis = $("#jenis").val();
        $("#loading").show();
        $.ajax({
            url: "pages/maps/simpan_lokasi_baru.php",
            data: "koordinat_x="+koordinat_x+"&koordinat_y="+koordinat_y+"&nama_tempat="+nama_tempat+"&jenis="+jenis,
            success: function(msg){
                $("#namaTempat").val(null);
                $("#loading").hide();
                loadDataLokasiTersimpan();
            }
        });
    });
});



function loadDataLokasiTersimpan(){
    $('#kordinattersimpan').load('pages/maps/tampilkan_lokasi_tersimpan.php');
}

//setInterval (loadDataLokasiTersimpan, 9000);
function CariDataLokasiTersimpan(){
    var cari_nama_lokasi = document.getElementById('cari_nama_lokasi').value;
    if(cari_nama_lokasi !==null){
        $('#kordinattersimpan').load('pages/maps/tampilkan_lokasi_tersimpan.php?lokasi='+cari_nama_lokasi);
    }else{
        $('#kordinattersimpan').load('pages/maps/tampilkan_lokasi_tersimpan.php');
    }
    console.log(cari_nama_lokasi);
}



function carikordinat(lokasi){
    set_icon(jenis);  // setjenis
    console.log('set_icon(jenis) '+ jenis+' ' + set_icon(jenis));
    var settingpeta = {
        zoom: 17,
        center: lokasi,
        mapTypeId: google.maps.MapTypeId.ROADMAP 
        };
    peta = new google.maps.Map(document.getElementById("kanvaspeta"),settingpeta);
    tanda = new google.maps.Marker({
        position: lokasi,
        map: peta,
        icon: 'assets/icon/'+icon_pin //setjenis pin utama
    });
    google.maps.event.addListener(tanda, 'click', function() {
      infowindow.open(peta,tanda);
    });
    google.maps.event.addListener(peta,'click',function(event){
        tandai(event.latLng);
    });
}


function gantipeta(){
    loadDataLokasiTersimpan();
	var isi = document.getElementById('cmb').value;
	if(isi=='1')
	{
    var settingpeta = {
        zoom: 10,
        center: koorAwal,
        mapTypeId: google.maps.MapTypeId.ROADMAP
        };
	}
	else if(isi=='2')
	{
    var settingpeta = {
        zoom: 10,
        center: koorAwal,
        mapTypeId: google.maps.MapTypeId.TERRAIN 
        };
	}
	else if(isi=='3')
	{
    var settingpeta = {
        zoom: 10,
        center: koorAwal,
        mapTypeId: google.maps.MapTypeId.SATELLITE  
        };
	}
	else if(isi=='4')
	{
    var settingpeta = {
        zoom: 10,
        center: koorAwal,
        mapTypeId: google.maps.MapTypeId.HYBRID  
        };
	}
    peta = new google.maps.Map(document.getElementById("kanvaspeta"),settingpeta);
    google.maps.event.addListener(peta,'click',function(event){
        tandai(event.latLng);
    });
}


function load() {
   multi_koordinat();
   loadDataLokasiTersimpan();
   console.log("load peta berhasil dimuat!");
}
window.onload = load;




function tampil_semua_koordinat(){
        multi_koordinat();
        //$(this).addClass('active');
        //$('#kanvaspeta').load('pages/web/index.php');
}
</script>


<!--body onLoad="peta_awal()"-->
<div class="row">


<div class="col-md-12">
<div class="box box-primary">
                <div class="box-header">
                  <h3 class="box-title">Pemetaan</h3>
            <span style="float:right;">      
                <label>Ganti Model Peta</label>
                <select id="cmb" onchange="gantipeta()">
                    <option value="1">Peta Roadmap</option>
                    <option value="2">Peta Terrain</option>
                    <option value="3">Peta Satelite</option>
                    <option value="4">Peta Hybrid</option>
                </select>
            </span>
                </div>
<div class="box-body">


<div class="col-md-3">
<div class="box box-solid">
                <div class="box-header no-border">
                  <h3 class="box-title"></h3>
                  <div class="box-tools">
                  <div class="input-group" style="width: 100%;">
                      <input type="text" onkeypress="CariDataLokasiTersimpan()" id="cari_nama_lokasi" name="table_search" class="form-control input-sm pull-right" placeholder="Search">
                      <div class="input-group-btn">
                        <button class="btn btn-sm btn-default"><i class="fa fa-search"></i></button>
                        <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                      </div>
                    
                  </div>
                  </div>
                </div>
                <div class="box-body no-padding"  higth="100">
                    <div class="direct-chat-messages no-border">
                        <div id="kordinattersimpan" class="no-border"></div><!-- /.TAMPIL DATA WILAYAH -->
                   </div>     
                </div><!-- /.box-body -->
    </div>                    
</div>


<div class="col-md-9">
<!--TAMPILKAN MAP-->
    <div id="kanvaspeta" style=" margin:0px auto; width:100%; height:300px; float:right; padding:10px;"></div>
    </div>
<!--END TAMPILKAN MAP-->
    <article>

    </article>
</div>

<div id="form_lokasi" class="box-footer" style="background-color:#333333; color:#FFFFFF">

<p><b>PANEL</b></p>
<div class="row">


    <div class="col-md-4">
        <div class="form-group">
            <input type="radio" name="jenis" id="jenis" value="tower" onclick="setjenis(this.value)">
                 <?php echo'<img src="'.$baseurl.'assets/icon/tower1.png">';?> Tower Repeater
         </div>
        <div class="form-group">         
            <input type="radio" name="jenis" id="jenis" value="pelanggan" onclick="setjenis(this.value)">
                <?php echo'<img src="'.$baseurl.'pages/maps/icon/client_home.png">';?> Pelanggan
        </div>
        <div class="form-group">             
            <input type="radio" name="jenis" id="jenis" value="kantor" onclick="setjenis(this.value)">
                <?php echo'<img src="'.$baseurl.'pages/maps/icon/townhouse.png">';?>  Kantor
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-group">
            <label>Nama Lokasi</label>
            <input type="text"  placeholder="Nama Lokasi" class="form-control input-sm" name="namatempat" id="namaTempat" requered>
        </div>
        <div class="form-group">
            <label>Koordinat X</label>
            <input type="text" placeholder="latittude" class="form-control input-sm" name="koordinatx" id="koorX" readonly="readonly">
        </div>
        <div class="form-group">
            <label>Koordinat Y</label>
            <input type="text"  placeholder="longitude" class="form-control input-sm"  name="koordinaty" id="koorY" readonly="readonly">
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-group">
            <button id="simpanpeta" class="btn btn-sm btn-primary">Simpan</button><img src="pages/maps/globe.gif" style="display:none" id="loading">
        </div>
        <div class="form-group">   
            <button class="btn btn-sm btn-primary" onclick="javascript:carikordinat(koorAwal);">Koordinat Awal</button>
        </div>
        <div class="form-group">   
            <button class="btn btn-sm btn-primary" onclick="javascript:tampil_semua_koordinat();">Tampilkan Semua Koordinat</button>
        </div>        
        <div class="form-group">   
            <button class="btn btn-sm btn-primary" onclick="posisi_saat_ini()">Tampilkan Semua Koordinat</button>
        </div>
       
    </div> 

</div>
</div>

<!--END BOX-->


</div>

</div></div>
</div>
<!--footer-->



<script type="text/javascript">
//SKRIP DIBAWAH INI DI UNTUK MENAMPILKAN SEMUA DATA KOODINAT PELANGGAN
//NAMUN BELUM SEMPURNA 
//18-06-2016 SABTU JAM DELAPAN PAGI
// 
//function Multikordinat(){
var peta;
var nama     = new Array();
var kategori = new Array();
var paket    = new Array(); 
var alamat   = new Array();
var x        = new Array();
var y        = new Array();
var i;
var url;
var gambar_tanda;

function multi_koordinat() {
    var solok = new google.maps.LatLng(-0.790475563065513, 100.66022586805047);

    // ini buat ngilangin icon place bawaan google maps
    var myStyles =[
    {
        featureType: "poi",
        elementType: "labels",
        stylers: [
              { visibility: "off" }
        ]
    }
    ];

    var petaoption = {
        zoom: 9,
        center: solok,
        mapTypeId: google.maps.MapTypeId.ROADMAP,
        styles: myStyles 
        };

    peta = new google.maps.Map(document.getElementById("kanvaspeta"),petaoption);
    google.maps.event.addListener(peta,'click',function(event){
        tandai(event.latLng);
    }); 
    // panggil pungsi ini buat nampilin markernya di peta
    ambildatabase();

}

function ambildatabase(){
    // kita bikin dulu array marker dan content info
    var markers = [];
    var info = [];
    
<?php
      $query = mysql_query("SELECT `a`.*,`b`.* FROM `tb_pelanggan` AS `a` LEFT JOIN `tb_paket` AS `b` ON `a`.`id_paket` = `b`.`id_paket`");
    $i = 0;
    $js = "";

    // kita lakuin looping datanya disini
    while ($value = mysql_fetch_assoc($query)) {

    $js .= 'nama['.$i.'] = "'.$value['nama'].'";
            kategori['.$i.']  = "'.$value['paket'].'";
            alamat['.$i.'] = "'.$value['alamat'].'";
            //paket['.$i.'] = "'.$value['paket'].'";
            x['.$i.'] = "'.$value['x'].'"; //latittude
            y['.$i.'] = "'.$value['y'].'"; //longitude
            set_icon("'.$value['ikon'].'");
            
            // kita set dulu koordinat markernya
            var point = new google.maps.LatLng(parseFloat(x['.$i.']),parseFloat(y['.$i.']));

            // disini kita masukin konten yang akan ditampilkan di InfoWindow
            var contentString = "<table>"+
                                        "<tr>"+
                                            "<td><b>" + nama['.$i.'] + "</b></td>"+
                                        "</tr>"+
                                        "<tr>"+
                                            "<td>" + alamat['.$i.'] + "</td>"+
                                        "</tr>"+
                                        "<tr>"+
                                            "<td>" + kategori['.$i.'] + "</td>"+
                                        "</tr>"+
                                    "</table>";

            var infowindow = new google.maps.InfoWindow({
                content: contentString
            });
            

            tanda = new google.maps.Marker({
                    position: point,
                    map: peta,
                    icon: gambar_tanda,
                    clickable: true
                });
            
           
            // nah, disini kita buat marker dan infowindow-nya kedalam array
            markers.push(tanda);
            info.push(infowindow);

            // ini fungsi untuk menampilkan konten infowindow kalo markernya diklik
            google.maps.event.addListener(markers['.$i.'], "click", function() { info['.$i.'].open(peta,markers['.$i.']); });

            ';

    
        $i++;  
    }

    // kita tampilin deh output jsnya :D
    echo $js;
    ?>
    
    // nah untuk yang satu ini...kita push semua markernya kedalam array untuk dikelompokan
    var markerCluster = new MarkerClusterer(peta, markers);
    
}

// fungsi inilah yang akan menampilkan gambar ikon sesuai dengan kategori markernya sendiri
function set_icon(ikon){
    if (ikon == "") {
    } else {
        gambar_tanda = "assets/icon/"+ikon;
    }
}
//    }
//    
//    
//    
//    
//    
//    
//    
//    
function success(position) {
  //var mapcanvas = document.createElement('div');
  //mapcanvas.id = 'mapcontainer';
  //mapcanvas.style.height = '400px';
  //mapcanvas.style.width = '600px';

  //document.querySelector('article').appendChild(mapcanvas);

  var coords = new google.maps.LatLng(position.coords.latitude, position.coords.longitude);
  
  var options = {
    zoom: 15,
    center: coords,
    mapTypeControl: false,
    navigationControlOptions: {
        style: google.maps.NavigationControlStyle.SMALL
    },
    mapTypeId: google.maps.MapTypeId.ROADMAP
  };
  var map = new google.maps.Map(document.getElementById("kanvaspeta"), options);

  var marker = new google.maps.Marker({
      position: coords,
      map: map,
      title:"You are here!"
  });
}

function posisi_saat_ini(){
if (navigator.geolocation) {
  navigator.geolocation.getCurrentPosition(success);
} else {
  error('Geo Location is not supported');
}   
}
</script>


<?php

ob_end_flush();
?> 
