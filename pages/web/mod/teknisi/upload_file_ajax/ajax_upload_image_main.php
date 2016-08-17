<div class="box box-primary">
<div class="box-body box-profile">
<!--link rel="stylesheet" href="pages/web/mod/teknisi/upload_file_ajax/style.css" /-->
<link href='http://fonts.googleapis.com/css?family=Roboto+Condensed|Open+Sans+Condensed:300' rel='stylesheet' type='text/css'>
<!--script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script-->
<script src="pages/web/mod/teknisi/upload_file_ajax/script.js"></script>

<div class="main">
<!--h1>Ajax Image Upload</h1><br/-->
<hr>
<form id="uploadimage" enctype="multipart/form-data">
<center>
<div id="image_preview"><img id="previewing" width="100" height="150" src="assets/img/user/noimage.jpg" class="img-responsive img-circle" /></div>
<hr id="line">
<div id="selectImage">
<label>Pilih Foto </label><br/>
<input type="file" name="file" id="file" class="btn btn-warning" style="color: black;" required />
<br>
<input type="submit" value="Upload" class="btn btn-primary submit" />
</center>
</div>
</form>
</div>
<h4 id='loading' >Loading..</h4>
<div id="message"></div>
</div>
</div>