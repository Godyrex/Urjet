<div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
          <div class="image">
            <img src="img/<?php echo htmlspecialchars($_SESSION["image"]); ?>" class="img-circle elevation-2" alt="User Image">
          </div>
          <div class="info">
            <a href="#" class="d-block"><?php echo htmlspecialchars($_SESSION["username"]); ?></a>
          </div>
        </div>

        <!-- SidebarSearch Form -->
        <div class="form-inline">
          <div class="input-group" data-widget="sidebar-search">
            <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
            <div class="input-group-append">
              <button class="btn btn-sidebar">
                <i class="fas fa-search fa-fw"></i>
              </button>
            </div>
          </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          
          <li class="nav-item">
            <a href="#" class="nav-link <?php $currentpage = basename($_SERVER['SCRIPT_NAME']); 
                if($currentpage=="AdminPanel.php" || $currentpage=="settings.php" ){
                echo "active"; 
                }?>">
              <i class="nav-icon fas fa-user"></i>
              <p>
                
                User Panel
                <i class="fas fa-angle-left right"></i>
                
              </p>
            </a>
            <ul class="nav nav-treeview">
            <?php if (isset($_SESSION["Admin"]) && $_SESSION["Admin"] == true) { ?>
              <li class="nav-item">
                <a href="AdminPanel.php" class="nav-link <?php $currentpage = basename($_SERVER['SCRIPT_NAME']); 
                if($currentpage=="AdminPanel.php"){
                echo "active"; 
                }?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Admin Panel</p>
                </a>
              </li>
              <?php } ?>
              <li class="nav-item">
                <a href="settings.php" class="nav-link <?php $currentpage = basename($_SERVER['SCRIPT_NAME']); 
                if($currentpage=="settings.php"){
                echo "active"; 
                }?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Settings</p>
                </a>
              </li>

            </ul>
          </li>
          <?php if (isset($_SESSION["Admin"]) && $_SESSION["Admin"] == true) { ?>
          <li class="nav-item">
            <a href="#" class="nav-link <?php $currentpage = basename($_SERVER['SCRIPT_NAME']); 
                if($currentpage=="avion.php" || $currentpage=="list.php"){
                echo "active"; 
                }?>">
              <i class="nav-icon fas fa-plane"></i>
              <p>
              Airplanes Management
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
            <li class="nav-item">
                <a href="list.php" class="nav-link <?php $currentpage = basename($_SERVER['SCRIPT_NAME']); 
                if( $currentpage=="list.php" ){
                echo "active"; 
                }?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>List</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="avion.php" class="nav-link <?php $currentpage = basename($_SERVER['SCRIPT_NAME']); 
                if($currentpage=="avion.php"  ){
                echo "active"; 
                }?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Add/Update</p>
                </a>
              </li>
             
            </ul>
          </li>
          <?php } ?>
          <li class="nav-item">
            <a href="#" class="nav-link <?php $currentpage = basename($_SERVER['SCRIPT_NAME']); 
                if($currentpage=="voyage.php" || $currentpage=="aeroport.php" ){
                echo "active"; 
                }?>">
              <i class="nav-icon fas fa-tree"></i>
              <p>
              Travel Management
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="voyage.php" class="nav-link <?php $currentpage = basename($_SERVER['SCRIPT_NAME']); 
                if($currentpage=="voyage.php" ){
                echo "active"; 
                }?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Travel</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="aeroport.php" class="nav-link <?php $currentpage = basename($_SERVER['SCRIPT_NAME']); 
                if( $currentpage=="aeroport.php" ){
                echo "active"; 
                }?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Airport</p>
                </a>
              </li>
              
              
            </ul>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link <?php $currentpage = basename($_SERVER['SCRIPT_NAME']); 
                if($currentpage=="reservation.php"){
                echo "active"; 
                }?>">
              <i class="nav-icon fas fa-edit"></i>
              <p>
              Reservation Management

                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="reservation.php" class="nav-link <?php $currentpage = basename($_SERVER['SCRIPT_NAME']); 
                if($currentpage=="reservation.php"){
                echo "active"; 
                }?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>reservation</p>
                </a>
              </li>
              
            </ul>
          </li>
          <?php if (isset($_SESSION["Admin"]) && $_SESSION["Admin"] == true) { ?>
          <li class="nav-item">
            <a href="#" class="nav-link <?php $currentpage = basename($_SERVER['SCRIPT_NAME']); 
                if( $currentpage=="maintenance.php" ){
                echo "active"; 
                }?>">
              <i class="nav-icon fas fa-table"></i>
              <p>
              maintenance management
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="maintenance.php" class="nav-link <?php $currentpage = basename($_SERVER['SCRIPT_NAME']); 
                if( $currentpage=="maintenance.php" ){
                echo "active"; 
                }?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Maintenance</p>
                </a>
              </li>
              
            </ul>
          </li>
          <?php } ?>

          <li class="nav-item">
            <a href="#" class="nav-link <?php $currentpage = basename($_SERVER['SCRIPT_NAME']); 
                if($currentpage=="reclamation.php" || $currentpage=="reponse.php" ){
                echo "active"; 
                }?>">
              <i class="nav-icon fas fa-table"></i>
              <p>
              Reclamation Management
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="reclamation.php" class="nav-link <?php $currentpage = basename($_SERVER['SCRIPT_NAME']); 
                if($currentpage=="reclamation.php" ){
                echo "active"; 
                }?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Reclamation</p>
                </a>
              </li>
              <?php if (isset($_SESSION["Admin"]) && $_SESSION["Admin"] == true) { ?>
              <li class="nav-item">
                <a href="reponse.php" class="nav-link <?php $currentpage = basename($_SERVER['SCRIPT_NAME']); 
                if($currentpage=="reponse.php" ){
                echo "active"; 
                }?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Answer</p>
                </a>
              </li>
              <?php } ?>
              
            </ul>
          </li>
          
          
      
        </ul>
      </nav>

      <!-- /.content-header -->

      <!-- Main content -->
      <!-- /.row -->
      <!-- Main row -->
      <!-- Main content -->


    <!-- /.container-fluid -->
    <!-- /.content -->
    <!-- /.content-wrapper -->


    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
      <!-- Control sidebar content goes here -->
    </aside>
    <!-- /.control-sidebar -->
  </div>