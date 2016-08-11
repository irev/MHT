<div class="row">
<div class="col-md-12">


<div class="box-footer clearfix">
<?php 
$awltanggal = $_POST['awltanggal'];
$akhtanggal = $_POST['akhtanggal'];
 ?>
<div class="col-md-12">
<form method="post" action="#">
<div class="col-md-6">
	<div class="row">

                 <div class="form-group">
                 <div class="col-xs-3">
                  	<input type="text" name="awltanggal" class="form-control pull-right col-xs-3" id="awltanggal">
 				</div>	
 				<div class="col-xs-2">
 				sampai
 				</div>
 				<div class="col-xs-3">
 					<input type="text" name="akhtanggal" class="form-control pull-right col-xs-3" id="akhtanggal">	
				
                </div>
                 <input type="submit" class="btn pull-right col-xs-3" value="peroses">	
               </div><!-- /.form group -->
</div>		

</form> <br/> 	
</div>			
      
<div class="col-md-6">
				<div class="col-xs-4">
                    <div class="input-group ">
                      <button class="btn btn-default pull-left" id="daterange-btn">
                        <i class="fa fa-calendar"></i> PRIODE LAPORAN
                        <i class="fa fa-caret-down"></i>
                      </button>
                    </div>
                 </div>   
                <!--a href="javascript::;" class="btn btn-sm btn-social btn-primary btn-flat pull-right" ><i class="icon fa fa-cubes"></i>  Barang Masuk</a>
                <a href="javascript::;" class="btn btn-sm btn-social btn-primary btn-flat pull-right" ><i class="icon fa fa-truck"></i> Barang Keluar</a>
                <a href="javascript::;" class="btn btn-sm btn-social btn-primary btn-flat pull-right" ><i class="icon fa fa-truck"></i> Barang Keluar</a-->
</div>
</div>

</div>
<br/>

<?php 

include('pages/laporan/lp_masuk.php');
if(isset($_POST['laporan'])){
include('pages/laporan/lp_masuk.php');
}
?>
</div>
</div>
<?php
include('_script.php');
ob_end_flush();
?>     <!-- date-range-picker -->
<script src="assets/plugins/moment/moment.min.js"></script>
<script src="assets/plugins/daterangepicker/daterangepicker.js"></script>
<script>
		//Date range 
  		$('#reservation').daterangepicker();
        //Date range as a button
        $('#daterange-btn').daterangepicker(
            {
              ranges: {
                'Hari ini': [moment(), moment()],
                'Kemarin': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
                '7 Hari Terakhir': [moment().subtract(6, 'days'), moment()],
                '30 Hari Terakhir': [moment().subtract(29, 'days'), moment()],
                'Bulan ini': [moment().startOf('month'), moment().endOf('month')],
                'Bulan lalu': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
              },
              startDate: moment().subtract(29, 'days'),
              endDate: moment()
            },
        function (start, end) {
          $('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));
         document.getElementById('awltanggal').value = start.format('YYYY-MM-D');
         document.getElementById('akhtanggal').value = end.format('YYYY-MM-D');
        }
        );



</script>