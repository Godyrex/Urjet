<?php
session_start();

if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
    header("location: login.php");
    exit;
}
require_once "config.php";
// Check if image file is a actual image or fake image
if(isset($_POST["upload"])) {
    $target_dir = "img/";
$target_file = $target_dir . basename($_FILES["image"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
  $check = getimagesize($_FILES["image"]["tmp_name"]);
  if($check !== false) {
    echo "File is an image - " . $check["mime"] . ".";
    $uploadOk = 1;
  } else {
    echo "File is not an image.";
    $uploadOk = 0;
  }
  if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
  // if everything is ok, try to upload file
  } else {
    if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
      echo "The file ". htmlspecialchars( basename( $_FILES["image"]["name"])). " has been uploaded.";
      $image = $_FILES["image"]["name"];
      $id = $_SESSION["id"];
    $stmt = $con->prepare("UPDATE `user` SET image = ? WHERE `id` = ?");
    $stmt->bind_param("si", $image, $id);
    $stmt->execute();
    $_SESSION["image"] = $image;
    } else {
      echo "Sorry, there was an error uploading your file.";
    }
  }
}

if (isset($_POST["submit"])) {
    if (empty($name = trim($_POST["name"]))) {
        $name = $_SESSION["name"];
    } else {
        $name = trim($_POST["name"]);
    }
    if (empty($lastname = trim($_POST["lastname"]))) {
        $lastname = $_SESSION["lastname"];
    } else {
        $lastname = trim($_POST["lastname"]);
    }
    if (empty($email = trim($_POST['email']))) {
        $email = $_SESSION["email"];
    } else {
        $email = trim($_POST['email']);
    }
    if (empty($password = trim($_POST['password']))) {
        $passwordhash = $_SESSION["hpassword"];
    } else {
        $password = trim($_POST['password']);
        $passwordhash = password_hash($password, PASSWORD_DEFAULT);
    }
    if (empty($description = trim($_POST['description']))) {
        $description = $_SESSION["description"];
    } else {
        $description = trim($_POST['description']);
    }
    if (empty($image = trim($_POST['image']))) {
        $image = $_SESSION["image"];
    } else {
        $image = trim($_POST['image']);
    }
    $id = $_SESSION["id"];
    $stmt = $con->prepare("UPDATE `user` SET name = ?, lastname = ? ,email = ?,password = ?,description= ? WHERE `id` = ?");
    $stmt->bind_param("sssssi", $name, $lastname, $email, $passwordhash,$description, $id);
    $stmt->execute();
    $_SESSION["email"] = $email;
    $_SESSION["hpassword"] = $passwordhash;
    $_SESSION["name"] = $name;
    $_SESSION["lastname"] = $lastname;
    $_SESSION["description"] = $description;
    /*  $rs = mysqli_query($con, $sql);
    if ($rs) {
        echo "Name Updated";
  
}*/
}


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Settings</title>
    <script src="script.js"></script>
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
                                    <a href="AdminPanel.php" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Modify/Ban User</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="Settings.php" class="nav-link active">
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

                <div class="container-fluid  ">
                    <div class="row">
                        <!-- left column -->
                        
                        <div class="col-md-6">
                            <!-- general form elements -->

                            <div class="card card-primary ">
                                <div class="card-header">
                                    <h3 class="card-title">Change Information</h3>
                                </div>
                                <!-- /.card-header -->
                                <!-- form start -->
                                <form method="post" name="UpdateUser">
                                    <div class="card-body">
                                        <div class="form-group">
                                            <label for="Inputnamel">Name</label>
                                            <input name="name" type="text" class="form-control" id="Inputname" placeholder="Enter Name">
                                            <p id="errorname" class="card bg-danger"></p>
                                        </div>
                                        <div class="form-group">
                                            <label for="Inputlastnamel">LastName</label>
                                            <input name="lastname" type="text" class="form-control" id="Inputlastname" placeholder="Enter LastName">
                                            <p id="errorlastname" class="card bg-danger"></p>
                                        </div>
                                        <div class="form-group">
                                            <label for="InputEmaill">Email address</label>
                                            <input name="email" onblur="verif()" onkeyup="verif()" type="email" class="form-control" id="InputEmail" placeholder="Enter email">
                                            <p id="errorEA" class="card bg-danger"></p>
                                        </div>
                                        <div class="form-group">
                                            <label for="InputPasswordl">Password</label>
                                            <input name="password" onblur="verif()" onkeyup="verif()" type="password" class="form-control" id="InputPassword" placeholder="Password">
                                            <p id="errorP" class="card bg-danger"></p>
                                        </div>
                                        <div class="form-group">
                                            <label for="InputConfirmPasswordl">Confirm Password</label>
                                            <input onblur="verif()" onkeyup="verif()" type="password" class="form-control" id="InputConfirmPassword" placeholder="Password">
                                            <p id="errorCP" class="card bg-danger"></p>
                                        </div>
                                        <div class="form-group">
                                            <label for="Inputdescription">Description</label>
                                            <input name="description" type="text" class="form-control " id="Inputdescription" placeholder="Description">
                                            <p id="errordescription" class="card bg-danger"></p>
                                        </div>
                                    </div>
                                    <!-- /.card-body -->

                                    <div class="card-footer">
                                        <button type="submit" class="btn btn-primary">Update</button>
                                    </div>
                                </form>
                            </div>
                            
                        </div>
                        <div class="col-md-4">
                            <!-- general form elements -->

                            <div class="card card-primary ">
                                <div class="card-header">
                                    <h3 class="card-title">Upload image</h3>
                                </div>
                                <!-- /.card-header -->
                                <!-- form start -->
                                <form method="post" enctype="multipart/form-data">
                                    <div class="card-body">
                                        <div class="form-group">
                                            <label for="InputFilel">Image</label>
                                            <div class="input-group">
                                                <div class="custom-file">
                                                    <input name="image" type="file" class="custom-file-input"  id="image">
                                                    <label class="custom-file-label" for="InputFile">Choose image</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- /.card-body -->

                                    <div class="card-footer">
                                        <button name="upload" value="Upload Image" type="submit" class="btn btn-primary">Upload</button>
                                    </div>
                                </form>
                            </div>
                            
                        </div>
                        <!-- /.card-body -->
                    </div>
                    
                    <!-- /.card -->
                    <!-- right col -->
                </div>
            </section>
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