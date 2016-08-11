<?php ////////////////////////////////
// PROGRAM SKRIPSI MHT
// Refyandra
// pelanggan.form.php 
// edit 6 juni 2016
// usercase CUSTOMER SERVICE
/////////////////////////////////
 ?>
<div class="">
<div class="box-body with-padding">
<div class="table-responsive mailbox-messages">
<?php
session_start();
if(!isset($_SESSION['login_hash'])){
  echo "<script>alert('anda harus login dulu..!');</script>";
} 
//$_POST['id'] ="0002";
//$_GET['id'];
require("../../../../_db.php"); 
//echo $_GET['id'];
if(isset($_GET['id'])){
 //echo $kd_pel = 'CL'.sprintf("%04s",$_GET['id']);
 echo $kd_pel =$_GET['id'];
 echo "<H2>FORM PRANGKAT</H2>";
 /* 
  $data  = mysql_fetch_array(mysql_query("SELECT tb_pelanggan.*, tb_pelanggan.status as status_pel , tb_perangkat.* FROM `tb_pelanggan` 
                                                 JOIN tb_perangkat 
                                                 WHERE tb_pelanggan.id_perangkat=tb_perangkat.id_perangkat 
                                                 AND id_pelanggan='$kd_pel'")); 
*/

                                                
//$data  = mysql_fetch_array(mysql_query("SELECT *, tb_pelanggan.status as status_pel, tb_perangkat.* FROM `tb_pelanggan` Left JOIN tb_perangkat ON tb_pelanggan.id_perangkat=tb_perangkat.id_perangkat WHERE tb_pelanggan.id_pelanggan='$kd_pel'")); 
//$data2 = mysql_fetch_array(mysql_query("SELECT tb_pelanggan.*, tb_paket.* FROM `tb_pelanggan` JOIN `tb_paket` WHERE tb_pelanggan.id_paket=tb_paket.id_paket AND id_pelanggan='$kd_pel'")); 

 $data  = mysql_fetch_array(mysql_query("SELECT * FROM tb_perangkat WHERE id_perangkat='$kd_pel'"));

}else{
  echo $kd_pel=0;
}
// jika kd > 0 / form ubah data
if(substr($kd_pel, 2, 5) != 0) { 

//echo'<script>alert("EDIT");</script>'; 
  //Variabel Peangggan 
  //$id_gangguan = $data['id_gangguan'];
 // $pelanggan    = $data['nama'];
  $id_perangkat = $data['id_perangkat'];
  $merek        = $data['merek'];
  $mac          = $data['mac_address'];
  //Variabel Paket pelanggan
  $tgl          = $data['tgl_masuk'];
  $ket          = $data['keterangan'];
  //$stat         = $data['status'];

//if status pelanggan
  if($data['status']==0) {
    $stat = "Tidak Dipakai";
  }else if($data['status']==1){
    $stat = "DIPAKAI";
  }else if($data['status']==2){
    $stat = "RUSAK";
  }  

//form tambah data
} else {
  //echo'<script>alert("buat baru");</script>'; 
//no otomatis
   $qkdf = mysql_query("SELECT MAX(id_perangkat) as kodex FROM tb_perangkat");
   $data=mysql_fetch_array($qkdf);
   $kodef = $data['kodex'];
   $nourut = substr($kodef, 2, 5);
   //$nourut++;
   if ($nourut==0){
    $nourut=1;
    $notr =sprintf("%04s", $nourut) ; 
   }else{
    $nourut++;
    $notr = sprintf("%04s", $nourut) ; 
   }
  //end no faktur auto 
  $pelanggan    = "";
  $id_perangkat = 'PR'.$notr;
  $merek        = "";
  $mac          = "";
  $tgl          = "";
  $ket          = "";
  $stat         = "";  
}

?>
<form class="form-horizontal" id="form-pelanggan">
<input type="text" id="kd" class="form-control" name="kd" value="<?php echo $kd_pel ?>" style="display: none;">
<input type="text" id="status" class="form-control" name="status" value="0" style="display: none;"> 
  <span class="label label-danger pull-right">
  Keterangan Paket
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
    <label for="id" class="col-sm-2 control-label">Kode Prangkat</label>
      <div class=" col-sm-10 controls">
      <input type="text" id="kode" class="form-control" name="kode" readonly="" value="<?php echo $id_perangkat ?>">
    </div>
  </div>
  <div class="form-group">
    <label for="id" class="col-sm-2 control-label">Merek</label>
      <div class=" col-sm-10 controls">
      <input type="text" id="merek" class="form-control" name="merek" value="<?php echo $merek ?>">
    </div>
  </div>
  <div class="form-group">
    <label for="id" class="col-sm-2 control-label">Mac Address</label>
      <div class=" col-sm-10 controls">
      <input type="text" id="mac" class="form-control" name="mac" value="<?php echo $mac ?>" data-mask>
    </div>
  </div>
  <div class="form-group">
    <label for="id" class="col-sm-2 control-label">Tgl. Pembelian</label>
      <div class=" col-sm-10 controls">
      <input type="text" id="tgl" class="form-control" name="tgl" value="<?php echo $tgl ?>" data-inputmask="'alias': 'yyyy-mm-dd'" data-mask>
    </div>
  </div>
  <!--div class="form-group">
    <label for="id" class="col-sm-2 control-label">Keterangan</label>
      <div class=" col-sm-10 controls">
      <textarea id="alamat" class="form-control" name="alamat"><?php echo $alamat ?></textarea>
    </div>
  </div>
  <div class="form-group">
     <label for="id" class="col-sm-2 control-label"></label>
  <div class=" col-sm-10 controls">
   <div class="col-xs-2">
      <label for="id" class="control-label">kordinat X</label>
   </div> 
  <div class="col-xs-3">
      <input type="text"  name="koordinatx" id="koorX" class="form-control" placeholder="latittude" value="<?php echo $koordinatx ?>">
  </div>
   <div class="col-xs-2">
      <label for="id" class="control-label">kordinat Y</label>
   </div> 
  <div class="col-xs-3">
      <input type="text"  name="koordinaty" id="koorY" class="form-control" placeholder="longitude" value="<?php echo $koordinaty ?>">
  </div>
  <div class="col-xs-2"> 
  <a onclick="getform.set_koordinat('<?php echo $id_pelanggan ?>')" data-toggle="modal" class="btn  btn-default" tabindex="-1" href="#dialog-data">
      <span class="fa fa-map-marker"></span>
  </a>
  </div>
  </div>
  </div-->
  <div class="form-group">
    <label for="id" class="col-sm-2 control-label">Keterangan</label>
      <div class=" col-sm-10 controls">
      <select class="form-control" name="ket_per">
      <option value="<?php echo $data['keterangan'] ?>"><?php echo $ket ?></option>
      <?php 
        // tampilkan untuk form ubah 
        $queryStatus = mysql_query("SELECT * FROM tb_pelanggan");
       // if($kd_pel !== 0) { 
       //    echo  '<option value="0">Blockss</option><option value="1">Aktifss</option>';
       // }
           echo  '<option value="BARU">BARU</option>
                  <option value="BAIK">BAIK</option>
                  <option value="RUSAK">RUSAK</option>';
        ?>
      </select>
  </div>        
  </div> 
    <div class="form-group">
    <label for="id" class="col-sm-2 control-label">Status</label>
      <div class=" col-sm-10 controls">
      <select class="form-control" name="stat_per">
      <option value="<?php echo $data['status'] ?>"><?php echo $stat ?></option>
      <?php 
        // tampilkan untuk form ubah 
        $queryStatus = mysql_query("SELECT * FROM tb_pelanggan");
       // if($kd_pel !== 0) { 
       //    echo  '<option value="0">Blockss</option><option value="1">Aktifss</option>';
       // }
           echo  ' <option value="0">TIDAK Dipakai</option>
                   <option value="1">DIPAKAI</option>
                   <option value="2">RUSAK</option>';
        ?>
      </select>
  </div>        
  </div>        
  </form>
    <hr>
    <div class="form-group">
    <div class="col-md-2">
        <a id="simpan-data-perangkat" href="#msg-modal" class="btn btn-success form-control">Simpan</a>
    </div>
    <div class="col-md-2">
        <a id="batal" class="btn btn-success form-control">Batal</a>
    </div>
    <br/>
    <br/>
    </div>

<?php
//include('../../../../_script.php');
?> 
<script type="text/javascript">
$("#batal").click(function(){
    showpage('pages/web/perangkat.php');
    //$("#edit-data").slideToggle("slow");
    //$("#edit-data").load('');
  });
  // ketika tombol simpan ditekan
    $("#simpan-data-perangkat").bind("click", function(event) {
      var url = "pages/web/mod/perangkat/perangkat.input.php";
      // mengambil nilai dari inputbox, textbox dan select
      // input data pelanggan
      console.log('simpan perangkat');
      var kd_pel      = $('input:text[name=kd]').val(); /////
      var v_kode      = $('input:text[name=kode]').val(); ////
      var v_merek     = $('input:text[name=merek]').val(); /////
      var v_mac       = $('input:text[name=mac]').val(); ////
      var v_tgl       = $('input:text[name=tgl]').val(); /////
      //var v_koodx     = $('input:text[name=koordinatx]').val();
     // var v_koody     = $('input:text[name=koordinaty]').val();
      var v_ket       = $('select[name=ket_per]').val();   //////
      var v_status    = $('select[name=stat_per]').val();   //////
      var v_perangkatLama =<?php echo '"'.$id_perangkat.'"'; ?>;
      // input data paket pelanggan
      var v_tgl_berlangganan = $('input:text[name=tgl_berlangganan]').val();
      var v_paket            = $('select[name=paket]').val();
      var v_perangkat        = $('select[name=perangkat]').val();
      if(v_merek!='' && v_mac!='' && v_tgl!=''){ 
      console.log(v_merek+' '+v_mac+' '+v_tgl);
      // mengirimkan POST data ke berkas pelanggan.input.php untuk di proses
      $.post(url, {kode:v_kode, merek:v_merek, mac:v_mac, tgl:v_tgl, ket_per: v_ket, stat_per: v_status,  perangkatLama:v_perangkatLama,  id:kd_pel
                  },function(){
          
          $.blockUI({ 
                    centerY: 0, 
                    css: { bottom: '', left: '', right: '10px' },
                    message: '<h1><img src="assets/img/ajax-loader.gif" /> Just a moment...</h1>' 
                   }); 
          setTimeout($.unblockUI, 1000); 
           pelanggan_baru();
          // showpage('pages/web/pelanggan.php');
           showpage('pages/web/perangkat.php');
              var menu2 = "pages/web/mod/perangkat/perangkat.menu.php";
              $("#menu-pelanggan").load(menu2);
      });
      }else{
          $.blockUI({ 
                    centerY: 0, 
                    css: { bottom: '', left: '', right: '10px' },
                    message: '<h1><img src="assets/img/ajax-loader.gif" /> Gagal...</h1>' 
                   }); 
            setTimeout($.unblockUI, 1000); 
         
      }
    });
//$('#msg').hide('slow/800/fast', function() {});
  $("#datemask2").inputmask("mm/dd/yyyy", {"placeholder": "mm/dd/yyyy"});
  $("[data-mask]").inputmask();
  $("#mac").inputmask({mask:"##:##:##:##:##:##"});
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