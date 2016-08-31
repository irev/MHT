<footer class="main-footer">
<?php
 echo '<div class="pull-right"><b>&nbsp;'. ver .'</b></div>';
      echo base64_decode("PGRpdiBjbGFzcz0icHVsbC1yaWdodCBoaWRkZW4teHMiPg0KICAgICAgICAgIDxiPlZlcnNpb24gPC9iPg0KICAgICAgICA8L2Rpdj4NCiAgICAgIDxzdHJvbmcgaWQ9InllYXIiPjwvc3Ryb25nPg0KICAgICAgPHNjcmlwdD4NCiAgICAgICAgdmFyIGQgPSBuZXcgRGF0ZSgpOw0KICAgICAgICB2YXIgbiA9IGQuZ2V0RnVsbFllYXIoKTsNCiAgICAgICAgZG9jdW1lbnQuZ2V0RWxlbWVudEJ5SWQoInllYXIiKS5pbm5lckhUTUwgPSAiQ29weXJpZ2h0ICZjb3B5OyAyMDE2IC0gIiArIG4gKyAiPGEgaHJlZj1cImh0dHA6Ly93d3cubWVlZHVuLmNvbVwiPiB3d3cuTWVlZHVuLmNvbTwvYT4uPC9zdHJvbmc+IEFsbCByaWdodHMgcmVzZXJ2ZWQuICI7DQogICAgICA8L3NjcmlwdD4=");
if(!isset($_SESSION)){
session_start();
}
if($_SESSION['login_hash']=='krd'){
echo "<script>
        $('body').addClass('skin-red');
      </script>";
}elseif($_SESSION['login_hash']=='cs'){ 
echo "<script>
        $('body').addClass('skin-green');
      </script>";
}else{
  echo "<script>
        $('body').addClass('skin-blue');
      </script>";
}

?>      
</footer>
            
<script type="text/javascript" scr="assets/plugins/bootbox/bootbox.js"></script>
 <script>
$('[data-toggle="tooltip"]').tooltip();
   document.addEventListener('contextmenu', function(ev) {
    ev.preventDefault();
  // loadbarang.hitung_harga(idnya);
    return false;
}, false);


showpage('pages/web/homepage.php');



 
document.addEventListener('contextmenu', function(ev) {
    ev.preventDefault();
    return false;
}, false);
/*
   function dataTabel(){
        $('.dataTables_length').addClass('col-xs-3');
        $('.dataTables_info').addClass('col-xs-4');
        $('.paginate_previous').addClass('btn-flat btn-default');
        $('.paginate_next').addClass('btn-flat btn-default');
        $('.paginate_button').addClass('btn-flat btn-default btn-group');
        $('.current').addClass('btn-flat btn-primary btn-group');
  }    
    window.onload =dataTabel;
    setInterval(dataTabel, 3000);
    */
 </script>           