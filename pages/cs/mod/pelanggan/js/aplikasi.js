(function($) {
	// fungsi dijalankan setelah seluruh dokumen ditampilkan
	$(document).ready(function(e) {
		//
		// deklarasikan variabel
		var kd_mhs = 0;
		var main = "pages/cs/mod/pelanggan/pelanggan.data.php";
		var menu2 = "pages/cs/mod/pelanggan/pelanggan.menu.php";
		
		// tampilkan data mahasiswa dari berkas mahasiswa.data.php 
		// ke dalam <div id="data-mahasiswa"></div>
		$("#data-pelanggan").load(main);
		$("#menu-pelanggan").load(menu2);
		
		// ketika tombol ubah/tambah di tekan
		$('.tambah').on("click", function(e){
			
			var url = "pages/cs/mod/pelanggan/pelanggan.form.php";
			
			// ambil nilai id dari tombol ubah
			// kd_mhs = this.id;
			var kd_mhs = $(this).attr("id");
			console.log(kd_mhs);
				// saran dari mas hangs 
				$("#myModalLabel").html("Tambah Data pelanggan");
			$.post(url, {id: kd_mhs} ,function(data) {
				// tampilkan mahasiswa.form.php ke dalam <div class="modal-body"></div>
				$(".modal-body").html(data).show();
			});
		});

	

		// ketika tombol hapus ditekan
		$('.hapus').on("click", function(){
			var url = "pages/cs/mod/pelanggan/pelanggan.input.php";
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
					$("#data-pelanggan").load(main);
					$("#menu-pelanggan").load(main2);
				});
			}
		});
		
		// ketika tombol simpan ditekan
		$("#simpan-data").bind("click", function(event) {
	  var url = "pages/cs/mod/pelanggan/pelanggan.input.php";
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
        //$("#data-pelanggan").load(main);
       // $('#msg').addClass('hide')
          $('#msg').html(
            '<div class="alert alert-success alert-dismissable">'+
                    '<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>'+
                    '<h4><i class="icon fa fa-ban"></i> Alert!</h4>'+
                    'Data berhasil disimpan!'+
            '</div>'  
          );

          $('#msg').slideDown('slow').delay(1500).slideUp('slow', function(){
              pelanggan_baru();
            });
      });
      }else{
        //alert('Data Belum terisi dengan benar!');
        //$('#msg').html();
        $("#msg").html(
          '<div class="alert alert-danger alert-dismissable">'+
                    '<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>'+
                    '<h4><i class="icon fa fa-ban"></i> Alert!</h4>'+
                    'Data belum terisi dengan benar!'+
          '</div>' 
          );
          $('#msg').slideDown('slow').delay(1500).slideUp('slow');
      }
		});
	});
}) (jQuery);




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
		 console.log(idubh+' gg');
		 console.log(kd_gag+' ffff');
		 var url = "pages/cs/mod/pelanggan/pelanggan.form.php";

		 	$("#myModalLabel").html("Ubah Data pelanggan");
			$.post(url, {id: kd_gag} ,function(data) {
			//	alert(kd_gag);
        		$('#data-pelanggan').load(url+"?id="+kd_gag);

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

			var main = "pages/cs/mod/pelanggan/pelanggan.data.php";
			var url  = "pages/cs/mod/pelanggan/pelanggan.input.php";
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
				$("#data-pelanggan").load(main);
				$("#menu-pelanggan").load(menu2);
				});
			}	
	}
}
} (jQuery);	