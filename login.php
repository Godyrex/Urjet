<?php
// Initialize the session
session_start();
 
if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] && isset($_SESSION["Admin"]) && $_SESSION["Admin"] === true){
    header("location: AdminPanel.php");
    exit;
}elseif(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] && isset($_SESSION["User"]) && $_SESSION["User"] === true){
    header("location: index.html");
    exit;
}

 
// Include config file
require_once "config.php";
$username = $password = "";
$admin ="Admin";
 
// Processing form data when form is submitted
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
    if(empty($username_err) && empty($password_err)){
        // Prepare a select statement
        $sql = "SELECT id, username, email, password, type, name, lastname, description, image FROM user WHERE username = ?";
        
        if($stmt = mysqli_prepare($con, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_username);
            
            // Set parameters
            $param_username = $username;
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Store result
                mysqli_stmt_store_result($stmt);
                
                // Check if username exists, if yes then verify password
                if(mysqli_stmt_num_rows($stmt) == 1){                    
                    // Bind result variables
                    mysqli_stmt_bind_result($stmt, $id, $username,$email, $hashed_password, $type, $name, $lastname, $description, $image);
                    if(mysqli_stmt_fetch($stmt)){
                        if(password_verify($password, $hashed_password)){
                            // Password is correct, so start a new session
                            session_start();
                            
                            // Store data in session variables
                            $_SESSION["loggedin"] = true;
                            $_SESSION["id"] = $id;
                            $_SESSION["username"] = $username;
                            $_SESSION["email"] = $email;
                            $_SESSION["hpassword"] = $hashed_password;
                            $_SESSION["name"] = $name;
                            $_SESSION["lastname"] = $lastname;
                            $_SESSION["description"] = $description;
                            $_SESSION["image"] = $image;
                            if($type==$admin){
                                $_SESSION["Admin"] = true;
                                $_SESSION["User"] = false;
                                header("location: AdminPanel.php");
                            }else{
                                $_SESSION["User"] = true;
                                $_SESSION["Admin"] = false;
                                header("location: index.html");
                            };                             
                            
                            // Redirect user to welcome page
                        } else{
                            // Password is not valid, display a generic error message
                            echo "Invalid username or password.";
                        }
                    }
                } else{
                    // Username doesn't exist, display a generic error message
                    echo "Invalid username or password.";
                }
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }

            // Close statement
            mysqli_stmt_close($stmt);
        }
    }
    
    // Close connection
    mysqli_close($con);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>URJET | Log In</title>
  <script src="script.js"></script>

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
      <a href="index.html" class="h1"><b>UR</b>JET</a>
    </div>
    <div class="card-body">
      <p class="login-box-msg">Sign in to start your session</p>

      <form name="login" method="post">
        <div class="input-group mb-3">
          <input onblur="veriflogin()" onkeyup="veriflogin()" name="username" id="email" type="text" class="form-control" placeholder="Username">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <p class="card bg-danger" id="erroremail"></p>
        <div class="input-group mb-3">
          <input onblur="veriflogin()" onkeyup="veriflogin()" name="password" id="password" type="password" class="form-control" placeholder="Password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <p class="card bg-danger" id="errorpassword"></p>
        <div class="row">
          <!-- /.col -->
          <div class="col-4">
            <button type="submit" class="btn btn-primary btn-block">Sign In</button>
          </div>
        </div>
      </form>
      <p class=" float-right">
        <a href="signup.php" class="text-center">Sign Up</a>
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
</body>
</html>
