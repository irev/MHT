var loadbarang = function(){
                var barang = function(id_b) {
                          this.ids = id_b
                          console.log(id_b); 
                        var parent = id_b;
                        var pop;
                        pop = window.open('pages/web/tampil_barang_ready.php?list=' + parent, 'popuppage', 'width=800,toolbar=0,resizable=0,scrollbars=no,height=550,top=100');
                        pop.window.focus();

                        $(".harga_"+parent).on("input propertychange",function(){
                        totalbelanja();
                      // Do your thing here.
                        });
                  } 

                $(document).ready(function() {
                                //this calculates values automatically 
                                var idnya = $(".records .urut").attr('id');
                                hitung_harga(idnya);


                                $(".jumlah").on("keydown keyup", function() {
                                  hitung_harga(idnya);
                                        });
                        });
/* hitung_harga(barang ke)     */
                var hitung_harga = function(b) {
                        //var idnya = $("div.urut").attr('id');
                        var idnya = b;
                        var jum = $("input.jumlah_" + idnya).val();
                        var har = $("#harga_" + idnya).val();
                        var a_stok = $("#a_stok_" + idnya).val();
                        var stok = $("#stok_" + idnya).val();
                        var tot;
                        var sisa;

                        //iterate through each textboxes and add the values
                        $(".jumlah_" + idnya).each(function() {
                                        //add only if the value is number
                                        if (!isNaN(this.value) && this.value.length > 0 && this.value >= 1 ) {
                                                // sum += parseFloat(har.value);
                                                $(".tot").addClass("sum" + idnya);
                                                $(".sum" + idnya).removeClass("tot");

                                          sisa = $("#stok_" + idnya).val(a_stok - Math.abs(jum)); /*hitung sisa*/
                                              if (sisa.val() < 0){  /*cek stok apa bila kurang dari pemesanan*/
                                                    $("#stok_" + idnya).val(a_stok); /* kembalikan jumlah stok apa bila kurang*/
                                                    $(".jumlah_" + idnya).val("");
                                                    $("#sum" + idnya).val(0);
                                                    alert("Stok Barang kurang dari : " + a_stok);
                                              }else {     
                                                tot = $("#sum" + idnya).val(Math.abs(jum) * har); /*Hitung total transaksi*/
                                                $(this).css("background-color", "#FEFFB0");
                                                $('#add_btn').show( "fast" );
                                                $('#add_btn2').show( "fast" );
                                               // document.getElementById('add_btn').style.visibility = 'visible';
                                               // document.getElementById('add_btn2').style.visibility = 'visible';
                                                document.getElementById("add_btn").disabled = false;
                                                document.getElementById("add_btn2").disabled = false;
                                                //document.getElementById('add_btn').style.visibility = 'visible';
                                               // document.getElementById('add_btn2').style.visibility = 'visible';
                                                
                                              }  
                                               console.log(jum +" "+ this.value);

                                        }  else if (jum < 1 || this.value == 0) {
                                                $(this).css("background-color", "rgb(255, 176, 254)"); /*pink*/
                                                $(this).val("");
                                                 tombol("no");
                                                document.getElementById('add_btn').style.display = 'none';
                                                document.getElementById('add_btn2').style.display = 'none';
                                                 $( "add_btn" ).hide( 1000 );
                                                 $( "add_btn2" ).hide( 1000 );
                                                 document.getElementById("cek-barang").checked = false;

                                        } else if (this.value.length != '') {
                                                $(this).css("background-color", "rgba(239, 51, 64, 0.56)"); 
                                                $(this).val("");
                                                tombol("no");
                                                document.getElementById('add_btn').style.display = 'none';
                                                document.getElementById('add_btn2').style.display = 'none';
                                                 $( "add_btn" ).hide( 1000 );
                                                 $( "add_btn2" ).hide( 1000 );
                                                 document.getElementById("cek-barang").checked = false;
                                        }
                                });
                        totalbelanja();   
                }

                var tombol = function(status) {
                  if(status=='ok'){
                            document.getElementById('add_btn').style.display = 'block';
                            document.getElementById('add_btn2').style.display = 'block';
                            document.getElementById("cek-barang").checked = true;
                        }else{
                            document.getElementById('add_btn').style.display = 'none';
                            document.getElementById('add_btn2').style.display = 'none';
                            document.getElementById("cek-barang").checked = false;
                        }
                }

                var totalbelanja = function() {
                        //iterate through each row in the table
                        $('tr').each(function() {
                                        //the value of sum needs to be reset for each row, so it has to be set inside the row loop
                                        var sumTot = 0;
                                        var t;
                                        //find the combat elements in the current row and sum it 
                                        $('#container .totitem').find('input').each(function() {
                                                        var totTransaksi = $(this);
                                                        //alert(parseInt(totTransaksi.val()));
                                                        if (!isNaN(totTransaksi.val()) && totTransaksi.length !== 0) {
                                                                sumTot += parseFloat(totTransaksi.val());
                                                        }
                                                });
                                      //set the value of currents rows sum to the total-combat element in the current row
                                       t = sumTot.toLocaleString();
                                       to =sumTot;
                                       $('.total-combat', this).html(' <h4><font color="red"><input style="baground:#333; text-align: right;" name="totalview" type="text" value="' + t + ',00" readonly/><input name="total" value="' + to + '" type="hidden"></font></h4>');
                                        //alert(sumTot);
                                });
                }

                $(".alert").fadeTo(2000, 500).slideUp(700, function(){ 
                $('#alert').modal('hide'); 
                $(".modal").modal('hide');
                $(".alert").alert('close');  
                $("#alert").removeAttr("style");
                $(".alert").removeAttr("style");
                });   

  return {
  barang: function(ids) {
    barang(ids);
  },
  hitung_harga: function(b) {
    hitung_harga(b);
  },
  totalbelanja: function(){
    totalbelanja();
  },
  addsup: function(){
    addsup();
  },
  bindDatePicker: function(ele){
    bindDatePicker(ele);
  },
  tombol: function(status){
    tombol(status);
  }

}          

}();