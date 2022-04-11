<?php
session_start();

if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] && !isset($_SESSION["Admin"]) || $_SESSION["Admin"] !== true) {
  header("location: index.html");
  exit;
}
require_once "config.php";
if (isset($_POST["submitad"])){
 // if($_SERVER["REQUEST_METHOD"] == "POST"){
  $sql = "UPDATE user SET type = ? WHERE id = ?";
        $type="Admin";
  if($stmt = mysqli_prepare($con, $sql)){

      mysqli_stmt_bind_param($stmt, "si", $param_type, $param_id);
      

      $param_type = $type;
      $param_id = $_POST["ida"];
      

      if(mysqli_stmt_execute($stmt)){
        echo "<meta http-equiv='refresh' content='0'>";

      } else{
          echo "Oops! Something went wrong. Please try again later.";
      }
}
}
if (isset($_POST["submitc"])){
  // if($_SERVER["REQUEST_METHOD"] == "POST"){
   $sql = "UPDATE user SET type = ? WHERE id = ?";
         $type="User";
   if($stmt = mysqli_prepare($con, $sql)){
 
       mysqli_stmt_bind_param($stmt, "si", $param_type, $param_id);
       
 
       $param_type = $type;
       $param_id = $_POST["idc"];
       
 
       if(mysqli_stmt_execute($stmt)){
         echo "<meta http-equiv='refresh' content='0'>";
 
       } else{
           echo "Oops! Something went wrong. Please try again later.";
       }
 }
 }
 if (isset($_POST["submitb"])){
  // if($_SERVER["REQUEST_METHOD"] == "POST"){
   $sql = "DELETE FROM `user` WHERE `id` = ?";
   if($stmt = mysqli_prepare($con, $sql)){
 
       mysqli_stmt_bind_param($stmt, "i", $param_id);
       
 
       $param_id = $_POST["idb"];
       
 
       if(mysqli_stmt_execute($stmt)){
         echo "<meta http-equiv='refresh' content='0'>";
 
       } else{
           echo "Oops! Something went wrong. Please try again later.";
       }
 }
 }

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Admin Panel</title>
  <script src="adminpanel.js"></script>
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

    <!-- Preloader -->
    <div class="preloader flex-column justify-content-center align-items-center">
      <img class="animation__shake" src="img/urjet.png" alt="urjetLogo" height="60" width="60">
    </div>

    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
      <!-- Left navbar links -->
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
          <a href="AdminPanel.php" class="nav-link">Home</a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
          <a href="logout.php" class="nav-link">Logout</a>
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
        </li>
      </ul>
    </nav>
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
      <!-- Brand Logo -->
      <a href="index.html" class="brand-link">
        <img src="img/urjet.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">UrJet</span>
      </a>

      <!-- Sidebar -->
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
            <li class="nav-item menu-open">
              <a href="#" class="nav-link active">
                <i class="nav-icon fas fa-edit"></i>
                <p>
                  Options
                  <i class="right fas fa-angle-left"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="AdminPanel.php" class="nav-link active">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Modify/Ban User</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="Settings.php" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Settings</p>
                  </a>
                </li>
              </ul>
            </li>
          </ul>
        </nav>
        <!-- /.sidebar-menu -->
      </div>
      <!-- /.sidebar -->
    </aside>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0">User Managments</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active">User Managments</li>
              </ol>
            </div><!-- /.col -->
          </div><!-- /.row -->
        </div><!-- /.container-fluid -->
      </div>
      <!-- /.content-header -->

      <!-- Main content -->
      <!-- /.row -->
      <!-- Main row -->
      <!-- Main content -->

      <section class="content">
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
                      <th>Username</th>
                      <th>Email address</th>
                      <th>Account Type</th>
                      <th>Name</th>
                      <th>Lastname</th>
                      <th>Description</th>
                      <th>Image</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    require_once "config.php";
                    $results = mysqli_query($con,"SELECT * FROM user LIMIT 10");
                    while ($row = mysqli_fetch_array($results)) {
                    ?>
                      <tr>
                        <td><?php echo $row['id'] ?></td>
                        <td><?php echo $row['username'] ?></td>
                        <td><?php echo $row['email'] ?></td>
                        <td><?php echo $row['type'] ?></td>
                        <td><?php echo $row['name'] ?></td>
                        <td><?php echo $row['lastname'] ?></td>
                        <td><?php echo $row['description'];
                        echo "...";  ?></td>
                        <td><?php echo $row['image'] ?></td>
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
        <div class="container-fluid ">
          <div class="row">
          <div class="col-md-4">
          <div class="card card-primary">
                <div class="card-header">
                  <h3 class="card-title">Set User to Client</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form name="clientform"  onsubmit="return validateFormclient(event)"method="post">
                  <div class="card-body">
                    <div class="form-group">
                      <label for="InputIDrl">ID</label>
                      <input name="idc" id="idc" onblur="verifclient()" onkeyup="verifclient()" type="number" class="form-control" id="Inputidr1" placeholder="Enter ID">
                      <p id="erroridc" class="card bg-danger"></p>
                    </div>

                  </div>
                  <!-- /.card-body -->

                  <div class="card-footer">
                    <button name="submitc" type="submit" class="btn btn-primary">Set</button>
                  </div>
                </form>
              </div>
          </div>
            <div class="col-md-4">
              <!-- general form elements -->
              <div class="card card-primary">
                <div class="card-header">
                  <h3 class="card-title">Set User to admin</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form name="adminform" onsubmit="return validateFormadmin(event)" method="post">
                  <div class="card-body">
                    <div class="form-group">
                      <label for="InputIDrl">ID</label>
                      <input name="ida" id="ida" onblur="verifadmin()" onkeyup="verifadmin()" type="number" class="form-control" id="Inputidr" placeholder="Enter ID">
                      <p id="errorida" class="card bg-danger"></p>
                    </div>

                  </div>
                  <!-- /.card-body -->

                  <div class="card-footer">
                    <button name="submitad" type="submit" class="btn btn-primary">Set</button>
                  </div>
                </form>
              </div>
              
            </div>
            <div class="col-md-4">
          <div class="card card-primary">
                                <div class="card-header">
                                    <h3 class="card-title">Ban User</h3>
                                </div>
                                <!-- /.card-header -->
                                <!-- form start -->
                                <form name="banform" onsubmit="return validateFormban(event)" method="post">
                                    <div class="card-body">
                                        <div class="form-group">
                                            <label for="InputIDrl">ID</label>
                                            <input name="idb"id="idb" onblur="verifban()" onkeyup="verifban()" type="number"
                                                class="form-control" id="Inputidr" placeholder="Enter ID">
                                            <p id="erroridb" class="card bg-danger"></p>
                                        </div>

                                    </div>
                                    <!-- /.card-body -->

                                    <div class="card-footer ">
                                        <button name="submitb" type="submit" class="btn btn-primary">Ban</button>
                                    </div>
                                </form>
                            </div>
          </div>
            <!-- /.card-body -->
          </div>

          <!-- /.card -->
          <!-- right col -->
        </div>
    </div>
    <!-- /.container-fluid -->
    <!-- /.content -->
    <!-- /.content-wrapper -->
    <footer class="main-footer">
      <strong>Copyright &copy; 2021-2022 <a href="https://urjet.com">UrJet.com</a>.</strong>
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