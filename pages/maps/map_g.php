<!--script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"></script-->
<script type="text/javascript" src="pages/web/map/assets/js/markerclusterer_packed.js"></script>
<?php 
//include('_script.php');
 ?>
<section class="content">
<div class="row">
<div class="col-md-12">
        <div id="tampilmap"></div>
</div>
</section>
<script type="text/javascript">
//////////////////////////////////////////////////////////////////////
//SKRIP DIBAWAH INI DI UNTUK MENAMPILKAN SEMUA DATA KOODINAT PELANGGAN
//OLEH REFYANDRA
//KOTA PADANG
//////////////////////////////////////////////////////////////////////
//MAP PELANGGAN DALAM POSES PERBAIKAN 
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
var pelapor  = new Array();
var teknisi  = new Array();
var komen    = new Array();
var ikon     = new Array(); 
var mac      = new Array(); 
var alamat   = new Array();
var x        = new Array();
var y        = new Array();
var idpel;
var i;
var url;
var gambar_tanda;
window.onload = load;
 $('#kordinattersimpan').load('pages/maps/gangguan/list_map_gangguan.php');
var load_peta = function(){
var load = function(){}
return{
/// function Load PETA
load: function() {
   multi_koordinat();
   $('#kordinattersimpan').load('pages/maps/gangguan/list_map_gangguan.php');
   console.log("load peta berhasil dimuat!");
},


function CariKoordinatPelanggan(){

},

 carikordinat: function(lokasi){
    var settingpeta = {
        zoom: 17,
        center: lokasi,
        mapTypeId: google.maps.MapTypeId.ROADMAP 
        };
    peta = new google.maps.Map(document.getElementById("kanvaspeta"),settingpeta);
    tanda = new google.maps.Marker({
        position: lokasi,
        map: peta,
        icon: 'assets/icon/error.png'//+icon_pin //setjenis pin utama
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
     $('#kordinattersimpan').load('pages/maps/gangguan/list_map_gangguan.php');
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
    ambildatabase(idpel);

}

// fungsi inilah yang akan menampilkan gambar ikon sesuai dengan kategori markernya sendiri
function set_icon(ikon){
    if (ikon == "") {
    } else {
        gambar_tanda = "assets/icon/error.png"//+ikon;
    }
}

function ambildatabase(){
    // kita bikin dulu array marker dan content info
    var markers = [];
    var info = [];
<?php
include('../../_db.php');
      //$query = mysql_query("SELECT `a`.*,`b`.*,`c`.merek,`c`.mac_address,`c`.keterangan as pr_ket FROM `tb_pelanggan` AS `a` LEFT JOIN `tb_paket` AS `b` ON `a`.`id_paket` = `b`.`id_paket` LEFT JOIN `tb_perangkat` as `c` ON `a`.`id_perangkat`=`c`.`id_perangkat` where `a`.`status`='0'");
      //$query = mysql_query("SELECT `g`.*,g.keterangan as komen,`p`.*,`b`.*,`c`.merek,`c`.mac_address,`c`.keterangan as pr_ket FROM `tb_gangguan` as `g` LEFT JOIN `tb_pelanggan` as `p` ON `g`.`id_pelanggan`=`p`.`id_pelanggan` LEFT JOIN `tb_perangkat` as `c` ON `c`.`id_perangkat`=`p`.`id_perangkat` LEFT JOIN `tb_paket` as `b` ON `b`.`id_paket`=`p`.`id_paket` WHERE `g`.`status_gangguan`='0' GROUP BY p.id_pelanggan");
   $query = mysql_query("SELECT `p`.*,`p`.`nama` as nm_pelanggan ,`g`.*,`g`.`keterangan` as komen,`b`.*,`c`.merek,`c`.mac_address,`c`.keterangan as pr_ket FROM `tb_pelanggan` as `p` INNER JOIN `tb_gangguan` as `g` ON `p`.`id_pelanggan`=`g`.`id_pelanggan` INNER JOIN `tb_perangkat` as `c` ON `p`.`id_perangkat`=`c`.`id_perangkat` INNER JOIN `tb_paket` as `b` ON `p`.`id_paket`=`b`.`id_paket` WHERE g.status_gangguan='0' GROUP BY p.id_pelanggan");
    $i = 0;
    $js = "";

    // kita lakuin looping datanya disini
    while ($value = mysql_fetch_assoc($query)) {

    $js .= 'nama['.$i.'] = "'.$value['nm_pelanggan'].'";
            kategori['.$i.']  = "'.$value['paket'].'";
            alamat['.$i.'] = "'.$value['alamat'].'";
            hp['.$i.'] = "'.$value['hp'].'";
            paket['.$i.'] = "'.$value['paket'].'";
            ikon['.$i.'] = "'.$value['ikon'].'";
            band['.$i.'] = "'.$value['keterangan'].'";
            perangkat['.$i.'] = "'.$value['merek'].'";
            pelapor['.$i.'] = "'.$value['pelapor'].'";
            komen['.$i.'] = "'.$value['komen'].'";
            
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
                                 "<i class=\'fa fa-info\'></i> <b><i>Info Pelanggan</i></b>"+
                                 
                                 "<hr>Pelanggan<table>"+
                                        "<tr>"+
                                            "<td><i class=\'fa fa-user\'></i> <b>" + nama['.$i.'] + "</b></td>"+
                                        "</tr>"+
                                        "<tr>"+
                                            "<td><b><i class=\'fa fa-map-marker\'></i> Alamat</b></td>"+
                                            "<td><b> : </b></td>"+
                                            "<td>" + alamat['.$i.'] + "</td>"+
                                        "</tr>"+
                                        "<tr>"+
                                            "<td><b><i class=\'fa fa-phone\'></i> Hp</b></td>"+
                                            "<td> <b> : </b> </td>"+
                                            "<td>0" + hp['.$i.'] + "</td>"+
                                        "</tr>"+
                                        "<tr>"+
                                            "<td><b><i class=\'fa fa-cube\'></i> Paket</b></td>"+
                                            "<td> <b> : </b> </td>"+
                                            "<td>" + kategori['.$i.'] +"</td>"+
                                        "</tr>"+
                                        "<tr>"+
                                            "<td></td>"+
                                            "<td> <b> : </b> </td>"+
                                            "<td>["+ band['.$i.']+ "]</td>"+
                                        "</tr>"+
                                        "<tr>"+                                  
                                            "<td><b><i class=\'fa fa-archive\'></i> Perangkat</b></td>"+
                                          "<td> <b> : </b> </td>"+
                                            "<td> " + perangkat['.$i.'] + "  " + mac['.$i.']+ "</td>"+
                                        "</tr>"+
                                        "</table>"+

                                         "<hr>PELAPOR<table>"+
                                        "<tr>"+                                  
                                            "<td><i class=\'fa fa-frown-o\'></i> <b>pelapor</b></td>"+
                                          "<td> <b> : </b> </td>"+
                                            "<td> " + pelapor['.$i.'] + "</td>"+
                                        "</tr>"+
                                        "<tr>"+                                  
                                            "<td><i class=\'fa fa-comment\'></i> <b>Keluhan</b></td>"+
                                          "<td> <b> : </b> </td>"+
                                            "<td>  " + komen['.$i.'] + "</td>"+
                                        "</tr>"+  

                                    "</table><hr></div><!--/div-->";

            var infowindow = new google.maps.InfoWindow({
                content: contentString,
                 minWidth: 500
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
    
} (jQuery); 


</script>



<!--body onLoad="peta_awal()"-->
<div class="row">
    <div class="col-md-3">
    <div id="menumap"></div>
    </div>


<div class="box box-primary">
                <div class="box-header">
                  <img src="assets/icon/error.png"><h3 class="box-title"> Lokasi Request Gangguan</h3>
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
