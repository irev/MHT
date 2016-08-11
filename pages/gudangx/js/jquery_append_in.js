/*Tambah input  FROM BARANG MASUK */
$(document).ready(function() {

    document.getElementById("proses").disabled = true;
    var kd1 = $("#kd_1").val();
    document.getElementById('add_btn').style.display = 'none';
    document.getElementById('add_btn2').style.display = 'none';

    //document.getElementById('add_btn2').style.display = 'none';
    //min-width: 809px;
    var count = 1;
    /*Tambah input*/
    //$("#add_btn").click(function(){ 
    function tambah_form() {
        /*Tambah input COPY CLON  FROM BARANG MASUK */
            count += 1;
            $('#container').append(
                '<tr class="records">' +
                 '<td ><div id="' + count + '" class="urut">' + count + '</div></td>' + 
                 '<td ><input id="tanggal" class="input tanggal" style="width: 100px;" placeholder="Pilih Tanggal.." name="tgl_' + count + '" type="text"></td>' + '<td class="kdbrang"><input style="width: 100px;" id="kd_' + count + '" placeholder="Pilih Barang.." name="kd_' + count + '" onClick="loadbarang.barang(' + count + ')" type="text" class="input-small" onfocus="loadbarang.hitung_harga(' + count + ')" autocomplete="off" required/></td>' + 
                 '<td style="width: 50%;"><input id="nama_' + count + '" style="width: 100%;"placeholder="Pilih Barang.." name="nama_' + count + '" onClick="loadbarang.barang(' + count + ')" type="text" class="input-small" readonly onfocus="loadbarang.hitung_harga(' + count + ')" autocomplete="off" required/></td>' + 
                 '<td style="width: 20%;"><div class="input-group"><div class="input-group-addon"><i style="width: 20px;">Rp.</i></div><input id="harga_' + count + '" onkeyup="loadbarang.hitung_harga(' + count + ')" name="harga_' + count + '" style="width: 100px; text-align: right;" value="0" style="text-align: right;" type="text" class="harga input-small" autocomplete="off" required/></div></td>' +
                  '<td style="width: 50px;"><input onkeyup="loadbarang.hitung_harga(' + count + ')" id="jumlah_' + count + '" value="" style="text-align: center;  width: 50px; background-color: rgb(255, 176, 254);" name="jumlah_' + count + '" value="" type="text" class="jumlah_' + count + ' input-small" autocomplete="off" required/></td>' + '<td class="totitem" style="width: 20%;"><div class="input-group"><div class="input-group-addon"><i style="width: 20px;">Rp.</i></div><input type="text" id="sum' + count + '" class="tot" style="text-align: right;"  value="" name="subtot_' + count + '" onClick="totalbelanja()" readonly autocomplete="off" required/></div></td>' + '<td style="width: 20%;"><span class="label label-danger" ><a id="remove_item" class="remove"  href="#" style="text-decoration: width: 70%; none; color: #fff;" ><i class="fa fa-fw fa-trash"></i>Delete</a></span>' + '<input id="rows_' + count + '" name="rows[]" value="' + count + '" type="hidden"></td></tr>'
            );
            addDP($('table.table-striped').find('input.tanggal'));
            barang(count);
            document.getElementById('add_btn').style.display = 'none';
            document.getElementById('add_btn2').style.display = 'none';
            document.getElementById("proses").disabled = true;
      //  });
    }

    function addDP($els) {
        $els.Zebra_DatePicker({
            'days': ['Minggu', 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu'],
            'months': ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'],
            'lang_clear_date': 'Clear',
            'show_select_today': 'Today'
        });
    }

    /*
 function addDP($els) {
        $els.datepicker({
            format: 'yyyy-mm-dd',
            changeMonth: true,
            changeYear: true,
            Default: true
        });
    }
*/
    /*Hapus input*/
    $('#id_form_m').on('click', '.remove', function(ev) {
        if (ev.type == 'click') {
            $(this).parents(".records").fadeOut();
            $(this).parents(".records").remove();
            $('#add_btn').show("fast");
            $('#add_btn2').show("fast");
            console.log(ev);
        }

        loadbarang.totalbelanja();
    });


$('.jumlah' ).hover(function() {
     loadbarang.totalbelanja();
 });


    function barang() {
        var pop;
        pop = window.open('pages/web/tampil_barang.php?list=' + count, 'popuppage', 'width=800,toolbar=0,resizable=0,scrollbars=no,height=550,top=100,left=100');
        pop.window.focus();
        //pop.document.getElementById('kdlist').value = array_kdbarang.val();
    }

    $('#cek-barang').on('click', function() {
        var pr = document.getElementById("proses");
        pr.disabled = false;
        cek_kdbarang_sama();
    });

    $('#add_btn').on('click', function() {
        tambah_form();
    });

    $('#add_btn2').on('click', function() {
        tambah_form();
    });


    /*PERIKSA KODE BARANG YANG TELAH DI INPUTKAN JIKA SAMA BERI PERINGATAN*/

    $('#cek-barang').on('click', function() {
        var pr = document.getElementById("proses");
        pr.disabled = false;
        cek_kdbarang_sama();
    });

    function cek_kdbarang_sama() {
        var dat = [];
        var arr = [];
        $('#container .kdbrang').find('input').each(function() {
            arr.push($(this).val());
        }).get();
        compressArray(arr);

    }

    function compressArray(original) {
        /*========================================= 
/* dari https://gist.github.com/ralphcrisostomo/3141412#file-array_dupplicate_counter-js-L44 */
        /* Contoh data :*/
        /*  var testArray = new Array("dog", "dog", "cat", "buffalo", "wolf", "cat", "tiger", "cat");*/
        /*  var newArray = compressArray(testArray);*/
        /*
/*hasil output */
        /*=====================-----*/
        /*console: [*/
        /* Object { value="dog", count=2}, */
        /* Object { value="cat", count=3}, */
        /*  Object { value="buffalo", count=1}, */
        /*  Object { value="wolf", count=1}, */
        /*  Object { value="tiger", count=1}*/
        /*]
/* ===========================================*/

        var msg_error = [
            '<div class="col-md-12 alert">',
            '<div aria-hidden="false" id="alert" style="display: block;" class="alert modal fade in"  role="dialog">',
            '<div class="modal-dialog alert alert-danger alert-dismissable">',
            '<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>',
            '<h4><i class="icon fa fa-ban"></i> Alert!</h4>',
            'Gagal! <strong>Tidak bisa mengimputkan barang degan <strong>kode</strong> yang sama! ',
            '</div> ',
            '</div> ',
            '</div>'
        ].join("\n");

        var msg_sukses = [
            '<div class="col-md-12 alert">',
            '<div aria-hidden="false" id="alert" style="display: block;" class="alert modal fade in"  role="dialog">',
            '<div class="modal-dialog alert alert-success alert-dismissable">',
            '<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>',
            '<h4><i class="icon fa fa-ban"></i> Alert!</h4>',
            'Gagal! Terjadi Kesalahan Input Pelanggan atau data lainnya masih kosong..! ',
            '</div> ',
            '</div> ',
            '</div>'
        ].join("\n");

        var compressed = [];
        // make a copy of the input array
        var copy = original.slice(0);
        // first loop goes over every element
        for (var i = 0; i < original.length; i++) {
            console.log('panjang array original.length =' + original.length); //////TAMPIL
            var myCount = 0;
            /* loop over every element in the copy and see if it's the same */
            for (var w = 0; w < copy.length; w++) {
                console.log('panjang array copy.length =' + copy.length); ////TAMPIL
                console.log(original[i] + "<=ori  cpy=>" + copy[w]); ////TAMPIL
                if (original[i] == copy[w]) {
                    // increase amount of times duplicate is found
                    console.log(myCount++);
                    // sets item to undefined
                    delete copy[w];
                }
            }

            if (myCount > 0) {
                var a = new Object();
                a.value = original[i];
                a.count = myCount;
                compressed.push(a);
            }

            if (myCount > 1) {
                var a = new Object();
                a.value = original[i];
                a.count = myCount;
                $('.msg').html(msg_error);
                var x = document.getElementById("cek-barang");
                x.checked = false;
                var pr = document.getElementById("proses");
                pr.disabled = true;

            }
        }

        $(".alert").fadeTo(2000, 500).slideDown(500, function() {
            $(".alert").alert('close');
        });
        return console.log(compressed);
    };
    /* END  PERIKSA KODE BARANG YANG TELAH DI INPUTKAN JIKA SAMA BERI PERINGATAN*/
    $(".select2").select2();
});

