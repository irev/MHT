<?php
include_once("../_db.php");
include_once("../widget/pelanggan/hitung_jumlah_data_pelanggan.php");
?>
<div class="col-lg-3 col-sm-6">
<div class="box box-info">
                <div class="box-header with-border">
                  <h3 class="box-title">Maintenance</h3>
                  <div class="box-tools pull-right">
                    <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                    <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                  </div>
                </div><!-- /.box-header -->
                <div class="box-body">
                  <div class="table-responsive">
                    <table class="table no-margin">
                      <thead>
                        <tr>
                          <th>Status</th>
                          <th>Jumlah</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <td><span class="label label-danger">Gangguan</span></td>
                          <td><?php echo hitungGangguan() ?></td>
                        </tr>
                        <tr>
                          <td><span class="label label-info">Pending</span></td>
                          <td><?php echo hitungPending() ?></td>
                        </tr>
                        <tr>
                          <td><span class="label label-success">Done</span></td>
                          <td><?php echo hitungDone() ?></td>
                        </tr>
                        <tr>
                          <td><span class="label label-warning">Process</span></td>
                          <td><?php echo hitungProcess() ?></td>
                        </tr>
                      </tbody>
                    </table>
                  </div><!-- /.table-responsive -->
                </div><!-- /.box-body -->
                <div class="box-footer clearfix">
                <STRONG> Total Maintenance : <?php echo hitungKomplain() ?></STRONG>
                </div><!-- /.box-footer -->
              </div>
</div>
<!--STATUS PELANGGAN-->

<div class="col-lg-2 col-sm-6">
<div class="box box-info">
                <div class="box-header with-border">
                  <h3 class="box-title">Status Pelanggan</h3>
                  <div class="box-tools pull-right">
                    <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                    <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                  </div>
                </div><!-- /.box-header -->
                <div class="box-body">
                  <div class="table-responsive">
                    <table class="table no-margin">
                      <thead>
                        <tr>
                          <th>Status</th>
                          <th>Jumlah</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <td><span class="label label-info">Baru </span></td>
                          <td><?php echo hitung_baru() ?></td>
                        </tr>
                        <tr>
                          <td><span class="label label-success">Aktif</span></td>
                          <td><?php echo hitung_aktif() ?></td>
                        </tr>
                        <tr>
                          <td><span class="label label-warning">Cuti </span></td>
                          <td><?php echo hitung_cuti() ?></td>
                        </tr>
                        <tr>
                          <td><span class="label label-danger">Block</span></td>
                          <td><?php echo hitung_block() ?></td>
                        </tr>
                      </tbody>
                    </table>
                  </div><!-- /.table-responsive -->
                </div><!-- /.box-body -->
                <div class="box-footer clearfix">
                <!--STRONG> Total Pelanggan : <?php echo hitungKomplain() ?></STRONG-->
                <br>
                </div><!-- /.box-footer -->
              </div>
</div>
<!--JMLAH PENGGUNA PAKET-->

<div class="col-lg-2 col-sm-6">
<div class="box box-info">
                <div class="box-header with-border">
                  <h3 class="box-title">Pengguna Paket</h3>
                  <div class="box-tools pull-right">
                    <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                    <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                  </div>
                </div><!-- /.box-header -->
                <div class="box-body">
                  <div class="table-responsive">
                    <table class="table no-margin">
                      <thead>
                        <tr>
                          <th>Paket</th>
                          <th>Jumlah</th>
                        </tr>
                      </thead>
                      <tbody>
                      <?php 
                          $qry = mysql_query('SELECT * FROM tb_paket');
                          while ($pk = mysql_fetch_array($qry)) {
                          # hitung pelanggan pemakai paket...
                          echo  '<tr>
                          <td>'.$pk[1].'</td>
                          <td><STRONG>'.jumlahPenggunaPaket($pk[0]).'</STRONG></td>
                          </tr>';
                          }
                      ?>
                      </tbody>
                    </table>
                  </div><!-- /.table-responsive -->
                </div><!-- /.box-body -->
                <div class="box-footer clearfix">
                <!--STRONG> Total Pelanggan : <?php echo hitungKomplain() ?></STRONG-->
                </div><!-- /.box-footer -->
              </div>
</div>