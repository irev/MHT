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
    } 
require("../../_db.php");
require("../../inc/function/hitung_jumlah_pelanggan.php");
if(!isset($_SESSION['login_hash']) && !isset($_SESSION['login_name'])){
   echo "<script>window.location='".baseurl."logout.php'</script>";
}
?>
<!--script src="pages/web/mod/gangguan/js/aplikasi.js"></script-->
<link rel="stylesheet" type="text/css" href="assets/msdropdown/css/dd.css" />
<section class="content">
    <div class="row">
        <div class="col-md-3">
 <?php if($_SESSION['login_hash']=='cs' || $_SESSION['login_hash']=='krd'){ ?>
            <div class="form-group">
                <a href="#dialog-data" id="0" class="btn text-success btn-app tambah" data-toggle="modal" >
                    <i class="fa fa-plus"></i> GANGGUAN
                </a>
                <br>
            </div>
 <?php } ?>           
            <div id="menu-gangguan"></div>
        </div>
        <div class="col-md-9">
                 <div id="data-gangguan"></div>
        </div>
</section>

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
                <!--button id="cetak-data" class="btn btn-success" hidden="true">Cetak</button-->
                <button id="batal" class="btn btn-danger pull-left" data-dismiss="modal" aria-hidden="true">Batal</button>
                <div id="bt-simpan"></div>               
            </div>
        </div>
    </div>
</div>
<!-- END awal untuk modal dialog -->

<!-- awal untuk modal dialog -->
<div id="dialog-surat-jalan" class="modal fade modal-success" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
 <div class="modal-dialog">
    <div class="modal-content">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <h3 id="myModalLabel">Buat surat Jalan</h3>
    </div>
    <!-- tempat untuk menampilkan form SURAT JALAN -->
    <div class="modal-body">
    </div>
    <div class="modal-footer">
        <button class="btn btn-danger" data-dismiss="modal" aria-hidden="true">Batal</button>
        <button id="simpan-surat-jalan" class="btn btn-success" onclick="simpan_surat_jalan()">Simpan</button>
    </div>
    </div>
    </div>
</div>
<!-- akhir kode modal dialog -->

<!-- akhir kode modal dialog -->
<?php 
//include('../../_script.php');
?>

<!--function menu pada halaman-->
<script type="text/javascript">
$('.paginate_button').addClass('btn btn-sm');
/// function sub menu halaman
<!-- // FUNSI PADA HALAMAN GANGGUAN
    var main = "pages/web/mod/gangguan/gangguan.timeline.php";
    var menu2 = "pages/web/mod/gangguan/gangguan.menu.php";
    $("#breadcrumb, #judulhal").text('Gangguan');
    $("#data-gangguan").load(main);
    $("#menu-gangguan").load(menu2);
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
//        $('#data-gangguan').load('pages/web/mod/gangguan/gangguan.pending.php');
          $('#data-gangguan').load('assets/temas/pages/tables/data.html');

    }

    function list_surat() {
        $('#header-title').removeClass('hide');
        $('#data-pelanggan2').addClass('hide');
        $('#data-title').html(" Surat Jalan");
        $('#data-gangguan').load('pages/web/mod/surat/gangguan.surat.php');
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
            $("#menu-gangguan").load(menu2);

            // ketika tombol ubah/tambah di tekan
            $('.tambah').on("click", function(e) {
                var url = "pages/cs/mod/gangguan/gangguan.form.php"; 
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
                var url = "pages/cs/mod/gangguan/gangguan.input.php";
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
                var url = "pages/cs/mod/gangguan/gangguan.input.php";
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
                    $("#menu-gangguan").load(menu2);

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
            
                $("#data-gangguan").load(main);
                $("#data-gangguan").load(main);
                $("#menu-gangguan").load(menu2);
                // sembunyikan modal dialog
                $('#dialog-surat-jalan').modal('hide');
                
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
function simpan(id_form){
    // jika id  1 = form gangguan dan 2 = form surat  
    if(id_form==1){
        alert('SIMPAN DATA GANGGUAN');
                var url = "pages/cs/mod/gangguan/gangguan.input.php";
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
                    $("#menu-gangguan").load(menu2);

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
                $("#menu-gangguan").load(menu2);
                // sembunyikan modal dialog
                $('#dialog-data').modal('hide');
                $('#form-gangguan').html('hide');
                $('#dialog-surat-jalan').modal('hide');
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
                var v_gangguan      = $('input:text[name=id_gangguan]').val();
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
                    $("#menu-gangguan").load(menu2);

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
                console.log(idubh + ' gg');
                console.log(kd_gag + ' ffff');
                var url = "pages/cs/mod/gangguan/gangguan.form.php";

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
                console.log(idubh+' gg');
                console.log(kd_gag+' ffff');
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
                console.log(idg + ' ' + idsur);
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
                var url = "pages/cs/mod/gangguan/gangguan.form.done.php";

                $("#myModalLabel").html("Entri Data Perbaikan");
                $("#bt-simpan").html('<button id="simpan-surat-jalan" class="btn btn-success" onclick="simpan_perbaikan()">Selesai</button>');

                $.post(url, {
                    id: kd_gag
                }, function(data) {
                    // tampilkan gangguan.form.php ke dalam <div class="modal-body"></div>
                    $(".modal-body").html(data).show();
                });
                ubah();
            },
            hapus: function(idhapus) {
                // ketika tombol hapus ditekan

                var main = "pages/cs/mod/gangguan/gangguan.data.php";
                var url = "pages/cs/mod/gangguan/gangguan.input.php";
                // ambil nilai id dari tombol hapus
                kd_mhs = idhapus;
                console.log(kd_mhs);
                console.log(idhapus + ' gg');
                console.log(kd_mhs + ' ffff');
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
                        $("#menu-gangguan").load(menu2);
                    });
                }
            },
            hapus_SJ: function(idhapus) {
                // ketika tombol hapus_SJ ditekan

                var main = "pages/cs/mod/gangguan/gangguan.data.php";
                var url = "pages/krd/gangguan.input.php";
                // ambil nilai id dari tombol hapus
                kd_mhs = idhapus;
                console.log(kd_mhs);
                console.log(idhapus + ' gg');
                console.log(kd_mhs + ' ffff');
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
                        $("#menu-gangguan").load(menu2);
                    });
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
                    $("#menu-gangguan").load(menu2);
                    list_surat();
                    }); 
                    console.log(id_g);
                    $.post(url_print,{id: id_s, gangguan: id_g, karyawan: id_k}, function(data) {
                    $("#menu-gangguan").load(menu2); 
                    window.open(url_print+'?id=SJ'+id_s+'&gangguan=MT'+id_g+'&karyawan=KR'+id_k);
                    });       
                }
            }
        }

    }(jQuery);
//-->

$('[data-toggle="tooltip"]').tooltip();
$('#DataTableGangguan').DataTable({});
$('#DataTableGangguan').DataTable({});
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