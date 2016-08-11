////////////////////////////////
// PROGRAM SKRIPSI MHT
// Refyandra
// aplikasi.js 
// edit 6 juni 2016
// usercase KOORDINATOR
/////////////////////////////////

(function($) {
	// fungsi dijalankan setelah seluruh dokumen ditampilkan
	$(document).ready(function(e) {
		
		// deklarasikan variabel
		var kd_mhs = 0;
		var main = "pages/tek/mod/gangguan/gangguan.data.php";
		var menu2 = "pages/tek/mod/gangguan/gangguan.menu.php";
		
		// tampilkan data mahasiswa dari berkas mahasiswa.data.php 
		// ke dalam <div id="data-mahasiswa"></div>
		$("#data-gangguan").load(main);
		$("#menu-gangguan").load(menu2);
		
		// ketika tombol ubah/tambah di tekan
		$('.tambah,.ubah').on("click", function(e){
			
			var url = "pages/tek/mod/gangguan/gangguan.form.php";
			// ambil nilai id dari tombol ubah
			// kd_mhs = this.id;
			var kd_mhs = $(this).attr("id");
			console.log(kd_mhs);
			if(kd_mhs != 0) {
				// ubah judul modal dialog
				$("#myModalLabel").html("Tunjuk Teknisi Kelapangan");
			} else {
				// saran dari mas hangs 
				$("#myModalLabel").html("Tambah Data Gangguan");
			}

			$.post(url, {id: kd_mhs} ,function(data) {
				// tampilkan mahasiswa.form.php ke dalam <div class="modal-body"></div>
				$(".modal-body").html(data).show();
			});
		});

	

		// ketika tombol hapus ditekan
		$('.hapus').on("click", function(){
			var url = "pages/tek/mod/gangguan/gangguan.input.php";
			// ambil nilai id dari tombol hapus
			kd_mhs = this.id;
			
			// tampilkan dialog konfirmasi
			var answer = confirm("Apakah anda ingin mengghapus data ini?");
			
			// ketika ditekan tombol ok
			if (answer) {
				// mengirimkan perintah penghapusan ke berkas transaksi.input.php
				$.post(url, {hapus: kd_mhs} ,function() {
					// tampilkan data mahasiswa yang sudah di perbaharui
					// ke dalam <div id="data-mahasiswa"></div>
					$("#data-gangguan").load(main);
				});
			}
		});
		
		// ketika tombol simpan ditekan
		$("#simpan-mahasiswa").bind("click", function(event) {
			var url = "pages/tek/mod/gangguan/gangguan.input.php";
			// mengambil nilai dari inputbox, textbox dan select
			var kd_mhs 			= $('input:text[name=kd]').val();
			var v_kd_surat		= $('input:text[name=kdsurat]').val();
			var v_teknisi	 	= $('select[name=teknisi]').val();
			var v_tgl_surat		= $('input:text[name=tgl_surat]').val();
			var v_status_gangguan 	= $('input:text[name=status_gangguan]').val();

			var v_kode 			= $('input:text[name=kode]').val();
			var v_pelapor		= $('input:text[name=pelapor]').val();
			var v_pelanggan 	= $('select[name=pelanggan]').val();
			var v_tgl_gangguan 	= $('input:text[name=tgl_gangguan]').val();
			var v_tgl_pelaporan	= $('input:text[name=tgl_pelaporan]').val();
			var v_keterangan 	= $('textarea[name=keterangan]').val();
			var v_status 		= $('input:text[name=status]').val();


			// Backup
			//var v_nim = $('input:text[name=pelapor]').val();
			//var v_nama = $('input:text[name=nama]').val();
			//var v_alamat = $('textarea[name=alamat]').val();
			//var v_kelas = $('select[name=kelas]').val();
			//var v_status = $('select[name=status]').val();
console.log(v_kode+' '+v_kd_surat+' '+v_teknisi+' '+v_tgl_surat+'  '+kd_mhs);
			// mengirimkan data ke berkas transaksi.input.php untuk di proses
			$.post(url, {kode: v_kode, kdsurat: v_kd_surat, teknisi: v_teknisi, tgl_surat: v_tgl_surat, tgl_pelaporan:v_tgl_pelaporan, keterangan: v_keterangan, status: v_status, id: kd_mhs, kd: kd_mhs } ,function() {
			//$.post(url, {kode: v_kode, pelapor: v_pelapor, pelanggan: v_pelanggan, tgl_gangguan: v_tgl_gangguan, tgl_pelaporan:v_tgl_pelaporan, keterangan: v_keterangan, status: v_status, id: kd_mhs} ,function() {
				// tampilkan data mahasiswa yang sudah di perbaharui
				// ke dalam <div id="data-mahasiswa"></div>
				$("#data-gangguan").load(main);

				// sembunyikan modal dialog
				$('#dialog-mahasiswa').modal('hide');
				
				// kembalikan judul modal dialog
				$("#myModalLabel").html("Tambah Data ");
			});
		});
	});
}) (jQuery);




var getform = function(){
var ubah = function(idg){
}
var hapus = function(idg){
}
return{
	ubah: function(idg,ids) {
		 var kd_g = idg;
		 var kd_s = ids;
		 console.log(kd_g+' '+ids);
		 var url = "pages/tek/mod/gangguan/gangguan.form.php";
if(kd_g != 0){
	$("#myModalLabel").html("Buat Surat Jalan");
} else{
	$("#myModalLabel").html("Edit Surat Jalan");
}
		 	
			$.post(url, {id: kd_g, ids: kd_s} ,function(data) {
				// tampilkan gangguan.form.php ke dalam <div class="modal-body"></div>
				$(".modal-body").html(data).show();
			});
    ubah();
	},
	hapus: function(idg) {
				// ketika tombol hapus ditekan
			var main = "pages/tek/mod/gangguan/gangguan.surat.php";
			var url  = "pages/tek/mod/gangguan/gangguan.input.php";
			// ambil nilai id dari tombol hapus
			kd_mhs = idg;
			console.log(kd_mhs);
			// tampilkan dialog konfirmasi
			var answer = confirm("Apakah anda ingin mengghapus data ini?");
			
			// ketika ditekan tombol ok
			if (answer) {
				// mengirimkan perintah penghapusan ke berkas transaksi.input.php
				$.post(url, {hapus: kd_mhs} ,function() {
					// tampilkan data mahasiswa yang sudah di perbaharui
					// ke dalam <div id="data-mahasiswa"></div>
					$("#data-gangguan").load(main);
				});
			}	
	}
}
} (jQuery);	