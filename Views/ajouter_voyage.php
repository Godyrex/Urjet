

<!DOCTYPE HTML>
<!--
	Spectral by HTML5 UP
	html5up.net | @ajlkn
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<?php
session_start();
    include_once '../Model/voyage.php';
    include_once '../Controller/voyageC.php';

    $error = "";
    $success = 0;
   
    // create user
    $voyage = null;

   
    // create an instance of the controller  $rendez_vousC = new Rendez_vousC();
    $voyageC = new voyageC() ;
    if ( isset($_POST["date_depart"]) &&
         isset($_POST["date_arrivee"]) && 
         isset($_POST["depart"])   &&  
         isset($_POST["arrivee"])  && 
         isset($_POST["prix"]) &&  
         isset($_POST["nbr_places"]) && 
         isset($_POST["id_aeroport"]) 
          )
    
    {
        if (
           !empty($_POST["date_depart"]) && 
           !empty($_POST["date_arrivee"])   &&
           !empty($_POST["depart"]) &&
           !empty($_POST["arrivee"])  &&
           !empty($_POST["prix"]) && 
           !empty($_POST["nbr_places"]) && 
           !empty($_POST["id_aeroport"])
           )
         {
            $voyage = new voyage(
             
                $_POST['date_depart'],
                $_POST['date_arrivee'],
				        $_POST['depart'],
                $_POST['arrivee'],
				        $_POST['prix'],
				        $_POST['nbr_places'],
				        $_POST['id_aeroport']
               
               

            );
            $voyageC->ajouter_voyage($voyage); 
            $success = 1;
        } else {
            $error = "Missing information";
        }
    }
?>

<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Liste des voyages</title>

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

  

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="index3.html" class="nav-link">Home</a>
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

      <!-- Messages Dropdown Menu -->
   
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
        <img src="img/urjet.png" alt="URJET Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">UrJet</span>
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
              <li class="breadcrumb-item active">Dashboard v1</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        
          </section>
          <!-- /.Left col -->
          <!-- right col (We are only adding the ID to make the widgets sortable)-->
          <section class="col-6 col-lg-10 connectedSortable">
             <!-- Header -->
    <div class="header bg-primary pb-6">
      <div class="container-fluid">
        <div class="header-body">
          <div class="row align-items-center py-4">
            <div class="col-lg-6 col-7">
              <h6 class="h2 text-white d-inline-block mb-0">Les Voyages</h6>
              <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                  <li class="breadcrumb-item"><a href="#"><i class="fas fa-home"></i></a></li>
                  <li class="breadcrumb-item"><a href="#">Les  Voyages</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Liste</li>
                </ol>
              </nav>
            </div>
           
          </div>
        </div>
      </div>
    </div>
    <!-- Page content -->
    <div class="container-fluid mt--6">
      <div class="row">
        <div class="col">
          <div class="card">
            <!-- Card header -->
            <div class="card-header border-0">
              <h3 class="mb-0">La liste des Voyages :</h3>
            </div>
           
                  </tr>
                </thead>
<tbody>
				 
				<!-- Three -->
        <hr>
        
       
        <button><a href="afficher_voyage.php">Retour à la liste des voyages</a></button>
        <hr>
        
        <div id="error">
            <?php echo $error; ?>
        </div>
        <form action="" method="POST">
            
                <p>
				<tr>
                    <td>
                        <label for="date_depart" style="padding-left: 20px;">Date de depart :
                        </label>
                    </td>
                    <td><input type="date" name="date_depart" id="date_depart" maxlength="20"></td>
                </tr>
                        </p>


                        
                       <p>
                <tr>
                    <td>
                        <label for="date_arrivee" style="padding-left: 20px;">Date d'arrivee :
                        </label>
                    </td>
                    <td><input type="date" name="date_arrivee" id="date_arrivee" maxlength="20"></td>
                </tr>
                </p> 

               
                <p>
                <tr>
                <td>
                  <label for="depart" style="padding-left: 20px;">Depart :</label>
                </td>
               
               
                <select id="depart" name="depart" class="form-select">
                        <option>Choose an option</option>
                        <?php
                        $con = config::getConnexion();
                        $sql = "SELECT pays From aeroport";
                        $stmt = $con->prepare($sql);
                        $stmt->execute();
                        while ($row = $stmt->fetch()) { ?>
                            <option><?php echo htmlspecialchars($row['pays']) ?></option>
                        <?php } ?>
                    </select>      
                    </tr>
                </p>
   
                <p>
                <tr>
                <td>
                  <label for="arrivee" style="padding-left: 20px;">Arrivee :</label>
                </td>
               
                <select id="arrivee" name="arrivee" class="form-select">
                        <option>Choose an option</option>
                        <?php
                        $con = config::getConnexion();
                        $sql = "SELECT pays From aeroport";
                        $stmt = $con->prepare($sql);
                        $stmt->execute();
                        while ($row = $stmt->fetch()) { ?>
                            <option><?php echo htmlspecialchars($row['pays']) ?></option>
                        <?php } ?>
                    </select>    
                    </tr>
                </p>
               
                <p>
                <tr>
                    <td>
                        <label for="prix" style="padding-left: 20px;">Prix Voyage :
                        </label>
                    </td>
                    <td>
                        <input type="number" name="prix" id="prix">
                    </td>
                </tr>
                </p>


                <p>
                <tr>
                    <td>
                        <label for="nbr_places" style="padding-left: 20px;">Nombre des Places:
                        </label>
                    </td>
                    <td>
                        <input type="number" name="nbr_places" id="nbr_places">
                    </td>
                </tr>
                </p>

                <p>
                <tr>
                <td>
                  <label for="id_aeroport" style="padding-left: 20px;">Id Aeroport :</label>
                </td>
                <select id="id_aeroport" name="id_aeroport" class="form-select">
                        <option>Choose an option</option>
                        <?php
                        $con = config::getConnexion();
                        $sql = "SELECT id_aeroport From aeroport";
                        $stmt = $con->prepare($sql);
                        $stmt->execute();
                        while ($row = $stmt->fetch()) { ?>
                            <option><?php echo htmlspecialchars($row['id_aeroport']) ?></option>
                        <?php } ?>
                    </select>
                    </tr>
                </p>

               
               

               
     				  
			  
										  
										 
  <button type="button"  onclick="myFunction2();myFunction();"  style="width: 250px; padding-left: 0px;margin-left: 700px;padding-right: 0px;";>Verifier les données</button> 
			  
										  <button type="submit"  id="submit-button-rv"  name="submit" style="width: 250px; padding-left: 0px;margin-left: 700px;padding-right: 0px;">Ajouter le voyage</button>
									  </form>
					</section>

				

			</div>

		<!-- Scripts -->
			<script src="assets/js/jquery.min.js"></script>
			<script src="assets/js/jquery.scrollex.min.js"></script>
			<script src="assets/js/jquery.scrolly.min.js"></script>
			<script src="assets/js/browser.min.js"></script>
			<script src="assets/js/breakpoints.min.js"></script>
			<script src="assets/js/util.js"></script>
			<script src="assets/js/main.js"></script>


            
<script >
var b =document.getElementById("mybtn")

b.addEventListener("CLICK",myFunction() { alert ('WRONG') } ) ;
</script>

<script>
function myFunction() {

    onsubmit = function() {
     tabdepart = (date_debut.value.split(/[- //]/));
    tabarrivee = (date_arrivee.value.split(/[- //]/));
    Odepart = new Date(tabdepart[2],tabdepart[1],tabdepart[0]);
    Oarrivee = new Date(tabarrivee[2],tabarrivee[1],tabarrivee[0]);
    if(Odepart > Oarrivee) {
    alert('date fin du semestre doit etre superieure a la date du debut')
        date_depart.focus(); date_arrivee.style.backgroundColor='#F00';
        return false 
        };
        };
        };
</script>

<!--
<script>
function myFunction2() {
  // Get the value of the input field with id
  let x = document.getElementById("arrivee").value;
  // If x is Not a Number or less than one or greater than 10
  let text;
  if (x.indexOf('@esprit.tn')==-1){
    text = "Input not valid";
  } else {
    text = "Input OK";
  }
  document.getElementById("demo_2").innerHTML = text;
}
</script>
-->


	</body>
</html>