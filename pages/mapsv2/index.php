
<script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"></script>
<script type="text/javascript" src="jquery.js"></script>
<script type="text/javascript">
var peta;
var koorAwal = new google.maps.LatLng(-0.790475563065513, 100.66022586805047);
var icon_pin_tower ='assets/icon/tower1.png';
//var icon_pin ='assets/icon/tower1.png';
function peta_awal(){
    loadDataLokasiTersimpan();
    set_icon(jenis);
    var settingpeta = {
        zoom: 10,
        center: koorAwal,
        icon: icon_pin,
        mapTypeId: google.maps.MapTypeId.ROADMAP 
        };
    peta = new google.maps.Map(document.getElementById("kanvaspeta"),settingpeta);
    google.maps.event.addListener(peta,'click',function(event){
        tandai(event.latLng);
    });
}

function peta_awal(){
    loadDataLokasiTersimpan();
    set_icon(jenis);
    var settingpeta = {
        zoom: 10,
        center: koorAwal,
        icon: icon_pin,
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
            icon_pin = 'assets/icon/tower1.png';
            break;
        case "gunung":
            icon_pin = 'assets/icon/tower1.png';
            break;
        case  "gempa":
            icon_pin = 'assets/icon/tower1.png';
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
    $('#kordinattersimpan').load('pages/mapsv2/tampilkan_lokasi_tersimpan.php');
}

//setInterval (loadDataLokasiTersimpan, 9000);
function CariDataLokasiTersimpan(){
    var cari_nama_lokasi = document.getElementById('cari_nama_lokasi').value;
    if(cari_nama_lokasi !==' '){
        $('#kordinattersimpan').load('pages/mapsv2/tampilkan_lokasi_tersimpan.php?lokasi='+cari_nama_lokasi);
    }else{
        $('#kordinattersimpan').load('pages/mapsv2/tampilkan_lokasi_tersimpan.php');
    }
    console.log(cari_nama_lokasi);
}

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
       icon: icon_pin_tower //setjenis pin utama
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
font-size:15px;
text-decoration:none;
color:#FF0000;
font-weight:bold;
}
a:hover{
color:#FF9900;
}
/*ul{
margin:0px auto;
padding:0px 15px 0px 15px;
list-style:square;}
li{
padding-left:15px;
padding:0px 15px 0px 5px;

}*/
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
<div class="row">
<div class="col-md-4">

<div class="box box-solid">
                <div class="box-header with-border">
                  <h3 class="box-title">Daftar Repeater</h3>
                  <div class="box-tools">
                  <div class="input-group" style="width: 150px;">
                      <input type="text" onkeypress="CariDataLokasiTersimpan()" id="cari_nama_lokasi" name="table_search" class="form-control input-sm pull-right" placeholder="Search">
                      <div class="input-group-btn">
                        <button class="btn btn-sm btn-default"><i class="fa fa-search"></i></button>
                        <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                      </div>
                    
                  </div>
                  </div>
                </div>
                <div class="box-body no-padding">
                   <div id="kordinattersimpan"></div>     
                </div><!-- /.box-body -->
              </div>                    



</div>
    <div class="col-md-8">
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
<div id="kanvaspeta" style=" margin:0px auto; width:100%; height:300px; float:right; padding:10px;"></div>
</div>


<div class="box-footer">

<div id="form_lokasi" style="background-color:#333333;min-width:23%; height:200px;text-align:left;padding: 10px 10px 10px 10px; /*float:left;*/">
<p><b>PANEL</b></p>
<div class="row">
    <div class="col-md-2">
            <input type="radio" name="jenis" id="jenis" value="gunung" onclick="setjenis(this.value)">
                 <?php echo'<img src="'.$baseurl.'assets/icon/tower1.png">';?> Tower <br>
            <input type="radio" name="jenis" id="jenis" value="gempa" onclick="setjenis(this.value)">
                <?php echo'<img src="'.$baseurl.'pages/mapsv2/icon/gempa.png">';?> Gempa Bumi <br>
            <input type="radio" name="jenis" id="jenis" value="banjir" onclick="setjenis(this.value)">
                <?php echo'<img src="'.$baseurl.'pages/mapsv2/icon/banjir.png">';?>  Banjir <br>
    </div>
    <div class="col-md-4">
        <div class="form-group">
            <label>Nama Lokasi</label>
            <input type="text" name="namatempat" id="namaTempat" requered>
        </div>
        <div class="form-group">
            <label>Koordinat X</label>
            <input type="text" name="koordinatx" id="koorX" readonly="readonly">
        </div>
        <div class="form-group">
            <label>Koordinat Y</label>
            <input type="text" name="koordinaty" id="koorY" readonly="readonly">
        </div>

    </div>
    <div class="col-md-4">
            <button id="simpanpeta">Simpan</button><img src="ajax-loader.gif" style="display:none" id="loading"><button onclick="javascript:carikordinat(koorAwal);">Koordinat Awal</button>
    </div> 

 </div>

</div>
</div>
</div>

<!--END BOX-->
</div></div>
</div>
<!--footer-->
<?php
include('_script.php');
ob_end_flush();
?> 
