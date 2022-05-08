<?php
// Initialize the session
session_start();
include '../Controller/userc.php';
$userc=new userc();
$con = config::getConnexion();
 if( isset($_COOKIE['rememberme'] )){
$userc->checklogin();
}
if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] && isset($_SESSION["Admin"]) && $_SESSION["Admin"] === true){
    header("location: index.php");
    exit;
}elseif(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] && isset($_SESSION["User"]) && $_SESSION["User"] === true){
    header("location: index.php");
    exit;
}

 
// Include config file
$username = $password = "";
$admin ="Admin";
// Processing form data when form is submitted
if(isset($_POST['g-recaptcha-response'])) {
  // RECAPTCHA SETTINGS
  $captcha = $_POST['g-recaptcha-response'];
  $ip = $_SERVER['REMOTE_ADDR'];
  $key = '6LeN5pYfAAAAAJ8r9Bz0piW-WukRGr6R1md6GwML';
  $url = 'https://www.google.com/recaptcha/api/siteverify';

  // RECAPTCH RESPONSE
  $recaptcha_response = file_get_contents($url.'?secret='.$key.'&response='.$captcha.'&remoteip='.$ip);
  $data = json_decode($recaptcha_response);

  if(isset($data->success) &&  $data->success === true) {
    if($_SERVER["REQUEST_METHOD"] == "POST"){
 
      // Check if username is empty
      if(empty(trim($_POST["username"]))){
          echo "Please enter username.";
      } else{
          $username = trim($_POST["username"]);
      }
      
      // Check if password is empty
      if(empty(trim($_POST["password"]))){
          echo "Please enter your password.";
      } else{
          $password = trim($_POST["password"]);
      }
      
      // Validate credentials
          // Prepare a select statement
          $userc->login($username,$password);
      
      
      // Close connection
  }
  }
  else {
     die('Your account has been logged as a spammer, you cannot continue!');
  }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>URJET | Log In</title>
  <script src="login.js"></script>
  <script src='https://www.google.com/recaptcha/api.js'></script>
  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <!-- /.login-logo -->
  <div class="card card-outline card-primary">
    <div class="card-header text-center">
      <a href="index.php" class="h1"><b>UR</b>JET</a>
    </div>
    <div class="card-body">
      <p class="login-box-msg">Sign in to start your session</p>

      <form name="login" onsubmit="return validateForm(event)" method="post">
        <div class="input-group mb-3">
          <input onblur="veriflogin()" onkeyup="veriflogin()" value="<?php if(isset($_COOKIE["username"])) { echo $_COOKIE["username"]; } ?>" name="username" id="username" type="text" class="form-control" placeholder="Username">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <p class="card bg-danger" id="errorusername"></p>
        <div class="input-group mb-3">
          <input onblur="veriflogin()" onkeyup="veriflogin()"  name="password" id="password" type="password" class="form-control" placeholder="Password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <p class="card bg-danger" id="errorpassword"></p>
        <div class="g-recaptcha" data-sitekey="6LeN5pYfAAAAAFPRPl21p6hxtJlVNEdDO-DpCszq"></div>
        <div class="row">
          <!-- /.col -->
          <div class="col-8">
            <div class="icheck-primary">
              <input name="remember" value="checked" type="checkbox" id="remember">
              <label for="remember">
                Remember Me
              </label>
            </div>
          </div>
          <div class="col-4">
            <button type="submit" class="btn btn-primary btn-block">Sign In</button>
          </div>
        </div>
      </form>


      <p class="mt-3 mb-1">
        
      <a  href="reset.php">Reset password</a>
        <a class=" float-right" href="signup.php" class="text-center">Sign Up</a>
      </p>
    </div>
    <!-- /.card-body -->
  </div>
  <!-- /.card -->
</div>
<!-- /.login-box -->

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
