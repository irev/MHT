<?php
error_reporting(0);
include('../../_db.php');
 if(!isset($_SESSION)) 
    { 
        session_start(); 
    }
if(isset($_SESSION['login_hash'])){

	$sc1=sprintf("Select * from tb_karyawan where username='%s' and password='%s'",$_SESSION['login_user'],md5($_POST['old_password']));
	
	$q1=mysql_query($sc1);
	$rc1=mysql_num_rows($q1);
	if($rc1==1)
	{  
		$sc2=sprintf("Update tb_karyawan Set password='%s' Where username='%s'",md5($_POST['new_password']),$_SESSION['login_user']);
		$q2=mysql_query($sc2);
		if($q2)
		{
		echo json_encode(array('status'=>true,'msg'=>'Password berhasil di ubah'));

		}
	}else{
		$lama=md5($_POST['old_password']);
		echo json_encode(array('status'=>false,'msg'=>'Verifikasi Password lama salah = '.$lama.' = '.$_POST['old_password'] ));
	}

}else{
$ses = $_SESSION['login_hash'];
echo json_encode(array('status'=>false,'msg'=>$ses));
}?>