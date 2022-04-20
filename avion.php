<?php
session_start();

if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] && !isset($_SESSION["Admin"]) || $_SESSION["Admin"] !== true) {
  header("location: index.php");
  exit;
}
require_once "config.php";
if(isset($_POST["submitadd"])){
    $id = trim($_POST["id"]);
    $nom = trim($_POST["nom"]);
    $type = trim($_POST["type"]);
    $prix = trim($_POST["prix"]);
    $photo = trim($_POST["photo"]);
    $last_id = 0;
    $sqlo ="INSERT INTO `typeavion` (`categorie`) VALUES ('$type')";
    $rso = $con->prepare($sqlo);
    if($rso->execute()){
        $last_id = $con->lastInsertId();
$sql = "INSERT INTO `avion` (`id`, `nom`,`prix`,`photo`,`idtype`) VALUES ('$id', '$nom', '$prix','$photo','$last_id')"; 
$stmt = $con->prepare($sql);
$stmt->execute();
    }
}
if(isset($_POST["submitupdate"])){
    $id = trim($_POST["id"]);
    $nom = trim($_POST["nom"]);
    $type = trim($_POST["type"]);
    $prix = trim($_POST["prix"]);
    $photo = trim($_POST["photo"]);
    $stmt = $con->prepare("UPDATE `avion` SET nom = ?, prix = ? ,photo = ? WHERE `id` = ?");
    $stmt->bindParam(1, $nom, PDO::PARAM_STR);
    $stmt->bindParam(2, $prix, PDO::PARAM_INT);
    $stmt->bindParam(3, $photo, PDO::PARAM_STR);
    $stmt->bindParam(4, $id, PDO::PARAM_INT);
    $stmt->execute();
    $stmto = $con->prepare("SELECT idtype FROM avion WHERE id=?");
    $stmto->bindParam(1, $id, PDO::PARAM_INT);
    $stmto->execute();
    $row=$stmto->fetch();
    $param_id = $row['idtype'];
    $rso = $con->prepare("UPDATE `typeavion` SET categorie = ? WHERE `id` = ?");
    $rso->bindParam(1, $type, PDO::PARAM_STR);
    $rso->bindParam(2, $param_id, PDO::PARAM_INT);
    $rso->execute();
        
    
}
if (isset($_POST["submitdel"])) {
    // if($_SERVER["REQUEST_METHOD"] == "POST"){
    $param_id1 = $_POST["submitdel"];
    $stmto = $con->prepare("SELECT idtype FROM avion WHERE id=?");
    $stmto->bindParam(1, $param_id1, PDO::PARAM_INT);
    $stmto->execute();
    $row=$stmto->fetch();
    $param_id = $row['idtype'];
    $sql = "DELETE FROM `typeavion` WHERE `id` = ?";
$stmt = $con->prepare($sql);
  
      $stmt->bindParam(1, $param_id,PDO::PARAM_INT);
  
  
  
  
  
$stmt->execute();

}

?> 
<!DOCTYPE html>
<html lang="en">

<head>
  <script src="avion.js"></script>

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
                <li class="breadcrumb-item active">avions</li>
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
                      <th>ID</th>
                      <th>Type</th>
                      <th>Prix</th>
                      <th>Nom</th>
                      <th>Photo</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    //require_once "config.php";
                    $sql = "SELECT avion.id,avion.nom,avion.prix,avion.photo,avion.idtype,typeavion.categorie 
                    From avion 
                    INNER JOIN typeavion 
                    ON avion.idtype = typeavion.id";
                    $stmt = $con->prepare($sql) ;
                    $stmt->execute();
                    while ($row = $stmt->fetch()) {
                    ?>
                      <tr>
                        <td><?php echo htmlspecialchars($row['id']) ?></td>
                        <td><?php echo htmlspecialchars($row['categorie']) ?></td>
                        <td><?php echo htmlspecialchars($row['prix']) ?></td>
                        <td><?php echo htmlspecialchars($row['nom']) ?></td>
                        <td><?php echo htmlspecialchars($row['photo']) ?></td>
                        <td><form method="post"><button name="submitdel" value="<?php echo $row['id'] ?>" type="submit" class="btn btn-primary">Del</button></form></td>
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
                      <h3 class="card-title">ajouter avion</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form onsubmit="return validateForm(event)" method="post" name="avion"> 
                      <div class="card-body">
                        <div class="form-group">
                          <label for="exampleInputnuml">id d'avion</label>
                          <input onblur="ajout()" onchange="ajout()" type="number" class="form-control" id="id" name="id" 
                            placeholder="Enter number">
                          <p id="errorid" class="card bg-danger"></p>

                        </div>



                        <div class="form-group">
                          <label for="exampleSelectBorder">type avion</label>
                          <select name="type" class="custom-select form-control-border" id="type">
                            <option>farming plane</option>
                            <option>skydiving</option>
                            <option>private jets</option>
                          </select>
                        </div>
                        <div class="form-group">

                          <div class="form-group">
                            <label for="exampleInputprix location">price location</label>
                            <input name="prix" onblur="ajout()" onchange="ajout()" type="number" class="form-control" id="prix"
                              placeholder="number">
                            <p id="errorprix" class="card bg-danger"></p>
                          </div>

                          <div class="form-group">
                            <label>nom avion</label>
                            <input  name="nom" id="nom" onblur="ajout()" onchange="ajout()" type="text" class="form-control" placeholder="donner le nom d'avion"> 
                            <p id="errornom" class="card bg-danger"></p>
                          </div>


                          <div class="form-group">
                            <label for="exampleInputphoto">photo avion</label>
                            <div class="input-group">
                              <div class="custom-file">
                                <input name="photo" onblur="ajout()" onchange="ajout()" type="file" class="custom-file-input" id="photo">
                                <label class="custom-file-label" for="exampleInputphoto avion">Choisir photo d'avion
                                </label>
                              </div>
                              <div class="input-group-append">
                                <span class="input-group-text">Upload</span>
                              </div>
                              
                            </div>
                            <p id="errorphoto" class="card bg-danger"></p>
                          </div>
                          <!-- /.col (left) -->                         
                          <div class="card-footer">
                            <button type="submit" name="submitadd" class="btn btn-primary">Submit</button>
                          </div>
                    </form>
                  </div>
                  <!-- /.card -->
                </div>
                
              </div>
              
            </div>
            <div class="col-md-6">
                  <!-- general form elements -->
                  <div class="card card-primary">
                    <div class="card-header">
                      <h3 class="card-title">modifier avion</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form onsubmit="return validateFormm(event)"  method="post" name="avionm"> 
                      <div class="card-body">
                        <div class="form-group">
                          <label for="exampleInputnuml">id d'avion</label>
                          <input onblur="modifier()" onchange="modifier()" type="number" class="form-control" id="idm" name="id" 
                            placeholder="Enter number">
                          <p id="erroridm" class="card bg-danger"></p>

                        </div>



                        <div class="form-group">
                          <label for="exampleSelectBorder">type avion <code></code></label>
                          <select  name="type" class="custom-select form-control-border" id="typem">
                            <option>farming plane</option>
                            <option>skydiving</option>
                            <option>private jets</option>
                          </select>
                        </div>
                        <div class="form-group">

                          <div class="form-group">
                            <label for="exampleInputprix location">price location</label>
                            <input name="prix" onblur="modifier()" onchange="modifier()" type="number" class="form-control" id="prixm"
                              placeholder="number">
                            <p id="errorprixm" class="card bg-danger"></p>
                          </div>

                          <div class="form-group">
                            <label>nom avion</label>
                            <input id="nomm" onblur="modifier()" onchange="modifier()"  name="nom" type="text" class="form-control" placeholder="donner le nom d'avion"> 
                            <p id="errornomm" class="card bg-danger"></p>
                          </div>


                          <div class="form-group">
                            <label for="exampleInputphoto">photo avion</label>
                            <div class="input-group">
                              <div class="custom-file">
                                <input onblur="modifier()" onchange="modifier()" name="photo" type="file" class="custom-file-input" id="photom">
                                <label class="custom-file-label" for="exampleInputphoto avion">Choisir photo d'avion
                                </label>
                              </div>
                              <div class="input-group-append">
                                <span class="input-group-text">Upload</span>
                              </div>
                            </div>
                            <p id="errorphotom" class="card bg-danger"></p>
                          </div>
                          <!-- /.col (left) -->                         
                          <div class="card-footer">
                            <button type="submit" name="submitupdate" class="btn btn-primary">Submit</button>
                          </div>
                    </form>
                  </div>
                  <!-- /.card -->
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