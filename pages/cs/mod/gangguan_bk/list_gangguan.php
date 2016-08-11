<div class="box box-primary">
                <div class="box-header with-border">
                  <h3 class="box-title">DAFTAR GANGGUAN</h3>
                  <div class="box-tools pull-right">
                    <div class="has-feedback">
                      <input type="text" class="form-control input-sm" placeholder="Search Mail">
                      <span class="glyphicon glyphicon-search form-control-feedback"></span>
                    </div>
                  </div><!-- /.box-tools -->
                </div><!-- /.box-header -->
                <div class="box-body no-padding">
                  <div class="mailbox-controls">
                    <!-- Check all button -->
                    <button class="btn btn-default btn-sm checkbox-toggle" onclick="add_gangguan()"><i class="glyphicon glyphicon-plus"></i></button>
                    <div class="btn-group">
                      <button class="btn btn-default btn-sm" ><i class="fa fa-trash-o"></i></button>
                      <button class="btn btn-default btn-sm"><i class="fa fa-reply"></i></button>
                      <button class="btn btn-default btn-sm"><i class="fa fa-share"></i></button>
                    </div><!-- /.btn-group -->
                    <button class="btn btn-default btn-sm" onclick="load_list_gangguan()"><i class="fa fa-refresh"></i></button>
                    <div class="pull-right">
                      1-50/200
                      <div class="btn-group">
                        <button class="btn btn-default btn-sm"><i class="fa fa-chevron-left"></i></button>
                        <button class="btn btn-default btn-sm"><i class="fa fa-chevron-right"></i></button>
                      </div><!-- /.btn-group -->
                    </div><!-- /.pull-right -->
                  </div>
                  <div class="table-responsive mailbox-messages">
                    <table class="table table-hover table-striped">
                    <thead>
                      <tr>
                        <th>No</th>
                        <th>Kode</th>
                        <th>Pelapor</th>
                        <th>Keterangan Gangguan</th>
                        <th>Awal Gangguan</th>
                        <th>Waktu</th>
                      </tr>
                    </thead>
                      <tbody>
<?php
    require("../../../../_db.php");  
    $no=0;            
    $q_gangguan = mysql_query("SELECT tb_gangguan.*, tb_pelanggan.nama FROM `tb_gangguan` JOIN tb_pelanggan WHERE tb_gangguan.id_pelanggan=tb_pelanggan.id_pelanggan");
    while($gangguan = mysql_fetch_array($q_gangguan)){
    $no++;
?> 
<tr>
      <td><?php echo $no; ?></td>
      <td ><a href="#"><?php echo  $gangguan['id_gangguan']; ?></a></td>
      <td class="mailbox-name"><a href="read-mail.html"><?php echo  $gangguan['pelapor']; ?></a></td>
                          <td class="mailbox-subject"><b><?php echo  $gangguan['nama']; ?></b> - <?php echo  $gangguan['keteranan']; ?></td>
                          <td class="mailbox-attachment"><?php echo  tgl_indonesia($gangguan['tgl_pelaporan']); ?></td>
                          <td class="mailbox-date"><?php echo  selisihwaktu($gangguan['tgl_gangguan']); ?></td> 
</tr>
<?php } ?>   


                        <tr>
                          <td><div class="icheckbox_flat-blue" aria-checked="false" aria-disabled="false" style="position: relative;"><input type="checkbox" style="position: absolute; opacity: 0;"><ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; border: 0px; opacity: 0; background: rgb(255, 255, 255);"></ins></div></td>
                          <td class="mailbox-star"><a href="#"><i class="fa fa-star text-yellow"></i></a></td>
                          <td class="mailbox-name"><a href="read-mail.html">Alexander Pierce</a></td>
                          <td class="mailbox-subject"><b>AdminLTE 2.0 Issue</b> - Trying to find a solution to this problem...</td>
                          <td class="mailbox-attachment"></td>
                          <td class="mailbox-date">5 mins ago</td>
                        </tr>
                        <tr>
                          <td><div class="icheckbox_flat-blue" aria-checked="false" aria-disabled="false" style="position: relative;"><input type="checkbox" style="position: absolute; opacity: 0;"><ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; border: 0px; opacity: 0; background: rgb(255, 255, 255);"></ins></div></td>
                          <td class="mailbox-star"><a href="#"><i class="fa fa-star-o text-yellow"></i></a></td>
                          <td class="mailbox-name"><a href="read-mail.html">Alexander Pierce</a></td>
                          <td class="mailbox-subject"><b>AdminLTE 2.0 Issue</b> - Trying to find a solution to this problem...</td>
                          <td class="mailbox-attachment"><i class="fa fa-paperclip"></i></td>
                          <td class="mailbox-date">28 mins ago</td>
                        </tr>
                        <tr>
                          <td><div class="icheckbox_flat-blue" aria-checked="false" aria-disabled="false" style="position: relative;"><input type="checkbox" style="position: absolute; opacity: 0;"><ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; border: 0px; opacity: 0; background: rgb(255, 255, 255);"></ins></div></td>
                          <td class="mailbox-star"><a href="#"><i class="fa fa-star-o text-yellow"></i></a></td>
                          <td class="mailbox-name"><a href="read-mail.html">Alexander Pierce</a></td>
                          <td class="mailbox-subject"><b>AdminLTE 2.0 Issue</b> - Trying to find a solution to this problem...</td>
                          <td class="mailbox-attachment"><i class="fa fa-paperclip"></i></td>
                          <td class="mailbox-date">11 hours ago</td>
                        </tr>
                        <tr>
                          <td><div class="icheckbox_flat-blue" aria-checked="false" aria-disabled="false" style="position: relative;"><input type="checkbox" style="position: absolute; opacity: 0;"><ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; border: 0px; opacity: 0; background: rgb(255, 255, 255);"></ins></div></td>
                          <td class="mailbox-star"><a href="#"><i class="fa fa-star text-yellow"></i></a></td>
                          <td class="mailbox-name"><a href="read-mail.html">Alexander Pierce</a></td>
                          <td class="mailbox-subject"><b>AdminLTE 2.0 Issue</b> - Trying to find a solution to this problem...</td>
                          <td class="mailbox-attachment"></td>
                          <td class="mailbox-date">15 hours ago</td>
                        </tr>
                        <tr>
                          <td><div class="icheckbox_flat-blue" aria-checked="false" aria-disabled="false" style="position: relative;"><input type="checkbox" style="position: absolute; opacity: 0;"><ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; border: 0px; opacity: 0; background: rgb(255, 255, 255);"></ins></div></td>
                          <td class="mailbox-star"><a href="#"><i class="fa fa-star text-yellow"></i></a></td>
                          <td class="mailbox-name"><a href="read-mail.html">Alexander Pierce</a></td>
                          <td class="mailbox-subject"><b>AdminLTE 2.0 Issue</b> - Trying to find a solution to this problem...</td>
                          <td class="mailbox-attachment"><i class="fa fa-paperclip"></i></td>
                          <td class="mailbox-date">Yesterday</td>
                        </tr>
                        <tr>
                          <td><div class="icheckbox_flat-blue" aria-checked="false" aria-disabled="false" style="position: relative;"><input type="checkbox" style="position: absolute; opacity: 0;"><ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; border: 0px; opacity: 0; background: rgb(255, 255, 255);"></ins></div></td>
                          <td class="mailbox-star"><a href="#"><i class="fa fa-star-o text-yellow"></i></a></td>
                          <td class="mailbox-name"><a href="read-mail.html">Alexander Pierce</a></td>
                          <td class="mailbox-subject"><b>AdminLTE 2.0 Issue</b> - Trying to find a solution to this problem...</td>
                          <td class="mailbox-attachment"><i class="fa fa-paperclip"></i></td>
                          <td class="mailbox-date">2 days ago</td>
                        </tr>
                        <tr>
                          <td><div class="icheckbox_flat-blue" aria-checked="false" aria-disabled="false" style="position: relative;"><input type="checkbox" style="position: absolute; opacity: 0;"><ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; border: 0px; opacity: 0; background: rgb(255, 255, 255);"></ins></div></td>
                          <td class="mailbox-star"><a href="#"><i class="fa fa-star-o text-yellow"></i></a></td>
                          <td class="mailbox-name"><a href="read-mail.html">Alexander Pierce</a></td>
                          <td class="mailbox-subject"><b>AdminLTE 2.0 Issue</b> - Trying to find a solution to this problem...</td>
                          <td class="mailbox-attachment"><i class="fa fa-paperclip"></i></td>
                          <td class="mailbox-date">2 days ago</td>
                        </tr>
                        <tr>
                          <td><div class="icheckbox_flat-blue" aria-checked="false" aria-disabled="false" style="position: relative;"><input type="checkbox" style="position: absolute; opacity: 0;"><ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; border: 0px; opacity: 0; background: rgb(255, 255, 255);"></ins></div></td>
                          <td class="mailbox-star"><a href="#"><i class="fa fa-star text-yellow"></i></a></td>
                          <td class="mailbox-name"><a href="read-mail.html">Alexander Pierce</a></td>
                          <td class="mailbox-subject"><b>AdminLTE 2.0 Issue</b> - Trying to find a solution to this problem...</td>
                          <td class="mailbox-attachment"></td>
                          <td class="mailbox-date">2 days ago</td>
                        </tr>
                        <tr>
                          <td><div class="icheckbox_flat-blue" aria-checked="false" aria-disabled="false" style="position: relative;"><input type="checkbox" style="position: absolute; opacity: 0;"><ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; border: 0px; opacity: 0; background: rgb(255, 255, 255);"></ins></div></td>
                          <td class="mailbox-star"><a href="#"><i class="fa fa-star text-yellow"></i></a></td>
                          <td class="mailbox-name"><a href="read-mail.html">Alexander Pierce</a></td>
                          <td class="mailbox-subject"><b>AdminLTE 2.0 Issue</b> - Trying to find a solution to this problem...</td>
                          <td class="mailbox-attachment"></td>
                          <td class="mailbox-date">2 days ago</td>
                        </tr>
                        <tr>
                          <td><div class="icheckbox_flat-blue" aria-checked="false" aria-disabled="false" style="position: relative;"><input type="checkbox" style="position: absolute; opacity: 0;"><ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; border: 0px; opacity: 0; background: rgb(255, 255, 255);"></ins></div></td>
                          <td class="mailbox-star"><a href="#"><i class="fa fa-star-o text-yellow"></i></a></td>
                          <td class="mailbox-name"><a href="read-mail.html">Alexander Pierce</a></td>
                          <td class="mailbox-subject"><b>AdminLTE 2.0 Issue</b> - Trying to find a solution to this problem...</td>
                          <td class="mailbox-attachment"></td>
                          <td class="mailbox-date">2 days ago</td>
                        </tr>
                        <tr>
                          <td><div class="icheckbox_flat-blue" aria-checked="false" aria-disabled="false" style="position: relative;"><input type="checkbox" style="position: absolute; opacity: 0;"><ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; border: 0px; opacity: 0; background: rgb(255, 255, 255);"></ins></div></td>
                          <td class="mailbox-star"><a href="#"><i class="fa fa-star-o text-yellow"></i></a></td>
                          <td class="mailbox-name"><a href="read-mail.html">Alexander Pierce</a></td>
                          <td class="mailbox-subject"><b>AdminLTE 2.0 Issue</b> - Trying to find a solution to this problem...</td>
                          <td class="mailbox-attachment"><i class="fa fa-paperclip"></i></td>
                          <td class="mailbox-date">4 days ago</td>
                        </tr>
                        <tr>
                          <td><div class="icheckbox_flat-blue" aria-checked="false" aria-disabled="false" style="position: relative;"><input type="checkbox" style="position: absolute; opacity: 0;"><ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; border: 0px; opacity: 0; background: rgb(255, 255, 255);"></ins></div></td>
                          <td class="mailbox-star"><a href="#"><i class="fa fa-star text-yellow"></i></a></td>
                          <td class="mailbox-name"><a href="read-mail.html">Alexander Pierce</a></td>
                          <td class="mailbox-subject"><b>AdminLTE 2.0 Issue</b> - Trying to find a solution to this problem...</td>
                          <td class="mailbox-attachment"></td>
                          <td class="mailbox-date">12 days ago</td>
                        </tr>
                        <tr>
                          <td><div class="icheckbox_flat-blue" aria-checked="false" aria-disabled="false" style="position: relative;"><input type="checkbox" style="position: absolute; opacity: 0;"><ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; border: 0px; opacity: 0; background: rgb(255, 255, 255);"></ins></div></td>
                          <td class="mailbox-star"><a href="#"><i class="fa fa-star-o text-yellow"></i></a></td>
                          <td class="mailbox-name"><a href="read-mail.html">Alexander Pierce</a></td>
                          <td class="mailbox-subject"><b>AdminLTE 2.0 Issue</b> - Trying to find a solution to this problem...</td>
                          <td class="mailbox-attachment"><i class="fa fa-paperclip"></i></td>
                          <td class="mailbox-date">12 days ago</td>
                        </tr>
                        <tr>
                          <td><div class="icheckbox_flat-blue" aria-checked="false" aria-disabled="false" style="position: relative;"><input type="checkbox" style="position: absolute; opacity: 0;"><ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; border: 0px; opacity: 0; background: rgb(255, 255, 255);"></ins></div></td>
                          <td class="mailbox-star"><a href="#"><i class="fa fa-star text-yellow"></i></a></td>
                          <td class="mailbox-name"><a href="read-mail.html">Alexander Pierce</a></td>
                          <td class="mailbox-subject"><b>AdminLTE 2.0 Issue</b> - Trying to find a solution to this problem...</td>
                          <td class="mailbox-attachment"><i class="fa fa-paperclip"></i></td>
                          <td class="mailbox-date">14 days ago</td>
                        </tr>
                        <tr>
                          <td><div class="icheckbox_flat-blue" aria-checked="false" aria-disabled="false" style="position: relative;"><input type="checkbox" style="position: absolute; opacity: 0;"><ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; border: 0px; opacity: 0; background: rgb(255, 255, 255);"></ins></div></td>
                          <td class="mailbox-star"><a href="#"><i class="fa fa-star text-yellow"></i></a></td>
                          <td class="mailbox-name"><a href="read-mail.html">Alexander Pierce</a></td>
                          <td class="mailbox-subject"><b>AdminLTE 2.0 Issue</b> - Trying to find a solution to this problem...</td>
                          <td class="mailbox-attachment"><i class="fa fa-paperclip"></i></td>
                          <td class="mailbox-date">15 days ago</td>
                        </tr>
                      </tbody>
                    </table><!-- /.table -->
                  </div><!-- /.mail-box-messages -->
                </div><!-- /.box-body -->
                <div class="box-footer no-padding">
                  <div class="mailbox-controls">
                    <!-- Check all button -->
                    <button class="btn btn-default btn-sm checkbox-toggle"><i class="fa fa-square-o"></i></button>
                    <div class="btn-group">
                      <button class="btn btn-default btn-sm"><i class="fa fa-trash-o"></i></button>
                      <button class="btn btn-default btn-sm"><i class="fa fa-reply"></i></button>
                      <button class="btn btn-default btn-sm"><i class="fa fa-share"></i></button>
                    </div><!-- /.btn-group -->
                    <button class="btn btn-default btn-sm"><i class="fa fa-refresh"></i></button>
                    <div class="pull-right">
                      1-50/200
                      <div class="btn-group">
                        <button class="btn btn-default btn-sm"><i class="fa fa-chevron-left"></i></button>
                        <button class="btn btn-default btn-sm"><i class="fa fa-chevron-right"></i></button>
                      </div><!-- /.btn-group -->
                    </div><!-- /.pull-right -->
                  </div>
                </div>
              </div>