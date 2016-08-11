<script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"></script>
<script type="text/javascript" src="pages/web/map/assets/js/markerclusterer_packed.js"></script>
<script type="text/javascript">
//////////////////////////////////////////////////////////////////////
//SKRIP DIBAWAH INI DI UNTUK MENAMPILKAN SEMUA DATA KOODINAT PELANGGAN
//OLEH REFYANDRA
//KOTA PADANG
//////////////////////////////////////////////////////////////////////
//
//EDIT TERAKHIR 24 JUNI 2016
////////////////////////////////////////////////////////////////////// 

////VARIABEL PETA
var peta;
var nama     = new Array();
var kategori = new Array();
var hp       = new Array();
var paket    = new Array(); 
var band     = new Array(); 
var perangkat= new Array(); 
var ikon     = new Array(); 
var mac      = new Array(); 
var alamat   = new Array();
var x        = new Array();
var y        = new Array();
var idpel;
var i;
var url;
var gambar_tanda;
//var stat=0;
/// function Load PETA
function load() {
   multi_koordinat();
   $('#kordinattersimpan').load('pages/maps/list_map_ganggun.php');
   console.log("load peta berhasil dimuat!");
}
window.onload = load;

function CariKoordinatPelanggan(){

}

function carikordinat(lokasi){
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
 ambildatabase(idpel);
    google.maps.event.addListener(tanda, 'click', function() {
      infowindow.open(peta,tanda);
    });
    google.maps.event.addListener(peta,'click',function(event){
        tandai(event.latLng);
    });

}

function multi_koordinat() {
     $('#kordinattersimpan').load('pages/maps/list_map_ganggun.php');
    var solok = new google.maps.LatLng(-0.790475563065513, 100.66022586805047);
    console.log(solok);
    // ini buat menghilangkan icon place bawaan google maps
    var myStyles =[
    {
        featureType: "poi",
        elementType: "labels",
        stylers: [
              { visibility: "on" }
        ]
    }
    ];

    var petaoption = {
        zoom: 9,
        center: solok,
        mapTypeId: google.maps.MapTypeId.ROADMAP,
        mapTypeControl: true,
        styles: myStyles 
        };

    peta = new google.maps.Map(document.getElementById("kanvaspeta"),petaoption);
    google.maps.event.addListener(peta,'click',function(event){
        tandai(event.latLng);
    }); 
    // panggil pungsi ini buat nampilin markernya di peta
    ambildatabase(stat);
}
function multi_koordinat_P(stat) {
     $('#kordinattersimpan').load('pages/maps/list_map_ganggun.php');
    var solok = new google.maps.LatLng(-0.790475563065513, 100.66022586805047);
    console.log(solok);
    // ini buat menghilangkan icon place bawaan google maps
    var myStyles =[
    {
        featureType: "poi",
        elementType: "labels",
        stylers: [
              { visibility: "on" }
        ]
    }
    ];

    var petaoption = {
        zoom: 9,
        center: solok,
        mapTypeId: google.maps.MapTypeId.ROADMAP,
        mapTypeControl: true,
        styles: myStyles 
        };

    peta = new google.maps.Map(document.getElementById("kanvaspeta"),petaoption);
    google.maps.event.addListener(peta,'click',function(event){
        tandai(event.latLng);
    }); 
    // panggil pungsi ini buat nampilin markernya di peta
    ambildatabase(stat);
}
// fungsi inilah yang akan menampilkan gambar ikon sesuai dengan kategori markernya sendiri
function set_icon(ikon){
    if (ikon == "") {
    } else {
        gambar_tanda = "assets/icon/"+ikon;
    }
}
<?php
include('../../_db.php');
?>
function ambildatabase(stat){
    // kita bikin dulu array marker dan content info
    var markers = [];
    var info = [];
    var statusnya = stat;
    console.log(statusnya);
if (statusnya==0){
    console.info('proses');
}else if(statusnya==1){
    console.info('done');
}



<?php
      //$query = mysql_query("SELECT `a`.*,`b`.*,`c`.merek,`c`.mac_address,`c`.keterangan as pr_ket FROM `tb_pelanggan` AS `a` LEFT JOIN `tb_paket` AS `b` ON `a`.`id_paket` = `b`.`id_paket` LEFT JOIN `tb_perangkat` as `c` ON `a`.`id_perangkat`=`c`.`id_perangkat`");
      $query = mysql_query("SELECT `g`.*,`p`.*,`b`.*,`c`.merek,`c`.mac_address,`c`.keterangan as pr_ket FROM `tb_gangguan` as `g` LEFT JOIN `tb_pelanggan` as `p` ON `g`.`id_pelanggan`=`p`.`id_pelanggan` LEFT JOIN `tb_perangkat` as `c` ON `c`.`id_perangkat`=`p`.`id_perangkat` LEFT JOIN `tb_paket` as `b` ON `b`.`id_paket`=`p`.`id_paket` WHERE `g`.`status_gangguan`='0'");

    $i = 0;
    $js = "";

    // kita lakuin looping datanya disini
    while ($value = mysql_fetch_assoc($query)) {

    $js .= 'nama['.$i.'] = "'.$value['nama'].'";
            kategori['.$i.']  = "'.$value['paket'].'";
            alamat['.$i.'] = "'.$value['alamat'].'";
            hp['.$i.'] = "'.$value['hp'].'";
            paket['.$i.'] = "'.$value['paket'].'";
            ikon['.$i.'] = "'.$value['ikon'].'";
            band['.$i.'] = "'.$value['keterangan'].'";
            perangkat['.$i.'] = "'.$value['merek'].'";
            mac['.$i.'] = "'.$value['mac_address'].'";
            x['.$i.'] = "'.$value['x'].'"; //latittude
            y['.$i.'] = "'.$value['y'].'"; //longitude
            set_icon("'.$value['ikon'].'");
            //idpel = ;
            // kita set dulu koordinat markernya
            var point = new google.maps.LatLng(parseFloat(x['.$i.']),parseFloat(y['.$i.']));

            // disini kita masukin konten yang akan ditampilkan di InfoWindow
            var contentString =  "<div class=\'col-md-12\'><!--div class=\'col-md-4\'>"+
                                 "<img class=\'profile-user-img img-responsive\' src=\'assets/icon/" + ikon['.$i.'] + "\'></div-->"+
                                 "<!--div class=\'col-md-8\'-->"+
                                 "<i class=\'fa fa-info\'></i> <b><i>Info Pelanggan</i></b><hr>"+
                                 
                                 "<table>"+
                                        "<tr>"+
                                            "<td><i class=\'fa fa-user\'></i> <b>" + nama['.$i.'] + "</b></td>"+
                                        "</tr>"+
                                        "<tr>"+
                                            "<td><b>Alamat</b></td>"+
                                            "<td><b> : </b></td>"+
                                            "<td>" + alamat['.$i.'] + "</td>"+
                                        "</tr>"+
                                        "<tr>"+
                                            "<td><b>Hp</b></td>"+
                                            "<td> <b> : </b> </td>"+
                                            "<td>0" + hp['.$i.'] + "</td>"+
                                        "</tr>"+
                                        "<tr>"+
                                            "<td><b>Paket</b></td>"+
                                            "<td> <b> : </b> </td>"+
                                            "<td>" + kategori['.$i.'] +"  "+ band['.$i.']+ "</td>"+
                                        "</tr>"+
                                        "<tr>"+                                  
                                            "<td><b>Perangkat</b></td>"+
                                          "<td> <b> : </b> </td>"+
                                            "<td> " + perangkat['.$i.'] + "  " + mac['.$i.']+ "</td>"+
                                        "</tr>"+
                                    "</table><hr></div><!--/div-->";

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
            // menampilkan infowindows secara automatis
            //google.maps.event.addListener(markers['.$i.'],  info['.$i.'].open(peta,markers['.$i.']));
            ';

    
        $i++;  
    }
    // Menampilkan Output dari variabel $js
    echo $js;
    ?>
    
    // nah untuk yang satu ini...untuk mem-push semua marker kedalam array untuk dikelompokan
    var markerCluster = new MarkerClusterer(peta, markers);
    
}
</script>



<!--body onLoad="peta_awal()"-->
<div class="row">
    <div class="col-md-3">
    <div id="menumap"></div>
    </div>


<div class="box box-primary">
                <div class="box-header">
                  <h3 class="box-title">Lokasi Gangguan</h3>
            <span style="float:right;"> 
            <div class="form-group">     
                <label> Ganti Model Peta </label>
                <select id="cmb" onchange="gantipeta()">
                    <option value="1">Peta Roadmap</option>
                    <option value="2">Peta Terrain</option>
                    <option value="3">Peta Satelite</option>
                    <option value="4">Peta Hybrid</option>
                </select>
            </div>    
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
    <div id="kanvaspeta" style=" margin:0px auto; width:100%; height:500px; float:right; padding:10px;"></div>
</div>
<!--END TAMPILKAN MAP-->
<!--END BOX-->
</div>
</div>
</div>
<!--footer-->
<?php
ob_end_flush();
?> 
