<?php 
include('../../_db.php');
error_reporting(0);
    if(!isset($_SESSION)) 
    { 
        session_start(); 
    } 
if(!isset($_SESSION['login_hash']) && !isset($_SESSION['login_name']) && !isset($_SESSION['login_user'])){
   echo '<script>window.location="'.baseurl.'";</script>';
}
?>

<section class="content">
    <div class="row">    
<div class=" col-sm-12">
<div class=" col-sm-4"></div>
<div class=" col-sm-4 box box-danger">
                <div class="box-header with-border">
                  <h3 class="box-title">Perubahan password untuk
<?php
echo " Username <b>".$_SESSION['login_user']."</b>";
?>
                  </h3>
                </div>
                <div class="box-body">
                  <div class="row">
 <div class="col-xs-12">                 
<form id="form_ganti_password" method="post">
<label>Password Lama</label>
<input class="form-control" type="password" id="old_password" name="old_password">
<label>Password Baru</label>
<input class="form-control" type="password" id="new_password" name="new_password">
<label>Konfirmasi Password Baru</label>
<input class="form-control" type="password" id="new_password2" name="new_password2">
<p><?php echo md5('petugas'); ?></p>
</form>
<input id="btn-ubah" type="submit" class="btn btn-default" name="button" value="Ubah">
</div>
</div>
</div>
</div>
</div>
<div class=" col-sm-4"></div>
</div>
</section>	

<script type="text/javascript">
	$("#form_ganti_password").keyup(function(event){
    if(event.keyCode == 13){
        $("#btn-ubah").click();
    }
});
$(document).on('click','#btn-ubah', function(){  
//cek input pas baru dan lama sama 
var lama  = document.getElementById("old_password").value;
var baru1 = document.getElementById("new_password").value;
var baru2 = document.getElementById("new_password2").value;
console.log(lama+' '+ baru1+' '+ baru2);
if(baru1==baru2 && lama !==''){
	var url ='pages/web/exepaswd.php';
    //var pas = $('form_ganti_password').serialize();
	$.post(url,{old_password: lama, new_password:baru1, new_password2: baru2}, function(data){
			alert(data.msg);
	    document.getElementById("old_password").value="";
		document.getElementById("new_password").value="";
 		document.getElementById("new_password2").value="";
	}, "json");
}else{
	alert('Masih ada input yang kosong');
}  
	});
</script>


<?php
//include('_script.php');
ob_end_flush();
?> 