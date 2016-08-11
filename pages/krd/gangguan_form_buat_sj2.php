<?php
////////////////////////////////
// PROGRAM SKRIPSI MHT
// Refyandra
// gangguan.form.php 
// edit 6 juni 2016
// usercase KOORDINATOR
/////////////////////////////////
require("../../_db.php"); 
?>
<script type="text/javascript">
  function pilihtek(){
      var tek = $('#teknisi').val();
      var teks = $('#kode').val();
      var xx = $(":select").val();
      console.log(tek + teks + xx);
  } 
</script>



<script type="text/javascript" src="assets/msdropdown/js/jquery.dd.min.js"></script>   

<form class="form-horizontal" id="form-mahasiswa" action="#">
<select name="pelapor" id="teknisi">
      <option value="eee">PILIH TEKNISI</option> 
      <option value="ggcccg">sdsds</option>
<?php 
        $querys = mysql_query("SELECT * FROM `tb_karyawan` WHERE `login_hash`='tek'");
        while($data3 = mysql_fetch_array($querys)) {
          $namateknisi = $data3['nama'];
          $idteknisi = $data3['id_karyawan'];
          echo '<option value="'.$idteknisi.'" onclic="pilihtek()">'.$idteknisi.' - '.$namateknisi.'</option>';
        }
?>
      </select>
      <button name="s">simpan</button>
</form>

<script type="text/javascript">

  $(document).ready(function(e) {
  
 // $("#teknisi").msDropdown();

});

</script>