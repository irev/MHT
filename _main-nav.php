     
      <!-- =============================================== -->
      <!-- Left side column. contains the sidebar -->
      <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar"> 

          <!-- Sidebar user panel -->
          <div class="user-panel">
            <div class="pull-left image">
              <img src="assets/dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
              <p>
      <?php 
        echo "Hallo ".$_SESSION['login_name'];
      ?>
              </p>
              <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
          </div>
          <!-- search form -->
          <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
              <input type="text" name="q" class="form-control" placeholder="Search...">
              <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i></button>
              </span>
            </div>
          </form>
          <!-- /.search form -->
          <!-- sidebar menu: : style can be found in sidebar.less -->
          <ul class="sidebar-menu">
            <li class="header">MAIN NAVIGATION</li>

<li class="treeview">
              <a href="<?php echo $baseurl."dashboard.php"; ?>">
                <i class="fa  fa-archive"></i> <span>Dashboard</span> 
              </a>
</li>
<?php
  $seslog=$_SESSION['login_hash'];
  include('pages/'.$seslog.'/_menu.php');

?>
<li class="treeview">
              <a href="dashboard.php?cat=web&page=logout">
                <i class="fa fa-toggle-on"></i><span>Log Out</span>
              </a>
</li>


          </ul>
        </section>
        <!-- /.sidebar --> 
      </aside>

      <!-- =============================================== -->