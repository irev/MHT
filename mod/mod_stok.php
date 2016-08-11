<?php  
/*
$qkritis=mysql_query("SELECT count(*) as kritis FROM `v_stok` WHERE stok_tersedia > 10  and stok_tersedia < 20 ");
$kritis=mysql_fetch_array($qkritis); 
?>
           <!-- Notifications: style can be found in dropdown.less -->
              <li class="dropdown notifications-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <i class="fa fa-line-chart"></i>
                 <?php  if($kritis['kritis']==0){}else{ echo '<span class="label label-warning">'. $kritis['kritis'].'</span>'; }?>
                </a>
                <ul class="dropdown-menu">
                 <li class="header"> <?php echo $kritis['kritis'] ?> Stok Obat Menipis</li>
                  <li>
                    <!-- inner menu: contains the actual data -->
                    <ul class="menu">
                <?php 
                  $low_tok_n =mysql_query('SELECT * FROM `v_stok` WHERE stok_tersedia > 10  and stok_tersedia < 20 LIMIT 10');
                  while ($data_low_tok_n =mysql_fetch_array($low_tok_n) ) {
                 ?>
                      <li>
                        <a href="dashboard.php?cat=<?php echo $_SESSION['login_hash']?>&page=obat"> <small class="pull-right">Stok <?php echo $data_low_tok_n['stok_tersedia'] ?></small>
                          <i class="fa fa-cubes text-yellow"></i> <?php echo $data_low_tok_n['nama_obat'] ?>
                        </a>
                      </li>
                  <?php } ?>       
                    </ul>
                  </li>
                  <li class="footer"><a href="dashboard.php?cat=<?php echo $_SESSION['login_hash']?>&page=obat_stok_menipis">View all</a></li>
                </ul>
              </li>
              */