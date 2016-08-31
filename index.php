<?php 
require("_db.php");
//SET Mode 
if (mode == 0){
    error_reporting(0);
}else{
    error_reporting(1);
}
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title><?php echo app_name?></title>

    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="assets/plugins/fonts/font-awesome/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="assets/plugins/ionicons/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="assets/dist/css/AdminLTE.min.css">
    <!-- iCheck -->
    <link rel="stylesheet" href="assets/plugins/iCheck/square/blue.css">
 <!-- daterange picker -->
    <link rel="stylesheet" href="assets/plugins/daterangepicker/daterangepicker-bs3.css">
<style type="text/css">
.error{
margin-top: 6px;
margin-bottom: 0;
color: #fff;
background-color: #D65C4F;
display: table;
padding: 5px 8px;
font-size: 11px;
font-weight: 600;
line-height: 14px;
}

.bgimg{
background-image: url(assets/img/web-host-vs-isp.jpg);
background-repeat: no-repeat;
background-size: 100% 100%;
opacity: 0.99;
/*padding-top: -200px;*/
}

.login-box{
  background-image: url(assets/img/logosmn.png);
  background-repeat: no-repeat;
  /*position: fixed;*/
}

#logerror{
position: absolute;
margin: 5% 50%;

}

</style>

   <!-- jQuery 2.2.1 -->
    <script src="assets/plugins/jQuery/jquery-2.2.1.min.js"></script>
    <!-- jQuery 2.1.4 >
    <script src="assets/plugins/jQuery/jQuery-2.1.4.min.js"></script-->
    <!-- Bootstrap 3.3.5 -->
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <!-- iCheck -->
    <script src="assets/plugins/iCheck/icheck.min.js"></script>
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.10.2/jquery-ui.js"></script>


</head>
<body class="hold-transition login-page bgimg">
<div class="">
  <div class="login-box">
    <?php if(mode==1){ echo "<center>".msg."</center>";} ?>
      <div class="login-logo" ><br/>
      <!--a href="#"><img src="assets/img/logoinv.png"> </a-->
      </div><!-- /.login-logo -->
      <div class="box box-solid box-default"> 

<?php
ob_start();
session_start();
if(!isset($_SESSION['login_hash'])){
if(isset($_COOKIE['id'])){
 $idk=$_COOKIE['id'];
mysql_query("UPDATE tb_karyawan SET online='0' WHERE id_karyawan='$idk'"); 
 }
}else{  
// Jika Sudah berhasil
  echo'<div class="overlay"><i class="fa fa-refresh fa-spin"></i></div>';
  echo "<script>window.location='dashboard.php'</script>";
}
if(isset($_SESSION['login_hash'])){
  $idkar = $_COOKIE['id'];
  mysql_query("UPDATE `tb_karyawan` SET online='2' WHERE id_karyawan='$idkar'"); 
}
?>
    <form id="loginform" action method="POST">
      <div class="login-box-body">
        <p class="login-box-msg">Masuk untuk memulai sesi Anda</p>
        <!--form id="loginform" action="index.php?login_attempt=1" method="post"-->
          <div class="form-group has-feedback">
          <div id="logerror"> 
            <div id="overlay" class="overlay" style="display:none;" ><i class="fa fa-refresh fa-spin"></i></div>
          </div>
            <input type="text" id="username" name="username" class="form-control"  placeholder="Username" value=""/>
            <span class="glyphicon glyphicon-user form-control-feedback"></span>
          </div>
          <div class="form-group has-feedback">
            <input type="password" id="password" name="password" class="form-control"  placeholder="Password" value=""/>
            <span class="glyphicon glyphicon-lock form-control-feedback"></span>
          </div>
          <div class="row">
            <div class="col-xs-8">
              <div class="checkbox icheck">
                <label>
                  <input type="checkbox" name="rememberme"> Remember Me <div id="msg"></div>
                </label>
              </div>
            </div><!-- /.col -->
            <div class="col-xs-4">
              <button type="button" id="btn-login" value="SignIn" name="submit" class="bt_login btn btn-primary btn-block btn-flat"/>Login</button>
            </div><!-- /.col -->
          </div>
          </div>
        </form>
      </div><!-- /.login-box-body -->
      <center style="color:#ffffff"><b><?php echo app_name.' Version '.ver.' '.build_date   ?></b></center>
      <center>
      <div class=" col-sm-12 box-body no-border">
      <div class="box-group box-solid no-border" id="accordion">
      <div class="panel"> 
      <a href="#collapse" data-toggle="collapse" data-parent="#accordion" aria-expanded="false" class="collapsed"><center><i class="fa fa-info"></i>  User Login Demo  <i class="fa fa-angle-right"></i></center></a>
      <div id="collapse" class="panel-collapse collapse" aria-expanded="false" style="height: 0px;">
       <div  class="box-body"><center>
      <b>customer service</b><br>
      user : ahmi<br>
      password : petugas<br>
      <b>Koordinator</b><br>
      user : andra<br>
      password : petugas<br>
      <b>Teknisi</b><br>
      user : arif<br>
      password : petugas<br></center>
      </div>
      </div>
      </div>
      </div>
      </div>
      </center>
    </div><!-- /.login-box -->



<?php 
ob_end_flush();
?>
<script>
<!--
$( document ).ready(function() {
   console.log( "Data Ok!" );

      $(function () {
        $('input').iCheck({
          checkboxClass: 'icheckbox_square-blue',
          radioClass: 'iradio_square-blue',
          increaseArea: '20%' // optional
        });
      });
var msg_error = [
            '<div class="col-md-12 alert">',
            '<div aria-hidden="false" id="alert" style="display: block;" class="alert modal fade in"  role="dialog">',
            '<div class="modal-dialog alert alert-danger alert-dismissable">',
            '<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>',
            '<h4><i class="icon fa fa-ban"></i> Alert!</h4>',
            'Gagal! <strong>login gagal silahkan coba lagi! ',
            '</div> ',
            '</div> ',
            '</div>'
        ].join("\n");

$("#loginform").keyup(function(event){
    if(event.keyCode == 13){
        $("#btn-login").click();
    }
});

$(document).on('click','#btn-login', function(){  
  document.getElementById("username").readonly = true;
  document.getElementById("password").readonly = true;
  var dc =  $("#loginform").serialize();
  var u = $("#username").val();
  var p = $("#password").val();
  if (u !='' || p !='' || dc!="username=&password="){
     $("#overlay").css("display", "block");

          $.ajax({
            type: "POST",
            url: 'login.php', 
            data: $("#loginform").serialize(), 
            //cache: false,
                 success: function(response)
                   {       
                    if(response==10){  
                     window.location.replace("dashboard.php");
                    }else if(response==00){                   
                         $('#msg').html("<center><font color='#ff0000'><i>User</i> atau <i>Password</i> salah..!</font></center>").show("slow");
                    }
                    $("#overlay").css("display", "block");
                   },
                   error: function(response){
                    $("#logerror").html("<font color='#ff0000'><i>User</i> atau <i>Password</i> salah..!</font>").show("slow");

                    }
               });
  }else{
    alert("isi user dan password anda..!");
  }
// cek browser          
var isChrome = !!window.chrome && !!window.chrome.webstore;
if(isChrome==false){
}

setTimeout(function () {
 $("#overlay").css("display", "none");
 $("#msg").css("display", "none");
 $("#username, #password").val("");
 document.getElementById("username").readonly = false;
 document.getElementById("password").readonly = false;
}, 3000);
});

setTimeout(function () {
 $("#overlay").css("display", "none");
}, 3000);
       // return false;
     });  
-->       
</script>

</div>
</body>
</html>