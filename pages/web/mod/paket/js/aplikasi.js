(function($) {
	// fungsi dijalankan setelah seluruh dokumen ditampilkan
	$(document).ready(function(e) {
		//
		// deklarasikan variabel
		var kd_mhs = 0;
		var main = "pages/web/mod/paket/paket.data.php";
		var menu2 = "pages/web/mod/paket/paket.menu.php";
		
		// tampilkan data mahasiswa dari berkas mahasiswa.data.php 
		// ke dalam <div id="data-mahasiswa"></div>
		$("#data-paket").load(main);
		$("#menu-paket").load(menu2);
		
		// ketika tombol ubah/tambah di tekan
		$('.tambah').on("click", function(e){
			
			var url = "pages/web/mod/paket/paket.form.php";
			
			// ambil nilai id dari tombol ubah
			// kd_mhs = this.id;
			var kd_mhs = $(this).attr("id");
			console.log(kd_mhs);
				// saran dari mas hangs 
				$("#myModalLabel").html("Tambah Data paket");
			$.post(url, {id: kd_mhs} ,function(data) {
				// tampilkan mahasiswa.form.php ke dalam <div class="modal-body"></div>
				$(".modal-body").html(data).show();
			});
		});

	

		// ketika tombol hapus ditekan
		$('.hapus').on("click", function(){
			var url = "pages/cs/mod/paket/paket.input.php";
			// ambil nilai id dari tombol hapus
			var kd_mhs = this.id;
			var paket = $(this).attr('href');
			
			// tampilkan dialog konfirmasi
			var answer = confirm("Apakah anda ingin mengghapus data paket "+paket+" ini?" + kd_mhs);
			
			// ketika ditekan tombol ok
			if (answer) {
				// mengirimkan perintah penghapusan ke berkas input.php
				$.post(url, {hapus: kd_mhs} ,function() {
					// tampilkan data yang sudah di perbaharui
					// ke dalam <div id="data"></div>
					$("#data-paket").load(main);
				});
			}
		});
		
		// ketika tombol simpan ditekan
		$("#simpan-data").bind("click", function(event) {
			var url = "pages/web/mod/paket/paket.input.php";
			// mengambil nilai dari inputbox, textbox dan select
			var kd_mhs      = $('input:text[name=kd]').val();
			var v_kode      = $('input:text[name=kode]').val();
			var v_paket     = $('input:text[name=nama]').val();
			var v_ikon      = $('select[name=pilihikon]').val();
			var v_bandw 		= $('input[name=band]').val();
			// var v_bandw = document.getElementById("band");

var dataPaket = $('form').serialize();
if(v_kode=='' || v_paket=='' || v_ikon=='' || v_bandw=='') 
{
	console.log(dataPaket);
	alert('input msih ada yg kosong post paket');
}else{
// POST AJAX		
var dataPaket = $('form').serialize();
$.ajax({
  url: url,
  method: "POST",
  data: dataPaket,
  dataType: "json",
  success: function(respon){
				// sembunyikan modal dialog
				$('#dialog-paket').modal('hide');
				// kembalikan judul modal dialog
				$("#myModalLabel").html("");
				alert(respon.msg);
  }
},'json');// ajax end
}// is cek end


		});
	});
}) (jQuery);




var getform = function(){
var tambah = function(kd){
}
var ubah = function(idubh){
}
var hapus = function(idg){
}
var print =function(idsur){
}
var tambah= function(){} 
return{
	ubah: function(idubh) {
		 kd_gag = String(idubh);
		 console.log(idubh+' gg');
		 console.log(kd_gag+' ffff');
		 var url = "pages/web/mod/paket/paket.form.php";

		 	$("#myModalLabel").html("Ubah Data paket");
			$.post(url, {id: kd_gag} ,function(data) {
				// tampilkan paket.form.php ke dalam <div class="modal-body"></div>
				$(".modal-body").html(data).show();
			});
    ubah();
	},
	print: function(idg,idsur){
		//var url = "pages/cs/mod/paket/paket.surat.print.php";
		var url = "pages/web/print.php";
		console.log(idg+' '+idsur);
		//var url = "dashboard.php?cat=web&page=print";
		//var url = "dashboard.php?cat=web&page=faktur_k_print";
			$("#myModalLabel").html("Print Surat Tugas");
			$("#simpan-data").css('visibility', 'hidden');
			$.post(url, {id: idsur} ,function(data) {
				// tampilkan paket.form.php ke dalam <div class="modal-body"></div>
				$(".modal-body").html(data).show();
			});
	},
	tambah: function(kd){

			var url = "pages/web/mod/paket/paket.form.php";
			
			// ambil nilai id dari tombol ubah
			// kd_mhs = this.id;
			var kd_mhs = $(this).attr("id");
			console.log(kd_mhs);
				// saran dari mas hangs 
				$("#myModalLabel").html("Tambah Data paket");
			$.post(url, {id: kd} ,function(data) {
				// tampilkan mahasiswa.form.php ke dalam <div class="modal-body"></div>
				$(".modal-body").html(data).show();
			});
	},
	hapus: function(idhapus) {
				// ketika tombol hapus ditekan

			var main = "pages/web/mod/paket/paket.data.php";
			var url  = "pages/web/mod/paket/paket.input.php";
			// ambil nilai id dari tombol hapus
			kd_mhs = idhapus;
			// tampilkan dialog konfirmasi
			var answer = confirm("Apakah anda ingin mengghapus paket ini?");
			
			// ketika ditekan tombol ok
			if (answer) {
				// mengirimkan perintah penghapusan ke berkas transaksi.input.php
				$.post(url, {hapus: kd_mhs} ,function() {
					// tampilkan data mahasiswa yang sudah di perbaharui
					// ke dalam <div id="data-mahasiswa"></div>
				$("#data-paket").load(main);
				$("#menu-paket").load(menu2);
				});
			}	
	}
}
} (jQuery);	