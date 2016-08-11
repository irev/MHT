(function($) {
	// fungsi dijalankan setelah seluruh dokumen ditampilkan
	$(document).ready(function(e) {
		//
		// deklarasikan variabel
		var kd_mhs = 0;
		var main = "pages/web/mod/gangguan/gangguan.data.php";
		var menu2 = "pages/web/mod/gangguan/gangguan.menu.php";
		
		// tampilkan data mahasiswa dari berkas mahasiswa.data.php 
		// ke dalam <div id="data-mahasiswa"></div>
		$("#data-gangguan").load(main);
		$("#menu-gangguan").load(menu2);
		
		// ketika tombol ubah/tambah di tekan
		$('.tambah').on("click", function(e){
			
			var url = "pages/cs/mod/gangguan/gangguan.form.php";
			
			// ambil nilai id dari tombol ubah
			// kd_mhs = this.id;
			var kd_mhs = $(this).attr("id");
			console.log(kd_mhs);
				// saran dari mas hangs 
				$("#myModalLabel").html("Tambah Data Gangguan");
			$.post(url, {id: kd_mhs} ,function(data) {
				// tampilkan mahasiswa.form.php ke dalam <div class="modal-body"></div>
				$(".modal-body").html(data).show();
			});
		});

	

		// ketika tombol hapus ditekan
		$('.hapus').on("click", function(){
			var url = "pages/cs/mod/gangguan/gangguan.input.php";
			// ambil nilai id dari tombol hapus
			kd_mhs = this.id;
			
			// tampilkan dialog konfirmasi
			var answer = confirm("Apakah anda ingin mengghapus data ini?");
			
			// ketika ditekan tombol ok
			if (answer) {
				// mengirimkan perintah penghapusan ke berkas input.php
				$.post(url, {hapus: kd_mhs} ,function() {
					// tampilkan data yang sudah di perbaharui
					// ke dalam <div id="data"></div>
					$("#data-gangguan").load(main);
				});
			}
		});
		
		// ketika tombol simpan ditekan
		$("#simpan-data").bind("click", function(event) {
			var url = "pages/cs/mod/gangguan/gangguan.input.php";
			// mengambil nilai dari inputbox, textbox dan select
			var kd_mhs 			= $('input:text[name=kd]').val();
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
console.log(v_kode+' '+v_pelapor+' '+v_pelanggan+' '+v_tgl_gangguan+' '+v_tgl_pelaporan+' '+kd_mhs);
			// mengirimkan data ke berkas transaksi.input.php untuk di proses
			$.post(url, {kode: v_kode, pelapor: v_pelapor, pelanggan: v_pelanggan, tgl_gangguan: v_tgl_gangguan, tgl_pelaporan:v_tgl_pelaporan, keterangan: v_keterangan, status: v_status, id: kd_mhs} ,function() {
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
	});
}) (jQuery);




var getform = function(){
var ubah = function(idubh){
}
var SuratJalan = function(idubh){
}
var hapus = function(idg){
}
var print =function(idsur){

}
return{
	ubah: function(idubh) {
		 kd_gag = String(idubh);
		 console.log(idubh+' gg');
		 console.log(kd_gag+' ffff');
		 var url = "pages/cs/mod/gangguan/gangguan.form.php";

		 	$("#myModalLabel").html("Ubah Data Gangguan");
			$.post(url, {id: kd_gag} ,function(data) {
				// tampilkan gangguan.form.php ke dalam <div class="modal-body"></div>
				$(".modal-body").html(data).show();
			});
    ubah();
	},
	SuratJalan: function(idubh) {
		 kd_gag = String(idubh);
		 console.log(idubh+' gg');
		 console.log(kd_gag+' ffff');
		 var url = "pages/krd/mod/gangguan/gangguan.form.php";

		 	$("#myModalLabel").html("Ubah Data Gangguan");
			$.post(url, {id: kd_gag} ,function(data) {
				// tampilkan gangguan.form.php ke dalam <div class="modal-body"></div>
				$(".modal-body").html(data).show();
			});
    ubah();
	},
	print: function(idg,idsur){
		//var url = "pages/cs/mod/gangguan/gangguan.surat.print.php";
		var url = "pages/web/print.php";
		console.log(idg+' '+idsur);
		//var url = "dashboard.php?cat=web&page=print";
		//var url = "dashboard.php?cat=web&page=faktur_k_print";
			$("#myModalLabel").html("Print Surat Tugas");
			$("#simpan-data").css('visibility', 'hidden');
			$.post(url, {id: idsur} ,function(data) {
				// tampilkan gangguan.form.php ke dalam <div class="modal-body"></div>
				$(".modal-body").html(data).show();
			});
	},
	hapus: function(idhapus) {
				// ketika tombol hapus ditekan

			var main = "pages/cs/mod/gangguan/gangguan.data.php";
			var url  = "pages/cs/mod/gangguan/gangguan.input.php";
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
				$("#data-gangguan").load(main);
				$("#menu-gangguan").load(menu2);
				});
			}	
	}
}
} (jQuery);	