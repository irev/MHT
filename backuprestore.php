<?php

// definisikan koneksi ke database
//require("_db.php");
// definisikan koneksi ke database
$server = "localhost";
$username = "root";
$password = "";
$database = "1skripsi";

// Koneksi dan memilih database di server
mysql_connect($server,$username,$password) or die("Koneksi gagal");
mysql_select_db($database) or die("Database tidak bisa dibuka");
// Koneksi dan memilih database di server

?>

            <?php
            $file	  =	$database.'_'.date("DdMY").'_'.time().'.sql';
            //membuat nama file

            ?>
            <script>
                function pastikan(text){
                    confirm('Apakah Anda yakin akan '+text+'?')
                }
            </script>



     <!-- START CUSTOM TABS -->
          <h2 class="page-header">AdminLTE Custom Tabs</h2>
          <div class="row">
            <div class="col-md-12">
              <!-- Custom Tabs -->
              <div class="nav-tabs-custom">
                <ul class="nav nav-tabs">
                  <li class="active"><a href="#tab_1" data-toggle="tab"><i class="blue ace-icon fa  fa-cloud-upload bigger-120"></i> BackUp</a></li>

                  <li><a href="#tab_2" data-toggle="tab">  <i class="blue ace-icon fa  fa-cloud-upload bigger-120"></i> Restore</a></li>
                  <li><a href="#tab_3" data-toggle="tab">?</a></li>
                  <li class="pull-right"><a href="#" class="text-muted"><i class="fa fa-gear"></i></a></li>
                </ul>
                <div class="tab-content">
                  <div class="tab-pane active col-md-12" id="tab_1">
                    <b>Backup database</b>
          <form action="" method="post" name="postform" enctype="multipart/form-data" >
                     <p>
                    <strong>Backup</strong> semua data yang ada didalam database <code><strong><?= $database ?></strong></code>.</em>
                    </p>
               
                    <label for="backup">Backup database</label>
                    <button id="loading-btn" type="submit" class="btn btn-success" name="backup" onClick="return pastikan('Backup database')">Proses Backup</button>
          </form>
                  </div><!-- /.tab-pane -->
                  <div class="tab-pane col-md-12" id="tab_2">
<div class="row ">
            <form action="" method="post" name="postform" enctype="multipart/form-data" >
                                <p>
                                    <strong>Restore</strong> semua data yang ada didalam database &quot;<strong><?= $database ?></strong>&quot;.</em>
                                </p>
                    <div class="input-group col-md-12">  
                    <label for="backup">File Backup Database (*.sql)</label>
                    <input type="file" name="datafile" size="30" class="filestyle" data-buttonName="btn-primary"/>
                    <button type="submit" class="btn btn-primary pull-right" name="restore" onClick="return pastikan('Backup database')" data-loading-text="Loading..." >Proses Restore</button>
                    </div>
            </form>

</div>

                  </div><!-- /.tab-pane -->
                  <div class="tab-pane" id="tab_3">
                   
                  </div><!-- /.tab-pane -->
                </div><!-- /.tab-content -->
              </div><!-- nav-tabs-custom -->
          


            </div><!-- /.col -->
          </div> <!-- /.row -->
          <!-- END CUSTOM TABS -->
















            <!--div>
                <div class="tabbable">
                    <ul class="nav nav-tabs" id="myTab">
                        <li class="active">
                            <a data-toggle="tab" href="#backup">
                                <i class="green ace-icon fa  fa-cloud-download bigger-120"></i>
                                Backup
                            </a>
                        </li>

                        <li>
                            <a data-toggle="tab" href="#restore">
                                <i class="blue ace-icon fa  fa-cloud-upload bigger-120"></i>
                                Restore
                            </a>
                        </li>

                    </ul>

                    <div class="tab-content">
                        <div id="backup" class="tab-pane fade in active">
                            <form action="" method="post" name="postform" enctype="multipart/form-data" >
                                <p>
                                    <strong>Backup</strong> semua data yang ada didalam database &quot;<strong><?= $database ?></strong>&quot;.</em>
                                </p>
               
                                    <label for="backup">Backup database</label>
                                    <button id="loading-btn" type="submit" class="btn btn-success" name="backup" onClick="return pastikan('Backup database')">Proses Backup</button>
          

                            </form>
                        </div>

                        <div id="restore" class="tab-pane fade">
                           
                        </div>

                    </div>
                </div>
            </div--><!-- /.col -->




                <?php

                //Download file backup ============================================
                if(isset($_GET['nama_file']))
                {
                    $file = $back_dir.$_GET['nama_file'];

                    if (file_exists($file))
                    {
                        header('Content-Description: File Transfer');
                        header('Content-Type: application/octet-stream');
                        header('Content-Disposition: attachment; filename='.basename($file));
                        header('Content-Transfer-Encoding: binary');
                        header('Expires: 0');
                        header('Cache-Control: private');
                        header('Pragma: private');
                        header('Content-Length: ' . filesize($file));
                        ob_clean();
                        flush();
                        readfile($file);
                        exit;

                    }
                    else
                    {
                        echo "file {$_GET['nama_file']} sudah tidak ada.";
                    }

                }

                //Backup database =================================================
                if(isset($_POST['backup']))
                {
                    backup($file);
                   
					echo 'Backup database telah selesai <a style="cursor:pointer" href="'.$file.'" title="Download">Download file database</a>';

                    echo "<pre>";
                    print_r($return);
                    echo "</pre>";
                }
                else
                {
                    unset($_POST['backup']);
                }

                //Restore database ================================================
                if(isset($_POST['restore']))
                {
                    restore($_FILES['datafile']);

                    echo "<pre>";
                    print_r($lines);
                    echo "</pre>";
                }
                else
                {
                    unset($_POST['restore']);
                }

                ?>


            <?php

            function restore($file) {
                global $rest_dir;

                $nama_file	= $file['name'];
                $ukrn_file	= $file['size'];
                $tmp_file	= $file['tmp_name'];

                if ($nama_file == "")
                {
                    echo "Fatal Error";
                }
                else
                {
                    $alamatfile	= $rest_dir.$nama_file;
                    $templine	= array();

                    if (move_uploaded_file($tmp_file , $alamatfile))
                    {

                        $templine	= '';
                        $lines		= file($alamatfile);

                        foreach ($lines as $line)
                        {
                            if (substr($line, 0, 2) == '--' || $line == '')
                                continue;

                            $templine .= $line;

                            if (substr(trim($line), -1, 1) == ';')
                            {
                                mysql_query($templine) or print('Query gagal \'<strong>' . $templine . '\': ' . mysql_error() . '<br /><br />');

                                $templine = '';
                            }
                        }
                        echo "<center>Berhasil Restore Database, silahkan di cek.</center>";

                    }else{
                        echo "Proses upload gagal, kode error = " . $file['error'];
                    }
                }

            }

            function backup($nama_file,$tables = '')
            {
                global $return, $tables, $back_dir, $database ;

                if($tables == '')
                {
                    $tables = array();
                    $result = @mysql_list_tables($database);
                    while($row = @mysql_fetch_row($result))
                    {
                        $tables[] = $row[0];
                    }
                }else{
                    $tables = is_array($tables) ? $tables : explode(',',$tables);
                }

                $return	= '';

                foreach($tables as $table)
                {
                    $result	 = @mysql_query('SELECT * FROM '.$table);
                    $num_fields = @mysql_num_fields($result);

                    //menyisipkan query drop table untuk nanti hapus table yang lama
                    $return	.= "DROP TABLE IF EXISTS ".$table.";";
                    $row2	 = @mysql_fetch_row(mysql_query('SHOW CREATE TABLE  '.$table));
                    $return	.= "\n\n".$row2[1].";\n\n";

                    for ($i = 0; $i < $num_fields; $i++)
                    {
                        while($row = @mysql_fetch_row($result))
                        {
                            $return.= 'INSERT INTO '.$table.' VALUES(';

                            for($j=0; $j<$num_fields; $j++)
                            {
                                $row[$j] = @addslashes($row[$j]);
                                $row[$j] = @ereg_replace("\n","\\n",$row[$j]);
                                if (isset($row[$j])) { $return.= '"'.$row[$j].'"' ; } else { $return.= '""'; }
                                if ($j<($num_fields-1)) { $return.= ','; }
                            }
                            $return.= ");\n";
                        }
                    }
                    $return.="\n\n\n";
                }

                $nama_file;

                $handle = fopen($back_dir.$nama_file,'w+');
                fwrite($handle, $return);
                fclose($handle);
            }
            ?>
<?php
include('_script.php');
ob_end_flush();
?> 

	<script>
        $(function() {
            // Easy pie charts
           // $('.chart').easyPieChart({animate: 1000});
			$('.dropdown-toggle').dropdown();
			$(":file").filestyle({buttonName: "btn-primary"});
        });
     </script>

  <?php //} ?>