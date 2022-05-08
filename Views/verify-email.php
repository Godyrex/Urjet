<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Email Confirmation</title>
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
      <div class="card-body">
        <?php
        if ($_GET['key'] && $_GET['token']) {
          session_start();
          include "../config.php";
          $con = config::getConnexion();
          $email = $_GET['key'];
          $token = $_GET['token'];
          $curDate = date("Y-m-d H:i:s");
          $query = $con->prepare("SELECT * FROM `user` WHERE `email_verification_link`='" . $token . "' and `email`='" . $email . "';");
          $query->execute();
          $d = 1;
          if ($query->rowCount() > 0) {
            $row= $query->fetch();
            if ($row['exp_date'] >= $curDate) {
              if ($row['verified']) {

                echo "You have already verified your account with us";
              } else {
                $stmt = $con->prepare("UPDATE user set verified ='" . $d . "' WHERE email='" . $email . "'");
                $stmt->execute();

                $_SESSION["verified"] = $d;
                echo "Congratulations! Your email has been verified.";
              }
            }else{
              echo "This Email confirmation link has been expired";
            } 
          }            else {
            echo "This email has been not registered with us";
          }
        } else {
          echo "Danger! Your something goes to wrong.";
        }
        ?>

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
    if (window.history.replaceState) {
      window.history.replaceState(null, null, window.location.href);
    }
  </script>
</body>

</html>