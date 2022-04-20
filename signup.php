<?php
session_start();
if (isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true) {
  header("location: index.php");
  exit;
}
require_once "config.php";
if($_SERVER["REQUEST_METHOD"] == "POST"){

$sql = "SELECT id FROM user WHERE username = ?";

if ($stmt = $con->prepare($sql)) {

  $stmt->bindParam(1, $param_username, PDO::PARAM_STR);

    $param_username = trim($_POST["username"]);

    if ($stmt->execute()) {
      $stmt->fetch();

        if ($stmt->rowCount() == 1) {
            echo "This username is already taken.";
            
        } else {
            $username = trim($_POST["username"]);
            $email = trim($_POST['email']);
            $password = trim($_POST['password']);
            $passwordhash = password_hash($password, PASSWORD_DEFAULT);
            $last_id = 0;
            $sqlo ="INSERT INTO `usero` (`type`, `description`) VALUES ('User', 'Description')";
            $rso = $con->prepare($sqlo);
            if($rso->execute()){
            $last_id = $con->lastInsertId();
            $sqll = "INSERT INTO `user` (`username`, `email`, `password`,id_o) VALUES ('$username', '$email', '$passwordhash','$last_id')";
            $rs = $con->prepare($sqll);
            if ($rs->execute()) {
              echo "Accounted Created";
          }
            }
        }
    }
}
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>URJET | Sign Up</title>
  <script src="signup.js"></script>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
</head>
<body class="hold-transition register-page">
<div class="register-box">
  <div class="card card-outline card-primary">
    <div class="card-header text-center">
      <a href="index.php" class="h1"><b>UR</b>JET</a>
    </div>
    <div class="card-body">
      <p class="login-box-msg">Register a new Account</p>

      <form name="signup" onsubmit="return validateForm(event)" method="post">
        <div class="input-group mb-3">
          <input onblur="verifsignup()" onkeyup="verifsignup()"name="username" id="username" type="text" class="form-control" placeholder="Username">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
            </div>
          </div>
        </div>
        <p class="card bg-danger" id="errorusername"></p>
        <div class="input-group mb-3">
          <input onblur="verifsignup()" onkeyup="verifsignup()" name="email" id="email" type="email" class="form-control" placeholder="Email">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <p class="card bg-danger" id="erroremail"></p>
        <div class="input-group mb-3">
          <input onblur="verifsignup()" onkeyup="verifsignup()" name="password" id="password" type="password" class="form-control" placeholder="Password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <p class="card bg-danger" id="errorpassword"></p>
        <div class="input-group mb-3">
          <input onblur="verifsignup()" onkeyup="verifsignup()" id="passwordc" type="password" class="form-control" placeholder="Retype password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <p class="card bg-danger" id="errorpasswordc"></p>
        <div class="row">
          <!-- /.col -->
          <div class="col-4">
            <button type="submit" class="btn btn-primary btn-block">Sign Up</button>
          </div>
          <!-- /.col -->
        </div>
      </form>


      <a href="login.php" class="text-center float-right">I already have an account</a>
    </div>
    <!-- /.form-box -->
  </div><!-- /.card -->
</div>
<!-- /.register-box -->

<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
<script>
if ( window.history.replaceState ) {
  window.history.replaceState( null, null, window.location.href );
}
</script>
</body>
</html>