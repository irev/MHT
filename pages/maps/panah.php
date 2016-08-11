<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Contoh Aplikasi Peta GIS Sederhana Dengan Google Map API</title>
<script type="text/javascript" src="http://maps.google.com/maps/api/js"></script>
<script type="text/javascript" src="jquery.js"></script>
<script type="text/javascript">
var peta;
var koorAwal = new google.maps.LatLng(-0.790475563065513, 100.66022586805047);
//var icon_pin ='icon/home.png';
function peta_awal(){
    loadDataLokasiTersimpan();
    set_icon(jenis);
    var settingpeta = {
        zoom: 10,
        center: koorAwal,
       // icon: icon_pin,
        mapTypeId: google.maps.MapTypeId.ROADMAP 
        };
    peta = new google.maps.Map(document.getElementById("kanvaspeta"),settingpeta);
    google.maps.event.addListener(peta,'click',function(event){
        tandai(event.latLng);
    });
}

function tandai(lokasi){
    set_icon(jenis);
    $("#koorX").val(lokasi.lat());
    $("#koorY").val(lokasi.lng());
    tanda = new google.maps.Marker({
        position: lokasi,
        map: peta,
        icon: icon_pin
    });
}

function set_icon(jenisnya){
    switch(jenisnya){
        case "banjir":
            icon_pin = 'icon/banjir.png';
            break;
        case "gunung":
            icon_pin = 'icon/gunung.png';
            break;
        case  "gempa":
            icon_pin = 'icon/gempa.png';
            break;
    }
}
function setjenis(jns){
    jenis = jns;
}

$(document).ready(function(){
    $("#simpanpeta").click(function(){
        var koordinat_x = $("#koorX").val();
        var koordinat_y = $("#koorY").val();
        var nama_tempat = $("#namaTempat").val();   
        var jenis = $("#jenis").val();
        $("#loading").show();
        $.ajax({
            url: "simpan_lokasi_baru.php",
            data: "koordinat_x="+koordinat_x+"&koordinat_y="+koordinat_y+"&nama_tempat="+nama_tempat+"&jenis="+jenis,
            success: function(msg){
                $("#namaTempat").val(null);
                $("#loading").hide();
            }
        });
    });
});



function loadDataLokasiTersimpan(){
    //$('#kordinattersimpan').load('tampilkan_lokasi_tersimpan.php');
}
setInterval (loadDataLokasiTersimpan, 3000);

function carikordinat(lokasi){
   set_icon(jenis);  // setjenis
    var settingpeta = {
        zoom: 10,
        center: lokasi,
        mapTypeId: google.maps.MapTypeId.ROADMAP 
        };
    peta = new google.maps.Map(document.getElementById("kanvaspeta"),settingpeta);
    tanda = new google.maps.Marker({
        position: lokasi,
        map: peta,
       icon: icon_pin //setjenis pin utama
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

</script>

</head>
<style>
body{
font-size:12px;
font-family:Tahoma;
margin:0px auto;
padding:0px;
color:#FFFFFF;
background-color:#333333;
}
a{
text-decoration:none;
color:#FF0000;
font-weight:bold;
}
a:hover{
color:#FF9900;
}
ul{
margin:0px auto;
padding:0px 15px 0px 15px;
list-style:square;
}
li{
padding-left:15px;
padding:0px 15px 0px 5px;
}
input,select{
padding:5px;
border:1px solid #FFFFFF;
background-color:#FF9900;
}
input,button{
padding:5px;
border:1px solid #FFFFFF;
background-color:#FF9900;
}
button:hover{
padding:5px;
border:1px solid #FFFFFF;
background-color:#FF3300;
cursor:pointer;
}
</style>
<body onLoad="peta_awal()">
<div id="kanvaspeta" style=" margin:0px auto; width:72%; height:630px; float:right; padding:10px;"></div>
<div id="form_lokasi" style="background-color:#333333;min-width:23%; height:600px;text-align:left;padding: 10px 10px 10px 10px; float:left;">
<h1><u>PANEL</u></h1>
<table style="min-width:23%">
<tr>
<td>Ganti Jenis Peta</td><td>:
<select id="cmb" onchange="gantipeta()">
<option value="1">Peta Roadmap</option>
<option value="2">Peta Terrain</option>
<option value="3">Peta Satelite</option>
<option value="4">Peta Hybrid</option>
</select>
</td>
</tr>
<tr><td>Koordinat X</td><td>: <input type="text" name="koordinatx" id="koorX" readonly="readonly"></td></tr>
<tr><td>Koordinat Y</td><td>: <input type="text" name="koordinaty" id="koorY" readonly="readonly"></td></tr>
<tr><td>Nama Lokasi</td><td>: <input type="text" name="namatempat" id="namaTempat" requered></td></tr>
<td>Set Jenis Ikon</td>
<input type="radio" name="jenis" id="jenis" value="gunung" onclick="setjenis(this.value)">
<img src="icon/gunung.png"> Gunung Meletus <br>
<input type="radio" name="jenis" id="jenis" value="gempa" onclick="setjenis(this.value)">
<img src="icon/gempa.png"> Gempa Bumi <br>
<input type="radio" name="jenis" id="jenis" value="banjir" onclick="setjenis(this.value)">
<img src="icon/banjir.png"> Banjir <br>
<tr><td></td><td><button id="simpanpeta">Simpan</button><img src="ajax-loader.gif" style="display:none" id="loading"><button onclick="javascript:carikordinat(koorAwal);">Koordinat Awal</button></td></tr>
</table>
<div id="kordinattersimpan"></div>
</div>
</div>
</body>
</html>
