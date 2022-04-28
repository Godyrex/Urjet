<!DOCTYPE HTML>
<!--
	Spectral by HTML5 UP
	html5up.net | @ajlkn
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<?php
    include_once '../Model/aeroport.php';
    include_once '../Controller/aeroportC.php';

    $error = "";
    $success = 0;
   
    // create user
    $aeroport = null;

   
    // create an instance of the controller  $rendez_vousC = new Rendez_vousC();
    $aeroportC = new aeroportC() ;
    if ( isset($_POST["nom"]) && isset($_POST["ville"]) &&  isset($_POST["pays"]) )
    
    {
        if ( !empty($_POST["nom"]) && !empty($_POST["ville"]) && !empty($_POST["pays"]) )
         {
            $aeroport = new aeroport(
             
                $_POST['nom'],
                $_POST['ville'],
				$_POST['pays']
               
               

            );
            $aeroportC->ajouter_aeroport($aeroport); 
            $success = 1;
        } else {
            $error = "Missing information";
        }
    }
?>
<html>
	<head>
		<title>URJET</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
		<link rel="stylesheet" href="assets/css/main.css" />
		<noscript><link rel="stylesheet" href="assets/css/noscript.css" /></noscript>
	</head>
	<body class="landing is-preload">

		<!-- Page Wrapper -->
			<div id="page-wrapper">

				<!-- Header -->
					<header id="header" class="alt">
						<h1><a href="index.php">Transport company</a></h1>
						<nav id="nav">
							<ul>
								<li class="special">
									<a href="#menu" class="menuToggle"><span>Menu</span></a>
									<div id="menu">
										<ul>
											<li><a href="index.php">Accueil (avion1 cataloge)</a></li>
											<li><a href="Avion2.php">Avion2</a></li>
											<li><a href="Resersation.php"></a>Réservation</li>
											<li><a href="Reclamation.php">Réclamation</a></li>
											<li><a href="Reponse.php">Réponse</a></li>
											<li><a href="Maintenance.php"></a>Maitenance</li>
											<li><a href="Demande.php">Demande de maitenance</a></li>
											<h3><a href="Ajouter_voyage.php">Voyage</a></h3>
											<li><a href="Signup.php">S'inscrire</a></li>
											<li><a href="Login.php">Se Connecter</a></li>
										</ul>
									</div>
								</li>
							</ul>
						</nav>
					</header>

				 
				<!-- Three -->
				<section id="three" class="wrapper style3 special">
					<body>
        <button><a href="afficher_aeroport.php">Retour à la liste des Aeroports</a></button>
        <hr>
        
        <div id="error">
            <?php echo $error; ?>
        </div>
        
        <form action="" method="POST">
            <table border="1" align="center">
                
				<tr>
                    <td>
                        <label for="nom">Nom de l'Aeroport :
                        </label>
                    </td>
                    <td><input type="text" name="nom" id="nom" maxlength="10"></td>
                </tr>
                <tr>
                    <td>
                        <label for="ville">Ville de l'Aeroport :
                        </label>
                    </td>
                    <td><input type="text" name="ville" id="ville" maxlength="20"></td>
                </tr>
                <tr>
                    <td>
                        <label for="pays">Pays de l'Aeroport :
                        </label>
                    </td>
                    <td>
                        <input type="text" name="pays" id="pays">
                    </td>
                </tr>
              
                
            </table>
									  

										 
			  
										  
			  
										  
										 
  <button type="button" class="form-control" onclick="myFunction2();myFunction();">Verifier les données</button> 
			  
										  <button type="submit" class="form-control" id="submit-button-rv"  name="submit">Choisir l'aeroport</button>
									  </form>
					</section>

				<!-- CTA -->
					<section id="cta" class="wrapper style4">
						<div class="inner">
							<header>
								<h2>Arcue ut vel commodo</h2>
								<p>Aliquam ut ex ut augue consectetur interdum endrerit imperdiet amet eleifend fringilla.</p>
							</header>
							<ul class="actions stacked">
								<li><a href="#" class="button fit primary">Activate</a></li>
								<li><a href="#" class="button fit">Learn More</a></li>
							</ul>
						</div>
					</section>

				<!-- Footer -->
					<footer id="footer">
						<ul class="icons">
							<li><a href="#" class="icon brands fa-twitter"><span class="label">Twitter</span></a></li>
							<li><a href="#" class="icon brands fa-facebook-f"><span class="label">Facebook</span></a></li>
							<li><a href="#" class="icon brands fa-instagram"><span class="label">Instagram</span></a></li>
							<li><a href="#" class="icon brands fa-dribbble"><span class="label">Dribbble</span></a></li>
							<li><a href="#" class="icon solid fa-envelope"><span class="label">Email</span></a></li>
						</ul>
						<ul class="copyright">
							<li>&copy; Untitled</li><li>Design: <a href="http://html5up.net">HTML5 UP</a></li>
						</ul>
					</footer>

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
  // Get the value of the input field with id
  let x = document.getElementById("depart").value;
  // If x is Not a Number or less than one or greater than 10
  let text;
  if (isNaN(x) || x < 10000000 || x > 99999999) {
    text = "Input not valid";
  } else {
    text = "Input OK";
  }
  document.getElementById("demo").innerHTML = text;
}
</script>

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


	</body>
</html>