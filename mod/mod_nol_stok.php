<?php  
/**
//$qkritis=mysql_query("SELECT COUNT(*) as kritis FROM `data_barang` WHERE NOT EXISTS(SELECT * FROM `data_persediaan` WHERE data_barang.kode_barang=data_persediaan.kode_barang)");

$qkritis=mysql_query("SELECT COUNT(*) as kritis FROM `v_stok` WHERE stok_tersedia=0");
$kritis=mysql_fetch_array($qkritis); 
?>
            <!-- Notifications: style can be found in dropdown.less -->
              <li class="dropdown notifications-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                 <i class="fa  fa-inbox"></i>
                 <?php if($kritis['kritis']==0){}else{ echo '<span class="label label-danger">'. $kritis['kritis'].'</span>'; }?>
                </a>
                <ul class="dropdown-menu">
                 <li class="header">Stok kosong sebanyak <?php echo $kritis['kritis'] ?> obat  </li>
                  <li>
                    <!-- inner menu: contains the actual data -->
                    <ul class="menu">
                <?php 
                  //$low_tok_n =mysql_query('SELECT * FROM `data_barang` WHERE NOT EXISTS(SELECT * FROM `data_persediaan` WHERE data_barang.kode_barang=data_persediaan.kode_barang)');
                  $low_tok_n =mysql_query('SELECT * FROM `v_stok` WHERE stok_tersedia=0');
                  while ($data_low_tok_n =mysql_fetch_array($low_tok_n) ) {
                 ?>
                      <li>
                        <a href="dashboard.php?cat=<?php echo $_SESSION['login_hash']?>&page=obat_masuk"> <small class="pull-right">Stok <?php echo $data_low_tok_n['stok_tersedia'] ?></small>
                           <i class="fa fa-cubes text-red"></i> <?php echo $data_low_tok_n['nama_obat'] ?>
                        </a>
                      </li>
                  <?php } ?>       
                    </ul>
                  </li>
                  <li class="footer"><a href="dashboard.php?cat=<?php echo $_SESSION['login_hash']?>&page=obat_stok_menipis">View all</a></li>
                </ul>
              </li>
              */