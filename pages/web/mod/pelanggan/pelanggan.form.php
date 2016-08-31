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
//$_POST['id'] ="0002";
//$_GET['id'];
require("../../../../_db.php"); 
//echo $_GET['id'];
if(isset($_GET['id'])){
  //echo $kd_pel = 'CL'.sprintf("%04s",$_GET['id']);

$kd_pel =$_GET['id'];
 /* 
  $data  = mysql_fetch_array(mysql_query("SELECT tb_pelanggan.*, tb_pelanggan.status as status_pel , tb_perangkat.* FROM `tb_pelanggan` 
                                                 JOIN tb_perangkat 
                                                 WHERE tb_pelanggan.id_perangkat=tb_perangkat.id_perangkat 
                                                 AND id_pelanggan='$kd_pel'")); 
*/
$data  = mysql_fetch_array(mysql_query("SELECT *, tb_pelanggan.status as status_pel, tb_perangkat.* FROM `tb_pelanggan` Left JOIN tb_perangkat ON tb_pelanggan.id_perangkat=tb_perangkat.id_perangkat WHERE tb_pelanggan.id_pelanggan='$kd_pel'")); 
$data2 = mysql_fetch_array(mysql_query("SELECT tb_pelanggan.*, tb_paket.* FROM `tb_pelanggan` 
                                                 JOIN `tb_paket` WHERE tb_pelanggan.id_paket=tb_paket.id_paket 
                                                 AND id_pelanggan='$kd_pel'")); 
}else{
  echo $kd_pel=0;
}
// jika kd > 0 / form ubah data
if(substr($kd_pel, 2, 5) != 0) { 
//echo'<script>alert("EDIT");</script>'; 
  //Variabel Peangggan 
  //$id_gangguan = $data['id_gangguan'];
  $pelanggan    = $data['nama'];
  $id_pelanggan = $data['id_pelanggan'];
  $hp           = $data['hp'];
  $alamat       = $data['alamat'];
  $koordinatx   = $data['x'];
  $koordinaty   = $data['y'];
  //Variabel Paket pelanggan
  $tgl_berlangganan = $data['tgl_langganan'];

  $id_paket     = $data2['id_paket'];
  $paket        = $data2['paket'];
  $bandw        = " [".$data2['keterangan']."] ";
  $id_perangkat = $data['id_perangkat'] ;              
    if (!isset($data['mac_address']) || !isset($data['merek'])) {
     # code...
    $mac= "PILIH PERANGKAT";
    $merek  ="";
    }else{ 
      $mac    =  "MAC (".$data['mac_address'].")" ;
      $merek  = $data['merek']." [".$data['keterangan']."] "  ;
    }
//if status pelanggan
  if($data['status_pel']==1) {
    $status = "Aktif";
    $statusVal=$data['status_pel'];
  }else if($data['status_pel']==0){
    $status = "Block";
    $statusVal=$data['status_pel'];
  } 
  else {
    $statusVal=0;
    $status = "Tidak Aktif";
  }

//form tambah data
} else {
  //echo'<script>alert("buat baru");</script>'; 
//no faktur auto
   $qkdf = mysql_query("SELECT MAX(id_pelanggan) as kodex FROM tb_pelanggan");
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
  $id_pelanggan = "CL".$notr;
  $pelapor ="";
  $pelanggan ="";
  $hp = "";
  $alamat = "";
  $koordinatx = "";
  $koordinaty = "";
  //variabel Keterangan pekat
  $tgl_berlangganan = date('Y-m-d');
  $paket        = "Pilih Paket";
  $id_paket     = "0";
  $perangkat    = "";
  $id_perangkat = "0";
  $mac          = "Pilih Perangkat";
  $merek        = "";
  $status = "BARU";
  $statusVal="0";
}

?>
<form class="form-horizontal" id="form-pelanggan">
<input type="text" id="kd" class="form-control" name="kd" value="<?php echo $kd_pel ?>" style="display: none;">
<input type="text" id="status" class="form-control" name="status" value="0" style="display: none;"> 
  <span class="label label-danger pull-right">
  Keterangan Pelanggan
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
      <input type="text" id="kode" class="form-control" name="kode" readonly="" value="<?php echo $id_pelanggan ?>">
    </div>
  </div>
  <div class="form-group">
    <label for="id" class="col-sm-2 control-label">Nama</label>
      <div class=" col-sm-10 controls">
      <input type="text" id="pelanggan" class="form-control" name="pelanggan" value="<?php echo $pelanggan ?>">
    </div>
  </div>
  <div class="form-group">
    <label for="id" class="col-sm-2 control-label">Nomer HP</label>
      <div class=" col-sm-10 controls">
      <input type="text" id="hp" class="form-control" name="hp" value="<?php echo $hp ?>"  data-inputmask="'mask': '0999999999999'" data-mask>
    </div>
  </div>
  <div class="form-group">
    <label for="id" class="col-sm-2 control-label">Alamat</label>
      <div class=" col-sm-10 controls">
      <textarea id="alamat" class="form-control" name="alamat"><?php echo $alamat ?></textarea>
    </div>
  </div>
  <div class="form-group">
     <label for="id" class="col-sm-2 control-label"></label>
  <div class=" col-sm-10 controls">
   <div class="col-xs-2">
      <label for="id" class="control-label">koordinat X</label>
   </div> 
  <div class="col-xs-3">
      <input type="text"  name="koordinatx" id="koorX" class="form-control" placeholder="latittude" value="<?php echo $koordinatx ?>">
  </div>
   <div class="col-xs-2">
      <label for="id" class="control-label">koordinat Y</label>
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
  </div>
  <div class="form-group">
    <label for="id" class="col-sm-2 control-label">Status</label>
      <div class=" col-sm-10 controls">
      <select class="form-control" name="status_pel">
      <option value="<?php echo $statusVal; ?>"><?php echo $status; ?></option>
      <?php 
        // tampilkan untuk form ubah 
        $queryStatus = mysql_query("SELECT * FROM tb_pelanggan");
       // if($kd_pel !== 0) { 
       //    echo  '<option value="0">Blockss</option><option value="1">Aktifss</option>';
       // }
           echo  '<option value="0">Baru</option>
                  <option value="1">Aktif</option>
                  <option value="2">Cuti</option>
                  <option value="3">Block</option>';
        ?>
      </select>
  </div>        
  </div>        
 
<!--FORM INFO PAKET-->
<span class="label label-danger pull-right">
Keterangan Paket
</span>
<hr>
  <div class="form-group">
    <label for="id" class="col-sm-2 control-label">Tgl Berlanganan</label>
      <div class=" col-sm-10 controls">
      <input type="text" id="tgl_berlangganan" class="form-control datemask2" name="tgl_berlangganan" data-inputmask="'alias': 'yyyy/mm/dd'" data-mask="" value="<?php echo $tgl_berlangganan ?>">
    </div>
  </div>
  <div class="form-group">
    <label for="id" class="col-sm-2 control-label">Paket</label>
      <div class=" col-sm-10 controls">
      <select class="form-control" name="paket">
        <?php 
        // tampilkan untuk form ubah 
        $query = mysql_query("SELECT * FROM tb_paket");
        if(isset($_GET['id']) !== 0) { 
          $bandw ="";
          ?>
        <?php
         echo '<option value="'.$id_paket.'">'.$paket.' '.$bandw. '</option>';
          while($data2 = mysql_fetch_array($query)) {
          $bandw = " [".$data2['keterangan']."] ";
          echo "<option value=".$data2['id_paket'].">".$data2['paket']."  ".$bandw."</option>";
        }
        }else{ 
          while($data2 = mysql_fetch_array($query)) {
          $bandw = " [".$data2['keterangan']."] ";
          echo "<option value=".$data2['id_paket'].">".$data2['paket']."  ".$bandw."</option>";
        }
        }
        ?>
      </select>
    </div>
  </div>
    <div class="form-group">
    <label for="id" class="col-sm-2 control-label">Perangkat</label>
      <div class=" col-sm-10 controls">
      <select class="form-control" name="perangkat">

        <?php 
        // tampilkan untuk form ubah
        $queryPrangkat = mysql_query("SELECT * FROM tb_perangkat WHERE status='0' and keterangan !='rusak'");
        if(isset($_GET['id']) !== 0) { ?>
               <option value="<?php echo $id_perangkat ?>"><?php   echo $merek." ".$mac ?></option>
        <?php 
              
          while($data2 = mysql_fetch_array($queryPrangkat)) {
              $bandws = " [".$data2['keterangan']."] ";
              echo "<option value=".$data2['id_perangkat'].">".$data2['merek']."  ".$bandws."   MAC (".$data2['mac_address'].")</option>";
        }
        }else{ 
        while($data2 = mysql_fetch_array($queryPrangkat)) {
          $bandws = " [".$data2['keterangan']."] ";
          echo "<option value=".$data2['id_perangkat'].">".$data2['merek']."  ".$bandws."   MAC (".$data2['mac_address'].")</option>";
        }}
        ?>
         <option value="0">tidak ada</option>
      </select>
            <input type="text"  name="perangkatlama" id="perangkatlama" class="form-control" placeholder="longitude" value="<?php echo $id_perangkat ?>" style="display: none;">
    </div>
  </div>
  </form>
    <hr>
    <div class="form-group">
    <div class="col-md-2">
        <a id="simpan-data-pelanggan" href="#msg-modal" class="btn btn-success form-control">Simpan</a>
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
    showpage('pages/web/pelanggan2.php');
    //$("#edit-data").slideToggle("slow");
    //$("#edit-data").load('');
  });
  // ketika tombol simpan ditekan
    $("#simpan-data-pelanggan").bind("click", function(event) {
      var url = "pages/web/mod/pelanggan/pelanggan.input.php";
      // mengambil nilai dari inputbox, textbox dan select
      // input data pelanggan
      console.log('simpan dari form pelanggan');
      var kd_pel      = $('input:text[name=kd]').val();
      var v_kode      = $('input:text[name=kode]').val();
      var v_pelanggan = $('input:text[name=pelanggan]').val();
      var v_hp        = $('input:text[name=hp]').val();
      var v_alamat    = $('textarea[name=alamat]').val();
      var v_koodx     = $('input:text[name=koordinatx]').val();
      var v_koody     = $('input:text[name=koordinaty]').val();
      var v_status    = $('select[name=status_pel]').val();
      var v_perangkatLama =$('input:text[name=perangkatlama]').val();
      // input data paket pelanggan
      var v_tgl_berlangganan = $('input:text[name=tgl_berlangganan]').val();
      var v_paket            = $('select[name=paket]').val();
      var v_perangkat        = $('select[name=perangkat]').val();
       console.log(v_kode+' '+v_hp+' '+v_pelanggan+' '+kd_pel +' '+ v_perangkat);
      if(v_pelanggan !='' && v_alamat !='' ){ 
      console.log(v_kode+' '+v_hp+' '+v_pelanggan+' '+kd_pel);
      // mengirimkan POST data ke berkas pelanggan.input.php untuk di proses
      $.post(url, {kode: v_kode, pelanggan: v_pelanggan, hp: v_hp, alamat: v_alamat, koordinatx:v_koodx, koordinaty: v_koody, status_pel: v_status, tgl_berlangganan:v_tgl_berlangganan, paket:v_paket, perangkat:v_perangkat, perangkatLama:v_perangkatLama, id:kd_pel},function(){
          
          $.blockUI({ 
                    centerY: 0, 
                    css: { bottom: '', left: '', right: '10px' },
                    message: '<h1><img src="assets/img/ajax-loader.gif" /> Just a moment...</h1>' 
                   }); 
          setTimeout($.unblockUI, 1000); 
           pelanggan_baru();
          // showpage('pages/web/pelanggan.php');
           showpage('pages/web/pelanggan2.php');
              var menu2 = "pages/web/mod/pelanggan/pelanggan.menu.php";
              $("#menu-pelanggan").load(menu2);
      });
      }else{
          $.blockUI({ 
                    centerY: 0, 
                    css: { bottom: '', left: '', right: '10px' },
                    message: '<h1><img src="assets/img/ajax-loader.gif" /> Just a moment...</h1>' 
                   }); 
            setTimeout($.unblockUI, 1000); 
         
      }
    });
//$('#msg').hide('slow/800/fast', function() {});
  $("[data-mask]").inputmask();
  $("#datemask2").inputmask("mm/dd/yyyy", {"placeholder": "mm/dd/yyyy"});
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