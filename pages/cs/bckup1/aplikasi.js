(function($) {
	// fungsi dijalankan setelah seluruh dokumen ditampilkan
	$(document).ready(function(e) {
		
		// deklarasikan variabel
		var kd_mhs = 0;
		var main = "pages/cs/mahasiswa.data.php";
		var menu = "pages/cs/gangguan.menu.php";
		
		// tampilkan data mahasiswa dari berkas mahasiswa.data.php 
		// ke dalam <div id="data-mahasiswa"></div>
		$("#data-mahasiswa").load(main);
		$("#menu-gangguan").load(menu);
		
		// ketika tombol ubah/tambah di tekan
		$('.tambah,.ubah').on("click", function(e){
			
			var url = "pages/cs/mahasiswa.form.php";
			// ambil nilai id dari tombol ubah
			// kd_mhs = this.id;
			var kd_mhs = $(this).attr("id");
			console.log(kd_mhs);
			if(kd_mhs != 0) {
				// ubah judul modal dialog
				$("#myModalLabel").html("Ubah Data Gangguan");
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
			var url = "pages/cs/mahasiswa.input.php";
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
					$("#data-mahasiswa").load(main);
				});
			}
		});
		
		// ketika tombol simpan ditekan
		$("#simpan-mahasiswa").bind("click", function(event) {
			var url = "pages/cs/mahasiswa.input.php";
			var kd_mhs = $('input:text[name=kd]').val();
			// mengambil nilai dari inputbox, textbox dan select
			var v_nim = $('input:text[name=nim]').val();
			var v_nama = $('input:text[name=nama]').val();
			var v_alamat = $('textarea[name=alamat]').val();
			var v_kelas = $('select[name=kelas]').val();
			var v_status = $('select[name=status]').val();
console.log(v_nim+' '+v_nama+' '+v_alamat+' '+v_kelas+' '+v_status+' '+kd_mhs);
			// mengirimkan data ke berkas transaksi.input.php untuk di proses
			$.post(url, {nim: v_nim, nama: v_nama, alamat: v_alamat, kelas: v_kelas, status: v_status, id: kd_mhs} ,function() {
				// tampilkan data mahasiswa yang sudah di perbaharui
				// ke dalam <div id="data-mahasiswa"></div>
				$("#data-mahasiswa").load(main);

				// sembunyikan modal dialog
				$('#dialog-mahasiswa').modal('hide');
				
				// kembalikan judul modal dialog
				$("#myModalLabel").html("Tambah Data Mahasiswa");
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
	ubah: function(idg) {
		 var kd_mhs = idg;
		 console.log(kd_mhs);
		 var url = "pages/cs/mahasiswa.form.php";
		 	$("#myModalLabel").html("Ubah Data Gangguan");
			$.post(url, {id: kd_mhs} ,function(data) {
				// tampilkan mahasiswa.form.php ke dalam <div class="modal-body"></div>
				$(".modal-body").html(data).show();
			});
    ubah();
	},
	hapus: function(idg) {
				// ketika tombol hapus ditekan
			var main = "pages/cs/mahasiswa.data.php";
			var url = "pages/cs/mahasiswa.input.php";
			// ambil nilai id dari tombol hapus
			kd_mhs = idg;
			
			// tampilkan dialog konfirmasi
			var answer = confirm("Apakah anda ingin mengghapus data ini?");
			
			// ketika ditekan tombol ok
			if (answer) {
				// mengirimkan perintah penghapusan ke berkas transaksi.input.php
				$.post(url, {hapus: kd_mhs} ,function() {
					// tampilkan data mahasiswa yang sudah di perbaharui
					// ke dalam <div id="data-mahasiswa"></div>
					$("#data-mahasiswa").load(main);
				});
			}

		
	}

}
} (jQuery);	