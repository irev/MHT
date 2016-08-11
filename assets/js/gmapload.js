var peta;
var koorAwal = new google.maps.LatLng(-0.790475563065513, 100.66022586805047);
//var icon_pin ='assets/icon/client_home.png';
var icon_pin ='<?php echo base_url(); ?>assets/icon/tower1.png';
function peta_awal(){
    loadDataLokasiTersimpan();
    var settingpeta = {
        zoom: 10,
        center: koorAwal,
        icon: icon_pin,
        addMarker: 'single', 
        mapTypeId: google.maps.MapTypeId.ROADMAP 
        };
    peta = new google.maps.Map(document.getElementById("kanvaspeta"),settingpeta);
    google.maps.event.addListener(peta,'click',function(event){
        tandai(event.latLng);
    });
}


///Dasar marker pin
// kalo memakai fugsi ini menampilkan banya icon pin pada peta
function multitandai(lokasi){
        $("#koorX").val(lokasi.lat());
        $("#koorY").val(lokasi.lng());
        tanda = new google.maps.Marker({
            position: lokasi,
            icon: icon_pin,
            draggable: false,
            animation: google.maps.Animation.DROP,
            map: peta
        });
}
//end dasar marker pin

//// marker satu pin ( placeMarker )
/// memakai fungsi ini akan menandai satu buah pin. jika diklik lagi pin yang lama akn di-placeMarker atau dihapus
var tanda;
function tandai(lokasi) {
var icon_pin ='<?php echo base_url(); ?>assets/icon/tower1.png';
        
  if (tanda) {
        $("#koorX").val(lokasi.lat());
        $("#koorY").val(lokasi.lng());
        document.getElementById("koorXmodal").innerHTML = ' latitude = ' + lokasi.lat();
        document.getElementById("koorYmodal").innerHTML = ' longitude = ' + lokasi.lng();
    tanda.setPosition(lokasi);
  } else {
        $("#koorX").val(lokasi.lat());
        $("#koorY").val(lokasi.lng());
        document.getElementById("koorXmodal").innerHTML = ' latitude = ' + lokasi.lat();
        document.getElementById("koorYmodal").innerHTML = ' longitude = ' + lokasi.lng();
    tanda = new google.maps.Marker({
            position: lokasi,
            icon: icon_pin,
            draggable: false,
            animation: google.maps.Animation.DROP,
            map: peta
    });
  }
}

google.maps.event.addListener(peta, 'click', function(event) {
  placeMarker(event.latLng);
});
////END marker satu pin 



 function clearMarkers(){
    setMapOnAll(null);
}




$(document).ready(function(){   

    $("#simpanpeta").click(function()
    {       
     $.ajax({
         type: "POST",
         url: base_url + "chat/post_action", 
         data: {textbox: $("#textbox").val()},
         dataType: "text",  
         cache:false,
         success: 
              function(data){
                alert(data);  //as a debugging message.
              }
          });// you have missed this bracket
     return false;
 });
 });



function SimpadatKlien(){
    $.ajax({
        type: "post",
        url: "<?php echo base_url(); ?>index.php/pointing/ajax_add",
        cache: false,               
        data: $('#KlientForm').serialize(),
        success: function(json){                        
        try{        
            var obj = jQuery.parseJSON(json);
            alert( obj['STATUS']);
        }catch(e) {     
            alert('Exception while request..');

        }       
        },
        error: function(){                      
            alert('Error while request..');
        }
 });
}




$(document).ready(function(){
    $("#simpanpeta").click(function(){
        var koordinat_x = $("#koorX").val();
        var koordinat_y = $("#koorY").val();
        
        //var nama_tempat = $("#namaTempat").val();   
        $.ajax({
            url: "<?php echo base_url(); ?>modul/m_add_point/simpan_lokasi_baru.php",
            data: "koordinat_x="+koordinat_x+"&koordinat_y="+koordinat_y,
            success: function(data){
            $("#namaTempat").val(null);
            
///if ditambahkan blom fix
            if(data.status == "success"){
                $("#namaTempat").val(null);
                 alert("success!");
                    $(".title").html("");
                    $("#pesan").html(data.message)
                    .hide().fadeIn(1000, function() {
                        $("#pesan").append("");
                        }).delay(1000).fadeOut("fast");

            }
            else if(data.status == "error"){
                      alert("Error on query!, Gagal Menyimpan Data");
                  }

            }
        });
    });
});



function loadDataLokasiTersimpan(){
    $('#kordinattersimpan').load('<?php echo base_url(); ?>modul/m_add_point/tampilkan_lokasi_tersimpan.php');
}

setInterval (loadDataLokasiTersimpan, 3000);

function carikordinat(lokasi){
    var icon_pin ='<?php echo base_url(); ?>assets/icon/tower1.png';
    var settingpeta = {
        zoom: 15,
        center: lokasi,
        icon: icon_pin,
        mapTypeId: google.maps.MapTypeId.ROADMAP 
        };
    peta = new google.maps.Map(document.getElementById("kanvaspeta"),settingpeta);
    tanda = new google.maps.Marker({
        position: lokasi,
        icon: icon_pin,
        map: peta
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
    var icon_pin ='<?php echo base_url(); ?>assets/icon/tower1.png';
    var isi = document.getElementById('cmb').value;
    if(isi=='1')
    {
    var settingpeta = {
        zoom: 10,
        center: koorAwal,
        icon: icon_pin,
        mapTypeId: google.maps.MapTypeId.ROADMAP
        };
    }
    else if(isi=='2')
    {
    var settingpeta = {
        zoom: 10,
        center: koorAwal,
         icon: icon_pin,
        mapTypeId: google.maps.MapTypeId.TERRAIN 
        };
    }
    else if(isi=='3')
    {
    var settingpeta = {
        zoom: 10,
        center: koorAwal,
         icon: icon_pin,
        mapTypeId: google.maps.MapTypeId.SATELLITE  
        };
    }
    else if(isi=='4')
    {
    var settingpeta = {
        zoom: 10,
        center: koorAwal,
        icon: icon_pin,
        mapTypeId: google.maps.MapTypeId.HYBRID  
        };
    }
    peta = new google.maps.Map(document.getElementById("kanvaspeta"),settingpeta);
    google.maps.event.addListener(peta,'click',function(event){
        tandai(event.latLng);
    });
}



function initMap() {
  var icon_pin ='<?php echo base_url(); ?>assets/icon/tower1.png';
  var peta = new google.maps.Map(document.getElementById('kanvaspeta'), {
    center: {lat: -0.7892747626240698, lng: 100.65493583679199},
    zoom: 15,
    mapTypeId: google.maps.MapTypeId.HYBRID  
  });

  var infoWindow = new google.maps.InfoWindow({map: peta});

  // Try HTML5 geolocation.
  if (navigator.geolocation) {
    navigator.geolocation.getCurrentPosition(function(position) {
      var pos = {
        lat: position.coords.latitude,
        lng: position.coords.longitude
      };
      infoWindow.setPosition(pos);
      infoWindow.setContent('Lokasi Anda saat ini.');
      peta.setCenter(pos);
        $("#koorX").val(position.coords.latitude);
        $("#koorY").val(position.coords.longitude);
        document.getElementById("koorXmodal").innerHTML = ' latitude = ' + position.coords.latitude;
        document.getElementById("koorYmodal").innerHTML = ' longitude = ' + position.coords.longitude;
    }, function() {
      handleLocationError(true, infoWindow, peta.getCenter());
    });
  } else {
    // Browser doesn't support Geolocation
    handleLocationError(false, infoWindow, peta.getCenter());
  }
}

function handleLocationError(browserHasGeolocation, infoWindow, pos) {
  infoWindow.setPosition(pos);
  infoWindow.setContent(browserHasGeolocation ?
                        'Error: The Geolocation service failed.' :
                        'Error: Your browser doesn\'t support geolocation.');
}