<?php
session_start();
    include_once '../Model/voyage.php';
    include_once '../Controller/voyageC.php';

    $error = "";

    // create voyage
    $voyage = null;

    // create an instance of the controller
    $voyageC = new voyageC();
    if (
       
      isset($_POST["date_depart"]) &&
      isset($_POST["date_arrivee"]) && 
      isset($_POST["depart"])   &&  
      isset($_POST["arrivee"])  && 
      isset($_POST["prix"]) &&  
      isset($_POST["nbr_places"]) && 
      isset($_POST["id_aeroport"])  
  

    ) {
        if (
          !empty($_POST["date_depart"]) && 
          !empty($_POST["date_arrivee"])   &&
          !empty($_POST["depart"]) &&
          !empty($_POST["arrivee"])  &&
          !empty($_POST["prix"]) && 
          !empty($_POST["nbr_places"]) && 
          !empty($_POST["id_aeroport"])
        ) {
            $voyage = new voyage(
              $_POST['date_depart'],
              $_POST['date_arrivee'],
              $_POST['depart'],
              $_POST['arrivee'],
              $_POST['prix'],
              $_POST['nbr_places'],
              $_POST['id_aeroport']
            );
            $voyageC->modifier_voyage($voyage, $_POST["id_voyage"]);
            header('Location:afficher_voyage.php');
        }
        else
            $error = "Missing information";
    }    
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
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
              <li class="breadcrumb-item active">Aeroport</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        
          </section>
          <!-- /.Left col -->
          <!-- right col (We are only adding the ID to make the widgets sortable)-->
          <section class="col-lg-20 connectedSortable">
             <!-- Header -->
    <div class="header bg-primary pb-6">
      <div class="container-fluid">
        <div class="header-body">
          <div class="row align-items-center py-4">
            <div class="col-lg-6 col-7">
              <h6 class="h2 text-white d-inline-block mb-0">Les Voyages</h6>
              <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                  <li class="breadcrumb-item"><a href="#"><i class="fas fa-home"></i></a></li>
                  <li class="breadcrumb-item"><a href="#">Les  Voyages</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Liste</li>
                </ol>
              </nav>
            </div>
           
          </div>
        </div>
      </div>
    </div>

  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Display</title>
   </head>
    <body>
        <button><a href="afficher_voyage.php">Retour à la liste des voyages</a></button>
        <hr>
        
        <div id="error">
            <?php echo $error; ?>
        </div>
       
			
		<?php
			if (isset($_GET['id_voyage']))
      {
				$voyage = $voyageC->recuperer_voyage($_GET['id_voyage']);
      }	
		?>
        
        <form action="" method="POST">
        <div class="card-body table-responsive p-0">
                <table class="table table-hover text-nowrap">
                <tr class="col-lg-20 connectedSortable">
                    <td>
                        <label for="id_voyage">Id Voyage:
                        </label>
                    </td>
                    <td><input type="number" name="id_voyage" id="id_voyage" value="<?php echo $voyage['id_voyage']; ?>" maxlength="20"></td>
                </tr>
			          	<tr class="col-lg-20 connectedSortable">
                    <td>
                        <label for="date_depart">Date Depart:
                        </label>
                    </td>
                    <td><input type="date" name="date_depart" id="date_depart" value="<?php echo $voyage['date_depart']; ?>" maxlength="20"></td>
                </tr>
                <tr  class="col-lg-20 connectedSortable">
                    <td>
                        <label for="date_arrivee">Date Arrivee:
                        </label>
                    </td>
                    <td><input type="date" name="date_arrivee" id="date_arrivee" value="<?php echo $voyage['date_arrivee']; ?>" maxlength="20"></td>
                </tr>

                <tr  class="col-lg-20 connectedSortable">
                    <td>
                        <label for="depart">Depart:
                        </label>
                    </td>
                    <td><input type="text" name="depart" id="depart" value="<?php echo $voyage['depart']; ?>" maxlength="20"></td>
                </tr>

                <tr  class="col-lg-20 connectedSortable">
                    <td>
                        <label for="arrivee">Arrivee:
                        </label>
                    </td>
                    <td><input type="text" name="arrivee" id="arrivee" value="<?php echo $voyage['arrivee']; ?>" maxlength="20"></td>
                </tr>

                <tr  class="col-lg-20 connectedSortable">
                    <td>
                        <label for="prix">Prix Voyage:
                        </label>
                    </td>
                    <td><input type="number" name="prix" id="prix" value="<?php echo $voyage['prix']; ?>" maxlength="20"></td>
                </tr>

                <tr  class="col-lg-20 connectedSortable">
                    <td>
                        <label for="nbr_places">Nombre des Places:
                        </label>
                    </td>
                    <td><input type="number" name="nbr_places" id="nbr_places" value="<?php echo $voyage['nbr_places']; ?>" maxlength="20"></td>
                </tr>

                <tr  class="col-lg-20 connectedSortable">
                    <td>
                        <label for="id_aeroport">Id Aeroport:
                        </label>
                    </td>
                    <td><input type="number" name="id_aeroport" id="id_aeroport" value="<?php echo $voyage['id_aeroport']; ?>" maxlength="20"></td>
                </tr>
                
                         
                <tr  class="col-lg-20 connectedSortable">
                    <td></td>
                    <td>
                        <input type="submit" value="Modifier" style="width: 106px;"> 
                        <input type="reset" value="Annuler" style="width: 106px;">
                    </td>
                    
                </tr>
                </table>
                        </div>
        </form>



                

           
	
    </body>
</html>