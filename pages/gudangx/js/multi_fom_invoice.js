/*Tambah input  FROM BARANG KELUAR */
$(document).ready(function() {
    var count = 1;
/*Tambah input*/
    $("#add_btn").click(function(){ 
/*Tambah input COPY CLON  FROM BARANG KELUAR */
      count += 1;
        $('#container').append(
            '<tr class="records">'
                + '<td><div id="'+count+'" class="urut">' + count + '</div></td>'
                + '<td class="kdbrang"><input  onchange="cek_kdbarang_sama(' + count + ')" style="width: 100px;"  id="kd_' + count + '" placeholder="Pilih Barang.." name="kd_' + count + '" onClick="barang(' + count + ')" type="text" class="input-small" onfocus="hitung_harga(' + count + ')" autocomplete="off" required/></td>'
                + '<td style="width: 50%;"><input id="nama_' + count + '" style="width: 100%;" placeholder="Pilih Barang.." name="nama_' + count + '" onClick="barang(' + count + ')" type="text" class="input-small" readonly onfocus="hitung_harga(' + count + ')" autocomplete="off" required/></td>'
                + '<td style="width: 10%;"><input id="stok_' + count + '" style="width: 100%; text-align: right;" placeholder="Pilih Barang.." name="stok_' + count + '" onClick="barang(' + count + ')" type="text" class="input-small" readonly onfocus="hitung_harga(' + count + ')" autocomplete="off" required/></td>'
                + '<td style="width: 20%;"> Rp. <input id="harga_' + count + '" name="harga_' + count + '" style="width: 70%; text-align: right;" value="0" style="text-align: right;" type="text" class="harga input-small" readonly autocomplete="off" required/>  X</td>'
                + '<td style="width: 50px;"><input onkeyup="hitung_harga(' + count + ')" id="jumlah_' + count + '" value="" style="text-align: center;  width: 50px; background-color: rgb(255, 176, 254);" name="jumlah_' + count + '" value="" type="text" class="jumlah_' + count + ' input-small" autocomplete="off" required/></td>'
                + '<td class="totitem" style="width: 20%;">Rp. <input type="text" id="sum' + count + '" class="tot" style="text-align: right;"  value="0" name="subtot_' + count + '" onClick="totalbelanja()" readonly autocomplete="off" required/></td>'
                + '<td style="width: 20%;"><span class="label label-danger"><a id="remove_item" class="remove" href="#" style="text-decoration: width: 70%; none; color: #fff;" ><i class="fa fa-fw fa-trash"></i>Delete</a></span>'
                + '<input id="a_stok_' + count + '" name="a_stok_' + count + '" type="hidden" value="" ></td></tr>'
                + '<input id="rows_' + count + '" name="rows[]" value="'+ count +'" type="hidden"></td></tr>'
        );
        barang(count);
      });
/*CALL DATE PICKER*/
function addDP($els) {
        $els.Zebra_DatePicker({
            'days': ['Minggu', 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu'],
            'months': ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'],
            'lang_clear_date': 'Clear',
            'show_select_today': 'Today'
        });
    }
/*END DATE PICKER*/
/*Hapus input*/ 
$('#id_form').on('click', '.remove', function (ev) {
    if (ev.type == 'click') {
            $(this).parents(".records").fadeOut();
            $(this).parents(".records").remove();
        }
        totalbelanja();
    });


function barang(){
var pop;
pop = window.open('pages/web/tampil_barang_ready.php?list='+count,'popuppage','width=800,toolbar=0,resizable=0,scrollbars=no,height=550,top=100,left=100');
pop.window.focus();
//pop.document.getElementById('kdlist').value = array_kdbarang.val();
}

/*PERIKSA KODE BARANG YANG TELAH DI INPUTKAN JIKA SAMA BERI PERINGATAN*/
function cek_kdbarang_sama(){ 
 var arr =[];
  $('#container .kdbrang').find('input').each(function() { 
        arr.push($(this).val());
        }).get();
  compressArray(arr);

}
/*fungsi untuk tombol cek*/
function deteksi(arr){
  var d= arr;
    compressArray(d);
//console.log(compressArray(arr));
}

function compressArray(original) {
 /*[
 ========================================= 
 dari https://gist.github.com/ralphcrisostomo/3141412#file-array_dupplicate_counter-js-L44 
 Contoh data :
  var testArray = new Array("dog", "dog", "cat", "buffalo", "wolf", "cat", "tiger", "cat");
  var newArray = compressArray(testArray);

hasil output 
=====================
console: [
  Object { value="dog", count=2}, 
  Object { value="cat", count=3}, 
  Object { value="buffalo", count=1}, 
  Object { value="wolf", count=1}, 
  Object { value="tiger", count=1}
]

 ===========================================
 ]*/
  var compressed = [];
  // make a copy of the input array
  var copy = original.slice(0);
 
  // first loop goes over every element
  for (var i = 0; i < original.length; i++) {
 
    var myCount = 0;  
    // loop over every element in the copy and see if it's the same
    for (var w = 0; w < copy.length; w++) {
      if (original[i] == copy[w]) {
        // increase amount of times duplicate is found
        myCount++;
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
      alert("Barang yang diinput sudah ada.");
    } 
  }  
 return console.log(compressed);
};
/* END  PERIKSA KODE BARANG YANG TELAH DI INPUTKAN JIKA SAMA BERI PERINGATAN*/

}); /*END $(document).ready(function() {*/


