<?php 
session_start();
if(!isset($_SESSION['login_hash']))
{
  echo "What your looking for..??";
}else{
  include('../../../../_db.php');
  //$_POST['idk']='KR004';
if(isset($_POST['idk']))
{
 $idk = $_POST['idk']; 
 $q=mysql_fetch_array(mysql_query("SELECT * FROM `tb_karyawan` WHERE id_karyawan='$idk'"));
 error_reporting();
}else{
 error_reporting();
}
 ?>

<div class="col-md-4">
              <!-- Profile Image-->
              <div class="box box-primary"> 
                <div class="box-body box-profile">
                  <img class="profile-user-img img-responsive img-circle" src="assets/img/user/<?php echo $q['avatar']?>" alt="User profile picture">
                  <h3 class="profile-username text-center" "><font color="red"><?php echo $q['nama'] ?></font></h3>
                  <p class="text-muted text-center"><?php echo $q['bagian'];?></p>
<?php if($q['login_hash']=='tek'){ ?> 
                  <ul class="list-group list-group-unbordered">
                    <li class="list-group-item">
                     <font color="blue"> <b>Done</b></font> <a class="pull-right">1,322</a>
                    </li>
                    <li class="list-group-item">
                      <font color="blue"><b>Process</b></font> <a class="pull-right">543</a>
                    </li>
                    <li class="list-group-item">
                     <font color="blue"><b>Pending</b></font> <a class="pull-right">13,287</a>
                    </li>
                  </ul>
<?php }?>                  
                </div><!-- /.box-body -->
               </div><!--/.box -->

</div>
<div class="col-md-8">
              <!-- About Me Box -->
              <div class="box box-primary">
                <div class="box-header with-border">
                  <h3 class="box-title">About Me</h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                   <font color="black"><strong><i class="fa fa-book margin-r-5"></i>  Education</strong></font>
                  <p class="text-muted">
                    B.S. in Computer Science from the University of Tennessee at Knoxville
                  </p>
                  <hr>
                   <font color="black"><strong><i class="fa fa-map-marker margin-r-5"></i> Location</strong></font>
                  <p class="text-muted"><?php echo $q['alamat']?></p>
                  <font color="black"><strong><i class="fa fa-phone margin-r-5"></i> Phone</strong></font>
                  <p class="text-muted">0<?php echo $q['hp']?></p>

                  <hr>

                  <strong><i class="fa fa-phone margin-r-5"></i> Phone</strong>
                  <p>
                    <span class="label label-danger">UI Design</span>
                    <span class="label label-success">Coding</span>
                    <span class="label label-info">Javascript</span>
                    <span class="label label-warning">PHP</span>
                    <span class="label label-primary">Node.js</span>
                  </p>
                </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div>
<?php  } ?>     
