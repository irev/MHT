<?php 
//////////////////////////////
// PROGRAM SKRIPSI MHT
// Refyandra
// gangguan.php 
// edit 6 juni 2016
// usercase CUSTOMER SERVICE
///////////////////////////////
if(!isset($_SESSION)) 
    { 
        session_start(); 
    }else{} 
require("../../_db.php");
require("../../inc/function/hitung_jumlah_pelanggan.php");
require("../../inc/function/hitung_jumlah_data_item.php");
//require("../../inc/function/hitung_jumlah_pelanggan.php");
if(!isset($_SESSION['login_hash']) && !isset($_SESSION['login_name'])){
   echo "<script>window.location='".baseurl."logout.php'</script>";
}
?>
<script type="text/javascript">
//$('#data-widgets').load('pages/web/widgets.prangkat.php');
//$('#data-all').load('pages/web/mod/gangguan/gangguan.alldata.php');
dataall();
function dataall(){
 $('#data-all').load('pages/web/mod/gangguan/gangguan.alldata.php');
 
}
function datagangguan(){
 $('#data-gangguan').load('pages/web/mod/gangguan/gangguan.data.php');


}
function datapending(){
 $('#data-pending').load('pages/web/mod/gangguan/gangguan.pending.php');

}
function datadone(){
 $('#data-done').load('pages/web/mod/gangguan/gangguan.done.php');

}
function dataProcess(){
 $('#data-Process').load('pages/web/mod/gangguan/gangguan.OnProccess.php');
}
function datasutarjalan(){
 $('#data-surat-jalan').load('pages/web/mod/surat/gangguan.surat.php');
}
function datablock(){
 $('#data-block').load('pages/web/mod/pelanggan/pelanggan.pending.php?pelanggan=3&ket=Process');
}
function tabadd(){
 $('#data-add').load('pages/web/mod/perangkat/perangkat.form.php?id=0&ket=Process');
}


 //$('#DataTableDataGangguan').DataTable();
 
    function dataTabel(){ 
   // $('.table').DataTable();
        $('.dataTables_length').addClass('col-xs-3');
        $('.dataTables_info').addClass('col-xs-4');
        $('.paginate_previous').addClass('btn-flat btn-default');
        $('.paginate_next').addClass('btn-flat btn-default');
        $('.paginate_button').addClass('btn-flat btn-default btn-group');
        $('.current').addClass('btn-flat btn-primary btn-group');
  }    
    window.onload =dataTabel;
    setInterval(dataTabel, 3000); 


</script>

<!--script src="pages/web/mod/gangguan/js/aplikasi.js"></script-->
<section class="content">
    <div class="row">
<div class="col-md-3">
 <?php if($_SESSION['login_hash']=='cs' || $_SESSION['login_hash']=='krd'){ ?>
            <div class="form-group">
                <a href="#dialog-data" data-toggle="modal" id="0" class="btn text-success btn-app" onclick="tambahData('0')" >
                    <i class="fa fa-plus"></i> GANGGUAN
                </a>
                <!--a class="btn btn-app" href="#timeout" onclick="clearTimeout(mytab,13000);;">stop</a-->
                <br>
            </div>
 <?php } ?>  
 </div>
 <div class="col-md-12">
              <div class="nav-tabs-custom">
         <!--tapmpil Ul tab -->       
                   <span id="menu-tab-gangguan"></span>

         
                <div class="tab-content">
                  <div class="active tab-pane" id="activity">
                    <!-- Post -->
                        <div id="data-all"></div>
                    <!-- Post -->
                  </div><!-- /.tab-pane -->
                  <div class="tab-pane" id="tab-gangguan">
                    <!-- Post -->
                        <div id="data-gangguan"></div>
                    <!-- Post -->
                  </div><!-- /.tab-pane -->
                  <div class="tab-pane" id="tab-pending">
                    <!-- Post -->
                        <div id="data-pending"></div>
                    <!-- Post -->
                  </div><!-- /.tab-pane -->
                  <div class="tab-pane" id="tab-done">
                    <!-- Post -->
                        <div id="data-done"></div>
                    <!-- Post -->
                  </div><!-- /.tab-pane -->
                  <div class="tab-pane" id="tab-Process">
                    <!-- Post -->
                        <div id="data-Process"></div>
                    <!-- Post -->
                  </div><!-- /.tab-pane -->
                  <div class="tab-pane" id="tab-sutar-jalan">
                    <!-- Post -->
                    <div id="msg"></div>
                        <div id="data-surat-jalan"></div>
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

</div><!--div-->
</section><!--section-->

<!-- awal untuk modal dialog -->
<div id="dialog-data" class="modal fade modal-primary" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h3 id="myModalLabel">Tambah Data</h3>
            </div>
            <!-- tempat untuk menampilkan form  -->
            <div id="modal-body" class="modal-body">
            </div>
            <div class="modal-footer"> 
                <!--button id="cetak-data" class="btn btn-success" hidden="true">Cetak</button-->
                <button id="batal" class="btn btn-danger pull-left" data-dismiss="modal" aria-hidden="true">Batal</button>
                <div id="bt-simpan"></div>
            </div>
        </div>
    </div>
</div>
<!-- END awal untuk modal dialog -->

<!-- akhir kode modal dialog -->
<?php 
//include('../../_script.php');
?>

<!--function menu pada halaman-->
<script type="text/javascript">
$('#menu-tab-gangguan').load('pages/web/mod/gangguan/gangguan.tab.php');
function menuTab(){
    $('#menu-tab-gangguan').load('pages/web/mod/gangguan/gangguan.tab.php');
console.info('setInterval menu-tab');
//setInterval(menuTab, 3000);
}
window.onload = menuTab;
var mytab = setInterval(menuTab, (3600*60)*5);
//var stopInter=
//clearTimeout(mytab);
//setInterval(stopInter, 10000);
$('.paginate_button').addClass('btn btn-sm');
/// function sub menu halaman
<!-- // FUNSI PADA HALAMAN GANGGUAN
    $("#breadcrumb, #judulhal").text('Gangguan');
  
   //Fungsi Menu
    function list_allgangguan() {
        $(this).addClass('active');
        $('#data-gangguan').load('pages/web/mod/gangguan/gangguan.alldata.php');
    }

    function list_gangguan() {
        $(this).addClass('active');
        $('#data-gangguan').load('pages/web/mod/gangguan/gangguan.data.php');
    }

    function list_done() {
        $(this).addClass('active');
        //$(this).removeClass("tot");
        $('#data-gangguan').load('pages/web/mod/gangguan/gangguan.done.php');
    }

    function list_OnProccess() {
        $(this).addClass('active');
        $('#data-gangguan').load('pages/web/mod/gangguan/gangguan.OnProccess.php');
    }

    function list_Pending() {
        $(this).addClass('active');
          $('#data-gangguan').load('pages/web/mod/gangguan/gangguan.pending.php');
          //$('#data-gangguan').load('assets/temas/pages/tables/data.html');

    }

    function list_surat() {
        //$('#header-title').removeClass('hide');
        //$('#data-pelanggan2').addClass('hide');
        //$('#data-title').html(" Surat Jalan");
        $('#data-surat-jalan').load('pages/web/mod/surat/gangguan.surat.php');
        //$('#data-gangguan2').load('pages/web/mod/gangguan/gangguan.surat.print.php');
    }

    //TEKNISI 
    function list_teknisi() {
        $('#data-title').html("Data Teknisi");
        $('#header-title').removeClass('hide');
        $('#data-gangguan2').addClass('hide');
        $('#data-gangguan').load('pages/web/mod/teknisi/teknisi.data.php');
    }

    function ditail_teknisi() {
        $('#header-title').addClass('hide');
        $('#data-gangguan2').removeClass('hide');
       // $('#data-gangguan2').load('pages/web/mod/teknisi/teknisi.detail.php');
        $('#data-gangguan2').load('assets/temas/pages/tables/data.html');
       // assets/temas/pages/tables/data.html
    }
//-->
/// end function sub menu halaman  
<!--    
    (function($) {
        // fungsi dijalankan setelah seluruh dokumen ditampilkan
        $(document).ready(function(e) {
   // deklarasikan variabel
            var kd_mhs = 0;
            //var main = "pages/web/mod/gangguan/gangguan.data.php";
            //var menu2 = "pages/web/mod/gangguan/gangguan.menu.php";

            // tampilkan data gangguan dari berkas gangguan.data.php 
            // ke dalam <div id="data-gangguan"></div>
            $("#data-gangguan").load(main);
            //$("#menu-gangguan").load(menu2);

            // ketika tombol ubah/tambah di tekan
            $('.tambahhh').on("click", function(e) {
                var url = "pages/web/mod/gangguan/gangguan.form.php"; 
                // ambil nilai id dari tombol ubah
                // kd_mhs = this.id;
                var kd_mhs = $(this).attr("id");
                console.log(kd_mhs); 
                //$("#cetak-data").css('visibility', 'hidden');
                //$("#simpan-data").css('visibility', '');     
                $("#bt-simpan").html('<button id="simpan-data" class="btn btn-success" onclick="simpan(1)">Simpan Ganguan</button>'); 
                $("#batal").text('Batal');
                $("#myModalLabel").html("Tambah Data Gangguan");
                $.post(url, {
                    id: kd_mhs
                }, function(data) {
                    // tampilkan form.php ke dalam <div class="modal-body"></div>
                    $(".modal-body").html(data).show();
                });
            });

            // ketika tombol hapus ditekan
            $('.hapus').on("click", function() {
                var url = "pages/web/mod/gangguan/gangguan.input.php";
                // ambil nilai id dari tombol hapus
                kd_mhs = this.id;
                // tampilkan dialog konfirmasi
                var answer = confirm("Apakah anda ingin mengghapus data ini?");
                // ketika ditekan tombol ok
                if (answer) {
                    // mengirimkan perintah penghapusan ke berkas input.php
                    $.post(url, {
                        hapus: kd_mhs
                    }, function() {
                        // tampilkan data yang sudah di perbaharui
                        // ke dalam <div id="data"></div>
                        $("#data-gangguan").load(main);
                    });
                }
            });

            // ketika tombol simpan gangguan ditekan
            $("#simpan-data").bind("click", function(event) {
                var url = "pages/web/mod/gangguan/gangguan.input.php";
                // mengambil nilai dari inputbox, textbox dan select
                var kd_mhs = $('input:text[name=kd]').val();
                var v_kode = $('input:text[name=kode]').val();
                var v_pelapor = $('input:text[name=pelapor]').val();
                var v_pelanggan = $('select[name=pelanggan]').val();
                var v_tgl_gangguan = $('input:text[name=tgl_gangguan]').val();
                var v_tgl_pelaporan = $('input:text[name=tgl_pelaporan]').val();
                var v_keterangan = $('textarea[name=keterangan]').val();
                var v_status = $('input:text[name=status]').val();

                console.log(v_kode + ' ' + v_pelapor + ' ' + v_pelanggan + ' ' + v_tgl_gangguan + ' ' + v_tgl_pelaporan + ' ' + kd_mhs);
                // mengirimkan data ke berkas transaksi.input.php untuk di proses
                $.post(url, {
                    kode: v_kode,
                    pelapor: v_pelapor,
                    pelanggan: v_pelanggan,
                    tgl_gangguan: v_tgl_gangguan,
                    tgl_pelaporan: v_tgl_pelaporan,
                    keterangan: v_keterangan,
                    status: v_status,
                    id: kd_mhs
                }, function() {
                    // tampilkan data yang sudah di perbaharui
                    // ke dalam <div id="data"></div>
                    $("#data-gangguan").load(main);
                    //$("#menu-gangguan").load(menu2);

                    // sembunyikan modal dialog
                    $('#dialog-data').modal('hide');

                    // kembalikan judul modal dialog
                    $("#myModalLabel").html("Tambah Data");
                });
            });

            // ketika tombol simpan surat jalan ditekan
            $("#simpan-surat-jalan").bind("click", function(event) {
            //var url = "pages/krd/mod/gangguan/gangguan.input.php";
            var url = "pages/krd/gangguan.input.php";
            // mengambil nilai dari inputbox, textbox dan select
            var kd_mhs          = $('input:text[name=kd]').val();
            var v_kd_surat      = $('input:text[name=kdsurat]').val();
            var v_teknisi       = $('select[name=teknisi]').val();
            var v_tgl_surat     = $('input:text[name=tgl_surat]').val();
            var v_status_gangguan   = $('input:text[name=status_gangguan]').val();

            var v_kode          = $('input:text[name=kode]').val();
            var v_pelapor       = $('input:text[name=pelapor]').val();
            var v_pelanggan     = $('select[name=pelanggan]').val();
            var v_tgl_gangguan  = $('input:text[name=tgl_gangguan]').val();
            var v_tgl_pelaporan = $('input:text[name=tgl_pelaporan]').val();
            var v_keterangan    = $('textarea[name=keterangan]').val();
            var v_status        = $('input:text[name=status]').val();

            if(v_teknisi!==''){
            // Untuk CEK data POST dari from
            console.log(v_kode+' '+v_kd_surat+' '+v_teknisi+' '+v_tgl_surat+'  '+kd_mhs);
            // mengirimkan data ke berkas krd/gangguan.input.php untuk di proses
            $.post(url, {
                kode: v_kode, 
                kdsurat: v_kd_surat, 
                teknisi: v_teknisi, 
                tgl_surat: v_tgl_surat, 
                tgl_pelaporan:v_tgl_pelaporan, 
                keterangan: v_keterangan, 
                status: v_status, 
                id: kd_mhs, 
                kd: kd_mhs 
            } ,function() {  
               // $("#data-gangguan").load(main);
               // $("#data-gangguan").load(main);
               // //$("#menu-gangguan").load(menu2);
                // sembunyikan modal dialog
                $('#dialog-data').modal('hide');
                // kembalikan judul modal dialog
                $("#myModalLabel").html("Tambah Data ");
            });
            }else{
                alert('Data masih belum lengkap....!');
            }
        });

        });
    })(jQuery);
//-->

</script>


<?php if($_SESSION['login_hash']=='cs' || $_SESSION['login_hash']=='krd'){ 
//// HANYA KOORDINATOR DAN CS yg bisa mengakses
?>
    
<script type="text/javascript">
function tambahData(kd){
                var url = "pages/web/mod/gangguan/gangguan.form.php"; 
                console.log(kd); 
                $("#bt-simpan").html('<button id="simpan-data" class="btn btn-success" onclick="simpan(1)">Simpan Ganguan</button>'); 
                $("#batal").text('Batal');
                $("#myModalLabel").html("Tambah Data Gangguan");
                $.post(url, {
                    id: kd
                }, function(data) {
                    // tampilkan form.php ke dalam <div class="modal-body"></div>
                    $(".modal-body").html(data).show();
                    console.info('tambah baru');
                });
}

function simpan(id_form){
    // jika id  1 = form gangguan dan 2 = form surat  
    if(id_form==1){
        alert('SIMPAN DATA GANGGUAN');
                var url = "pages/web/mod/gangguan/gangguan.input.php";
                // mengambil nilai dari inputbox, textbox dan select
                var kd_mhs = $('input:text[name=kd]').val();
                var v_kode = $('input:text[name=kode]').val();
                var v_pelapor = $('input:text[name=pelapor]').val();
                var v_pelanggan = $('select[name=pelanggan]').val();
                var v_tgl_gangguan = $('input:text[name=tgl_gangguan]').val();
                var v_tgl_pelaporan = $('input:text[name=tgl_pelaporan]').val();
                var v_keterangan = $('textarea[name=keterangan]').val();
                var v_status = $('input:text[name=status]').val();
                console.log(v_kode + ' ' + v_pelapor + ' ' + v_pelanggan + ' ' + v_tgl_gangguan + ' ' + v_tgl_pelaporan + ' ' + kd_mhs);
                if(v_pelapor!=='' && v_pelanggan !=='' && v_tgl_gangguan !=='' && v_keterangan !==''){
                // mengirimkan data ke berkas transaksi.input.php untuk di proses
                $.post(url, {
                    kode: v_kode,
                    pelapor: v_pelapor,
                    pelanggan: v_pelanggan,
                    tgl_gangguan: v_tgl_gangguan,
                    tgl_pelaporan: v_tgl_pelaporan,
                    keterangan: v_keterangan,
                    status: v_status,
                    id: kd_mhs
                }, function() {
                    // tampilkan data yang sudah di perbaharui
                    // ke dalam <div id="data"></div>
                    $("#data-gangguan").load(main);
                    //$("#menu-gangguan").load(menu2);

                    // sembunyikan modal dialog
                    $('#dialog-data').modal('hide');

                    // kembalikan judul modal dialog
                    $("#myModalLabel").html("Tambah Data");
                }); 
            }else{
                alert("::::::: MAAF :::::::: \n ::::::: DATA BELUM LENGKAP :::::::: ");
            }

    }else if(id_form==2){
         alert('SIMPAN SURAT JALAN');
         var url = "pages/krd/gangguan.input.php";
            // mengambil nilai dari inputbox, textbox dan select
            var kd_mhs          = $('input:text[name=kd]').val();
            var v_kd_surat      = $('input:text[name=kdsurat]').val();
            var v_teknisi       = $('select[name=teknisi]').val();
            var v_tgl_surat     = $('input:text[name=tgl_surat]').val();
            var v_status_gangguan   = $('input:text[name=status_gangguan]').val();

            var v_kode          = $('input:text[name=kode]').val();
            var v_pelapor       = $('input:text[name=pelapor]').val();
            var v_pelanggan     = $('select[name=pelanggan]').val();
            var v_tgl_gangguan  = $('input:text[name=tgl_gangguan]').val();
            var v_tgl_pelaporan = $('input:text[name=tgl_pelaporan]').val();
            var v_keterangan    = $('textarea[name=keterangan]').val();
            var v_status        = $('input:text[name=status]').val();
            if(v_teknisi!==''){
            // Untuk CEK data POST dari from
            // catatan:   8/8/16
            //select teknisi tidak bisa dilakukan pada form modal buat surat jalan teknisi 8/8/16
            // form modal dipanggil pada file page/krd/gangguan.form_buat_surat_jalan.php
            ////## DITEMUKAN SOLUSI DARI MASALAHNYA selasa, 9/8/20116
            ////## Jika memiliki dua Modal diload pakai code javascript  $().html() maka  <select> tidak berfingsi dengan benar, "bisa di pilih tapi value-nya tidak sesuai dgn data yg dipilih" 
            //#### SCRIPT DONE ####   9/8/20116
            console.log(v_kode+' '+v_kd_surat+' '+v_teknisi+' '+v_tgl_surat+'  '+kd_mhs);
            // mengirimkan data ke berkas krd/gangguan.input.php untuk di proses
            $.post(url, {kode: v_kode, kdsurat: v_kd_surat, teknisi: v_teknisi, tgl_surat: v_tgl_surat, tgl_pelaporan:v_tgl_pelaporan, keterangan: v_keterangan, status: v_status, id: kd_mhs, kd: kd_mhs } ,function() {
            
                $("#data-gangguan").load(main);
                $("#data-gangguan").load(main);
                //$("#menu-gangguan").load(menu2);
                // sembunyikan modal dialog
                $('#dialog-data').modal('hide');
                $('#form-gangguan').html('hide');
                $('#dialog-data').modal('hide');
                // kembalikan judul modal dialog
                $("#myModalLabel").html("Tambah Data ");
            });
        }else{
            
            alert(".:: Teknisi belum dipilih ::. \n Silahkan pilih teknisi \n yang akan lelakukan perbaikan \n ");    
        }
    }              
}
</script>
<?php }else{ echo '<script  type="text/javascript">function simpan(id_form){alert("MAAF...! AKSES DITOLAK, anda tidak memiliki hak akses");}</script>';}?>


<script  type="text/javascript">
           
function simpan_perbaikan(){
             var url = "pages/web/mod/gangguan/gangguan.input.php";
                // mengambil nilai dari inputbox, textbox dan select
                var v_simpan      = 'done';
                var v_perbaikan   = $('input:text[name=id_perbaikan]').val();
                var v_surat       = $('input:text[name=id_surat]').val();
                var v_gangguan    = $('input:text[name=id_gangguan]').val();
                var v_tgl_selesai = $('input:text[name=tgl_selesai]').val();
                var v_keterangan  = $('textarea[name=keterangan]').val();
                /// TESTING MENGGUNKAN CONSOLE.LOG()
                console.log('[IDP=' + v_perbaikan + '] [IDS =' + v_surat +'] [gangguan='+v_gangguan+ '][selesai=' + v_tgl_selesai + '] [ket_selesai=' + v_keterangan +']');
                // mengirimkan data ke berkas transaksi.input.php untuk di proses
                var data_perbaikan = {done: v_simpan, perbaikan: v_perbaikan, surat: v_surat,gangguan: v_gangguan, selesai: v_tgl_selesai, ket_selesai: v_keterangan};
                $.post(url,data_perbaikan, function() {
                    // tampilkan data yang sudah di perbaharui
                    // ke dalam <div id="data"></div>
                    $("#data-gangguan").load(main);
                    //$("#menu-gangguan").load(menu2);

                    // sembunyikan modal dialog
                    $('#dialog-data').modal('hide');

                    // kembalikan judul modal dialog
                    $("#myModalLabel").html("Tambah Data");
                }); 
}


<!-- // FUNGSI DALAM BENTUK VARIABEL
    var getform = function() {
        var ubah = function(idubh) {}
        var done = function(id_done) {}
        var SuratJalan = function(idubh) {
            $('#form-gangguan').html('');
            $('#simpan-data').html('');
        }
        var hapus = function(idg) {}
        var hapus_SJ = function(idg) {}
        var print = function(idsur) {}
        var cetak = function(idsur) {}
        var ubah_stat = function(ids,idg,idk) {

        }

        return {
            ubah: function(idubh) {
                kd_gag = String(idubh);
                console.info('UBAH ID = '+idubh);
                var url = "pages/web/mod/gangguan/gangguan.form.php";

                $("#myModalLabel").html("Ubah Data Gangguan");
                $.post(url, {
                    id: kd_gag
                }, function(data) {
                    // tampilkan gangguan.form.php ke dalam <div class="modal-body"></div>
                    $(".modal-body").html(data).show();
                });
                ubah();
            },
            SuratJalan: function(idubh) {
                kd_gag = String(idubh);
                //var url = "pages/krd/mod/gangguan/gangguan.form.php";
                var url = "pages/krd/gangguan_form_buat_sj.php";
                var tanya =confirm("Buat Surat Jalan...?");
                if(tanya==true){ 
                $("#myModalLabel").html("Surat Jalan");
                $("#bt-simpan").html('<button id="simpan-surat-jalan" class="btn btn-success" onclick="simpan(2)">Buat Surat </button>');
                $.post(url, {id: kd_gag} ,function(data) {
                // tampilkan gangguan.form.php ke dalam <div class="modal-body"></div>
                //$(".modal-body").html(data).show();
                $('#form-gangguan').html('hide');
                $(".modal-body").html(data);

                });
            SuratJalan();
            }
            },
            print: function(idg, idsur) {
                //var url = "pages/cs/mod/gangguan/gangguan.surat.print.php";
                var url = "pages/web/print.php";
                console.log(idg + ' ' + idsur);
                //var url = "dashboard.php?cat=web&page=print";
                //var url = "dashboard.php?cat=web&page=faktur_k_print";
                $("#myModalLabel").html("Print Surat Tugas");
                $("#batal").text('Tutup');
                $("#cetak-data").css('visibility', 'hidden');
                $("#simpan-data").css('visibility', 'hidden');
                $.post(url, {
                    id: idsur
                }, function(data) {
                    // tampilkan gangguan.form.php ke dalam <div class="modal-body"></div>
                    $(".modal-body").html(data).show();
                });
            },
            cetak: function(idg, idsur) {
                //var url = "pages/cs/mod/gangguan/gangguan.surat.print.php";
                var url = "pages/web/print.php";
                $("#myModalLabel").html("Print Surat Tugas");
                $("#simpan-data").css('visibility', 'hidden');
                $.post(url, {
                    id: idsur
                }, function(data) {
                    // tampilkan gangguan.form.php ke dalam <div class="modal-body"></div>
                    $(".modal-body").html(data).show();
                });
            },
            done: function(id_done) {
                kd_gag = String(id_done);
                console.log(id_done + ' DONE  ' +  kd_gag);
                /// file ini akan dipindah pada folder mod teknisi
                var url = "pages/web/mod/gangguan/gangguan.form.done.php";

                $("#myModalLabel").html("Entri Data Perbaikan");
                $("#bt-simpan").html('<button id="simpan-surat-jalan" class="btn btn-success" onclick="simpan_perbaikan()">Selesai (Done)</button>');

                $.post(url, {
                    id: kd_gag
                }, function(data) {
                    // tampilkan gangguan.form.php ke dalam <div class="modal-body"></div>
                    $(".modal-body").html(data).show();
                });
                datadone();
            },
            hapus: function(idhapus) {
                // ketika tombol hapus ditekan

                var main = "pages/web/mod/gangguan/gangguan.data.php";
                var url = "pages/web/mod/gangguan/gangguan.input.php";
                // ambil nilai id dari tombol hapus
                kd_mhs = idhapus;
                // tampilkan dialog konfirmasi
                var answer = confirm("Apakah anda ingin mengghapus data ini?");

                // ketika ditekan tombol ok
                if (answer) {
                    // mengirimkan perintah penghapusan ke berkas transaksi.input.php
                    $.post(url, {
                        hapus: kd_mhs
                    }, function() {
                        // tampilkan data gangguan yang sudah di perbaharui
                        // ke dalam <div id="data-gangguan"></div>
                        $("#data-gangguan").load(main);
                        //$("#menu-gangguan").load(menu2);
                    });
                }
            },
            hapus_SJ: function(idhapus) {
                // ketika tombol hapus_SJ ditekan
                var url = "pages/web/mod/gangguan/gangguan.input.php";
                // ambil nilai id dari tombol hapus
                kd_mhs = idhapus;
                // tampilkan dialog konfirmasi
                var answer = confirm("Apakah anda ingin mengghapus data ini?");

                // ketika ditekan tombol ok
                if (answer) {
                    // mengirimkan perintah penghapusan ke berkas transaksi.input.php
                    $.post(url, {
                        hapus_sj: kd_mhs
                    }, function(data) {
                        $.blockUI({ 
                        centerY: 0, 
                        css: { bottom: '', left: '', right: '10px' },
                        message: '<strong>'+data.msg+'</strong>'
                        }); 
                        setTimeout($.unblockUI, 3000); 
                        
                        // tampilkan data gangguan yang sudah di perbaharui
                        // ke dalam <div id="data-gangguan"></div>
                        $('#data-surat-jalan').load('pages/web/mod/surat/gangguan.surat.php');
                        //$("#menu-gangguan").load(menu2);
                    }, "json");
                }
            },
             ubah_stat: function(ids,idg,idk){
                var tanya =confirm(" Segera melakukan perbaikan gangguan!");
                    var url = "pages/web/mod/gangguan/gangguan.input.php";
                    var url_print = "pages/web/print/suratjalan.print.php";
                    var id_s=ids;
                    var id_g=idg;
                    var id_k=idk;
                if (tanya == true ){
                    $.post(url,{proses_surat: id_s, proses_gangguan: id_g, karyawan: id_k}, function(data) {
                    //$("#menu-gangguan").load(menu2);
                    list_surat();
                    }); 
                    console.log(id_g);
                    $.post(url_print,{id: id_s, gangguan: id_g, karyawan: id_k}, function(data) {
                    //$("#menu-gangguan").load(menu2); 
                    window.open(url_print+'?id=SJ'+id_s+'&gangguan=MT'+id_g+'&karyawan=KR'+id_k);
                    });       
                }
            }
        }

    }(jQuery);
//-->

$('[data-toggle="tooltip"]').tooltip();

</script>
<script type="text/javascript">
    $("#datemask2").inputmask("mm/dd/yyyy", {
        "placeholder": "mm/dd/yyyy"
    });

</script>

<!--
<div id="dialog" title="Catatan halman gangguan">
<p>
<br>//////////////////////////////
<br>// PROGRAM SKRIPSI MHT
<br>// Refyandra
<br>// gangguan.php 
<br>// edit 6 juni 2016
<br>// usercase CUSTOMER SERVICE
<br>///////////////////////////////
</p>
<input type="" name="">
</div>
//-->
<script type="text/javascript">
/** 
  * [width description]
  * @type {Number}
  
    width: 400,
    height: 250,
    position: ({ my: 'left', at: 'bottom', of: window }),
    title: ""
    });
*/
</script>