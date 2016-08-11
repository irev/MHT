<?php 
session_start();
if(!isset($_SESSION['login_hash']))
{
  echo "What your looking for..??";
}else{
 ?>
<div class="col-md-12">
              <!-- About Me Box -->
              <div class="box box-primary">
                <div class="box-header with-border">
                  <h3 class="box-title">About Me</h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                  <strong><i class="fa fa-book margin-r-5"></i>  Education</strong>
                  <p class="text-muted">
                    B.S. in Computer Science from the University of Tennessee at Knoxville
                  </p>

                  <hr>

                  <strong><i class="fa fa-map-marker margin-r-5"></i> Location</strong>
                  <p class="text-muted">Malibu, California</p>

                  <hr>

                  <strong><i class="fa fa-phone margin-r-5"></i> Phone</strong>
                  <p>
                    <span class="label label-danger">UI Design</span>
                    <span class="label label-success">Coding</span>
                    <span class="label label-info">Javascript</span>
                    <span class="label label-warning">PHP</span>
                    <span class="label label-primary">Node.js</span>
                  </p>
                </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div>
<?php  } ?>     