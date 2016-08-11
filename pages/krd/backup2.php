<?php 
//include("_db.php");
 ?>

<div class="row">
<div class="col-md-12">



<div class="box box-solid box-warning">


  <div class="box-header with-border">
    <h3 class="box-title">Backup Database</h3>
    <div class="box-tools pull-right">
      <!-- Buttons, labels, and many other things can be placed here! -->
      <!-- Here is a label for example -->
      <span class="label label-primary">Backup Database</span>
    </div><!-- /.box-tools -->
  </div><!-- /.box-header -->
  <div class="box-body">
    
<?php 

//include('tmp/backuprestore.php');
include('backuprestore.php');
?> 


  </div><!-- /.box-body -->
  <div class="box-footer">
    The footer of the box
  </div><!-- box-footer -->
</div><!-- /.box -->


</div>
</div>



<?php
include('_script.php');
//ob_end_flush();
?> 