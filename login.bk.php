
<?php
error_reporting(0);
session_start();
/// LOGIN PROSES
require("_db.php");
if(isset($_POST['username'])){ 
  $spf=sprintf("Select * from user_login where username='%s' and password='%s'",$_POST['username'],md5($_POST['password']));
  $rs=mysql_query($spf);
  $rw=mysql_fetch_array($rs);
  $rc=mysql_num_rows($rs);
  
  if($rc==1)
  {
 $ses= $_SESSION['login_hash']=$rw['login_hash'];
       $_SESSION['login_user']=$rw['username'];
         $_SESSION['login_name']=$rw['nama'];
         //$_SESSION['login_hp']=$rw['hp'];
         $_SESSION['login_satatus']=1;

 if (isset($_POST['rememberme'])) {
            $_SESSION['login_hash']=$rw['login_hash'];
            $_SESSION['login_user']=$rw['username'];
            $_SESSION['login_name']=$rw['nama'];
              //$_SESSION['login_hp']=$rw['hp'];
              $_SESSION['login_satatus']=1;
            /* Set cookie to last 1 year */
            setcookie('_id_invb', $_POST['username'], time()+60*60*24*365,  $baseurl);
            setcookie('_meedun_smn', md5($_POST['password']), time()+60*60*24*365, $baseurl);
            setcookie('_stat', "1", time()+60*60*24*365, $baseurl);
        } else {
            /* Cookie expires when browser closes */
            setcookie('_id_invb',NULL, false);
            setcookie('_meedun',NULL , false);
            setcookie('_stat',NULL , false);
             
        }
            echo 1;
        }else{ 
            echo 0;
        }
}        
 echo 00;
?>