<?php 
session_start();
if(!isset($_SESSION['login_hash']))
{
  echo "What your looking for..??";
}else{
include('../../../../_db.php');

if(isset($_SESSION['id_karyawan']))
{
 $idk = $_SESSION['id_karyawan'];
 $q=mysql_fetch_array(mysql_query("SELECT * FROM `tb_karyawan` WHERE id_karyawan='$idk'"));
 error_reporting();
}else{
 error_reporting();
}
 ?>
 <script>

//Ganti judul halaman


function avatar_ganti(kd){
       var url = "pages/web/mod/teknisi/upload_file_ajax/upload_image_profile.php";
       $("#myModalLabel").html("Ganti Foto Profile"); 
       $.post(url, {id: kd} ,function(data) {
       $(".modal-body").html(data).show();
       });     
  }


$("#breadcrumb, #judulhal").text('Prifile');

  // file upload java sript
// //////////////////////////////////////////////
 $("#gambar").on('change', function(e) {
          //Get count of selected files
          var countFiles = $(this)[0].files.length;
          var imgPath = $(this)[0].value;
          var extn = imgPath.substring(imgPath.lastIndexOf('.') + 1).toLowerCase();
          var image_holder = $("#image-holder");
          image_holder.empty();
          if (extn == "gif" || extn == "png" || extn == "jpg" || extn == "jpeg") {
            if (typeof(FileReader) != "undefined") {
              console.log(imgPath);
              //loop for each file selected for uploaded.
              for (var i = 0; i < countFiles; i++) 
              {
                var reader = new FileReader();
                reader.onload = function(e) {
                  $("<img />", {
                    "src": e.target.result,
                    "width" :"100px",
                    "height":"100px",
                    "class": "thumb-image profile-user-img img-responsive img-circle",
                    "id": "img-gambar"
                  }).appendTo(image_holder);
                }
                image_holder.show();
                reader.readAsDataURL($(this)[0].files[i]);
              }
            } else {
              alert("This browser does not support FileReader.");
            }
          } else {
            alert("Pls select only images");
          }
        });


</script>
<section class="content">
    <div class="row">
<div class="col-md-4">
              <!-- Profile Image-->
              <div class="box box-primary"> 
                <div class="box-body box-profile">
                  <!--img class="profile-user-img img-responsive img-circle" src="assets/img/user/<?php echo $q['avatar']?>" alt="User profile picture" -->
  <!--div class=" col-sm-10 controls"-->       
          <!--input type="file" name="gambar" id="gambar"-->
 <center>         
  <a onclick="javascript:avatar_ganti('<?php echo $idk ?>');" data-toggle="modal" class="btn  btn-default" tabindex="-1" href="#dialog-foto">
    
    <img id='previewing2' src="assets/img/user/<?php echo $q['avatar'];?>" width="100" higth="100" class="img-circle" alt="User Image">
    <!--img id='previewing2' src="assets/img/user/noimage.jpg" width="100" higth="100" class="img-circle" alt="User Image"-->
  </a>
</center>
  <input name="gambar" id="gambar" hidden></input>
  <!--/div-->  


                  <h3 class="profile-username text-center"><font color="red"><?php echo $q['nama'] ?></font></h3>
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
                   <font color="black"><strong><i class="fa fa-book margin-r-5"></i>  Username</strong></font>
                  <p class="text-muted">
                    <?php echo $q['username']?>
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
</div>
</section>  

 <!-- awal untuk modal dialog -->
<div id="dialog-foto" class="modal fade modal-primary" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
 <div class="modal-dialog">
    <div class="modal-content">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <h3 id="myModalLabel">Data Teknisi</h3>
    </div>
    <div class="modal-body">
    <!-- tempat untuk menampilkan form  -->
        <div id="modal-data-teknisi"></div>
    </div>
    <div class="modal-footer">
        <button class="btn btn-danger"  data-dismiss="modal" aria-hidden="true">Tutup</button>
    <!--
        <button class="btn btn-success" data-dismiss="modal" aria-hidden="true">Selesai</button>
        <button id="simpan-data" class="btn btn-success">Simpan</button>
    //-->
    </div>
    </div>
    </div>
</div>
<!-- akhir kode modal dialog -->




<?php  } ?>     
