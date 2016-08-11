<div class="row">
<div class="col-md-12">



<div class="box box-solid box-warning">


  <div class="box-header with-border">
    <h3 class="box-title">Backup Database</h3>
    <div class="box-tools pull-right">
      <!-- Buttons, labels, and many other things can be placed here! -->
      <!-- Here is a label for example -->
      <span class="label label-primary"><?php echo date("d M Y") ?></span>
    </div><!-- /.box-tools -->
  </div><!-- /.box-header -->
  <div class="box-body">
    
<?php 

//include('tmp/backuprestore.php');
include('backuprestore.php');
?> 


  </div><!-- /.box-body -->
  <div class="box-footer">
   Backup Database
  </div><!-- box-footer -->
</div><!-- /.box -->


</div>
</div>