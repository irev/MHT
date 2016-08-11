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
			var url = "gangguan.input.php";

			// mengambil nilai dari inputbox, textbox dan select
			var v_nim = $('input:text[name=nim]').val();
			var v_nama = $('input:text[name=nama]').val();
			var v_alamat = $('textarea[name=alamat]').val();
			var v_kelas = $('select[name=kelas]').val();
			var v_status = $('select[name=status]').val();

			// mengirimkan data ke berkas transaksi.input.php untuk di proses
			$.post(url, {nim: v_nim, nama: v_nama, alamat: v_alamat, kelas: v_kelas, status: v_status, id: kd_data} ,function() {
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
	$('#add-gangguan')[0].reset();	
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

	var tambah = function(){
		$('#add-gangguan')[0].reset();	
		$('.tambah').on("click", function(){
			var url = "pages/cs/mod/gangguan/gangguan.form.php";
			var kd_data = $(this).attr("id");

			// ambil nilai id dari tombol ubah
			// tampilkan gangguan.form.php ke dalam <div class="modal-body"></div>
				$("#myModalLabel").html("Tambah Data Gangguan");
				$('#add-gangguan').modal('show'); 
				$(".modal-body").html(data).show();			
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
		}
	}
	}(jQuery);

