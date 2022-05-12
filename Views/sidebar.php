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
                
              Panneau d'utilisateur

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
                  <p>Panneau de l'admin</p>
                </a>
              </li>
              <?php } ?>
              <li class="nav-item">
                <a href="settings.php" class="nav-link <?php $currentpage = basename($_SERVER['SCRIPT_NAME']); 
                if($currentpage=="settings.php"){
                echo "active"; 
                }?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Réglages</p>
                </a>
              </li>

            </ul>
          </li>
          <?php if (isset($_SESSION["Admin"]) && $_SESSION["Admin"] == true) { ?>
          <li class="nav-item">
            <a href="#" class="nav-link <?php $currentpage = basename($_SERVER['SCRIPT_NAME']); 
                if($currentpage=="avion.php"){
                echo "active"; 
                }?>">
              <i class="nav-icon fas fa-plane"></i>
              <p>
              Gestion des avions
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="avion.php" class="nav-link <?php $currentpage = basename($_SERVER['SCRIPT_NAME']); 
                if($currentpage=="avion.php"  ){
                echo "active"; 
                }?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Ajout/Modification</p>
                </a>
              </li>
             
            </ul>
          </li>
          <?php } ?>
          <li class="nav-item">
            <a href="#" class="nav-link <?php $currentpage = basename($_SERVER['SCRIPT_NAME']); 
                if($currentpage=="afficher_aeroport.php" || $currentpage=="modifier_aeroport.php"|| $currentpage=="afficher_voyage.php" || $currentpage=="ajouter_aeroport.php" || $currentpage=="ajouter_voyage.php" || $currentpage=="modifier_voyage.php" ){
                echo "active"; 
                }?>">
              <i class="nav-icon fas fa-tree"></i>
              <p>
              Gestion des Voyages
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="afficher_aeroport.php" class="nav-link <?php $currentpage = basename($_SERVER['SCRIPT_NAME']); 
                if($currentpage=="afficher_aeroport.php" ){
                echo "active"; 
                }?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Listes des aéroports</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="ajouter_aeroport.php" class="nav-link <?php $currentpage = basename($_SERVER['SCRIPT_NAME']); 
                if($currentpage=="ajouter_aeroport.php" ){
                echo "active"; 
                }?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Ajouter un aéroport</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="modifier_aeroport.php" class="nav-link <?php $currentpage = basename($_SERVER['SCRIPT_NAME']); 
                if( $currentpage=="modifier_aeroport.php" ){
                echo "active"; 
                }?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Modifier un aéroport</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="afficher_voyage.php" class="nav-link <?php $currentpage = basename($_SERVER['SCRIPT_NAME']); 
                if( $currentpage=="afficher_voyage.php" ){
                echo "active"; 
                }?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Listes des voyages</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="ajouter_voyage.php" class="nav-link <?php $currentpage = basename($_SERVER['SCRIPT_NAME']); 
                if( $currentpage=="ajouter_voyage.php" ){
                echo "active"; 
                }?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Ajouter un voyage</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="modifier_voyage.php" class="nav-link <?php $currentpage = basename($_SERVER['SCRIPT_NAME']); 
                if( $currentpage=="modifier_voyage.php" ){
                echo "active"; 
                }?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Modifier un voyage</p>
                </a>
              </li>
              
              
            </ul>
          </li>
          <?php if (isset($_SESSION["Admin"]) && $_SESSION["Admin"] == true) { ?>
          <li class="nav-item">
            <a href="#" class="nav-link <?php $currentpage = basename($_SERVER['SCRIPT_NAME']); 
                if($currentpage=="afficher_evenement.php" || $currentpage=="afficher_reservation.php"){
                echo "active"; 
                }?>">
              <i class="nav-icon fas fa-edit"></i>
              <p>
              Gestion des Resersations

                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="afficher_evenement.php" class="nav-link <?php $currentpage = basename($_SERVER['SCRIPT_NAME']); 
                if($currentpage=="afficher_evenement.php"){
                echo "active"; 
                }?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Listes des Evenements</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="afficher_reservation.php" class="nav-link <?php $currentpage = basename($_SERVER['SCRIPT_NAME']); 
                if($currentpage=="afficher_reservation.php"){
                echo "active"; 
                }?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Listes des Reservations</p>
                </a>
              </li>
              
            </ul>
          </li>
          <?php } ?>
          
          <li class="nav-item">
            <a href="#" class="nav-link <?php $currentpage = basename($_SERVER['SCRIPT_NAME']); 
                if( $currentpage=="afficherListeDemandes.php" || $currentpage=="affichagedemandes.php"){
                echo "active"; 
                }?>">
              <i class="nav-icon fas fa-table"></i>
              <p>
              Gestion des demandes de Maintenances
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
            <?php if (isset($_SESSION["Admin"]) && $_SESSION["Admin"] == true) { ?>
              <li class="nav-item">
                <a href="afficherListeDemandes.php" class="nav-link <?php $currentpage = basename($_SERVER['SCRIPT_NAME']); 
                if( $currentpage=="afficherListeDemandes.php" ){
                echo "active"; 
                }?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Liste des Demandes</p>
                </a>
              </li>
              <?php } ?>
              <li class="nav-item">
                <a href="affichagedemandes.php" class="nav-link <?php $currentpage = basename($_SERVER['SCRIPT_NAME']); 
                if( $currentpage=="affichagedemandes.php" ){
                echo "active"; 
                }?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Liste Demandes</p>
                </a>
              </li>
              
            </ul>
          </li>
          
          <?php if (isset($_SESSION["Admin"]) && $_SESSION["Admin"] == true) { ?>
          <li class="nav-item">
            <a href="#" class="nav-link <?php $currentpage = basename($_SERVER['SCRIPT_NAME']); 
                if($currentpage=="afficherListereclamation.php" || $currentpage=="modifierreclamation.php" || $currentpage=="ajouterreponse.php"|| $currentpage=="afficherreponse.php"){
                echo "active"; 
                }?>">
              <i class="nav-icon fas fa-table"></i>
              <p>
              Gestion des Reclamations
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="afficherListereclamation.php" class="nav-link <?php $currentpage = basename($_SERVER['SCRIPT_NAME']); 
                if($currentpage=="afficherListereclamation.php" ){
                echo "active"; 
                }?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Liste des Reclamations </p>
                </a>
              </li>
              
              <li class="nav-item">
                <a href="modifierreclamation.php" class="nav-link <?php $currentpage = basename($_SERVER['SCRIPT_NAME']); 
                if($currentpage=="modifierreclamation.php" ){
                echo "active"; 
                }?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Modifier une Reclamation</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="ajouterreponse.php" class="nav-link <?php $currentpage = basename($_SERVER['SCRIPT_NAME']); 
                if($currentpage=="ajouterreponse.php" ){
                echo "active"; 
                }?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Ajouter une Response</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="afficherreponse.php" class="nav-link <?php $currentpage = basename($_SERVER['SCRIPT_NAME']); 
                if($currentpage=="afficherreponse.php" ){
                echo "active"; 
                }?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Lites des Response</p>
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