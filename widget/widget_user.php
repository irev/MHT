<div class="col-md-5">
                <div class="box box-danger">
                    <div class="box-header with-border">
                      <h3 class="box-title">Daftar Karyawan</h3>
                      <div class="box-tools pull-right">
                        <!--span class="label label-danger">8 New Members</span-->
                        <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                        <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                      </div>
                    </div><!-- /.box-header -->
                    <div class="box-body no-padding" style="display: block;">
<ul class="users-list clearfix">
<?php 
require("../_db.php"); 
$q_usr= mysql_query("SELECT * FROM `tb_karyawan`");
while ($usr = mysql_fetch_array($q_usr)) {
?>
                        <li>
                        <?php 
                          echo  '<img src="assets/img/user/'.$usr['avatar'].'" alt="User Image">';
                        ?>
                          <a class="users-list-name" href="#"><?php echo $usr['nama']; ?></a>
                         <?php 
                            if($usr['online']=='1'){
                              echo '<a href="#"><i class="fa fa-circle text-success"></i> Online</a>';
                          } elseif($usr['online']=='0'){
                            echo '<a href="#"><i class="fa fa-circle text-red"></i> offline</a>';
                          }else{
                              echo '<a href="#"><i class="fa fa-circle text-gray"></i> Logout</a>';
                          } 
                          ?>
                          <span class="users-list-date"><?php echo $usr['bagian']; ?></span>
                        </li>

<?php } ?>
                      </ul><!-- /.users-list -->
                    </div><!-- /.box-body -->
                    <div class="box-footer text-center" style="display: block;">
                      <a href="javascript::" class="uppercase"></a>
                    </div><!-- /.box-footer -->
                  </div>
</div>