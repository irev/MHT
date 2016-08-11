<?php
	date_default_timezone_set("Asia/Bangkok");
	$host	 = "localhost";
	$user	 = "root";
	$pass	 = "";
	$dabname = "1skripsi";
	
	$conn = mysql_connect( $host, $user, $pass) or die('Could not connect to mysql server.' );
	$select_db = mysql_select_db($dabname, $conn) or die('Could not select database.');
	$baseurl="http://localhost/mht/";

  define("baseurl", $baseurl);
	define("title", "MHT - Solok Media Net");
	define("ver", "2.0");
	define("app_name", " MHT ");
	define("build_date", "2016");
	define("mode", 1); // mode per baikan 1= aktif; 0 = tidak aktif 
	define("msg", '
		   <div class="navbar-custom-menu">
           <ul class="nav navbar-nav">
           <li class="dropdown messages-menu">
           <a  class=" dropdown-toggle bg-black"> <i class="fa fa-bug"></i><span>  <i class="fa fa-bug"></i>  Dalam Mode Perbaikan  </span> <i class="fa fa-bug"></i> <i class="fa fa-bug"></i></a>
          </li>
          </ul>
          </div>');
	include('log.php');
//seting huruf awal pengkodean kode
// string kode hanya bboleh dua huruf
	define("string_kd_sup", "SP"); // String awal kode suppler
	define("string_kd_fmasuk", "BM"); // String awal kode suppler
	define("string_kd_fkeluar", "BK"); // String awal kode suppler
	define("string_kd_barang", "SP"); // String awal kode suppler
	define("string_kd_tipe", "SP"); // String awal kode suppler
//echo $_COOKIE['id'];
if (isset($_COOKIE['id'])) {
   $img_q = mysql_fetch_array(mysql_query("SELECT tb_karyawan.avatar,tb_karyawan.bagian, tb_karyawan.hp as login_hp FROM tb_karyawan WHERE id_karyawan='".$_COOKIE['id']."'"));
   $bagian = $img_q['bagian'];
}
  
 define("login_stat",  $bagian );


//Mon Tue Wed Thu Fri Sat Sun
if (!function_exists('hr_indonesia')) {
function hr_indonesia($nama_hari){

	switch($nama_hari){      
        
        case 'Mon' : {$nama_hari='Sen';}
        		break;
        case 'Tue' : {$nama_hari='Sel';}
                break;
        case 'Wed' : {$nama_hari='Rab';}
                break;
        case 'Thu' : {$nama_hari='Kam';}
				break;
        case 'Fri' : {$nama_hari="Jum";}
				break;
        case 'Sat' : {$nama_hari='Sab';}
				break;
		case 'Sun' : {$nama_hari='Mig';}
                break;		
        default: {$nama_hari='UnK';}
                break;
    }
    return $nama_hari;
}
}

function bln_indonesia($bulan) {
$array_bulan=array("01"=>"Januari",
"02"=>"Februari",
"03"=>"Maret",
"04"=>"April",
"05"=>"Mei",
"06"=>"Juni",
"07"=>"Juli",
"08"=>"Agustus",
"09"=>"September",
"10"=>"Oktober",
"11"=>"Nopember",
"12"=>"Desember");
$bln_temp=explode("-",$bulan);
$bln=$bln_temp[1];
$thn=$bln_temp[0];
$nama_bulan=$array_bulan[$bln];
return $nama_bulan." ".$thn;
}

function nm_bulanIndonesia($bln){
$array_bulan=array(
"1"=>"Januari",		"01"=>"Januari",
"2"=>"Februari",	"02"=>"Februari",
"3"=>"Maret", 		"03"=>"Maret",
"4"=>"April",		"04"=>"April",
"5"=>"Mei",			"05"=>"Mei",
"6"=>"Juni", 		"06"=>"Juni",
"7"=>"Juli",		"07"=>"Juli",
"8"=>"Agustus",		"08"=>"Agustus",
"9"=>"September",	"09"=>"September",
"10"=>"Oktober",
"11"=>"Nopember",
"12"=>"Desember");
$nama_bulan=$array_bulan[$bln];
return $nama_bulan;
}

function tgl_indonesia($tanggal) {
$array_bulan=array("01"=>"Januari",
"02"=>"Februari",
"03"=>"Maret",
"04"=>"April",
"05"=>"Mei",
"06"=>"Juni",
"07"=>"Juli",
"08"=>"Agustus",
"09"=>"September",
"10"=>"Oktober",
"11"=>"Nopember",
"12"=>"Desember");
$tgl_temp=explode("-",$tanggal);
$tgl=$tgl_temp[2];
$bln=$tgl_temp[1];
$thn=$tgl_temp[0];
$nama_bulan=$array_bulan[$bln];
return $tgl." ".$nama_bulan." ".$thn;
}




//ambil tanggal awal-akhir

function tglAkhirBulan($thn, $blns){
$bln = sprintf('%01d',$blns);
$bulan[1]='31';
$bulan[2]='28';
$bulan[3]='31';
$bulan[4]='30';
$bulan[5]='31';
$bulan[6]='30';
$bulan[7]='31';
$bulan[8]='31';
$bulan[9]='30';
$bulan[10]='31';
$bulan[11]='30';
$bulan[12]='31';

if ($thn%4==0){
$bulan[2]='29';
}
return $bulan[$bln];
}

//penggunaan :
//$tglAkhir=tglAkhirBulan($thns,$blns);

//contoh :
//$tglAkhir=tglAkhirBulan('2016','12');
//echo $tglAkhir;


// SELISIH WAKTU function dateAgo
function selisihwaktu($date) {
  $ts = strtotime($date);
  $tsYmdDate = strtotime(date('Y-m-d 00:00:00', $ts));
 
  $tsNow = time();
  $dateNow = date('Y-m-d H:i:s', $tsNow);
  $tsYmdNow = strtotime(date('Y-m-d 00:00:00', $tsNow));
 
  $diff = ($tsYmdNow - $tsYmdDate)/(60*60*24);
 
  if ($diff == '1') {
    return "kemarin jam ".date('g:i A', $ts);
  } else {
 
    $diff = abs($tsNow - $ts);
 
    $seconds  = $diff;
    $minutes  = floor($diff/60);
    $hours    = floor($minutes/60);
    $days     = floor($hours/24);
    $minggu   = floor($days/7);
    $bulan   = floor($minggu/4);
    $tahun = floor($bulan/12);
 
    if ($seconds < 60) {
      //return "$seconds seconds ago";
      return "$seconds detik lalu";
    } elseif ($minutes < 60) {
      //return ($minutes == 1) ? "a minute ago" : "$minutes minutes ago" ;
      return ($minutes == 1) ? "semenit lalu" : "$minutes menit lalu" ;
    } elseif ($hours < 24) {
      //return ($hours == 1) ? "an hour ago" : "$hours hours ago" ;
      return ($days == 1) ? "sejam lalu" : "$hours jam lalu" ;
    }elseif ($days < 7) {
      //return ($hours == 1) ? "an hour ago" : "$hours hours ago" ;
      return ($minggu == 1) ? "sehari lalu" : "$days hari yang lalu" ;  
    }elseif ($minggu < 4) {
      //return ($hours == 1) ? "an hour ago" : "$hours hours ago" ;
      return ($bulan == 1) ? "seminggu lalu" : "$minggu minggu lalu" ;  
    }elseif ($bulan < 12) {
      //return ($hours == 1) ? "an hour ago" : "$hours hours ago" ;
      return ($tahun == 1) ? "sebulan lalu" : "$bulan bulan lalu" ;  
    }else {
    	$hrini = explode(' ',$date,0);
      //return tgl_indonesia($hrini);
      return  $tahun .' Tahun lalu'; 
    }
  }
 
}
// END SELISIH WAKTU function dateAgo
// // 5 seconds ago
//$date = date('Y-m-d H:i:s', time() - 5);
//echo dateAgo($date);
 
// 2 minutes ago
//$date = date('Y-m-d H:i:s', time() - 130);
//echo dateAgo($date);
 
// 5 hours ago
//$date = date('Y-m-d H:i:s', time() - (60*60*5));
//echo dateAgo($date);
 
// yesterday at 12:13 PM
//$date = date('Y-m-d H:i:s', time() - (60*60*25)); 
//echo dateAgo($date);
//echo "Tanggal saat ini: ".date('d-m-Y H:i:s')."<br>";
// 
// ENCONTOH
// 
// 


// Original PHP code by Chirp Internet: www.chirp.com.au
// Please acknowledge use of this code by including this header.

function textSingkat($string, $limit, $break=" ", $pad="...")
{
  // return with no change if string is shorter than $limit
  if(strlen($string) <= $limit) return $string;
  $string = substr($string, 0, $limit);
  if(false !== ($breakpoint = strrpos($string, $break))) {
    $string = substr($string, 0, $breakpoint);
  }

  return $string . $pad;
}

/// NAMA TOKO 
define("toko", "PT. MEEDUN SOFT");
define("toko_alamat", "Jln. Paus No. 28 Ulak Karang");
define("toko_kota", "Padang. Sumatra Barat");
define("toko_tlp1", "085212663404");
define("toko_tlp2", "085212663404");
define("toko_tlp3", "085212663404");
define("toko_mail", "refyandra@gmail.com");


?>