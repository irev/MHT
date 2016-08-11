<?php 
//////////////////////////////
// PROGRAM SKRIPSI MHT
// Refyandra
// pelanggan.php 
// edit 22 juni 2016
// usercase ALL
///////////////////////////////
if(!isset($_SESSION)) 
    { 
        session_start(); 
    } 
require("../../_db.php");
require("../../inc/function/hitung_jumlah_pelanggan.php");
if(!isset($_SESSION['login_hash']) && !isset($_SESSION['login_name'])){
   echo "<script>window.location='".baseurl."logout.php'</script>";
}
?>
<section class="content">
<div class="row">
<!--h3>Data pelanggan 
            <a href="#dialog-data" id="0" class="btn btn-success tambah" data-toggle="modal">
                <i class="fa fa-plus"></i> Tambah Data
            </a>
</h3-->

<script type="text/javascript">

$('.paginate_button').addClass('btn btn-sm');

function dataall(){
 $('#data-pelanggan').load('pages/web/mod/pelanggan/pelanggan.aktif.php');
}
function databaru(){
 $('#data-baru').load('pages/web/mod/pelanggan/pelanggan.aktif.php?pelanggan=0');
}
function dataaktif(){

 $('#data-aktif').load('pages/web/mod/pelanggan/pelanggan.aktif.php?pelanggan=1');
}
function datacuti(){

 $('#data-cuti').load('pages/web/mod/pelanggan/pelanggan.aktif.php?pelanggan=2');
}
function datablock(){

 $('#data-block').load('pages/web/mod/pelanggan/pelanggan.aktif.php?pelanggan=3');
}
function tabadd(){
 $('#data-add').load('pages/web/mod/pelanggan/pelanggan.form.php?id=0');
}
function profile(){
 $('#data-profile').load('pages/web/mod/pelanggan/pelnggan.profile.php?id=0');
}

  //  $('#data-baru').load('pages/web/mod/pelanggan/pelanggan.aktif.php?pelanggan=0');
  //  $('#data-aktif').load('pages/web/mod/pelanggan/pelanggan.aktif.php?pelanggan=1');
  //  $('#data-cuti').load('pages/web/mod/pelanggan/pelanggan.aktif.php?pelanggan=2');
  //  $('#data-block').load('pages/web/mod/pelanggan/pelanggan.aktif.php?pelanggan=3');
  // $('#data-pelanggan').load('pages/web/mod/pelanggan/pelanggan.aktif.php?pelanggan=4');

</script>
<div class="col-md-12">
<div class="col-md-3">
<div class="info-box bg-navy disabled color-palette">
  <!-- Apply any bg-* class to to the icon to color it -->
  <span class="info-box-icon bg-red-active"><i class="fa fa-sign-out"></i></span>
  <div class="info-box-content bg-red">
    <span class="info-box-text">AKTIF</span>
    <span class="info-box-number"><?php echo hitung_aktif()?></span>
  </div><!-- /.info-box-content -->
  <div class="info-box-content">
  <a href="?cat=<?php echo $_SESSION['login_hash']; ?>&page=gangguan" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
  </div>
</div>
</div><!-- /.info-box -->
<div class="col-md-3">
<div class="info-box bg-navy disabled color-palette">
  <!-- Apply any bg-* class to to the icon to color it -->
  <span class="info-box-icon bg-red-active"><i class="fa fa-sign-out"></i></span>
  <div class="info-box-content bg-red">
    <span class="info-box-text">BARU</span>
    <span class="info-box-number"><?php echo hitung_baru()?></span>
  </div><!-- /.info-box-content -->
  <div class="info-box-content">
  <a href="?cat=<?php echo $_SESSION['login_hash']; ?>&page=gangguan" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
  </div>
</div>
</div><!-- /.info-box -->
<div class="col-md-3">
<div class="info-box bg-navy disabled color-palette">
  <!-- Apply any bg-* class to to the icon to color it -->
  <span class="info-box-icon bg-red-active"><i class="fa fa-sign-out"></i></span>
  <div class="info-box-content bg-red">
    <span class="info-box-text">CUTI</span>
    <span class="info-box-number"><?php echo hitung_cuti()?></span>
  </div><!-- /.info-box-content -->
  <div class="info-box-content">
  <a href="?cat=<?php echo $_SESSION['login_hash']; ?>&page=gangguan" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
  </div>
</div>
</div><!-- /.info-box -->
<div class="col-md-3">
<div class="info-box bg-navy disabled color-palette">
  <!-- Apply any bg-* class to to the icon to color it -->
  <span class="info-box-icon bg-red-active"><i class="fa fa-sign-out"></i></span>
  <div class="info-box-content bg-red">
    <span class="info-box-text">BLOCK</span>
    <span class="info-box-number"><?php echo hitung_block()?></span>
  </div><!-- /.info-box-content -->
  <div class="info-box-content">
  <a href="?cat=<?php echo $_SESSION['login_hash']; ?>&page=gangguan" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
  </div>
</div>
</div><!-- /.info-box -->


</div>
<!-- col Data TAB-->
 <div class="col-md-12">
              <div class="nav-tabs-custom" style="min-width:1240px">
                <ul class="nav nav-tabs">
                  <li class="active"><a href="#activity" data-toggle="tab" onclick="dataall()">Semua</a></li>
                  <li><a href="#tab-aktif" data-toggle="tab" onclick="dataaktif()">Aktif</a></li>
                  <li><a href="#tab-baru" data-toggle="tab" onclick="databaru()">Baru</a></li>
                  <li><a href="#tab-cuti" data-toggle="tab" onclick="datacuti()">Cuti</a></li>
                  <li><a href="#tab-block" data-toggle="tab" onclick="datablock()">Block</a></li>
                  <li><a href="#tab-add" data-toggle="tab" onclick="tabadd()">Tambah Pelanggan</a></li>
                  <li><a href="#tab-profile" data-toggle="tab" onclick="profile()"></a></li>
                 
                  <!--li><a href="#settings" data-toggle="tab" onclick="databaru()">Block</a></li-->
                </ul>
                <div class="tab-content" style="min-width:1240px">
                  <div class="active tab-pane" id="activity">
                    <!-- Post -->
                        <div id="data-pelanggan"></div>
                    <!-- Post -->
                  </div><!-- /.tab-pane -->
                  <div class="tab-pane" id="tab-aktif">
                    <!-- Post -->
                        <div id="data-aktif"></div>
                    <!-- Post -->
                  </div><!-- /.tab-pane -->
                  <div class="tab-pane" id="tab-baru">
                    <!-- Post -->
                        <div id="data-baru"></div>
                    <!-- Post -->
                  </div><!-- /.tab-pane -->
                  <div class="tab-pane" id="tab-cuti">
                    <!-- Post -->
                        <div id="data-cuti"></div>
                    <!-- Post -->
                  </div><!-- /.tab-pane -->
                  <div class="tab-pane" id="tab-block">
                    <!-- Post -->
                        <div id="data-block"></div>
                    <!-- Post -->
                  </div><!-- /.tab-pane -->
                  <div class="tab-pane" id="tab-add">
                    <!-- Post -->
                        <div id="data-add"></div>
                    <!-- Post -->
                  </div><!-- /.tab-pane -->
                  <div class="tab-pane" id="tab-edit">
                    <!-- The timeline -->
                         <div id="edit-data"></div>
                  </div><!-- /.tab-pane -->
                  <div class="tab-pane" id="tab-profile">
                    <!-- The timeline -->
                         <div id="data-profile"></div>
                  </div><!-- /.tab-pane -->

                  <div class="tab-pane" id="settings">
                    <form class="form-horizontal">
                      <div class="form-group">
                        <label for="inputName" class="col-sm-2 control-label">Name</label>
                        <div class="col-sm-10">
                          <input type="email" class="form-control" id="inputName" placeholder="Name">
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="inputEmail" class="col-sm-2 control-label">Email</label>
                        <div class="col-sm-10">
                          <input type="email" class="form-control" id="inputEmail" placeholder="Email">
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="inputName" class="col-sm-2 control-label">Name</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" id="inputName" placeholder="Name">
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="inputExperience" class="col-sm-2 control-label">Experience</label>
                        <div class="col-sm-10">
                          <textarea class="form-control" id="inputExperience" placeholder="Experience"></textarea>
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="inputSkills" class="col-sm-2 control-label">Skills</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" id="inputSkills" placeholder="Skills">
                        </div>
                      </div>
                      <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-10">
                          <div class="checkbox">
                            <label>
                              <input type="checkbox"> I agree to the <a href="#">terms and conditions</a>
                            </label>
                          </div>
                        </div>
                      </div>
                      <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-10">
                          <button type="submit" class="btn btn-danger">Submit</button>
                        </div>
                      </div>
                    </form>
                  </div><!-- /.tab-pane -->
                </div><!-- /.tab-content -->
              </div><!-- /.nav-tabs-custom -->
 </div><!-- /.col Data TAB-->





    <div class="col-md-3">
    <div id="menu-pelangganx"></div>
    </div>
     <div class="col-md-12">

    <div id="data-pelanggany"></div>
    <div id="data-pelanggan2"></div> 


    </div><!-- /.col -->
</section><!-- /section -->

<!-- awal untuk modal dialog -->
<div id="dialog-data" class="modal fade modal-primary" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
 <div class="modal-dialog">
    <div class="modal-content">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <h3 id="myModalLabel">Tambah Data</h3>
    </div>
    <!-- tempat untuk menampilkan form  -->
    <div class="modal-body">
    </div>
    <div class="modal-footer">
        <button class="btn btn-success" data-dismiss="modal" aria-hidden="true">Selesai</button>
        <button class="btn btn-danger" onclick="batal()" data-dismiss="modal" aria-hidden="true">Batal</button>
        <button id="simpan-data" class="btn btn-success">Simpan</button>
    </div>
    </div>
    </div>
</div>



<!--script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"></script-->
<script type="text/javascript">
        var main  = "pages/web/mod/pelanggan/pelanggan.aktif.php";
       // var menu2 = "pages/web/mod/pelanggan/pelanggan.menu.php";
        $("#data-pelanggan").load(main);
       // $("#menu-pelanggan").load(menu2);

	    //Fungsi Menu
    function list_allpelanggan(){
        $(this).addClass('active');
        $('#data-pelanggan').load('pages/web/mod/pelanggan/pelanggan.alldata.php');

    }
    function list_pelanggan(){
        $(this).addClass('active');
        $('#data-pelanggan').load('pages/web/mod/pelanggan/pelanggan.data.php');
    }  
    function list_done(){
        $(this).addClass('active');
        //$(this).removeClass("tot");
        $('#data-pelanggan').load('pages/web/mod/pelanggan/pelanggan.done.php');
    }
    function list_OnProccess(){
        $(this).addClass('active');
        $('#data-pelanggan').load('pages/web/mod/pelanggan/pelanggan.OnProccess.php');
    } 
    function list_Pending(){
        $(this).addClass('active');
        $('#data-pelanggan').load('pages/web/mod/pelanggan/pelanggan.pending.php');
    }
    //Pemanggilan data surat 
    function list_surat(){
        $('#header-title').removeClass('hide');
        $('#data-pelanggan2').addClass('hide');
        $('#data-title').html(" Surat Jalan"); 
        $('#data-pelanggan').load('pages/web/mod/pelanggan/pelanggan.surat.php');
    }
    
    //TEKNISI 
    function list_teknisi(){
        $('#data-title').html("Data Teknisi"); 
        $('#header-title').removeClass('hide');
        $('#data-pelanggan2').addClass('hide');
        $('#data-pelanggan').load('pages/web/mod/teknisi/teknisi.data.php');
    } 
    function ditail_teknisi(){
        $('#header-title').addClass('hide');
        $('#data-pelanggan2').removeClass('hide');
        $('#data-pelanggan2').load('pages/web/mod/teknisi/teknisi.detail.php');
    }        

    //Pelanggan Baru
    function pelanggan_baru(){
        $('#data-pelanggan').load('pages/web/mod/pelanggan/pelanggan.form.php');
    }  


    function list_pelanggan(pel){
        console.log(pel);
        $('#header-title').removeClass('hide');
        $('#data-pelanggan2').addClass('hide');
        $('#data-pelanggan').load('pages/web/mod/pelanggan/pelanggan.aktif.php?pelanggan='+pel);
        if(pel==0){
        $('#data-title').html("Data Pelangan Baru"); 
        }else if(pel==1){
        $('#data-title').html("Data Pelangan Aktif"); 
        }else if(pel==2){
        $('#data-title').html("Data Pelangan Cuti"); 
        }else if(pel==3){
        $('#data-title').html("Data Pelangan Block"); 
        }else{
            $('#data-title').html("Data Pelangan"); 
        } 
    } 
</script>

<!-- akhir kode modal dialog -->
<?php 
//include('_script.php');
?>
<script type="text/javascript">
function batal(){
    $("#koorX").val('');
    $("#koorY").val('');
    }

$("#datemask2").inputmask("mm/dd/yyyy", {"placeholder": "mm/dd/yyyy"});

$(function () {
   $("#DataTableGangguan").DataTable({});
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false
    });
  });

</script>


<!--script src="pages/web/mod/pelanggan/js/aplikasi.js"></script-->
<script type="text/javascript">
    (function($) {
    // fungsi dijalankan setelah seluruh dokumen ditampilkan
    $(document).ready(function(e) {
        // deklarasikan variabel
        var kd_mhs = 0;
        var main  = "pages/web/mod/pelanggan/pelanggan.aktif.php";
        var menu2 = "pages/web/mod/pelanggan/pelanggan.menu.php";
        // tampilkan data mahasiswa dari berkas mahasiswa.data.php 
        // ke dalam <div id="data-mahasiswa"></div>
        $("#data-pelanggan").load(main);
        $("#menu-pelanggan").load(menu2);
        // ketika tombol ubah/tambah di tekan
        $('.tambah').on("click", function(e){
            var url = "pages/web/mod/pelanggan/pelanggan.form.php";
            // ambil nilai id dari tombol ubah
            // kd_mhs = this.id;
            var kd_mhs = $(this).attr("id");
            console.log(kd_mhs);
            $.post(url, {id: kd_mhs} ,function(data) {
            });
        });

    

        // ketika tombol hapus ditekan
        $('.hapus').on("click", function(){
            var url = "pages/web/mod/pelanggan/pelanggan.input.php";
            // ambil nilai id dari tombol hapus
            kd_pel = this.id;
            
            // tampilkan dialog konfirmasi
            var answer = confirm("Apakah anda ingin mengghapus data ini?");
            
            // ketika ditekan tombol ok
            if (answer) {
                // mengirimkan perintah penghapusan ke berkas input.php
                $.post(url, {hapus: kd_pel} ,function() {
                    // tampilkan data yang sudah di perbaharui
                    // ke dalam <div id="data"></div>
                    //$("#data-pelanggan").load(main);
                    $("#menu-pelanggan").load(main2);
                });
            }
        });
        
        // ketika tombol simpan ditekan
        $("#simpan-data").bind("click", function(event) {
      var url = "pages/web/mod/pelanggan/pelanggan.input.php";
      // mengambil nilai dari inputbox, textbox dan select
      // input data pelanggan
      var kd_pel      = $('input:text[name=kd]').val();
      var v_kode      = $('input:text[name=kode]').val();
      var v_pelanggan = $('input:text[name=pelanggan]').val();
      var v_hp        = $('input:text[name=hp]').val();
      var v_alamat    = $('textarea[name=alamat]').val();
      var v_koodx     = $('input:text[name=koordinatx]').val();
      var v_koody     = $('input:text[name=koordinaty]').val();
      var v_status    = $('select[name=status_pel]').val();
      // input data paket pelanggan
      var v_tgl_berlangganan = $('input:text[name=tgl_berlangganan]').val();
      var v_paket            = $('select[name=paket]').val();
      var v_perangkat        = $('select[name=perangkat]').val();
      if(v_pelanggan !='' && v_alamat !='' && v_perangkat !=''){ 
      console.log(v_kode+' '+v_hp+' '+v_pelanggan+' '+kd_pel);
      // mengirimkan POST data ke berkas pelanggan.input.php untuk di proses
      $.post(url, {kode: v_kode, pelanggan: v_pelanggan, hp: v_hp, alamat: v_alamat, koordinatx:v_koodx, koordinaty: v_koody, status_pel: v_status, tgl_berlangganan:v_tgl_berlangganan, paket:v_paket, perangkat:v_perangkat, id:kd_pel},function(){
      pelanggan_baru();
        });
      }else{
        alert('Data Belum terisi dengan benar!');
      }
        });
    });
}) (jQuery);




var getform = function(){
var set_koordinat = function(kd_pel){}
var ubah = function(idubh){
    $('#data-add').attr();
}
var hapus = function(idg){
}
var print =function(idsur){
}
return{
    set_koordinat: function(kd_pel){
       var url = "pages/maps/koordinat.php";
       $("#myModalLabel").html("Set Koordinat Pelanggan"); 
       $.post(url, {id: kd_pel} ,function(data) {
       $(".modal-body").html(data).show();
       });
console.log(set_koordinat);
      
    },
    //document.getElementById("demo");
    ubah: function(idubh) {
       // $("#edit-data").slideToggle("slow");
         kd_gag = String(idubh);
         console.log(idubh+' gg');
         console.log(kd_gag+' ffff');
         var url = "pages/web/mod/pelanggan/pelanggan.form.php";
console.log( url+"?id="+kd_gag);
            $("#myModalLabel").html("Ubah Data pelanggan");
            $.post(url, {id: kd_gag} ,function(data) {
            //  alert(kd_gag);
            //  $('#data-pelanggan').load(url+"?id="+kd_gag);
                $('#edit-data').load(url+"?id="+kd_gag);
            //$('#tab-add').load(url+"?id="+kd_gag);
            // tampilkan pelanggan.form.php ke dalam <div class="modal-body"></div>
                $(".modal-body").html(data).show();
            });
    ubah();
    },
    print: function(idg,idsur){
        //var url = "pages/cs/mod/pelanggan/pelanggan.surat.print.php";
        var url = "pages/web/print.php";
        console.log(idg+' '+idsur);
        //var url = "dashboard.php?cat=web&page=print";
        //var url = "dashboard.php?cat=web&page=faktur_k_print";
            $("#myModalLabel").html("Print Surat Tugas");
            $("#simpan-data").css('visibility', 'hidden');
            $.post(url, {id: idsur} ,function(data) {
                // tampilkan pelanggan.form.php ke dalam <div class="modal-body"></div>
                $(".modal-body").html(data).show();
            });
    },
    hapus: function(idhapus) {
                // ketika tombol hapus ditekan
            var main = "pages/web/mod/pelanggan/pelanggan.aktif.php";
            var url  = "pages/web/mod/pelanggan/pelanggan.input.php";
            // ambil nilai id dari tombol hapus
            kd_mhs = idhapus;
            console.log(kd_mhs);
            console.log(idhapus+' gg');
            console.log(kd_mhs+' ffff');
            // tampilkan dialog konfirmasi
            var answer = confirm("Apakah anda ingin mengghapus data ini?");
            
            // ketika ditekan tombol ok
            if (answer) {
                // mengirimkan perintah penghapusan ke berkas transaksi.input.php
                $.post(url, {hapus: kd_mhs} ,function() {
                    // tampilkan data mahasiswa yang sudah di perbaharui
                    // ke dalam <div id="data-mahasiswa"></div>
                showpage('pages/web/pelanggan2.php');
                $("#data-pelanggan").load(main);
                $("#menu-pelanggan").load(menu2);
                });
            }   
    }
}

} (jQuery); 

function getLog() {
    $.ajax({
        url: 'pages/web/mod/pelanggan/log_pelanggan.txt',
        dataType: 'text',
        success: function(text) {
            $("#log_pelanggan").text(text);
            console.log('baca log_pelanggan.txt');
            var textarea = document.getElementById('log_pelanggan');
            textarea.scrollTop = textarea.scrollHeight;
            setTimeout(getLog, 30000); // 30000 = refresh every 30 seconds
        }
    })
}
getLog();

</script>
<p>Log Pelanggan :</p>
<textarea id="log_pelanggan" class="form-control " rows="5" autocomplete="off" disabled readonly>
