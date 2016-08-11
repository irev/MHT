        <section class="content">
          <div class="row">
        <div class="col-xs-6">  
          	<div class="box">
                <div class="box-header">
                  <h3 class="box-title">Form Jenis Pelaporan</h3>
                 </div><!-- /.box-header -->
                <div class="box-body">
                	<!-- Input -->
                  <div class="form-group">
                    <label>Nama Jenis Pelaporan:</label>
                    <input type="text" class="form-control my-colorpicker1">
                  </div><!-- /.form group -->                  
                  <div class="form-group">
                      <label>Keterangan</label>
                      <textarea class="form-control" rows="3" placeholder="Keterangan ..."></textarea>
                  </div><!-- /.form group -->


                </div>

                <div class="box-footer">
                <span style="float: right;">
                    <button type="submit" class="btn btn">Batal</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </span>
                  </div>
            </div>
        </div><!-- /.col -->


            <div class="col-xs-6">
              <div class="box">
                <div class="box-header">
                  <h3 class="box-title">Daftar Jenis Pelaporan</h3>
    <!--Button Model-->
    <div class="pull-right">
        <!--a type="button" class="btn btn-success" href="dashboard.php?cat=petugas&page=obat_masuk"><i class="glyphicon glyphicon-plus"></i> Pelanggan </a>
        <a type="button" class="btn btn-success" onclick="add_gangguan()"><i class="glyphicon glyphicon-plus"></i> Gangguan </a>
        <a type="button" class="btn btn-success" onclick="add_satuan()"><i class="glyphicon glyphicon-plus"></i> status </a-->
    </div>
    <!--//Button Model-->
                </div><!-- /.box-header -->
                <div class="box-body">
                  <table id="example1" class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        <th>No</th>
                        <th>Nama Jenis</th>
                        <th>Keterangan</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td>1</td>
                        <td>Pelanggan Baru</td>
                        <td>Permohonan sebagai pelangga baru</td>
                      </tr>
                      <tr>
                        <td>2</td>
                        <td>Block</td>
                        <td>Penanguhan masa pemakaian jasa internet karena alasan tertentu</td>
                      </tr>

                    </tfoot>
                  </table>
                </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col -->
          </div><!-- /.row -->


<!--footer-->
<?php
include('_script.php');
ob_end_flush();
?> 
<!--//footer-->