<?php
    include_once '../Model/reservation.php';
    include_once '../Controller/reservationC.php';

    $error = "";

    // create reservation
    $reservation = null;

    // create an instance of the controller
    $reservationC = new reservationC();
    if (
       
        isset($_POST["idclient"]) &&		
        isset($_POST["ideven"]) &&
		isset($_POST["dateres"]) && 
        isset($_POST["etatres"]) 
    ) {
        if (
            !empty($_POST["idclient"]) &&		
            !empty($_POST["ideven"]) &&
            !empty($_POST["dateres"]) && 
            !empty($_POST["etatres"]) 
        ) {
            $reservation = new reservation(
                $_POST["idclient"] ,		
                $_POST["ideven"] ,
                $_POST["dateres"] , 
                $_POST["etatres"] 
            );
            $reservationC->modifier_reservation($reservation, $_POST["idres"]);
            header('Location:afficher_reservation.php');
        }
        else
            $error = "Missing information";
    }    
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <script src="ajout.js"></script>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>AdminLTE 3 | Dashboard</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet"
    href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
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

    <!-- Preloader -->
    <div class="preloader flex-column justify-content-center align-items-center">
      <img class="animation__shake" src="img/logo.png" alt="AdminLTELogo" height="60" width="60">
    </div>

    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
      <!-- Left navbar links -->
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
          <a href="index.php" class="nav-link">Home</a>
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
        <img src="img/logo.png" alt="logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">urjet</span>
      </a>

      <!-- Sidebar -->
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
                <li class="breadcrumb-item active">reservation</li>
              </ol>
            </div><!-- /.col -->
          </div><!-- /.row -->
        </div><!-- /.container-fluid -->
      </div>
      <!-- /.content-header -->

      <!-- Main content -->
      <section class="content">
        <div class="container-fluid">
          <div class="container-fluid">
            <!-- Small boxes (Stat box) -->
            <div class="row">

              <!-- ./col -->

              <!-- ./col -->

              <!-- ./col -->
            </div>

            <div class="container-fluid">
            <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">List</h3>

                <div class="card-tools">
                  <div class="input-group input-group-sm" style="width: 150px;">
                    <input type="text" name="table_search" class="form-control float-right" placeholder="Search">

                    <div class="input-group-append">
                      <button type="submit" class="btn btn-default">
                        <i class="fas fa-search"></i>
                      </button>
                    </div>
                  </div>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body table-responsive p-0" style="height: 300px;">
                <table class="table table-head-fixed text-nowrap">
                  <thead>
                    <tr>
                      <th>idres</th>
                      <th>idclient</th>
                      <th>ideven</th>
                      <th>dateres</th>
                      <th>etatres</th>

                    </tr>
                  </thead>
                  <tbody>
                  <?php
			if (isset($_POST['idres'])){
				$reservation = $reservationC->recuperer_reservation($_POST['idres']);
				
		?>
                      <tr>
                        <td><?php echo $row['id'] ?></td>
                        <td><?php echo $row['nom'] ?></td>
                        <td><?php echo $row['type'] ?></td>
                        <td><?php echo $row['prix'] ?></td>
                        <td><?php echo $row['photo'] ?></td>

                      </tr>

                    <?php
                    }
                    ?>
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
        </div>
              <div class="row">
                <!-- left column -->
                <div class="col-md-6">
                  <!-- general form elements -->
                  <div class="card card-primary">
                    <div class="card-header">
                      <h3 class="card-title">modifier reservation</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form  method="post" name="voyage" onsubmit="return validateForm(event)"> 
                      <div class="card-body">
                        <div class="form-group">
                          <label for="exampleInputnuml">id de reservation</label>
                          <input onblur="ajout()" onkeyup="ajout()" type="number" class="form-control" id="id" name="id" 
                            placeholder="Enter number">
                          <p id="errorid" class="card bg-danger"></p>

                        </div>

                        <!-- /.col (left) -->                         
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Submit</button>
                          </div>

                    </form>
                  </div>
                  <!-- /.card -->
                </div>
              </div>
            </div>
            <!-- /.row -->
            <!-- Main row -->

            <!-- /.card -->
      </section>
      <!-- right col -->
    </div>
    <!-- /.row (main row) -->
  </div><!-- /.container-fluid -->
  </section>
  <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <strong>Copyright &copy; 2014-2021 <a href="https://urjet.io">urjet.io</a>.</strong>
    All rights reserved.
    <div class="float-right d-none d-sm-inline-block">
      <b>Version</b> 3.2.0
    </div>
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
  </div>
  <!-- ./wrapper -->

  <!-- jQuery -->
  <script src="plugins/jquery/jquery.min.js"></script>
  <!-- jQuery UI 1.11.4 -->
  <script src="plugins/jquery-ui/jquery-ui.min.js"></script>
  <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
  <script>
    $.widget.bridge('uibutton', $.ui.button)
  </script>
  <!-- Bootstrap 4 -->
  <script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- ChartJS -->
  <script src="plugins/chart.js/Chart.min.js"></script>
  <!-- Sparkline -->
  <script src="plugins/sparklines/sparkline.js"></script>
  <!-- JQVMap -->
  <script src="plugins/jqvmap/jquery.vmap.min.js"></script>
  <script src="plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
  <!-- jQuery Knob Chart -->
  <script src="plugins/jquery-knob/jquery.knob.min.js"></script>
  <!-- daterangepicker -->
  <script src="plugins/moment/moment.min.js"></script>
  <script src="plugins/daterangepicker/daterangepicker.js"></script>
  <!-- Tempusdominus Bootstrap 4 -->
  <script src="plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
  <!-- Summernote -->
  <script src="plugins/summernote/summernote-bs4.min.js"></script>
  <!-- overlayScrollbars -->
  <script src="plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
  <!-- AdminLTE App -->
  <script src="dist/js/adminlte.js"></script>
  <!-- AdminLTE for demo purposes -->
  <script src="dist/js/demo.js"></script>
  <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
  <script src="dist/js/pages/dashboard.js"></script>
</body>

</html>




<?php //on inclut notre fichier de connection $pdo = Database::connect(); //on se connecte à la base $sql = 'SELECT * FROM user ORDER BY id DESC'; //on formule notre requete foreach ($pdo->query($sql) as $row) { //on cree les lignes du tableau avec chaque valeur retournée
    include "../Controller/reservationC.php";
      $reservation = new reservationC();
    $resultat=$reservation->afficher_reservation();
    
   
  echo '<br /><tr>';
                           
foreach($resultat as $row) {
	     echo'<td>' . $row['idres'] . '</td><p>';
       echo' <td>' .$row['idclient'] . '</td> <p> ';
		 echo'<td><a href = "mailto: '. $row['ideven'].' " > ' . $row['ideven'] . '</td> <p>';
         echo' <td>' . $row['dateres'] . '</td> <p>';
         echo'<td>' . $row['etatres'] . '</td> <p>';
         echo '<td>';
         echo '<a class="btn btn-success" href="modifier_reservation.php?id_reservation=' . $row['idres'] . '">Update</a>';// un autre td pour le bouton d'update
         echo '<a class="btn btn-primary" href="Supprimer_reservation.php?id_reservation=' . $row['idres'] . ' ">Delete</a>';// un autre td pour le bouton de suppression
         echo '<a class="btn btn-danger" href="Supprimer_reservation.php?id_reservation=' . $row['idres'] . ' ">Delete</a>';// un autre td pour le bouton de suppression
         echo '</td>  <p> ';
       echo '</tr><p>';
}      
  ?>  