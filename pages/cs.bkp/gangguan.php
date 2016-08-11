<script>
    function komponen() {
        load_menu_gangguan();
        load_list_gangguan();
       // getform.tambahubah();
       // getform.simpan();
       // getform.hapus();
       // getform.ditel();
       var url = "pages/cs/mod/gangguan/gangguan.form.php";
    }
    //load data
    function load_list_gangguan() {
        var main = 'pages/cs/mod/gangguan/gangguan.data.php';
       $('#list_gangguan').load(main);
       $(".modal-body").load('pages/cs/mod/gangguan/gangguan.form.php');
    }
    function load_menu_gangguan() {
        $('#menu_gangguan').load('pages/cs/mod/gangguan/gangguan.menu.php');
    }
    // panggil modal add
    function add() {
        getform.tambah(); 
        //$(".modal-body").html(data).show(); 
    }
    // panggil modal ubah
    function ubah(){
        getform.ubah();
        //$('#add-gangguan').modal('show'); 
       // $(".modal-body").html(data).show();     
    }
    function simpan(){
        getform.simpan();     
    }

    function ditel(){
        //$('#ditel-gangguan').modal('show'); 
        getform.ditel();
    }
        function batal(){
        //$('#ditel-gangguan').modal('show'); 
        getform.batal();
    }
    //Fungsi Menu
    function list_gangguan(){
        $(this).addClass('active');
        $('#list_gangguan').load('pages/cs/mod/gangguan/gangguan.data.php');
    } 
    function list_done(){
        $(this).addClass('active');
        //$(this).removeClass("tot");
        $('#list_gangguan').load('pages/cs/mod/gangguan/gangguan.done.php');
    }
    function list_OnProccess(){
        $(this).addClass('active');
        $('#list_gangguan').load('pages/cs/mod/gangguan/gangguan.OnProccess.php');
    } 
    function list_Pending(){
        $(this).addClass('active');
        $('#list_gangguan').load('pages/cs/mod/gangguan/gangguan.pending.php');
    } 

$('.batal').on("click", function(){
   $('.modal').html().reset();  
   $('.dialog-gangguan').html().reset();  
   $(".modal-body").html().reset();

});

</script>
<!--PAGE GANGGUAN-->
<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-md-3">
        
        <a href="#dialog-gangguan" id="0" onclick="add()" class="btn btn-primary btn-sm tambah" data-toggle="modal">
            <i class="fa fa-plus"></i> Tambah Data
        </a>        
        <a href="#dialog-gangguan" id="MT00001" class="btn ubah" data-toggle="modal">
            <i class="icon-plus"></i> ubah Data
        </a>

            <div id="menu_gangguan"></div>
        </div>
        <div class="col-md-9">
            <div id="data-gangguan"></div>
            <div id="list_gangguan"></div>
        </div>


 <!-- awal untuk modal dialog -->
<div id="dialog-gangguan" class="modal fade modal-primary" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
  <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
    <h3 id="myModalLabel">Tambah Data Gangguan</h3>
  </div>
  <!-- tempat untuk menampilkan form gangguan -->
  <div class="modal-body">
    
  </div>
  <div class="modal-footer">
    <button class="btn btn-danger batal" data-dismiss="modal" aria-hidden="true" onclick="batal()">Batal</button>
    <button id="simpan-gangguan" class="btn btn-success" onclick="simpan()">Simpan</button>
  </div>
  </div>
  </div>
</div>
<!-- akhir kode modal dialog -->  



<!--footer-->
<?php
include('_script.php');
ob_end_flush();
?>


        <script>
            function add_gangguan() {
                //  save_method = 'add';
                $('#form-gangguan')[0].reset(); // reset form on modals
                $('.form-group').removeClass('has-error'); // clear error class
                $('.help-block').empty(); // clear error string
                $('#add-gangguan').modal('show'); // show bootstrap modal
                //$('.modal-title').text(''); // Set Title to Bootstrap modal title
                $('[data-toggle="popover"]').popover();
            }

            function validateForm1() {
                var x = document.forms["form-gangguan"]["namabarang"].value;
                if (x == null || x == "") {
                    alert("Name must be filled out");
                    return false;
                }
            }
        </script>


        <script src="pages/cs/mod/gangguan/gangguan_bk.js"></script>
        <script>

            $(function() {
                $("#example1").DataTable();
                $('#example2').DataTable({
                    "paging": true,
                    "lengthChange": false,
                    "searching": false,
                    "ordering": true,
                    "info": true,
                    "autoWidth": false
                });
            });


        </script>