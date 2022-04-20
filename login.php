<?php
// Initialize the session
session_start();
 
if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] && isset($_SESSION["Admin"]) && $_SESSION["Admin"] === true){
    header("location: index.php");
    exit;
}elseif(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] && isset($_SESSION["User"]) && $_SESSION["User"] === true){
    header("location: index.php");
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
        $sql = "SELECT id, username, email, password, name, lastname, image ,id_o FROM user WHERE username = :username";
        
        if($stmt = $con->prepare($sql)){
            // Bind variables to the prepared statement as parameters
            $param_username = $username;
            $stmt->bindParam(':username', $param_username);
            // Set parameters
            
            // Attempt to execute the prepared statement
            if($stmt->execute()){
                // Store result
                while($row=$stmt->fetch()){
                  $id=$row['id'];
                  $username=$row['username'];
                  $email=$row['email'];
                  $hashed_password=$row['password'];
                  $name=$row['name'];
                  $lastname=$row['lastname'];
                  $image=$row['image'];
                  $id_o=$row['id_o'];
                }
                
                // Check if username exists, if yes then verify password
                if($stmt->rowCount() == 1){   
                        if(password_verify($password, $hashed_password)){
                            // Password is correct, so start a new session
                            $sqlo = "SELECT type , description , ban FROM usero WHERE id = ?";
                            $stmto=$con->prepare( $sqlo);
                            $stmto->bindParam(1, $id_o, PDO::PARAM_INT);
                            if($stmto->execute()){
                              while($row=$stmto->fetch()){
                                $type=$row['type'];
                                $description=$row['description'];
                                $ban=$row['ban'];
                              }
                            }
                            if($ban!="Yes"){
                            session_start();

                            // Store data in session variables
                            $_SESSION["loggedin"] = true;
                            $_SESSION["id"] = $id;
                            $_SESSION["username"] = $username;
                            $_SESSION["email"] = $email;
                            $_SESSION["hpassword"] = $hashed_password;
                            $_SESSION["name"] = $name;
                            $_SESSION["lastname"] = $lastname;
                            $_SESSION["id_o"] = $id_o;
                            $_SESSION["image"] = $image;
                            $_SESSION["type"] = $type;
                            $_SESSION["description"] = $description;
                            $_SESSION["ban"] = $ban;
                            if($type==$admin){
                              echo "admin";
                                $_SESSION["Admin"] = true;
                                $_SESSION["User"] = false;
                                header("location: AdminPanel.php");
                            }else{
                              echo "user";
                                $_SESSION["User"] = true;
                                $_SESSION["Admin"] = false;
                                header("location: index.php");
                            }; 
                          }else{
                            echo "Your account is banned!";
                          }                            
                            
                            // Redirect user to welcome page
                        } else{
                            // Password is not valid, display a generic error message
                            echo "Invalid username or password.";
                        }
                    
                } else{
                    // Username doesn't exist, display a generic error message
                    echo "Invalid username or password.";
                }
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }

            // Close statement
        }
    }
    
    // Close connection
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>URJET | Log In</title>
  <script src="login.js"></script>

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
          <input onblur="veriflogin()" onkeyup="veriflogin()" name="username" id="username" type="text" class="form-control" placeholder="Username">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <p class="card bg-danger" id="errorusername"></p>
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
<script>
if ( window.history.replaceState ) {
  window.history.replaceState( null, null, window.location.href );
}
</script>
</body>
</html>