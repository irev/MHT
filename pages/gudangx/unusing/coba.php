  <?php
  if(isset($_POST['submit'])){
   
  foreach ($_POST['rows'] as $key => $count ){
  
  $pelanggan = $_POST['pelanggan'];
  $kode      = $_POST['kd_'.$count];
  $tanggal   = date('Y-m-d');
  $nama      = $_POST['nama_'.$count];
  $transaksi = 'TR'.$pelanggan.date('d');
  $harga   = $_POST['harga_'.$count];
  $qty    = $_POST['alamat_'.$count];
 if($_POST['pelanggan']!==''){
 $q2=mysql_query("Select * from data_persediaan where kode_barang='".$kode."'");
  $rw=mysql_fetch_array($q2);
  $rc=mysql_num_rows($q2);
  if($rc==1)
  {
    if($qty <= $rw['stok_tersedia'])
    {
      $query_2 =mysql_query ("INSERT INTO barang_keluar (tgl,kode_barang,transaksi,jumlah) VALUES ('$tanggal','$kode','$transaksi','$qty')");
      if ($query_2) {
      $q3=mysql_query("Update data_persediaan SET keluar=keluar + ".$qty.",stok_tersedia=stok_tersedia - ".$qty." Where kode_barang='".$kode."'");
        if($q3)
        {
          echo "Data sudah disimpan";
          echo "<script language=javascript> alert ('Data Berhasil Di Simpan'); document.location = '?cat=gudang&page=coba'  </script>";
        }
   }
  }else{
    echo "Stok <b>". $nama. "</b> kurang dari ".  $qty;
  }
  }
  } else echo "<br><br><center><blink>Gagal! Terjadi Kesalahan Pelanggan kosong..! </blink></center>";  
  } 
 }//else echo "<br><br><center><blink>Gagal! Terjadi Kesalahan</blink></center>";       

?>


<link rel="stylesheet" href="assets/bootstrap/css/bootstrap.css" />
<script src="js/jquery-2.2.1.min.js"></script>
    <!--script type="text/javascript" src="pages/gudang/js/jquery.js"></script> <!-- ini disesuaikan -->
    <script src="//code.jquery.com/jquery-1.12.1.min.js"></script>
    <script type="text/javascript" src="pages/gudang/js/jquery_append.js"></script> <!-- yang ini juga disesuaikan -->


<div class="col-md-12">
              <!-- general form elements -->
              <div class="box box-primary">
                <div class="box-header with-border">
                  <h3 class="box-title">Barang Keluar</h3>
                </div><!-- /.box-header -->

<form id="id_form" action="" method="post">
<div class="box-tools">
  Pelanggan : <input id="reservation" name="pelanggan" type="text" > No Faktur : <?php echo date('Ymd') ?>
</div>
<div class="table table-striped table-bordered table-hover">
<table class="table table-striped">
  <tr><td colspan="7"><input type="button" name="add_btn" class="btn btn-success" value="Tambah Inputan" id="add_btn" class="btn" /></td></tr>
  <tr><th>No</th><th>Kode Barang</th><th>Tanggal Barang</th><th>Harga@</th><th>Jumlah</th><th>Total</th><th>Aksi</th></tr>
  <tbody id="container">
<tr class="records"><td><div id="1" class="urut">1</div></td><td><input id="kd_1" name="kd_1" onclick="barang(1)" class="input-small" type="text"></td><td><input id="nama_1"  onclick="barang(1)" name="nama_1" class="input-small" type="text"></td><td><input id="harga_1" name="harga_1" class="harga input-small" type="text"></td><td><input style="background-color: rgb(254, 255, 176);" onkeyup="hitung_harga(1)" id="alamat_1" name="alamat_1" class="jumlah_1 input-small" value="0" type="text"></td><td class="totitem"><input id="sum1" class="sum1" value="0" name="input" onclick="totalbelanja()" type="text" readonly></td><td><a id="remove_item" class="remove" href="#">Delete</a><input id="rows_1" name="rows[]" value="1" type="hidden"></td></tr>
  <!-- nanti rows nya muncul di sini --></tbody>
  <tr><td colspan="4"><input type="submit" name="submit" value="Save" class="btn btn-primary" /></td> <td>JUMLAH TOTAL : </td><td class="total-combat" colspan="2"><b>0</b></td><td></td></tr>
</table>
</div>
</form>

</div>
</div>

 <!-- date-picker -->
    <script src="assets/plugins/datepicker/bootstrap-datepicker.js"></script>
   <link rel="stylesheet" href="assets/plugins/datepicker/datepicker3.css">
<script type="text/javascript">
function barang(id_b){
var parent = id_b;
//alert(parent.id);

//var content = parent.querySelector("input");
//alert(content.id);
//window.open('pages/web/_viewbarang.php?list='+content.id,'popuppage','width=500,toolbar=0,resizable=0,scrollbars=no,height=400,top=100');
var pop;
pop = window.open('pages/web/tampil_barang.php?list='+parent,'popuppage','width=500,toolbar=0,resizable=0,scrollbars=no,height=400,top=100');
 pop.window.focus();
}


$(document).ready(function() {

    //this calculates values automatically 
    var idnya = $(".records .urut").attr('id');
      hitung_harga(idnya);
   

    $(".jumlah").on("keydown keyup", function() {
        hitung_harga(idnya);
    }); 

    $('#datepicker').datepicker({
                    format: "dd/mm/yyyy"
                });  
            

});

function hitung_harga(b) {
    //var idnya = $("div.urut").attr('id');
    var idnya = b;
    var jum = $(".jumlah_"+idnya).val();
    var har = $("#harga_"+idnya).val();
    var tot ;
    //iterate through each textboxes and add the values
    $(".jumlah_"+idnya).each(function() {
        //add only if the value is number
        if (!isNaN(this.value) && this.value.length != 0) {
           // sum += parseFloat(har.value);
           $(".tot").addClass("sum"+idnya);
           $(".sum"+idnya).removeClass("tot");

           tot = $("#sum"+idnya).val(jum*har);
            $(this).css("background-color", "#FEFFB0");
        }

        else if (this.value.length != 0){
            $(this).css("background-color", "red");
        }
    });
    totalbelanja();
    //$("input#sum"+idnya).val(tot);
   // $("input#sum"+idnya).val(sum.toFixed(4));
   
}

function totalbelanja(){
   //iterate through each row in the table
    $('tr').each(function () {
        //the value of sum needs to be reset for each row, so it has to be set inside the row loop
        var sumTot = 0;
        //find the combat elements in the current row and sum it 
        $('#container .totitem').find('input').each(function () {
            var combat = $(this);
           //alert(parseInt(combat.val()));
            if (!isNaN(combat.val()) && combat.length !== 0) {
                sumTot += parseFloat(combat.val());
            }
        });
        //set the value of currents rows sum to the total-combat element in the current row
        $('.total-combat', this).html(' <h4>Rp.<font color="red">'+sumTot+'</font></h4>');
        //alert(sumTot);
    });
}

</script>
