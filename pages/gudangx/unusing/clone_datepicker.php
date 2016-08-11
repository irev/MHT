<link href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.11.4/jquery-ui.min.css" rel="stylesheet"/>
<link rel="stylesheet" href="http://jqueryvalidation.org/files/demo/site-demos.css">
<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" rel="stylesheet" integrity="sha256-MfvZlkHCEqatNoGiOXveE8FIwMzZg4W85qfrfIFBfYc= sha512-dTfge/zgoMYpP7QbHy4gWMEGsbsdZeCXz7irItjcC3sPUFtf0kuFbDz/ixG7ArTxmDjLXDmezHubeNikyKGVyQ==" crossorigin="anonymous">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.11.4/jquery-ui.min.js"></script>
<script src="http://jqueryvalidation.org/files/dist/jquery.validate.min.js"></script>
<form id="myform">
<div class="container-fluid cloned-row1" id="myRow">
<div class="row well">
    <div class="col-xs-6 col-sm-3 col-md-4 col-lg-3">
        <label>School Name</label>
        <br/>
        <select class="slt_Field txt_schName" name="txt_schName[]">
            <option value="">Please Select</option>
            <option value="Emirates College of Technology- UAE">COL000001</option>
            <option value="Al Khawarizmi International College- UAE">COL000002</option>
            <option value="Syscoms College">COL000003</option>
            <option value="Abounajm Khanj Pre-Uni Center">COL000004</option>
            <option value="Advanced Placement">COL000005</option>
            <option value="Al Buraimi College (Uni Clge)">COL000006</option>
            <option value="Al-Ain Community College">COL000007</option>
            <option value="AMA Computer College">COL000008</option>
            <option value="Arab Academy for Bankg and Fin">COL000009</option>
            <option value="ARABACDSCITECHMARTIMETRNS">COL000010</option>
            <option value="Arapahoe Community College">COL000011</option>
        </select>
    </div>
    <div class="col-xs-6 col-sm-3 col-md-4 col-lg-3">
        <br>
        <input type="text" class="ipt_Field school_Name" name="school_Name[]" disabled/>
    </div>
    <div class="col-xs-6 col-sm-3 col-md-4 col-lg-3">
        <label><span class="text-error">*</span>High School Avg / CGPA</label>
        <br/>
        <input type="text" class="ipt_Field ipt_Havg" id="" name="ipt_Havg[]" />
    </div>
    <div class="col-xs-6 col-sm-3 col-md-4 col-lg-3">
        <label><span class="text-error">*</span>Grade Type @</label>
        <br/>
        <select class="slt_Field ipt_grd" name="ipt_grd[]">
            <option value="">Please Select</option>
            <option value="n">100</option>
            <option value="n1">4</option>
            <option value="c">CHAR</option>
        </select>
    </div>
    <input type="text" placeholder="MM/DD/YYYY" class="ipt_Field" id="txt_Degdat" name="txt_Fdob" />
	<br />
	<button class="btn_less1 btn_right ">Less</button>
	<button class="btn_more btn_right edu_add_button">Add More</button>	
</div>
</div>
</form>

<script type="text/javascript">
    $(document).ready(function(){
    jQuery.validator.setDefaults({
      debug: true,
      success: "valid"
    });
    var form = $( "#myform" );
    form.validate();
    $(".ipt_Field").on('change', function() {
        if ($(this).valid()) {
            $(this).removeClass('errRed');
        }
        // triggers the validation test on change
    });     
    
    bindDatePicker($("#txt_Degdat"));   
    
});

function bindDatePicker(ele) {
    ele.datepicker({
        dateFormat: "mm-dd-yy",
        changeMonth: true,
        changeYear: true,
        yearRange: '1900:2100'
    }).datepicker("setDate", "0");
}

var rowId = 'rowId';
var count = 1;
$(document).on("click", ".edu_add_button", function() {
    //var i = $('.cloned-row1').length;
    var that = $(".cloned-row1:first").clone(false);
    that.insertAfter(".cloned-row1:last").attr({'id': rowId + count}).end().find('[id]').val('').attr({
        'id': function(_, id) {
                return id + count
        }
    });

    that.find(".school_Name").attr('disabled', true).val('');
    that.find(".degree_Description").attr('disabled', true).val('');
    //that.find('.datepicker,.datepicker1').removeClass('hasDatepicker').datepicker();
    that.find("#txt_Degdat"+count).removeClass('hasDatepicker');
    bindDatePicker(that.find("#txt_Degdat"+count)); 
    count++;

    return false;
});

$(document).on('click', ".btn_less1", function() {
    var len = $('.cloned-row1').length;
    if (len > 1) {
          $(this).parent().parent().remove();
    }
});
    
</script>