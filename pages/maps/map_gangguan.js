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