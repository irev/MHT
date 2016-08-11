<html>
<head>
    <title>Google Maps Multi Icon</title>
<script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"></script>
<script type="text/javascript" src="assets/js/jquery.js"></script>
<script type="text/javascript" src="assets/js/markerclusterer_packed.js"></script>
<script type="text/javascript">
var peta;
var nama     = new Array();
var kategori = new Array();
var alamat   = new Array();
var x        = new Array();
var y        = new Array();
var i;
var url;
var gambar_tanda;

function peta_awal() {
    var padang = new google.maps.LatLng(-0.9530200167955291,100.40853881277144);

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
        zoom: 11,
        center: padang,
        mapTypeId: google.maps.MapTypeId.ROADMAP,
        styles: myStyles 
        };

    peta = new google.maps.Map(document.getElementById("map_canvas"),petaoption);

    // panggil pungsi ini buat nampilin markernya di peta
    ambildatabase();

}

function ambildatabase(){
    // kita bikin dulu array marker dan content info
    var markers = [];
    var info = [];
    
    <?php
    // koneksi database
    $link   = mysql_connect('localhost','root','');
    mysql_select_db('gis_map', $link);
//include('koneksi.php');
    $query = mysql_query("SELECT `a`.*,`b`.* FROM `lokasi` AS `a` LEFT JOIN `kategori` AS `b` ON `a`.`kategori` = `b`.`id`");
    $i = 0;
    $js = "";

    // kita lakuin looping datanya disini
    while ($value = mysql_fetch_assoc($query)) {

    $js .= 'nama['.$i.'] = "'.$value['nama'].'";
            kategori['.$i.']  = "'.$value['nama_kategori'].'";
            alamat['.$i.'] = "'.$value['alamat'].'";
            x['.$i.'] = "'.$value['latittude'].'";
            y['.$i.'] = "'.$value['longitude'].'";
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
                                            "<td>" + alamat['.$i.'] + "</td>"+
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

</script>
</head>
<body onload="peta_awal()">
<center>
    <h3>GOOGLEMAPS MULTI ICON</h3>
    <div id="map_canvas" style="width:100%; height:500px"></div>
</center>
</body>
</html>