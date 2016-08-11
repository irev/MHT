
<?php
error_reporting(0);
session_start();
/// LOGIN PROSES
require("_db.php");
$baseurl = "http://".$_SERVER['SERVER_NAME']."/mht";
if(isset($_POST['username'])){ 
  $spf=sprintf("Select * from tb_karyawan where username='%s' and password='%s'",$_POST['username'],md5($_POST['password']));
  $rs=mysql_query($spf);
  $rw=mysql_fetch_array($rs);
  $rc=mysql_num_rows($rs);
  
if($rc==1){
 $ses= $_SESSION['login_hash']=$rw['login_hash'];
       $_SESSION['login_user']=$rw['username'];
       $_SESSION['login_name']=$rw['nama'];
       $_SESSION['id_karyawan']=$rw['id_karyawan'];
       $_SESSION['rememberme']=$_POST['rememberme'];
       //$_SESSION['login_hp']=$rw['hp'];
       $_SESSION['login_satatus']=1;
       $idkar = $_SESSION['id_karyawan'];
       mysql_query("UPDATE `tb_karyawan` SET online='1' WHERE id_karyawan='$idkar'");

 if (isset($_POST['rememberme'])) {
   $baseurl = "http://".$_SERVER['SERVER_NAME']."/mht";
            $_SESSION['login_hash']=$rw['login_hash'];
            $_SESSION['login_user']=$rw['username'];
            $_SESSION['login_name']=$rw['nama'];
            $_SESSION['id_karyawan']=$rw['id_karyawan'];
            $_SESSION['rememberme']=$_POST['rememberme'];
            $idkar = $rw['id_karyawan'];
              //$_SESSION['login_hp']=$rw['hp'];
            $_SESSION['login_satatus']=1;
            /* Set cookie to last 1 year */
            mysql_query("UPDATE `tb_karyawan` SET online='1' WHERE id_karyawan='$idkar'");
            setcookie('id',  $_SESSION['id_karyawan'], time()+60*60*24*365,  $baseurl);
            setcookie('hh',  $_SESSION['rememberme'], time()+60*60*24*365,  $baseurl);
            setcookie('_id_smn', $_POST['username'], time()+60*60*24*365,  $baseurl);
            //setcookie('_meedun_smn', md5($_POST['password']), time()+60*60*24*365, $baseurl);
            setcookie('_stat', "1", time()+60*60*24*365, $baseurl);
        } else {
           $baseurl = "http://".$_SERVER['SERVER_NAME']."/mht";
           setcookie('id', $_SESSION['id_karyawan'], time()+60*60*24*365,  $baseurl);
            /* Cookie expires when browser closes */
            setcookie('_id_smn',NULL, false);
            setcookie('_meedun_smn',NULL , false);
            setcookie('_stat',NULL , false);
     $_SESSION['id_karyawan']=$rw['id_karyawan'];
     $_SESSION['session_time'] = time(); //got the login time for user in second 
     $_SESSION['session_off'] = 120;
     $idkar = $_SESSION['id_karyawan'];    
     mysql_query("UPDATE `tb_karyawan` SET online='1' WHERE id_karyawan='$idkar'"); 
        }
            echo 1;
        }else{ 
            echo 0;
        }
}        
 echo 00;
?>