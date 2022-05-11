<?php  
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="Viewsport" content="width=device-width, initial-scale=1">
  <title>Liste des voyages</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet" href="plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- JQVMap -->
  <link rel="stylesheet" href="plugins/jqvmap/jqvmap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="plugins/daterangepicker/daterangepicker.css">
  <!-- summernote -->
  <link rel="stylesheet" href="plugins/summernote/summernote-bs4.min.css">
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="index3.html" class="nav-link">Home</a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="#" class="nav-link">Contact</a>
      </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Navbar Search -->
      <li class="nav-item">
        <a class="nav-link" data-widget="navbar-search" href="#" role="button">
          <i class="fas fa-search"></i>
        </a>
        <div class="navbar-search-block">
          <form class="form-inline">
            <div class="input-group input-group-sm">
              <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
              <div class="input-group-append">
                <button class="btn btn-navbar" type="submit">
                  <i class="fas fa-search"></i>
                </button>
                <button class="btn btn-navbar" type="button" data-widget="navbar-search">
                  <i class="fas fa-times"></i>
                </button>
              </div>
            </div>
          </form>
        </div>
      </li>

      <!-- Messages Dropdown Menu -->
   
      <li class="nav-item">
        <a class="nav-link" data-widget="fullscreen" href="#" role="button">
          <i class="fas fa-expand-arrows-alt"></i>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-widget="control-sidebar" data-controlsidebar-slide="true" href="#" role="button">
          <i class="fas fa-th-large"></i>
        </a>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
      <!-- Brand Logo -->
      <a href="index.php" class="brand-link">
        <img src="img/urjet.png" alt="URJET Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">UrJet</span>
      </a>

      <?php require 'sidebar.php' ?>
      <!-- /.sidebar -->
    </aside>
  <section class="col-6 col-lg-10 connectedSortable">
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Dashboard</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">voyages</li>
            </ol>
          </div><!-- /.col -->
          <div class="col-lg-6 col-5 text-right">
              <a href="#" class="btn btn-sm btn-neutral">New</a>
              <a href="afficher_voyage.php" class="btn btn-sm btn-neutral">Retourner sans tri</a>
            </div>
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">

            <!-- Card header -->
            <div class="card-header border-0">
              <h3 class="mb-0">La liste des voyages :</h3>
            </div>
            <!-- Light table -->
            <div class="table-responsive">
              <table class="table align-items-center table-flush">
                <thead class="thead-light">
                  <tr>
                    <th scope="col" class="sort" data-sort="name">Id Voyage</th>
                    <th scope="col" class="sort" data-sort="budget">Date Depart</th>
                    <th scope="col" class="sort" data-sort="status">Date Arrivee</th>
                    <th scope="col" class="sort" data-sort="completion">Nombre des Places</th>
                    <th scope="col" class="sort" data-sort="completion">Id Aeroport</th>
                    <th scope="col" class="sort" data-sort="completion">Prix</th>
                    <th scope="col"></th>
                  </tr>
                </thead>
<tbody>
<?php //on inclut notre fichier de connection $pdo = Database::connect(); //on se connecte à la base $sql = 'SELECT * FROM user ORDER BY id DESC'; //on formule notre requete foreach ($pdo->query($sql) as $row) { //on cree les lignes du tableau avec chaque valeur retournée
                           include "../Controller/voyageC.php";
                           $voyage = new voyageC();
                           $resultat=$voyage->trier_voyage();


                           echo '
<br />
<tr>';
foreach($resultat as $row) {                         
echo'

<td>' . $row['id_voyage'] . '</td>
<p>
';
      echo'
	  
	  <td>' . $row['date_depart'] . '</td>
	  <p>
	  ';
								  echo'
                            
    <td>' . $row['date_arrivee'] . '</td>
        <p>';
            echo'
                            
      <td>' . $row['nbr_places'] . '</td>
       <p>';

        echo'
                            
        <td>' . $row['id_aeroport'] . '</td>
        <p> ';

        echo'
        <td>' . $row['prix'] . '</td>
        <p> ';


          echo '<td>';
         echo '<a class="btn btn-success" href="modifier_voyage.php?id_voyage=' . $row['id_voyage'] . '">Update</a>';// un autre td pour le bouton d'update
       
                      echo '<a class="btn btn-primary" href="Supprimer_voyage.php?id_voyage=' . $row['id_voyage'] . ' ">Delete</a>';// un autre td pour le bouton de suppression
     
         echo '</td>
        <p>';
       echo '</tr>
       <p>
          ';
}
      
                                                    ?>  
</tbody>

        </div>
  </div>
 
  

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->


</body>
</html>           



