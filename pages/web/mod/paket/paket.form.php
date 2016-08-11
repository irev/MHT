<?php
////////////////////////////////
// PROGRAM SKRIPSI MHT
// Refyandra
// gangguan.form.php 
// edit 6 juni 2016
// usercase CUSTOMER SERVICE
/////////////////////////////////
require("../../../../_db.php"); 

 $kd_mhs = 'PK'.sprintf("%03s",$_POST['id']);

// query untuk menampilkan berdasarkan kd
$data = mysql_fetch_array(mysql_query("SELECT tb_gangguan.*, tb_pelanggan.nama, tb_pelanggan.alamat FROM `tb_gangguan` JOIN tb_pelanggan WHERE tb_gangguan.id_pelanggan=tb_pelanggan.id_pelanggan AND id_gangguan='$kd_mhs'"));
// jika kd > 0 / form ubah data
if(substr($kd_mhs, 2, 3) != 0) { 
//echo'<script>alert("EDIT");</script>';	
	$id_gangguan = $data['id_gangguan'];
	$pelapor = $data['pelapor'];
	$pelanggan = $data['nama'];
	$id_pelanggan = $data['id_pelanggan'];
	$tgl_gangguan = $data['tgl_gangguan'];
	$tgl_pelaporan = $data['tgl_pelaporan'];
	$ket = $data['keterangan'];
	$alamat = $data['alamat'];
	$kd_status = $data['status_gangguan'];
	
	if($data['status_gangguan']==1) {
		$status = "Aktif";
	} else {
		$status = "Tidak Aktif";
	}

//form tambah data
} else {
	//echo'<script>alert("buat baru");</script>';	
//no faktur auto
   $qkdf = mysql_query("SELECT MAX(id_paket) as kodex FROM tb_paket");
   $data=mysql_fetch_array($qkdf);
   $kodef = $data['kodex'];
   $nourut = substr($kodef, 2, 5);
   //$nourut++;
   if ($nourut==0){
    $nourut=1;
    $notr =sprintf("%03s", $nourut) ; 
   }else{
    $nourut++;
    $notr = sprintf("%03s", $nourut) ; 
   }
  //end no faktur auto 
	$id_gangguan = "PK".$notr;
	$pelapor ="";
	$pelanggan ="";
	$tgl_gangguan = "";
	$tgl_pelaporan = date('Y-m-d H:i:s');
	$ket = "";
	$alamat = "";
	$status = "";
}

?>
<form class="form-horizontal" id="form-mahasiswa">
<input type="text" id="kd" class="form-control" name="kd" value="<?php echo $kd_mhs ?>" style="display: none;">
<input type="text" id="status" class="form-control" name="status" value="0" style="display: none;">	
	<div class="form-group">
		<label for="id" class="col-sm-2 control-label">Kode</label>
			<div class=" col-sm-10 controls">
			<input type="text" id="kode" class="form-control" name="kode" readonly="" value="<?php echo $id_gangguan ?>">
		</div>
	</div>
	<div class="form-group">
		<label for="id" class="col-sm-2 control-label">Nama Paket</label>
			<div class=" col-sm-10 controls">
			<input type="text" id="nama" class="form-control" name="nama" value="<?php echo $pelapor ?>">
		</div>
	</div>
	<!--div class="form-group">
		<label for="id" class="col-sm-2 control-label">pelanggan</label>
			<div class=" col-sm-10 controls">
			<select class="form-control" name="pelanggan">
				<?php 
				// tampilkan untuk form ubah mahasiswa
				if($kd_mhs > 0) { ?>
					<option value="<?php echo $id_pelanggan ?>"><?php echo $pelanggan ?></option>
				<?php } 
				$query = mysql_query("SELECT * FROM tb_pelanggan");
				while($data2 = mysql_fetch_array($query)) {
					$nama = $data2['nama']."] ";
					echo "<option value=".$data2['id_pelanggan'].">".$data2['id_pelanggan']." [".$nama." ".$data2['alamat']."</option>";
				}
				?>
			</select>
		</div>
	</div-->
	<!--div class="form-group">
		<label for="id" class="col-sm-2 control-label">Tgl Gangguan</label>
			<div class=" col-sm-10 controls">
			<input type="text" id="tgl_gangguan" class="form-control" name="tgl_gangguan" data-inputmask="'alias': 'dd/mm/yyyy'" data-mask="" value="<?php echo $tgl_gangguan ?>">
		</div>
	</div>
	<div class="form-group">
		<label for="id" class="col-sm-2 control-label">Tgl Pelaporan</label>
			<div class=" col-sm-10 controls">
			<input type="text" id="tgl_pelaporan" class="form-control" name="tgl_pelaporan" data-inputmask="'alias': 'dd/mm/yyyy'" data-mask="" value="<?php echo $tgl_pelaporan ?>">
		</div>
	</div-->
<div class="form-group">
<label for="id" class="col-sm-2 control-label">Ikon</label>
<div class=" col-sm-10 controls">


<a href="javascript:void(0)" id="btn1" class="btn btn-xs btn-warning">Pilih Ikon Map</a>
<div id="byjson"></div>
<input type="text" id="pilihikon" class="form-control" name="pilihikon" value="rumah_pelanggan.png" style="display: block;">  

<script type="text/javascript">
/*
	   $("img").click(function () {
        var addressValue = $(this).attr("src");
        console.log(addressValue);
        $('input:text[name=ikon]').val(addressValue);
    });
    */
</script>
</div>
</div>

	<div class="form-group">
		<label for="id" class="col-sm-2 control-label">Bandwidth</label>
			<div class=" col-sm-10 controls">
			<input type="text" id="band" placeholder="... Mbps" class="form-control" name="band" value="<?php echo $ket ?>">

			<!--textarea id="keterangan" class="form-control" name="keterangan"><?php echo $ket ?></textarea-->
		</div>
	</div>
	<!--div class="form-group">
		<label for="id" class="col-sm-2 control-label">Status</label>
			<div class=" col-sm-10 controls">
			<select class="form-control" name="status" readonly>
				<?php 
				// tampilkan untuk form ubah mahasiswa
				if($kd_mhs > 0) { ?>
					<option value="<?php echo $kd_status ?>"><?php echo $status ?></option>
				<?php } ?>
				<option value="0">Aktif</option>
				<option value="0">Tidak Aktif</option>
			</select>
		</div>
	</div-->
</form>


<link rel="stylesheet" type="text/css" href="assets/msdropdown/css/dd.css" />
<script src="js/jquery-2.2.1.min.js"></script>
<script type="text/javascript" src="assets/msdropdown/js/jquery.dd.min.js"></script>    

<script>
//menggunakan  msdropdown   assets/msdropdown/js/jquery.dd.min.js
function createByJson() {
var jsonData = [
				{description:'Tampil sebagai Pin pada Map', value:'', text:'Pilih Ikon Map'},
<?php
$dir = "../../../../assets/icon/";
// buka directory, dan ambil semua konten
if (is_dir($dir)){
  if ($dh = opendir($dir)){
    while (($image = readdir($dh)) !== false){
    switch ($image) {
     case ".":
     	break;
     case "..":
     	break;	
     default:
     //echo '<option value="'.$image.'" data-image="'.$image.'">'.$image.'</option>';
    echo 	"{image:'assets/icon/".$image."', description:'', value:'".$image."', text:'".$image."'},";
    }
    }
    closedir($dh);
  }
}
?>
{description:'Tampil sebagai Pin pada Map', value:'', text:'Pilih Ikon Map'}
];

/*
	var jsonData = [					
					{description:'Choos your payment gateway', value:'', text:'Payment Gateway'},					
					{image:'assets/msdropdown/img/icons/Amex-56.png', description:'My life. My card...', value:'amex', text:'Amex'},
					{image:'assets/msdropdown/img/icons/Discover-56.png', description:'It pays to Discover...', value:'Discover', text:'Discover'},
					{image:'assets/msdropdown/img/icons/Mastercard-56.png', title:'For everything else...', description:'For everything else...', value:'Mastercard', text:'Mastercard'},
					{image:'assets/msdropdown/img/icons/Cash-56.png', description:'Sorry not available...', value:'cash', text:'Cash on devlivery', disabled:true},
					{image:'assets/msdropdown/img/icons/Visa-56.png', description:'All you need...', value:'Visa', text:'Visa'},
					{image:'assets/msdropdown/img/icons/Paypal-56.png', description:'Pay and get paid...', value:'Paypal', text:'Paypal'}
					];

*/
    // membuat <select id="msdropdown20" name="pilihikon" style="width: 250px;" tabindex="-1">
	var jsn = $("#byjson").msDropDown({byJson:{data:jsonData, name:'pilihikon'}}).data("dd"); 
    
}
$("#btn1").on("click", function() {
	createByJson();
	var iko = $(".selected").val();
    console.info(iko); 
	$(this).hide();
});
$('#pilihikon').on('click',function(){
	var iko = $( this ).val();
	//var iko = $(".selected").val();
    console.info(iko); 
})

</script>    