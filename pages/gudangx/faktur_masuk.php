 <?php
if(isset($_GET['del']))
{
  $ids=$_GET['id'];
  $ff=mysql_query("DELETE FROM `data_faktur_berang_masuk` WHERE sha1(kode_transaksi)='".$ids."'");
  if($ff)
  {
    echo "<script>window.location='?cat=gudang&page=faktur_masuk'</script>";
  }
}
?>
<div class="row">
 <div class="col-md-12">
    <link rel="stylesheet" href="assets/plugins/datatables/dataTables.bootstrap.css">
              <div class="box box-solid box-success">
                <div class="box-header">
                  <h3 class="box-title"><i class="fa fa-arrow-circle-right"></i> History Transaksi Barang Masuk</h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                  <table id="tabel_faktur_m" class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        <th>NO</th> 
                        <th>KODE FAKTUR</th>
                        <th>SUPPLIER</th>
                        <th>PENERIMA</th>
                        <th>TANGGAL</th>
                        <th>BIAYA TRANSAKSI</th>
                        <th></th>
                      </tr>
                    </thead>
                    <tbody>
<?php
//$kode_transaksi = $_GET['kode_transaksi'];

$no=0;
$sql = "SELECT data_faktur_berang_masuk.*, data_supplier.nm_supplier FROM `data_faktur_berang_masuk` LEFT JOIN data_supplier ON data_faktur_berang_masuk.kode_supplier=data_supplier.kode_supplier ORDER BY  `data_faktur_berang_masuk`.`tgl` ASC"; 
$ex = mysql_query($sql);
 while($data = mysql_fetch_array($ex)){
$no++;
 ?>                
 <?php //echo'"'.$data['kode_transaksi'].'"';?>
                      <tr>
                        <td><?php echo $no; // $data['id_masuk'] ?> </td>
                        <td id="kdbarang"> 
                        <a href="#" class="kd" data-toggle="popover" data-placement="down" data-content="" title="" data-poload=<?php echo '"pages/gudang/faktur_masuk_jeson.php?kt='.$data['kode_transaksi'].'"';?> data-original-title=<?php echo '"'.$data['kode_transaksi'].'"';?>><?php echo $data['kode_transaksi'];?></a>   
                        <?php $kdt=substr($data['kode_transaksi'],2,11);$data['kode_transaksi']; echo " <!--a onclick='tampil(".$kdt.")'> - ".$data['kode_transaksi']."</a-->"; ?></td>
                        <td><?php echo $data['supplier']; ?>     <a href="#" title=<?php echo '"'.$data['nm_supplier'].'"'?> data-placement="down" data-toggle="popover" data-poload=<?php echo '"pages/gudang/faktur_masuk_jeson.php?kt='.$data['kode_transaksi'].'"';?>><?php echo $data['kode_supplier']?></a></td>
                        <td><?php echo $data['penerima']; ?></td>
                        <td><center><?php echo $data['tgl']; ?></center></td>
                        <td>Rp. <?php echo $data['total']; ?></td>
                        <td>
                        <div class="btn-group">
                          <button type="button" class="btn btn-success btn-flat">Action</button>
                          <button aria-expanded="false" type="button" class="btn btn-success btn-flat dropdown-toggle" data-toggle="dropdown">
                          <span class="caret"></span>
                        <span class="sr-only">Toggle Dropdown</span>
                      </button>
                      <ul class="dropdown-menu" role="menu">
                        <li><a href="?cat=gudang&page=barangedit&id=<?php echo sha1($result['kode_barang']); ?>"><i class="fa fa-fw fa-pencil-square-o"></i>Edit</a></li>
                        <li> <a href="dashboard.php?cat=gudang&page=faktur&kode_transaksi=<?php echo $data['kode_transaksi']; ?>"><i class="fa fa-fw  fa-search"></i>View</a></li>
                         <li class="divider"></li>
                        <li> <a href="?cat=gudang&page=faktur_masuk&del=1&id=<?php echo sha1($data['kode_transaksi']); ?>"  onclick="return confirm('Anda Yakin, menghapus TRANSAKSI BARANG KELUAR <?php echo $data['kode_transaksi'].", ".$data['supplier'].", ".$data['penerima'].", ".$data['total'];?> ?')"><i class="fa fa-trash-o"></i>Hapus</a></li>
                      </ul>
                        </div>
                        </td>
                        </tr>
<?php } ?>                         
                      </tbody>
                    <tfoot>
                      <tr>
                        <th>NO</th> 
                        <th>KODE FAKTUR</th>
                        <th>DARI</th>
                        <th>PENERIMA</th>
                        <th>TANGGAL</th>
                        <th>JUMLAH</th>
                        <th></th>
                      </tr>
                    </tfoot>
                  </table>
                   <a href="#" class="btn btn-default" data-toggle="popover" data-placement="top" data-content="Vivamus sagittis lacus vel augue laoreet rutrum faucibus." title="" data-original-title="Popover on top">Popover on top</a>   

                </div><!-- /.box-body -->
              </div><!-- /.box -->
</div><!-- /.col -->
</div>


<div class="modal fade" id="satuan_form" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h3 class="modal-title"></h3>
            </div>
            <div class="modal-body form">
              <!--//////////////////////////////////////-->
<!--BEGIN DATA-->
<!--div id="tampil_data"></div-->
<!--END DATA-->

              <!--////////////////////////////////////////////////--> 
            </div>
            <div class="modal-footer">
                <!--input type="submit" class="btn btn-primary" name="button" id="button" value="Simpan"-->&nbsp;&nbsp;
                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
            </div>
       
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<!-- End Bootstrap modal -->


<?php
include('_script.php');
ob_end_flush();
?> 
 <script>


</script>
<style type="text/css">
.popover{
  max-width: 400%;
  min-width: 50%;
}
.popover-content{
  max-width: 400%;
  min-width: 50%;
}
  .popover-title{
    background: #00a65a;
    max-width: 300%;
    color: #fff;
   }
  .in{
   /* max-width: 200%;
    min-width: 200%;
    */
  }
</style>
<script type="text/javascript">
/*
jQuery('#kdbarang').hover(function () {
  console.log(  jQuery('a .kd').addClass('active')
    );
}, function () {
    jQuery('.kd').removeClass('active');
});
*/
jQuery(document).ready(function($) {
  




$('*[data-poload]').hover(function() {
    var e=$(this);
    e.off('hover');
   // $.getJSON(e.data('poload'),function(d) {
    var showData = $('.popover-content');

    $.getJSON(e.data('poload'), function (data) {
      console.log(data);

      var fmasuk = data.fmasuk.map(function (fmasuk) {
        return 'Barang <td><strong>'+ fmasuk.namabarang + ':</strong></td><td><strong> Harga = </strong>Rp. ' + fmasuk.harga + '</strong></td><td><strong> Jumlah = </strong>' +  fmasuk.jumlah +'</td>';
      });

      showData.empty();

      if (fmasuk.length) {
        var content = '<table class="table table-bordered table-striped"><tr><td>' + fmasuk.join('</td></tr><tr><td>') + '</td></tr></table>';
        var list = $('.popover-content').html(content);
        showData.append(list);
      }
 });
    var dada=showData.text('Loading the JSON file.');
  //  var tm = $('.popover-content').html(list);
        e.popover({
        //content: tm,
          trigger: "hover"
        });
 });




$('.kd' ).hover(function() {
jQuery('.kd').addClass('actives');
var ikode = $('td .actives').text();
console.log(ikode);
function tampil(ikode)
{
  //LOAD DATA FAKTUR 
    var kode = ikode; 
    var linkk = 'pages/gudang/faktur_masuk_jeson.php?kt=BM'+kode;
    var obj =  $.getJSON('pages/gudang/faktur_masuk_jeson.php?kt=BM'+kode, function(data) {
      //document.getElementById("form_json").innerHTML=data.artikel[0].idt + " " + data.artikel[0].idt+"--"+ data.artikel[0].idt;
      $('#tampil_data').html(

                  "<table><tr>"+
                  "<tr> KD Barang : </td>"+
                  "<td> KD Transaksi : </td>"+
                  "<td> Jumlah : </td>"+
                  "<td> KD Barang : </td>"+
                  "<td> Nama Barang : </td>"+
                  "<td> Unit : </td>"+
                  "</tr>"+
                  "<tr>"+
                  "<td>" + data.fmasuk[0].idt + "</td>" +
                  "<td>" + data.fmasuk[0].transaksi + "</td>" +
                  "<td>" + data.fmasuk[0].jumlah + "</td>" +
                  "<td>" + data.fmasuk[0].harga + "</td>" +
                  "<td>" + data.fmasuk[0].namabarang + "</td>"+
                  "<td>" + data.fmasuk[0].unit +"</td>"+
                  "<tr></table>"
         
                  );
    
    
      });
/*
    var jsonp =  'pages/gudang/faktur_masuk_jeson.php?kt=BM'+kode;
    var lang = '';
    var obj = $.parseJSON(jsonp);
    $.each(obj, function() {
        lang += "hhh :"+this['idt'] + "<br/>";        
        lang += this['transaksi'] + "<br/>";       
        lang += this['jumlah'] + "<br/>";
        lang += this['harga'] + "<br/>";
        lang += this['namabarang'] + "<br/>";
    });
    $('kodet').html(lang);
*/

    $('.form-group').removeClass('has-error'); // clear error class
    $('.help-block').empty(); // clear error string
    $('#satuan_form').modal('show'); // show bootstrap modal
    $('#edit_form').modal('handleUpdate');
    $('.modal-title').text('Transaksi BK'+ kode); // Set Title to Bootstrap modal title
}
},




 function () {
    jQuery('.kd').removeClass('actives');
    //$('.popover-content').html('');
});
/*
$('[data-toggle="tooltip"]').tooltip('tooltip');
   $('[data-toggle="popover"]').popover({
      trigger: "hover"
      //content: "<div id='tampil_data'>ss</div>"
    });
*/

    $('#tabel_faktur_m').DataTable( {
        "lengthMenu": [ [5, 10, 15, 20, -1], [5, 10, 15, 20, "semua"] ],
        "language": {
            "lengthMenu": "Tampil _MENU_ baris",
            "zeroRecords": "Tidak ditemukan - maaf",
            "info": "Halaman _PAGE_ dari _PAGES_",
            "infoEmpty": "Tidak ada catatan yang tersedia",
            "infoFiltered": "(Tampil dari _MAX_ total data)",
            "search":"Cari :",
            "next":" Lanjut",
            "previos":" Kembali"
        }
    } );





});
</script>
