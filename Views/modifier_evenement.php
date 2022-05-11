<?php
session_start();
    include_once '../Model/evenement.php';
    include_once '../Controller/evenementC.php';

    $error = "";

    // create evenement
    $evenement = null;

    // create an instance of the controller
    $evenementC = new evenementC();
    if (
       
        isset($_POST["nom"]) &&		
        isset($_POST["debut"]) &&
		isset($_POST["fin"]) &&
    isset($_POST["nbrpart"]) &&
    isset($_POST["prix"])

    ) {
        if (
            !empty($_POST["nom"]) &&		
            !empty($_POST["debut"]) &&
            !empty($_POST["fin"])&&
            !empty($_POST["nbrpart"]) &&
            !empty($_POST["prix"]) 
        ) {
            $evenement = new evenement(
                $_POST["nom"] ,		
                $_POST["debut"] ,
                $_POST["fin"] ,
                $_POST["nbrpart"] ,
                $_POST["prix"] 
            );
            $evenementC->modifier_evenement($evenement, $_POST["ideven"]);
            header('Location:afficher_evenement.php');
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
  <title>Liste des evenements</title>

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
              <li class="breadcrumb-item active">Dashboard v1</li>
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
          <section class="col-lg-5 connectedSortable">
             <!-- Header -->
    <div class="header bg-primary pb-6">
      <div class="container-fluid">
        <div class="header-body">
          <div class="row align-items-center py-4">
            <div class="col-lg-6 col-7">
              <h6 class="h2 text-white d-inline-block mb-0">Les Reservations</h6>
              <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                  <li class="breadcrumb-item"><a href="#"><i class="fas fa-home"></i></a></li>
                  <li class="breadcrumb-item"><a href="#">Les  Reservations</a></li>
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
        <button><a href="afficher_evenement.php">Retour à la liste des evenement</a></button>
        <hr>
        
        <div id="error">
            <?php echo $error; ?>
        </div>
			
		<?php
			if (isset($_POST['ideven'])){
				$evenement = $evenementC->recuperer_evenement($_POST['ideven']);
				
		?>
        
        <form action="" method="POST">
            <table border="1" align="center">
                <tr>
                    <td>
                        <label for="ideven">Id d'evenement:
                        </label>
                    </td>
                    <td><input type=" text " name="ideven" id="ideven" value="<?php echo $evenement['ideven']; ?>" maxlength="20"></td>
                </tr>
				<tr>
                    <td>
                        <label for="nom">Nom de l'evenement:
                        </label>
                    </td>
                    <td><input type="texte" name="nom" id="nom" value="<?php echo $evenement['nom']; ?>" maxlength="20"></td>
                </tr>
                <tr>
                    <td>
                        <label for="debut">debut de l'evenement:
                        </label>
                    </td>
                    <td><input type="date" name="debut" id="debut" value="<?php echo $evenement['debut']; ?>" maxlength="20"></td>
                </tr>
                <tr>
                    <td>
                        <label for="fin">fin de l'evenement:
                        </label>
                    </td>
                    <td>
                        <input type="date" name="fin" value="<?php echo $evenement['fin']; ?>" id="fin">
                    </td>
                </tr>

                <tr>
                    <td>
                        <label for="nbrpart">nbrpart de l'evenement:
                        </label>
                    </td>
                    <td>
                        <input type="number" name="nbrpart" value="<?php echo $evenement['nbrpart']; ?>" id="nbrpart">
                    </td>
                </tr>
                
                <tr>
                    <td>
                        <label for="prix">prix de l'evenement:
                        </label>
                    </td>
                    <td>
                        <input type="number" name="prix" value="<?php echo $evenement['prix']; ?>" id="prix">
                    </td>
                </tr>

                         
                <tr>
                    <td></td>
                    <td>
                        <input type="submit" value="Modifier"> 
                    </td>
                    <td>
                        <input type="reset" value="Annuler" >
                    </td>
                </tr>
            </table>
        </form>
		<?php
		}
		?>
    </body>
</html>