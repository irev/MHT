<div class="box box-primary">
<div class="box-body box-profile">
<!--link rel="stylesheet" href="pages/web/mod/teknisi/upload_file_ajax/style.css" /-->
<link href='http://fonts.googleapis.com/css?family=Roboto+Condensed|Open+Sans+Condensed:300' rel='stylesheet' type='text/css'>
<!--script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script-->
<!--script src="pages/web/mod/teknisi/upload_file_ajax/script.js"></script-->

<div class="main">
<!--h1>Ajax Image Upload</h1><br/-->
<hr>
<form id="uploadimage" enctype="multipart/form-data">
<center>
<input type="text" value="0" hidden>
<div id="image_preview"><img id="previewing" width="100" height="150" src="assets/img/user/noimage.jpg" class="img-responsive img-circle" /></div>
<hr id="line">
<div id="selectImage">
<label>Pilih Foto</label><br/>

<input type="file" name="file" id="file" class="btn btn-warning" style="color: black;" required />
<br>
<input type="submit" id="upload" value="Upload" class="btn btn-primary uploadganti" />
</center>
</div>
</form>
</div>
<h4 id='loading' >Loading..</h4>
<div id="message"></div>
</div>
</div>


<script type="text/javascript">
$(document).ready(function (e) {
	$("#uploadimage").on('submit',(function(e) {
	console.log('uploadganti foto =' + e);
e.preventDefault();
$("#message").empty();
$('#loading').show();
$.ajax({
url: "pages/web/mod/teknisi/upload_file_ajax/ajax_ganti_foto_file.php", // Url to which the request is send
type: "POST",             // Type of request to be send, called as method
data: new FormData(this), // Data sent to server, a set of key/value pairs (i.e. form fields and values)
contentType: false,       // The content type used when sending data to the server.
cache: false,             // To unable request pages to be cached
processData:false,        // To send DOMDocument or non processed data file it is set to false
success: function(data)   // A function to be called if request succeeds
{
$('#loading').hide();
$("#message").html(data);
}
});
}));	


// Function to preview image after validation
$(function() {
$("#file").change(function() {
$("#message").empty(); // To remove the previous error message
var file = this.files[0];
var imagefile = file.type;
var match= ["image/jpeg","image/png","image/jpg"];
if(!((imagefile==match[0]) || (imagefile==match[1]) || (imagefile==match[2])))
{
$('#previewing').attr('src','noimage.png');
$("#message").html("<p id='error'>Pilih file image</p>"+"<h4>Note</h4>"+"<span id='error_message'>Only jpeg, jpg and png Images type allowed</span>");
return false;
}
else
{
var reader = new FileReader();
reader.onload = imageIsLoaded;
reader.readAsDataURL(this.files[0]);
}
});
});

function imageIsLoaded(e) {
$("#file").css("color","green");
$('#image_preview').css("display", "block");
$('#previewing').attr('src', e.target.result);
$('#menu-avatar').attr('src', e.target.result);
$('#previewing').attr('width', '50');
$('#previewing').attr('height', '50');

$('#previewing2').attr('width', '100');
$('#previewing2').attr('height', '100');
};
});
</script>