<!--script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"></script-->
<style type="text/css">
    .gm-style-iw{
        
    }
</style>
<?php 
//include('_script.php');
 ?>
<section class="content">

<div class="row">

</div>
<div class="row">
<div class="col-md-9">
<div class="box" >
  <div class="box-body">
       <a href="#Map_gangguan" onclick="javascript:showpage('pages/maps/map-pelanggan.php');" class="btn btn-info"><i class="fa fa-map-marker"></i> Pelanggan</a>
    <a href="#Map_gangguan" onclick="javascript:showpage('pages/maps/map-gangguan.php');" class="btn btn-danger"><i class="fa fa-map-marker"></i> Request </a>
    <a href="#Map_Pending" onclick="javascript:showpage('pages/maps/map-pending.php');" class="btn btn-primary"><i class="fa fa-map-marker"></i> Pending </a>
    <a href="#Map_Proses" onclick="javascript:showpage('pages/maps/map-proses.php');" class="btn btn-warning"><i class="fa fa-map-marker"></i> Proses </a>
    <a href="#Map_Done" onclick="javascript:showpage('pages/maps/map-done.php');" class="btn btn-success"><i class="fa fa-map-marker"></i> Done</a>
<br>
</div>
</div>
</div>
<div class="col-md-9">
<div class="box" >
  <div class="box-body">
<!--TAMPILKAN MAP-->
    <div id="kanvaspeta" style=" margin:0px auto; width:100%; height:450px; float:left; padding:10px;"  onload="javascript:load_peta.multi_koordinat();">kanvaspeta</div>
</div>
</div>
</div> 
   
<div class="col-md-3">   
<div class="box box-primary">
                <div class="box-header">
                  <img src="assets/icon/yellow-warning.png"><h3 class="box-title"> Map Maintenance Process</h3>
                  <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                    <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
            <span style="float:right;"> 
            <div class="form-group">     
                <label> Ganti Model Peta </label>
                <select id="cmb" onchange="load_peta.multi_koordinat()">
                    <option value="1">Peta Roadmap</option>
                    <option value="2">Peta Terrain</option>
                    <option value="3">Peta Satelite</option>
                    <option value="4">Peta Hybrid</option>
                </select>
            </div>    
            </span>
</div>
<div class="box-body">
<div class="box box-solid">
                <div class="box-header no-border">
                  <h3 class="box-title"></h3>
                  <div class="box-tools">
                  <div class="input-group" style="width: 100%;">

                      <input type="text" onkeypress="load_peta.CariDataLokasiTersimpan()" id="cari_nama_lokasi" name="table_search" class="form-control input-sm pull-right" placeholder="Search">
            
                  </div>
                  </div>
                </div>
                <div class="box-body no-padding"  higth="100">
                    <div class="direct-chat-messages no-border">
                        <div id="kordinattersimpan" class="no-border"></div><!-- /.TAMPIL DATA WILAYAH -->
                   </div>     
                </div><!-- /.box-body -->
    </div>                    

<button onclick="load_peta.multi_koordinat()">Refresh Peta</button>

<!--END TAMPILKAN MAP-->
<!--END BOX-->
</div>
</div>
</div>


  <div class="col-md-3">
    <div id="menumap"></div>
  </div>


</div>
<!--footer-->
</section>



<script type="text/javascript" src="pages/web/map/assets/js/markerclusterer_packed.js"></script>
<script type="text/javascript">
<!--

 //Ganti judul halaman
     $("#breadcrumb, #judulhal").text('Map Maintenance Process'); 
 //Tampil peta    
	 //$('#tampilmap').load('pages/maps/map_g.php');
	 // $('#menumap').load('pages/maps/_map_menu.php');
	 
/*	 
//////////////////////////////////////////////////////////////////////
//SKRIP DIBAWAH INI DI UNTUK MENAMPILKAN SEMUA DATA KOODINAT PELANGGAN
//OLEH REFYANDRA
//KOTA PADANG
// CATATAN
// urutan Eksekusi fungsi pada JS
// - VARIABEL FUNCTION
// - Pemanggilan Function
//////////////////////////////////////////////////////////////////////
//MAP PELANGGAN DALAM POSES PERBAIKAN 
//EDIT TERAKHIR 24 JUNI 2016
//EDIT TERAKHIR 17 Agus 2016
////////////////////////////////////////////////////////////////////// 
////VARIABEL PETA
*/
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
var icon_pin =  "assets/icon/yellow-warning.png"; // tanda gangguan
var gambar_tanda = "assets/icon/yellow-warning.png"; // tanda gangguan
var solok = new google.maps.LatLng(-0.790475563065513, 100.66022586805047); //set koordinat awal
var kontur;
$('#kordinattersimpan').load('pages/maps/proses/list_map_proses.php');
var load_peta = function(){
	var peta_awal		= function(){}
	var gantipeta		= function(){}
	var loadingpeta     = function(){}
	var set_icon        = function(){}
	var set_icon_tanda  = function(){}
	var clearMarkers	= function(){}
	var tandai 			= function(){}
	var carikordinat	= function(){}
	var multi_koordinat = function(kontur){}
	var ambildatabase	= function(){}
	var CariDataLokasiTersimpan = function(){} 
	var peta            = function(){}
return{
 peta_awal: function(){
 	var peta;
	var koorAwal = new google.maps.LatLng(-0.7864794500552789, 100.65369380638003);
	var icon_pin ='assets/icon/tower1.png';
   
    //console.log(set_icon_tanda(jenis));
    //load_peta.set_icon_tanda(jenis);
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
   // load_peta.loadDataLokasiTersimpan();
},
gantipeta: function(){
    //loadDataLokasiTersimpan();
    var isi = document.getElementById('cmb').value;
    if(isi=='1')
    {
    var settingpeta = {
        zoom: 10,
        center: solok,
        mapTypeId: google.maps.MapTypeId.ROADMAP
        };
       var kontur="ROADMAP"; 
    }
    else if(isi=='2')
    {
    var settingpeta = {
        zoom: 10,
        center: solok,
        mapTypeId: google.maps.MapTypeId.TERRAIN 
        };
   
     var kontur="TERRAIN";    
    }
    else if(isi=='3')
    {
    var settingpeta = {
        zoom: 10,
        center: solok,
        mapTypeId: google.maps.MapTypeId.SATELLITE  
        };
     var kontur="SATELLITE";    

    }
    else if(isi=='4')
    {
    var settingpeta = {
        zoom: 10,
        center: solok,
        mapTypeId: google.maps.MapTypeId.HYBRID  
        };
     var kontur="HYBRID";    

    }
    load_peta.multi_koordinat(kontur); 
    peta = new google.maps.Map(document.getElementById("kanvaspeta"),settingpeta);
    google.maps.event.addListener(peta,'click',function(event){
        //tandai(event.latLng);
    });
    
},
loadingpeta: function(){
   //load_peta.multi_koordinat();
   //$('#kordinattersimpan').load('pages/maps/gangguan/list_map_gangguan.php');
   console.log("load peta berhasil dimuat!" + kontur);
},

CariDataLokasiTersimpan: function(){
    var cari_nama_lokasi = document.getElementById('cari_nama_lokasi').value;
    if(cari_nama_lokasi !==null){
        $('#kordinattersimpan').load('pages/maps/gangguan/list_map_gangguan.php?lokasi='+cari_nama_lokasi);
    }else{
        $('#kordinattersimpan').load('pages/maps/gangguan/list_map_gangguan.php');
    }
    console.log(cari_nama_lokasi);
},
set_icon_tanda: function(jenisnya){
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
},
clearMarkers: function() {
  tanda.setMap(null);
},
set_icon: function(ikon){
    //if (ikon == "") {
    	//gambar_tanda = "assets/icon/yellow-warning.png"//+ikon;
   // } else {
        gambar_tanda = "assets/icon/yellow-warning.png"//+ikon;
   // }
},
tandai: function(lokasi){
   load_peta.clearMarkers();
   //load_peta.set_icon_tanda(jenis);
  // console.log('tandai lokasi  jenis' +' '+set_icon(jenis)); 
    $("#koorX").val(lokasi.lat());
    $("#koorY").val(lokasi.lng());
    if(icon_pin==''){
        n_pin = 'assets/icon/tower1.png';
    }else{
    	n_pin = icon_pin;
    } 
    tanda = new google.maps.Marker({
        position: lokasi,
        map: peta,
        icon: n_pin
    });
    
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
        icon: 'assets/icon/yellow-warning.png'//+icon_pin //setjenis pin utama
    });
    
    load_peta.ambildatabase(idpel);
    google.maps.event.addListener(tanda, 'click', function() {
      infowindow.open(peta,tanda);
    });

    google.maps.event.addListener(peta,'click',function(event){
        load_peta.tandai(event.latLng);
    });

},
//menampilkan multi kordinat
multi_koordinat: function () {
    // $('#kordinattersimpan').load('pages/maps/gangguan/list_map_gangguan.php');
var isi = document.getElementById('cmb').value;
    if(isi=='1')
    {
    var settingpeta = {
        zoom: 10,
        center: solok,
        mapTypeId: google.maps.MapTypeId.ROADMAP,
        mapTypeControl: true
        };
       var kontur="ROADMAP"; 
    }
    else if(isi=='2')
    {
    var settingpeta = {
        zoom: 10,
        center: solok,
        mapTypeId: google.maps.MapTypeId.TERRAIN,
        mapTypeControl: true 
        };
   
     var kontur="TERRAIN";    
    }
    else if(isi=='3')
    {
    var settingpeta = {
        zoom: 10,
        center: solok,
        mapTypeId: google.maps.MapTypeId.SATELLITE,
        mapTypeControl: true 
        };
     var kontur="SATELLITE";    

    }
    else if(isi=='4')
    {
    var settingpeta = {
        zoom: 10,
        center: solok,
        mapTypeId: google.maps.MapTypeId.HYBRID,
        mapTypeControl: true  
        };
     var kontur="HYBRID";    

    }else{
    var settingpeta = {
        zoom: 9,
        center: solok,
        mapTypeId: google.maps.MapTypeId.ROADMAP,
        mapTypeControl: true	
    };  
    }
   
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

    peta = new google.maps.Map(document.getElementById("kanvaspeta"),settingpeta);
    google.maps.event.addListener(peta,'click',function(event){
    //	untuk view peta gangguan fungsi tandai dimatikan 
    //  load_peta.tandai(event.latLng);
    console.log(kontur);
    }); 
    // panggil pungsi ini buat nampilkan markernya di peta
    load_peta.ambildatabase(idpel);

},
ambildatabase: function(){
    // kita bikin dulu array marker dan content info
    var markers = [];
    var info = [];

<?php
include('../../_db.php');
      //$query = mysql_query("SELECT `a`.*,`b`.*,`c`.merek,`c`.mac_address,`c`.keterangan as pr_ket FROM `tb_pelanggan` AS `a` LEFT JOIN `tb_paket` AS `b` ON `a`.`id_paket` = `b`.`id_paket` LEFT JOIN `tb_perangkat` as `c` ON `a`.`id_perangkat`=`c`.`id_perangkat` where `a`.`status`='0'");
      //$query = mysql_query("SELECT `g`.*,g.keterangan as komen,`p`.*,`b`.*,`c`.merek,`c`.mac_address,`c`.keterangan as pr_ket FROM `tb_gangguan` as `g` LEFT JOIN `tb_pelanggan` as `p` ON `g`.`id_pelanggan`=`p`.`id_pelanggan` LEFT JOIN `tb_perangkat` as `c` ON `c`.`id_perangkat`=`p`.`id_perangkat` LEFT JOIN `tb_paket` as `b` ON `b`.`id_paket`=`p`.`id_paket` WHERE `g`.`status_gangguan`='0' GROUP BY p.id_pelanggan");
   $query = mysql_query("SELECT `p`.*,`p`.`nama` as nm_pelanggan ,`g`.*,`g`.`keterangan` as komen,`b`.*,`c`.merek,`c`.mac_address,`c`.keterangan as pr_ket FROM `tb_pelanggan` as `p` INNER JOIN `tb_gangguan` as `g` ON `p`.`id_pelanggan`=`g`.`id_pelanggan` INNER JOIN `tb_perangkat` as `c` ON `p`.`id_perangkat`=`c`.`id_perangkat` INNER JOIN `tb_paket` as `b` ON `p`.`id_paket`=`b`.`id_paket` GROUP BY p.id_pelanggan");
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
                                 "<br>"+
                                 "<table width=\'100%\'>"+
                                        "<tr bgcolor=\'#c3bdbd\' colspan=\'2\'>"+
                                            "<td>&nbsp;Pelanggan</td><td></td><td></td>"+
                                        "</tr>"+
                                        "<tr>"+
                                        "<tr bgcolor=\'#aef5cd\'>"+
                                            "<td colspan=\'2\'>&nbsp;<i class=\'fa fa-user\'></i> <b>" + nama['.$i.'] + "</b></td>"+
                                        "</tr>"+
                                  "</table>"+
                                  "<table>"+      
                                        "<tr>"+
                                            "<td width=\'90px\'>&nbsp;<b><i class=\'fa fa-map-marker\'></i> Alamat</b></td>"+
                                            "<td><b> : </b></td>"+
                                            "<td width=\'200px\'><font color=\'blue\'>" + alamat['.$i.'] + "</font></td>"+
                                        "</tr>"+
                                        "<tr bgcolor=\'#aef5cd\'>"+
                                            "<td>&nbsp;<b><i class=\'fa fa-phone\'></i> Hp</b></td>"+
                                            "<td> <b> : </b> </td>"+
                                            "<td><font color=\'blue\'>0" + hp['.$i.'] + "</td>"+
                                        "</tr>"+
                                        "<tr>"+
                                            "<td>&nbsp;<b><i class=\'fa fa-cube\'></i> Paket</b></td>"+
                                            "<td> <b> : </b> </td>"+
                                            "<td>" + kategori['.$i.'] +"</font></td>"+
                                        "</tr>"+
                                        "<tr bgcolor=\'#aef5cd\'>"+
                                            "<td></td>"+
                                            "<td> <b> : </b> </td>"+
                                            "<td><font color=\'blue\'>["+ band['.$i.']+ "]</font></td>"+
                                        "</tr>"+
                                        "<tr>"+                                  
                                            "<td>&nbsp;<b><i class=\'fa fa-archive\'></i> Perangkat</b></td>"+
                                          "<td> <b> : </b> </td>"+
                                            "<td><font color=\'blue\'> " + perangkat['.$i.'] + "  " + mac['.$i.']+ "</font></td>"+
                                        "</tr>"+
                                         "<tr bgcolor=\'#c3bdbd\'><td>&nbsp;PELAPOR</td><td></td><td></td></tr>"+
                                        "<tr bgcolor=\'#aef5cd\'>"+                                  
                                            "<td width=\'50px\'>&nbsp;<i class=\'fa fa-frown-o\'></i> <b>pelapor</b></td>"+
                                          	"<td> <b> : </b> </td>"+
                                            "<td width=\'200px\'><font color=\'blue\'>" + pelapor['.$i.'] + "</font></td>"+
                                        "</tr>"+
                                        "<tr>"+                                  
                                            "<td>&nbsp;<i class=\'fa fa-comment\'></i> <b>Keluhan</b></td>"+
                                          	"<td> <b> : </b> </td>"+
                                            "<td><font color=\'blue\'>  " + komen['.$i.'] + "</font></td>"+
                                        "</tr>"+  
                                    "</table></div><!--/div-->";

            var infowindow = new google.maps.InfoWindow({
                content: contentString,
                 minWidth: 1000
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
},

 peta: function(){
 	console.log('load_peta on return');
 }

}
} (jQuery); 
 
/// PEMANGGILANG FUNCTIN PETA 
//window.onload = load_peta.loadingpeta;

$( document ).ready(function($) {
    console.log( "ready!" );

///load_peta.peta();
//load_peta.peta_awal();
load_peta.loadingpeta();
//agar saat loading map tampil dengan sempurna
//Set pemanggila semua kordinat dalam 700s
//untuk menunggu fuction ambildatabase(); selesai di proses
//var kontur = 'ROADMAP';

 //setTimeout(function(){ load_peta.gantipeta(); }, 1700);
 setTimeout(function(){ load_peta.multi_koordinat(kontur); }, 1700);

});


</script>
<!--div onload="javascript:load_peta.multi_koordinat();"></div-->


<?php
ob_end_flush();
?> 
