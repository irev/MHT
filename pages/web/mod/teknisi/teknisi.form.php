<?php ////////////////////////////////
// PROGRAM SKRIPSI MHT
// Refyandra
// pelanggan.form.php 
// edit 6 juni 2016
// usercase CUSTOMER SERVICE
/////////////////////////////////
session_start();
if(!isset($_SESSION['login_hash']))
{
  echo "What your looking for..??";
}else{
 


 ?>
<div class="">

                <div class="box-body with-padding">
                  <div class="table-responsive mailbox-messages">
                    <?php
// $_POST['id'] ="003"; /// test edit data
//$_GET['id']="KR000";
require("../../../../_db.php"); 
if(isset($_GET['id'])){
  //echo $kd_pel = 'CL'.sprintf("%04s",$_GET['id']);
  $kd_pel =$_GET['id'];
  $data  = mysql_fetch_array($datax= mysql_query("SELECT * FROM `tb_karyawan` WHERE id_karyawan='$kd_pel'")); 
  //$data2 = mysql_fetch_array(mysql_query("SELECT * FROM `tb_karyawan` WHERE id_karyawan='$kd_pel'")); 
if(mysql_num_rows($datax) == 0){
echo "alert(Data tidak ditemukan...!)";
//echo "<script>alert('Data tidak ditemukan...!'); $('#data-teknisi').load('pages/web/mod/teknisi/teknisi.data.php');</script>";
}
}else{
   $kd_pel=0;
}
// jika kd > 0 / form ubah data
if(substr($kd_pel, 2, 4) != 0) { 
//echo'<script>alert("EDIT");</script>'; 
  //Variabel Peangggan 
  //$id_gangguan = $data['id_gangguan'];
  $pelanggan    = $data['nama'];
  $id_karyawan  = $data['id_karyawan'];
  $hp           = $data['hp'];
  $alamat       = $data['alamat'];
  $bagian       = $data['bagian'];
  $username     = $data['username'];
  $bagian       = $data['bagian'];
 /*
  $koordinatx   = $data['x'];
  $koordinaty   = $data['y'];
  //Variabel Paket pelanggan
  $tgl_berlangganan = $data['tgl_langganan'];

  $id_paket     = $data2['id_paket'];
  $paket        = $data2['paket'];
  $bandw        = " [".$data2['keterangan']."] ";
  $id_perangkat = $data['id_perangkat'];
  $mac          = $data['mac_address'];
  $merek        = $data['merek']." [".$data['keterangan']."] "  ;

//if status pelanggan
  if($data['status_pel']==1) {
    $status = "Aktif";
  }else if($data['status_pel']==0){
    $status = "Block";
  } 
  else {
    $status = "Tidak Aktif";
  }
*/
//form tambah data
} else {
  //echo'<script>alert("buat baru");</script>'; 
//no faktur auto
   $qkdf = mysql_query("SELECT MAX(id_karyawan) as kodex FROM tb_karyawan");
   $data=mysql_fetch_array($qkdf);
   $kodef = $data['kodex'];
   $nourut = substr($kodef, 2, 5);
   //$nourut++;
   if ($nourut==0){
    $nourut=1;
    $notr =sprintf("%03s", $nourut) ; 
   }else{
    $nourut++;
    $notr = sprintf("%03s", $nourut) ; 
   }
  //end no faktur auto 
  $id_karyawan = "KR".$notr;
  $nama         = "";
  $hp           = "";
  $alamat       = "";
  $username     = "";
  $password     = "";
  $bagian       = "";
/*
  $koordinatx   = "";
  $koordinaty   = "";
  //variabel Keterangan pekat
  $tgl_berlangganan = date('Y-m-d');
  $paket        = "";
  $perangkat    = "";
  $id_perangkat = "";
  $mac          = "";
  $status = "";
  */
}

?>
<form class="form-horizontal" id="form-pelanggan">
<input type="text" id="id" class="form-control" name="id" value="<?php echo $kd_pel ?>" style="display: none;">
<input type="text" id="kd" class="form-control" name="kd" value="<?php echo $kd_pel ?>" style="display: none;">
<input type="text" id="status" class="form-control" name="status" value="0" style="display: none;"> 
  <span class="label label-danger pull-right">
  Keterangan Karyawan
  </span>
<hr>
<?php 
//echo $kd_pel;
//echo "SELECT tb_pelanggan.*, tb_perangkat.* FROM `tb_pelanggan` JOIN tb_perangkat WHERE tb_pelanggan.id_perangkat=tb_perangkat.id_perangkat AND id_pelanggan='$kd_pel'";
  ?>
  <div id="msg-modal" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
  <div id="msg"></div>
  </div>

  <div class="form-group">
    <label for="id" class="col-sm-2 control-label">Kode Pelanggan</label>
      <div class=" col-sm-10 controls">
      <input type="text" id="kode" class="form-control" name="kode" readonly="" value="<?php echo $id_karyawan ?>">
    </div>
  </div>
  <div class="form-group">
    <label for="id" class="col-sm-2 control-label">Nama</label>
      <div class=" col-sm-10 controls">
      <input type="text" id="nama" class="form-control" name="nama" value="<?php echo $nama ?>">
    </div>
  </div>
  <div class="form-group">
    <label for="id" class="col-sm-2 control-label">Nomer HP</label>
      <div class=" col-sm-10 controls">
      <input type="text" id="hp" class="form-control" name="hp" value="<?php echo $hp ?>">
    </div>
  </div>
  <hr>
  <div class="form-group">
    <label for="id" class="col-sm-2 control-label">gambar</label>
      <div class=" col-sm-10 controls">       
          <!--input type="file" name="gambar" id="gambar"-->
          <a onclick="getform.avatar('CL0006')" data-toggle="modal" class="btn  btn-default" tabindex="-1" href="#dialog-data">
          <img id='previewing2' src="assets/img/user/noimage.jpg" class="img-circle" alt="User Image">
  </a>
  <input name="gambar" id="gambar" hidden></input>
      </div>   
  </div>
   <div class="form-group">
     <div class=" col-sm-2 controls"></div>
     <div class=" col-sm-2 controls pull-left">
          <br><div id="image-holder" class="box-responsive"></div>
        </div>
   </div>
  <hr>
  <div class="form-group">
    <label for="id" class="col-sm-2 control-label">Alamat</label>
      <div class=" col-sm-10 controls">
      <textarea id="alamat" class="form-control" name="alamat"><?php echo $alamat ?></textarea>
    </div>
  </div>

  <div class="form-group">
    <label for="id" class="col-sm-2 control-label">Bagian</label>
      <div class=" col-sm-10 controls">
      <select class="form-control" name="bagian">
      <option value="<?php echo $data['bagian'] ?>"><?php echo $bagian ?></option>
      <?php 
        // tampilkan untuk form ubah 
        $queryStatus = mysql_query("SELECT * FROM tb_karyawan");
       // if($kd_pel !== 0) { 
       //    echo  '<option value="0">Blockss</option><option value="1">Aktifss</option>';
       // }
           echo  '<option value="Koordinator">Koordinator</option>
                  <option value="Customer Service">Customer Service</option>
                  <option value="Teknisi">Teknisi</option>';
        ?>
      </select>
  </div>        
  </div>        
 
<!--FORM INFO PAKET-->
<span class="label label-danger pull-right">
User Login
</span>
<hr>
  <div class="form-group">
    <label for="id" class="col-sm-2 control-label">User Name</label>
      <div class=" col-sm-10 controls">
      <input type="text" id="username" class="form-control datemask2" name="username" value="<?php echo $username ?>">
    </div>
  </div>
  <div class="form-group" id="pas">
    <label for="id" class="col-sm-2 control-label">Password</label>
      <div class=" col-sm-10 controls">
      <input type="password" id="password" class="form-control datemask2" name="password" value="<?php //echo $password ?>">
       </div>
      <span>
      <label for="id" id="cek" class="col-sm-2 control-label help-block">Cek Password</label>
      </span>
      <div class=" col-sm-10 controls">
      <input type="password" id="password2" onkeyup="cekpas()" class="form-control datemask2" on name="password2" value="<?php //echo $password ?>" required>
    </div>
  </div>
  </form>
    <hr>
    <div class="form-group">
        <a id="simpan-data-pelanggan" href="#msg-modal" class="btn btn-success form-control" data-toggle="modal">Simpan</a>
    </div>

<?php
//include('../../../../_script.php');
?> 
<script type="text/javascript">
function cekpas() {
    var x = $('#password').val();
    var xx = $('#password2').val();
    console.log(x+'  '+xx);
    if (x == xx) {
       
        $('#cek').text('Password OK');
        $('#cek').css("color", "green");
        $('#pas').removeClass('has-error');
        $('#pas').addClass('has-success');
       
    }else{
      $('#cek').text('Re Password');
      $('#cek').css("color", "red"); 
      $('#pas').removeClass('has-success');
      $('#pas').addClass('has-error');
      return false;    
    }
}
  // ketika tombol simpan ditekan
    $("#simpan-data-pelanggan").bind("click", function(event) {
      var url = "pages/web/mod/teknisi/teknisi.input.php";

      // mengambil nilai dari inputbox, textbox dan select
      // input data pelanggan
      var kd_pel      = $('input:text[name=kd]').val();
      var v_kode      = $('input:text[name=kode]').val();
      var v_nama      = $('input:text[name=nama]').val();
      var v_hp        = $('input:text[name=hp]').val();
      var v_alamat    = $('textarea[name=alamat]').val();
      var v_bagian    = $('select[name=bagian]').val();
      var v_us        = $('input:text[name=username]').val();
      var v_ps        = $('input:password[name=password]').val();
      var avatar      = $('input:text[name=gambar]').val();
      var data = $('#form-pelanggan').serialize();
      //var dataType = 'jpg, png, jpeg';
      if(v_nama !='' && v_alamat !='' && v_hp !='' && v_bagian !='' && v_us !='' && v_ps !=''){ 
      console.log(v_kode+' '+v_hp+' '+v_nama+' '+kd_pel +' '+avatar);

      // mengirimkan POST data ke berkas teknisi.input.php untuk di proses
      $.post(url, {kode: v_kode, nama: v_nama, hp: v_hp, alamat: v_alamat, bagian:v_bagian,  username: v_us, password: v_ps, gambar:v_ps, gambar: avatar, id:kd_pel},function(){
          $('#msg').html(
            '<div class="alert alert-success alert-dismissable">'+
                    '<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>'+
                    '<h4><i class="icon fa fa-ban"></i> Alert!</h4>'+
                    'Data berhasil disimpan!'+
            '</div>'  
          );

          $('#msg, .in').slideDown('slow').delay(1500).slideUp('slow', function(){
              teknisi_baru();
              var menu2 = "pages/web/mod/teknisi/teknisi.menu.php";
              $("#menu-pelanggan").load(menu2);
            });
      });
      
      }else{
        //alert('Data Belum terisi dengan benar!');
        //$('#msg').html();
        $("#msg").html(
          '<div class="alert alert-danger alert-dismissable">'+
                    '<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>'+
                    '<h4><i class="icon fa fa-ban"></i> Alert!</h4>'+
                    'Data belum terisi dengan benar!'+
          '</div>' 
          );
          $('#msg, .in').slideDown('slow').delay(1500).slideUp('slow');
      }
    });
// file upload java sript
// //////////////////////////////////////////////
 $("#gambar").on('change', function() {
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


////////////////END 
//$('#msg').hide('slow/800/fast', function() {});
  //$("#datemask2").inputmask("mm/dd/yyyy", {"placeholder": "mm/dd/yyyy"});
</script>
<script type="text/javascript" src="assets/plugins/select2/select2.full.min.js"></script>  

                  </div><!-- /.mail-box-messages -->
                </div><!-- /.box-body -->
                <div class="box-footer no-padding">
                  <div class="mailbox-controls">
                   From Pelanggan Baru
                  </div>
                </div>
              </div>
<?php } ?>