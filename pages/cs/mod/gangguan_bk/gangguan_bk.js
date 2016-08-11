
	var getform = function(){
	var hapus = function(){
		// ketika tombol hapus ditekan
		$('.hapus').on("click", function(){
			var url = "pages/cs/mod/gangguan/gangguan.input.php";
			// ambil nilai id dari tombol hapus
			kd_data = $(this).attr("id");
			console.log(kd_data);
			// tampilkan dialog konfirmasi
			var answer = confirm("Apakah anda ingin mengghapus data ini?");
			
			// ketika ditekan tombol ok
			if (answer) {
				// mengirimkan perintah penghapusan ke berkas transaksi.input.php
				$.post(url, {hapus: kd_data} ,function() {
					// tampilkan data gangguan yang sudah di perbaharui
					// ke dalam <div id="data-gangguan"></div>
					$("#data-gangguan").load(main);
				});
			}
		});
	}		

var simpan = function(){
		// ketika tombol simpan ditekan
		$("#simpan-gangguan").bind("click", function(event) {
			var url = "pages/cs/mod/gangguan/gangguan.input.php";
			var kd_data = $(this).attr("id");
			// mengambil nilai dari inputbox, textbox dan select
			var v_id = $('input:text[name=id]').val();
			var v_pelapor = $('input:text[name=pelapor]').val();
			var v_pelanggan = $('select[name=pelanggan]').val();
			var v_tanggal = $('input:text[name=tgl_pelapor]').val();
			var v_tgl_gangguan = $('input:text[name=tgl_gangguan]').val();
			var v_gangguan = $('input:text[name=gangguan]').val();
			var v_ket = $('textarea[name=ket]').val();
			var v_status = $('select[name=status]').val();

			// mengirimkan data ke berkas transaksi.input.php untuk di proses
			$.post(url, {id: kd_data, pelapor: v_pelapor, tgl_pelapor: v_tanggal, v_tgl_gangguan: tgl_gangguan, gangguan: v_gangguan, ket: v_ket, status: status} ,function() {
console.log(v_id +' '+v_pelapor+' '+v_pelanggan+' '+v_tanggal+' '+v_tgl_gangguan+' '+v_gangguan+' '+v_ket+' '+v_status );
	
				// tampilkan data gangguan yang sudah di perbaharui
				// ke dalam <div id="data-gangguan"></div>
				$("#data-gangguan").load(main);

				// sembunyikan modal dialog
				$('#dialog-gangguan').modal('hide');
				
				// kembalikan judul modal dialog
				$("#myModalLabel").html("Tambah Data gangguan");
			});
		});
	}

//JIKA KLIK UBAH / TAMBAH

	var ubah = function(){	
	//$('.modal-body')[0].reset();	
		$('.ubah').on("click", function(){	
			var url = "pages/cs/mod/gangguan/gangguan.form.php";
			// ambil nilai id dari tombol ubah
			var kd_data = $(this).attr("id");
			// tampilkan gangguan.form.php ke dalam <div class="modal-body"></div>
				// ubah judul modal dialog
				$.post(url, {id: kd_data} ,function(data) {
					$("#myModalLabel").html("Ubah Data Gangguan");
					$('#add-gangguan').modal('show'); 
					$(".modal-body").html(data).show();
				});	
				
			console.log(kd_data);
		});
		}
var batal = function(){
$('.batal').on("click", function(){
$('.modal-body').html().reset();	
});
}
	var tambah = function(){
		
		$('.tambah').on("click", function(){
			var url = "pages/cs/mod/gangguan/gangguan.form.php";
			var kd_data = $(this).attr("id");

			// ambil nilai id dari tombol ubah
			// tampilkan gangguan.form.php ke dalam <div class="modal-body"></div>
				$.post(url, {id: kd_data} ,function(data) {
					$("#myModalLabel").html("Ubah Data Gangguan");
					$('#add-gangguan').modal('show'); 
					$(".modal-body").html(data).show();
				});		
			console.log(kd_data);
		});
		}

		var ditel = function(){
		    var kd_datas = $(this).attr("id");
			var urls = "pages/cs/mod/gangguan/gangguan.ditel.php";
			$('.ditel').on("click", function(){
			$.post(urls, {ids: kd_datas} ,function(datas) {
				// tampilkan gangguan.form.php ke dalam <div class="modal-body"></div>
				$('#ditel-gangguan').modal('show'); 
				$(".load-ditel").html(datas).show();
			});
			console.log(kd_datas);
		});
		}

	return {
  		ubah: function() {
    	ubah();
  		},
  		tambah: function() {
    	tambah();
  		},
  		hapus: function() {
    	hapus();
		},
  		simpan: function() {
    	simpan();
		},
		ditel: function() {
    	ditel();
		},
		batal: function() {
    	batal();
		}
	}
	}(jQuery);

