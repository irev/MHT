<footer class="main-footer">
<?php
 echo '<div class="pull-right"><b>&nbsp;'. ver .'</b></div>';
      echo base64_decode("PGRpdiBjbGFzcz0icHVsbC1yaWdodCBoaWRkZW4teHMiPg0KICAgICAgICAgIDxiPlZlcnNpb24gPC9iPg0KICAgICAgICA8L2Rpdj4NCiAgICAgIDxzdHJvbmcgaWQ9InllYXIiPjwvc3Ryb25nPg0KICAgICAgPHNjcmlwdD4NCiAgICAgICAgdmFyIGQgPSBuZXcgRGF0ZSgpOw0KICAgICAgICB2YXIgbiA9IGQuZ2V0RnVsbFllYXIoKTsNCiAgICAgICAgZG9jdW1lbnQuZ2V0RWxlbWVudEJ5SWQoInllYXIiKS5pbm5lckhUTUwgPSAiQ29weXJpZ2h0ICZjb3B5OyAyMDE2IC0gIiArIG4gKyAiPGEgaHJlZj1cImh0dHA6Ly93d3cubWVlZHVuLmNvbVwiPiB3d3cuTWVlZHVuLmNvbTwvYT4uPC9zdHJvbmc+IEFsbCByaWdodHMgcmVzZXJ2ZWQuICI7DQogICAgICA8L3NjcmlwdD4=");
     
?>      
</footer>
            

 <script>
$('[data-toggle="tooltip"]').tooltip();
   document.addEventListener('contextmenu', function(ev) {
    ev.preventDefault();
  // loadbarang.hitung_harga(idnya);
    return false;
}, false);

showpage('pages/web/homepage.php');
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






 
document.addEventListener('contextmenu', function(ev) {
    ev.preventDefault();
    return false;
}, false);

 </script>           