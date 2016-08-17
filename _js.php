<!--
Kumpulan Link JS _js.php
-->
<!--LINE SCRIPT-->
<!--script src="js/jquery-2.2.1.min.js"></script-->
<!--script src="assets/plugins/jQuery/jQuery-2.1.4.min.js"></script-->
 <script src="js/jquery-2.2.1.min.js"></script>
<!-- jQueryUI 2.2.1 -->
<script src="assets/plugins/jQueryUI/jquery-ui.min.js"></script>
<script type="text/javascript" src="js/jquery.blockUI.js"></script>
<!-- Bootstrap 3.3.5 -->
<script type="text/javascript" src="assets/bootstrap/js/bootstrap.min.js"></script>
<!-- bootstrap3-dialog-master -->
<script type="text/javascript" src="assets/plugins/bootstrap3-dialog-master/dist/js/bootstrap-dialog.min.js"></script>
<!--datepicker-->
<script type="text/javascript" src="assets/plugins/datepicker/bootstrap-datepicker.js"></script>
<script type="text/javascript" src="assets/plugins/daterangepicker/moment.js"></script>
<script type="text/javascript" src="assets/plugins/daterangepicker/daterangepicker.js"></script>
<script type="text/javascript" src="assets/plugins/datepicker/locales/bootstrap-datepicker.id.js"></script>


<script type="text/javascript" src="assets/plugins/select2/select2.full.min.js"></script>
<script type="text/javascript" src="assets/plugins/iCheck/icheck.min.js"></script>

<!-- data table script -->
<script type="text/javascript" src="assets/plugins/datatables/jquery.dataTables.min.js"></script>
<!-- SlimScroll -->
<script type="text/javascript" src="assets/plugins/slimScroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script type="text/javascript" src="assets/plugins/fastclick/fastclick.min.js"></script>
<!-- AdminLTE App -->
<script type="text/javascript" src="assets/dist/js/app.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script type="text/javascript" src="assets/dist/js/demo.js"></script>
<!--Validasi Form-->
<script type="text/javascript" src="js/jquery.validate.min.js"></script>

<!-- InputMask -->
<script type="text/javascript" src="assets/plugins/input-mask/jquery.inputmask.js"></script>
<script type="text/javascript" src="assets/plugins/input-mask/jquery.inputmask.date.extensions.js"></script>
<script type="text/javascript" src="assets/plugins/input-mask/jquery.inputmask.extensions.js"></script>  
<script type="text/javascript" src="assets/plugins/zdatepicker/javascript/zebra_datepicker.js"></script>
<!--bootbox-->
<script type="text/javascript" scr="assets/plugins/bootbox/bootbox.js"></script>
 <!-- DataTables -->
<link rel="stylesheet" href="assets/plugins/datatables/dataTables.bootstrap.css">

<!--LINE SCRIPT END-->

<script type="text/javascript">
/*
  $("#data_barang_masuk").DataTable({"lengthMenu": [ [5, 10, 15, 20, -1], [5, 10, 15, 20, "All"] ]});
  $("#data_barang_keluar").DataTable({"lengthMenu": [ [5, 10, 15, 20, -1], [5, 10, 15, 20, "All"] ]});
  $("#tampil_barang").DataTable({"lengthMenu": [ [5, 10, 15, 20, -1], [5, 10, 15, 20, "All"] ]});
  $("#tampil_barang_ready").DataTable({"lengthMenu": [ [5, 10, 15, 20, -1], [5, 10, 15, 20, "All"] ]});
*/

  
function showloading()
{
  //$("#loading2").show()
 // $('.main-content').html({ message: '<h1><img src="../assets/img/ajax-loader.gif" /><p>Just a moment..</h1>',showOverlay: true, css: { backgroundColor: '#FFFFFF'}}),
$.blockUI({ 
            centerY: 0, 
            css: { bottom: '', left: '', right: '10px' },
            message: '<h1><img src="assets/img/ajax-loader.gif" /> Loading...</h1>'
        }); 
        setTimeout($.unblockUI, 1000); 
}
function hideloading()
{
  //$("#loading2").hide()
  $('.main-content').unblock();
}

///FUNGSI UNTUK PEMANGGILN PAGE
function showpage(link)
{
  console.log(link);
  $.ajax({
  type: "GET",
  url: link,
  beforeSend: showloading(),
  success: function(msg){
  $("#main").hide();
  $("#main").html(msg).show("slow");
  hideloading();
  },
  error: function(msg){
  $("#main").html("<font color='#ff0000'>Ajax loading error, Coba diulangi lagi.</font>").show("slow");
  hideloading();
  }
  //, complete: hideloading()
  });
}



</script>