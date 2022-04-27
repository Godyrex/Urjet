<?php
session_start();
include '../Controller/userc.php';
	$userc=new userc();
    $userc->check();
if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
    header("location: login.php");
    exit;
}
require_once "../config.php";
// Check if image file is a actual image or fake image
 $output ="";
 $change="";
if (isset($_POST["upload"])) {
    $target_dir = "img/";
    $target_file = $target_dir . basename($_FILES["image"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
    $check = getimagesize($_FILES["image"]["tmp_name"]);
    if ($check !== false) {
        $uploadOk = 1;
    } else {
        $uploadOk = 0;
    }
    if ($uploadOk == 0) {
        // if everything is ok, try to upload file
    } else if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg") {
         $output ="Sorry, only JPG, JPEG & PNG files are allowed.";
        $uploadOk = 0;
    } else {
        if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
            $output = "Image " . htmlspecialchars(basename($_FILES["image"]["name"])) . " has been uploaded.";
            $image = $_FILES["image"]["name"];
            $id = $_SESSION["id"];
            $stmt = $con->prepare("UPDATE `user` SET image = ? WHERE `id` = ?");
            $stmt->bindParam(1, $image, PDO::PARAM_STR);
            $stmt->bindParam(2, $id, PDO::PARAM_INT);
            $stmt->execute();
            $_SESSION["image"] = $image;
        } else {
            $output = "Sorry, there was an error uploading your file.";
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
    $id = $_SESSION["id"];
    $id_o = $_SESSION["id_o"];
   $userc->updateuser($name,$lastname,$email,$passwordhash,$id,$description,$id_o);
    $change="Information changed!";
    /*  $rs = mysqli_query($con, $sql);
    if ($rs) {
        echo "Name Updated";
  
}*/
}
$msg="";
$msge="";
if(isset($_POST['verify']))
{
    $verify=$_POST['verify'];
if($userc-> verification($verify)==1){
$msg= "Check Your Email box and Click on the email verification link.";
}else{
$msge= "Sorry, failed while sending mail!";
}
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Settings</title>
    <script src="settings.js"></script>
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
                    <a href="index.php" class="nav-link">Home</a>
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
            <a href="index.php" class="brand-link">
                <img src="img/urjet.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
                <span class="brand-text font-weight-light">UrJet</span>
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
                                <form method="post" onsubmit="return validateForm(event)" name="UpdateUser">
                                    <div class="card-body">
                                        <div class="form-group">
                                            <label for="Inputnamel">Name</label>
                                            <input name="name" onblur="verifchange()" onkeyup="verifchange()" type="text" class="form-control" id="name" placeholder="Enter Name">
                                            <p id="errorname" class="card bg-danger"></p>
                                        </div>
                                        <div class="form-group">
                                            <label for="Inputlastnamel">LastName</label>
                                            <input name="lastname" onblur="verifchange()" onkeyup="verifchange()" type="text" class="form-control" id="lastname" placeholder="Enter LastName">
                                            <p id="errorlastname" class="card bg-danger"></p>
                                        </div>
                                        <div class="form-group">
                                            <label for="InputEmaill">Email address</label>
                                            <input name="email" onblur="verifchange()" onkeyup="verifchange()"" type=" email" class="form-control" id="Email" placeholder="Enter email">
                                            <p id="erroremail" class="card bg-danger"></p>
                                        </div>
                                        <div class="form-group">
                                            <label for="InputPasswordl">Password</label>
                                            <input name="password" onblur="verifchange()" onkeyup="verifchange()" type="password" class="form-control" id="password" placeholder="Password">
                                            <p id="errorpassword" class="card bg-danger"></p>
                                        </div>
                                        <div class="form-group">
                                            <label for="InputConfirmPasswordl">Confirm Password</label>
                                            <input onblur="verifchange()" onkeyup="verifchange()" type="password" class="form-control" id="passwordc" placeholder="Password">
                                            <p id="errorpasswordc" class="card bg-danger"></p>
                                        </div>
                                        <div class="form-group">
                                            <label for="Inputdescription">Description</label>
                                            <input onblur="verifchange()" onkeyup="verifchange()" name="description" type="text" class="form-control " id="description" placeholder="Description">
                                            <p id="errordescription" class="card bg-danger"></p>
                                        </div>
                                        <p  class="card bg-success"><?php echo $change ?></p>
                                    </div>
                                    <!-- /.card-body -->

                                    <div class="card-footer">
                                        <button name="submit" type="submit" class="btn btn-primary">Update</button>
                                    </div>
                                </form>
                            </div>

                        </div>
                        <div class="col-md-5">
                            <!-- general form elements -->

                            <div class="card card-primary ">
                                <div class="card-header">
                                    <h3 class="card-title">Upload image</h3>
                                </div>
                                <!-- /.card-header -->
                                <!-- form start -->
                                <form name="upload" onsubmit="return validateFormimage(event)" method="post" enctype="multipart/form-data">
                                    <div class="card-body">
                                        <div class="form-group">
                                            <label for="InputFilel">Image</label>
                                            <div class="input-group">
                                                <div class="custom-file">
                                                    <input onblur="verifimage()" onchange="verifimage()" id="image" name="image" type="file" class="custom-file-input">

                                                    <label id="imagelabel" class="custom-file-label" for="InputFile">Choose an image</label>
                                                </div>
                                            </div>
                                            <br>
                                            <p id="errorimagephp" class="card bg-success"><?php echo $output ?></p>
                                            <p id="errorimage" class="card bg-danger"></p>
                                        </div>
                                    </div>
                                    <!-- /.card-body -->

                                    <div class="card-footer">
                                        <button name="upload" value="Upload Image" type="submit" class="btn btn-primary">Upload</button>
                                    </div>
                                </form>
                            </div>
                            <!-- Profile Image -->
                            <div class="card card-primary card-outline">
                                <div class="card-body box-profile">
                                    <div class="text-center">
                                        <img class="profile-user-img img-fluid img-circle" src="img/<?php echo htmlspecialchars($_SESSION["image"]); ?>" alt="User profile picture">
                                    </div>

                                    <h3 class="profile-username text-center"><?php echo htmlspecialchars($_SESSION["username"]); ?></h3>

                                    <p class="text-muted text-center"><?php echo htmlspecialchars($_SESSION["type"]); ?></p>

                                    <ul class="list-group list-group-unbordered mb-3">
                                        <li class="list-group-item">
                                            <b>Name : </b> <a class=""><?php echo htmlspecialchars($_SESSION["name"]);?></a>
                                        </li>
                                        <li class="list-group-item">
                                            <b>Lastname : </b> <a class=""><?php echo htmlspecialchars($_SESSION["lastname"]);?></a>
                                        </li>
                                        <li class="list-group-item">
                                            <b>Email : </b> <a class=""><?php echo htmlspecialchars($_SESSION["email"]);?></a>
                                            <?php if($_SESSION["verified"] == 0){?>
                                                <form class="float-right" method="post"><button name="verify" value="<?php echo $_SESSION["email"] ?>"  type="submit" class=" btn btn-primary btn-sm">Verify</button></form>
                                                <p class="card bg-danger"><?php echo $msge ?></p>
                                                <p class="card bg-success"><?php echo $msg ?></p>
                                            <?php } ?>
                                        </li>
                                        <strong><i></i>Description : </strong>

                                    <p class="text-muted"><?php echo htmlspecialchars($_SESSION["description"]);?></p>
                                    </ul>

                                </div>
                                <!-- /.card-body -->
                            </div>

                        </div>
                        <!-- /.card -->
                            <!-- About Me Box -->
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
    <script>
if ( window.history.replaceState ) {
  window.history.replaceState( null, null, window.location.href );
}
</script>
</body>

</html>