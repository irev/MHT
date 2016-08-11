<script src="js/jquery-ui.js"></script>
<div class="row">
<div class="col-md-12">
<div class="box box-solid box-info">
<div class="box-header">
<h3 class="box-title"><i class="fa fa-arrow-circle-left"></i> Laporan Barang Masuk dan Barang Keluar</h3>

<div class="pull-right">
Export To <img src="assets/img/excel.ico" border="1" width="32" height="32" onClick="window.open('<?php echo $baseurl."pages/web/export-excel-barang.php?tgl1=".$_POST['tglr']."&tgl2=".$_POST['tglr2']."&field=".$_POST['lp']; ?>','popuppage','width=500,toolbar=0,resizable=0,scrollbars=no,height=400,top=100,left=100');" />
</div>
</div><!-- /.box-header -->
<div class="box-body">

  
<script>
/*
$(function() {
$("#datepicker3").datepicker({        
		 dateFormat: "yy-mm-dd",
    });
});
$(function() {
$("#datepicker2").datepicker({     
		       
    });
});
*/

$(function() {
$('#datepicker2').Zebra_DatePicker({
	dateFormat: "yy-mm-dd",
            'days': ['Minggu', 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu'],
            'months': ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'],
            'lang_clear_date': 'Clear',
            'show_select_today': 'Today'
        });
});
$(function() {
$('#datepicker3').Zebra_DatePicker({
	dateFormat: "yy-mm-dd",
            'days': ['Minggu', 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu'],
            'months': ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'],
            'lang_clear_date': 'Clear',
            'show_select_today': 'Today'
        });
});
/*
 function addDP($els) {
        $datepicker3.Zebra_DatePicker({
            'days': ['Minggu', 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu'],
            'months': ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'],
            'lang_clear_date': 'Clear',
            'show_select_today': 'Today'
        });
    }
    */
</script>

<form name="form1" method="post" action="">
 <div class="col-md-12">
  Laporan 
    <select name="lp" id="lp">
      <option value="masuk">Barang Masuk</option>
      <option value="keluar">Barang Keluar</option>
    </select>
Cari tanggal
<input type="text" name="tglr" id="datepicker3" placeholder="Pilih tanggal.." class="span2 input-small" />
Hingga 
<input type="text" name="tglr2" id="datepicker2" placeholder="Pilih tanggal.." class="span2 input-small" />
<input type="submit" name="submit" value="Cari" class="btn btn-large btn-primary"></form>
</div>

<input type="hidden" value="<?php echo $_POST['tglr']; ?>" name="tgl1" />
<input type="hidden" value="<?php echo $_POST['tglr2']; ?>" name="tgl2" />
<?php
	echo "Pencarian tanggal ". $_POST['tglr']." sampai ".$_POST['tglr2'];
	//Cari berapa banyak jumlah data*/
	$count_query=mysql_query("SELECT COUNT(ID_".$_POST['lp'].") AS numrows FROM barang_".$_POST['lp']." LEFT JOIN data_barang ON barang_".$_POST['lp'].".kode_barang = data_barang.kode_barang  Where tgl BETWEEN '".$_POST['tglr']."' AND '".$_POST['tglr2']."' GROUP BY ID_".$_POST['lp']."");
	$count_query2   = mysql_query("SELECT COUNT(ID_".$_POST['lp'].") AS numrows FROM barang_".$_POST['lp']." Where tgl BETWEEN '".$_POST['tglr']."' AND '".$_POST['tglr2']."'");
//	if($count_query === FALSE) {
 //   die(mysql_error()); 
  
//	}
	//jalankan query menampilkan data per blok $offset dan $per_hal
	$query2 = mysql_query("SELECT * from barang_".$_POST['lp']." Where tgl BETWEEN '".$_POST['tglr']."' AND '".$_POST['tglr2']."' GROUP BY ID_".$_POST['lp']);
	$query=mysql_query("SELECT barang_".$_POST['lp'].".tgl, barang_".$_POST['lp'].".kode_barang, data_barang.nama_barang, data_barang.jenis_barang, barang_".$_POST['lp'].".jumlah FROM barang_".$_POST['lp']." LEFT JOIN data_barang ON barang_".$_POST['lp'].".kode_barang = data_barang.kode_barang  Where tgl BETWEEN '".$_POST['tglr']."' AND '".$_POST['tglr2']."' GROUP BY ID_".$_POST['lp']);
?>



<table  class="table table-bordered table-striped">
  <thead>
  <tr>
    <th >Tanggal Transaksi</th>
    <th>Kode Barang</th>
    <th>Nama Barang</th>
    <th>Jumlah</th>
  </tr>
  </thead>
<?php
while($result = mysql_fetch_array($query)){
?>
<tbody>
<tr >
    
    <td><?php echo $result['tgl']; ?></td> 
    <td><?php echo $result['kode_barang']; ?></td> 
    <td><?php echo $result['nama_barang']; ?></td> 
    <td><?php echo $result['jumlah']; ?></td> 
       
  </tr>
<?php
}
?>
</tbody>
<tfoot>
    <tr>
    <th >Tanggal Transaksi</th>
    <th>Kode Barang</th>
    <th>Nama Barang</th>
    <th>Jumlah</th>
    </tr>
 </tfoot>
</table>

</div>
</div>

</div>
</div>




<?php
include('_script.php');
ob_end_flush();
?> 