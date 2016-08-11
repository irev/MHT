var loadbarang = function() {
   var barang = function(ids){
      this.ids = ids
      console.log(ids); 
    var parent = ids;
    var pop;
    pop = window.open('pages/web/tampil_barang.php?&list=' + parent, 'popuppage', 'width=800,toolbar=0,resizable=0,scrollbars=no,height=550,top=100');
    pop.window.focus();

    $(".harga_" + parent).on("input propertychange", function() {
      totalbelanja();
    });
  }
 
  //kalkulasi nilai otomatis  

   var bindDatePicker = function(ele) {
    ele.datepicker({
      format: "mm-dd-yy",
      changeMonth: true,
      changeYear: true,
      yearRange: '2000:2100'
    }).datepicker("setDate", "0");
  }

   var hitung_harga = function(b) {
    //var idnya = $("div.urut").attr('id');
    var idnya = b;
    var jum = $(".jumlah_" + idnya).val();
    var har = $("#harga_" + idnya).val();
    var tot;
    //iterate through each textboxes and add the values
    $(".jumlah_" + idnya).each(function() {
      //add only if the value is number
      console.log(har);
      if (!isNaN(this.value) && this.value.length != 0 && this.value >= 1 && !isNaN(har)) {
        // sum += parseFloat(har.value);
        $(".tot").addClass("sum" + idnya);
        $(".sum" + idnya).removeClass("tot");

        tot = $("#sum" + idnya).val(Math.abs(jum) * har);
        $(this).css("background-color", "#FEFFB0");
        $('#add_btn').show( "fast" );
        $('#add_btn2').show( "fast" );
        tombol('ok');
      }
      else if (this.value = 0) {
        $(this).css("background-color", "rgb(255, 176, 254)");
        $(this).val("");
        tombol('no');
      }
      else if (this.value.length != '') {
        $(this).css("background-color", "rgba(239, 51, 64, 0.56)");
        $(this).val("");
        tombol('no');
      }
    });
    totalbelanja();
  }
               var tombol = function(status) {
              console.log(status);
                  if(status=='ok'){
                            document.getElementById('add_btn').style.display = 'block';
                            document.getElementById('add_btn2').style.display = 'block';
                            document.getElementById("cek-barang").checked = false;
                        }else{
                            document.getElementById('add_btn').style.display = 'none';
                            document.getElementById('add_btn2').style.display = 'none';
                            document.getElementById("cek-barang").checked = false;
                        }
                }


  var totalbelanja =  function() {
    //iterate through each row in the table
    $('tr').each(function() {
      //the value of sum needs to be reset for each row, so it has to be set inside the row loop
      var sumTot = 0;
      var t;
      //find the combat elements in the current row and sum it 
      $('#container .totitem').find('input').each(function() {
        var combat = $(this);
        //alert(parseInt(combat.val()));
        if (!isNaN(combat.val()) && combat.length !== 0) {
          sumTot += parseFloat(combat.val());
        }
      });
      //set the value of currents rows sum to the total-combat element in the current row
      t = sumTot.toLocaleString();
      to = sumTot;
      $('.total-combat', this).html(' <h4><font color="red"><input style="baground:#333; text-align: right;" name="totalview" type="text" value="' + t + ',00" readonly/><input name="total" value="' + to + '" type="hidden"></font></h4>');
     
    });
  }

  $(".alert").fadeTo(2000, 500).slideUp(1000, function() {
    $('#alert').modal('hide');
    $(".modal").modal('hide');
    $(".alert").alert('close');
    $("#alert").removeAttr("style");
    $(".alert").removeAttr("style");
  });

  var addsup = function() {
    //  BootstrapDialog.alert('Hi Apple!'); 
    $('#form_supp')[0].reset(); // reset form on modals
    $('#add_sup').modal('show'); // show bootstrap modal
    $(".modal").modal('show');
    $('#form_supp').validate();
    var validator = $("#form_supp").validate();
    validator.resetForm();
    $('.progress').hide();
    $('.progress').html('<div class="progress-bar progress-bar-striped" role="progressbar" aria-valuenow="0" aria-valuetransitiongoal="40" aria-valuemin="0" aria-valuemax="100" style="width: 0%;">0%</div>');
  }
 
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