<?php 
//////////////////////////////
// PROGRAM SKRIPSI MHT
// Refyandra
// web/teknisi.php 
// edit 21 juni 2016
// usercase CUSTOMER SERVICE
///////////////////////////////
session_start();
if(!isset($_SESSION['login_hash'])){
  echo "<script>alert('anda harus login dulu..!');</script>";
} 

?>
<script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"></script>
<script type="text/javascript">
//Atribut halaman
$('#judulhal').text('Data Perangkat');
$('#breadcrumb').text('Perangkat');

	    //Fungsi Menu
    function list_allpelanggan(){
        $(this).addClass('active');
        $('#data-pelanggan').load('pages/cs/mod/pelanggan/pelanggan.alldata.php');
    }
    function list_pelanggan(){
        $(this).addClass('active');
        $('#data-pelanggan').load('pages/cs/mod/pelanggan/pelanggan.data.php');
    }  
    function list_done(){
        $(this).addClass('active');
        //$(this).removeClass("tot");
        $('#data-pelanggan').load('pages/cs/mod/pelanggan/pelanggan.done.php');
    }
    function list_OnProccess(){
        $(this).addClass('active');
        $('#data-pelanggan').load('pages/cs/mod/pelanggan/pelanggan.OnProccess.php');
    } 
    function list_Pending(){
        $(this).addClass('active');
        $('#data-pelanggan').load('pages/cs/mod/pelanggan/pelanggan.pending.php');
    }
    function list_surat(){
        $(this).addClass('active');
        $('#data-pelanggan').load('pages/cs/mod/pelanggan/pelanggan.surat.php');
    }
    
    //TEKNISI 
    function list_teknisi(){
        $('#data-pelanggan').load('pages/web/mod/teknisi/teknisi.data.php');
    }      
    function ditail_teknisi(){
        $('#data-pelanggan').load('pages/web/mod/teknisi/teknisi.detail.php');
    } 


    function pelanggan_baru(){
        $('#data-pelanggan').load('pages/cs/mod/pelanggan/pelanggan.form.php');
    }  
    function list_baru(){
        $('#data-pelanggan').load('pages/web/mod/pelanggan/pelanggan.baru.php');
    } 
    function list_aktif(){
        $('#data-pelanggan').load('pages/web/mod/pelanggan/pelanggan.aktif.php');
    } 
    function list_cuti(){
        $('#data-pelanggan').load('pages/web/mod/pelanggan/pelanggan.cuti.php');
    }  
    function list_block(){
        $('#data-pelanggan').load('pages/web/mod/pelanggan/pelanggan.block.php');
    }  
</script>
<section class="content">
<div class="row">
<!--h3>Data pelanggan 
			<a href="#dialog-data" id="0" class="btn btn-success tambah" data-toggle="modal">
				<i class="fa fa-plus"></i> Tambah Data
			</a>
</h3-->
<script type="text/javascript">
$('#data-widgets').load('pages/web/widgets.prangkat.php');
$('#data-all').load('pages/web/mod/perangkat/perangkat.data.php?status=0&ket=all');
function dataall(){
 $('#data-all').load('pages/web/mod/perangkat/perangkat.data.php?status=0&ket=all');
}
function datastok(){
 $('#data-stok').load('pages/web/mod/perangkat/perangkat.data.php?status=1&ket=STOK');
}
function dataaktif(){
 $('#data-aktif').load('pages/web/mod/perangkat/perangkat.data.php?status=1&ket=1');
}
function databaru(){
 $('#data-baru').load('pages/web/mod/perangkat/perangkat.data.php?status=1&ket=BARU');
}
function databaik(){
 $('#data-baik').load('pages/web/mod/perangkat/perangkat.data.php?status=1&ket=BAIK');
}
function datarusak(){
 $('#data-rusak').load('pages/web/mod/perangkat/perangkat.data.php?status=1&ket=RUSAK');
}
function datablock(){
 $('#data-block').load('pages/web/mod/pelanggan/pelanggan.aktif.php?pelanggan=3&ket=baik');
}
function tabadd(){
 $('#data-add').load('pages/web/mod/perangkat/perangkat.form.php?id=0&ket=baik');
}
  //  $('#data-aktif').load('pages/web/mod/pelanggan/pelanggan.aktif.php?pelanggan=0');
  //  $('#data-stok').load('pages/web/mod/pelanggan/pelanggan.aktif.php?pelanggan=1');
  //  $('#data-cuti').load('pages/web/mod/pelanggan/pelanggan.aktif.php?pelanggan=2');
  //  $('#data-block').load('pages/web/mod/pelanggan/pelanggan.aktif.php?pelanggan=3');
  // $('#data-pelanggan').load('pages/web/mod/pelanggan/pelanggan.aktif.php?pelanggan=4');
</script>
<div id="data-widgets"></div>
<!-- col Data TAB-->
 <div class="col-md-12">
              <div class="nav-tabs-custom">
                <ul class="nav nav-tabs">
                  <li class="active"><a href="#activity" data-toggle="tab"  onclick="dataall()"">Semua</a></li>
                  <li><a href="#tab-stok" data-toggle="tab" onclick="datastok()">Stok</a></li>
                  <li><a href="#tab-aktif" data-toggle="tab" onclick="dataaktif()">Aktif</a></li>
                  <li><a href="#tab-baru" data-toggle="tab" onclick="databaru()">Baru</a></li>
                  <li><a href="#tab-baik" data-toggle="tab" onclick="databaik()">Baik</a></li>
                  <li><a href="#tab-rusak" data-toggle="tab" onclick="datarusak()">Rusak</a></li>
                  <?php if ($_SESSION['login_hash']=='krd' || $_SESSION['login_hash']=='cs'  || $_SESSION['login_hash']=='tek'){ ?>
                  <li><a href="#tab-add" data-toggle="tab" onclick="tabadd()">Tambah Perangkat</a></li>
                  <?php } ?>
                  <li><a href="#settings" data-toggle="tab" onclick="databarux()"></a></li>
                </ul>
                <div class="tab-content">
                  <div class="active tab-pane" id="activity">
                    <!-- Post -->
                        <div id="data-all"></div>
                    <!-- Post -->
                  </div><!-- /.tab-pane -->
                  <div class="tab-pane" id="tab-stok">
                    <!-- Post -->
                        <div id="data-stok"></div>
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
                  <div class="tab-pane" id="tab-baik">
                    <!-- Post -->
                        <div id="data-baik"></div>
                    <!-- Post -->
                  </div><!-- /.tab-pane -->
                  <div class="tab-pane" id="tab-rusak">
                    <!-- Post -->
                        <div id="data-rusak"></div>
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




    <div class="col-md-3">
    <div id="menu-pelanggan"></div>
    </div>
     <div class="col-md-9">
		<!-- tempat untuk menampilkan data  -->
		<div id="data-pelanggan"></div>
	</div>
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
        <button class="btn btn-success" data-dismiss="modal" aria-hidden="true">Selesai</button>
		<button class="btn btn-danger" onclick="batal()" data-dismiss="modal" aria-hidden="true">Batal</button>
		<button id="simpan-data" class="btn btn-success">Simpan</button>
	</div>
	</div>
	</div>
</div>
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
</script>

<script type="text/javascript">

var getform = function(){
var set_koordinat = function(kd_pel){

}
var ubah = function(idubh){
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
         kd_gag = String(idubh);
         console.log(idubh+' idubh');
         console.log(kd_gag+' kd_gag');
         
         var url = "pages/web/mod/perangkat/perangkat.form.php";
console.log( url+"?id="+kd_gag);
            $.post(url, {id: kd_gag} ,function(data) {
            //  alert(kd_gag);
                $('#edit-data').load(url+"?id="+kd_gag);
            // tampilkan perangkat.form.php ke dalam <div class="modal-body"></div>
                $(".modal-body").html(data).show();
            });
    ubah();
    },
    print: function(idg,idsur){
        //var url = "pages/cs/mod/perangkat/perangkat.surat.print.php";
        var url = "pages/web/print.php";
        console.log(idg+' '+idsur);
        //var url = "dashboard.php?cat=web&page=print";
        //var url = "dashboard.php?cat=web&page=faktur_k_print";
            $("#myModalLabel").html("Print Surat Tugas");
            $("#simpan-data").css('visibility', 'hidden');
            $.post(url, {id: idsur} ,function(data) {
                // tampilkan perangkat.form.php ke dalam <div class="modal-body"></div>
                $(".modal-body").html(data).show();
            });
    },
    hapus: function(idhapus) {
                // ketika tombol hapus ditekan

            var main = "pages/web/mod/perangkat/perangkat.data.php";
            var url  = "pages/web/mod/perangkat/perangkat.input.php";
            // ambil nilai id dari tombol hapus
            kd_mhs = idhapus;
            console.log(kd_mhs);
            console.log(idhapus+' gg');
            console.log(kd_mhs+' ffff');
            // tampilkan dialog konfirmasi
            var answer = confirm("Apakah anda ingin mengghapus data perangkat ini?");
            
            // ketika ditekan tombol ok
            if (answer) {
                // mengirimkan perintah penghapusan ke berkas transaksi.input.php
                $.post(url, {hapus: kd_mhs} ,function() {
                    // tampilkan data mahasiswa yang sudah di perbaharui
                    // ke dalam <div id="data-mahasiswa"></div>
                //$("#data-pelangan").load(main);
                showpage('pages/web/perangkat.php');
               // $("#menu-pelanggan").load(menu2);
                });
            }   
    }
}
} (jQuery); 
</script>



