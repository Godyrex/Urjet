<?php
if(isset($_POST['password']) && $_POST['reset_link_token'] && $_POST['email'])
{
include "../config.php";
include '../Controller/userc.php';
$userc=new userc();
$emailId = $_POST['email'];
$token = $_POST['reset_link_token'];
$password = $_POST['password'];
$userc->resetpass($password,$token,$emailId);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title> Recover Password</title>
  <script src="reset-password.js"></script>
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
  <div class="card card-outline card-primary">
    <div class="card-header text-center">
      <a href="index.php" class="h1"><b>UR</b>JET</a>
    </div>
      <?php
if($_GET['key'] && $_GET['token'])
{
include "config.php";
$email = $_GET['key'];
$token = $_GET['token'];
$query = $con->prepare("SELECT * FROM `user` WHERE `reset_link_token`='".$token."' and `email`='".$email."';");
$curDate = date("Y-m-d H:i:s");
$query->execute();
$row= $query->fetch();
if ($row > 0) {
   // echo $row['exp_date'];
if($row['exp_date'] >= $curDate){ ?>
 <div class="card-body">
      <p class="login-box-msg">You are only one step a way from your new password, recover your password now.</p>
      <form onsubmit="return validateForm(event)" name="reset" method="post">
      <input type="hidden" name="email" value="<?php echo $email;?>">
        <input type="hidden" name="reset_link_token" value="<?php echo $token;?>">
        <div class="input-group mb-3">
          <input onblur="verifreset()" onkeyup="verifreset()" name="password" type="password" class="form-control" placeholder="Password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <p class="card bg-danger" id="errorpassword"></p>
        <div class="input-group mb-3">
          <input onblur="verifreset()" onkeyup="verifreset()" name="passwordc" type="password" class="form-control" placeholder="Confirm Password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <p class="card bg-danger" id="errorpasswordc"></p>
        <div class="row">
          <div class="col-12">
            <button type="submit" class="btn btn-primary btn-block">Change password</button>
          </div>
          <!-- /.col -->
        </div>
      </form>
      <?php } else {?>
<p>This forget password link has been expired</p>

<?php } 
}
}
?>

      <p class="mt-3 mb-1">
        <a href="login.php">Login</a>
      </p>
    </div>
    <!-- /.login-card-body -->
  </div>
</div>
<!-- /.login-box -->

<!-- jQuery -->
<script src="../../plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="../../dist/js/adminlte.min.js"></script>
<script>
if ( window.history.replaceState ) {
  window.history.replaceState( null, null, window.location.href );
}
</script>
</body>
</html>
