<!DOCTYPE HTML>
<!--
	Spectral by HTML5 UP
	html5up.net | @ajlkn
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<?php
    include_once '../Model/voyage.php';
    include_once '../Controller/voyageC.php';

    $error = "";
    $success = 0;
   
    // create user
    $voyage = null;

   
    // create an instance of the controller  $rendez_vousC = new Rendez_vousC();
    $voyageC = new voyageC() ;
    if ( isset($_POST["date_depart"]) && isset($_POST["date_arrivee"]) &&  isset($_POST["heure_depart"])  &&  isset($_POST["heure_arrivee"])  &&  isset($_POST["id_aeroport"]) )
    
    {
        if ( !empty($_POST["date_depart"]) && !empty($_POST["date_arrivee"]) && !empty($_POST["heure_depart"])  && !empty($_POST["heure_arrivee"]) && !empty($_POST["id_aeroport"]) )
         {
            $voyage = new voyage(
             
                $_POST['date_depart'],
                $_POST['date_arrivee'],
				$_POST['heure_depart'],
				$_POST['heure_arrivee'],
				$_POST['id_aeroport']
               
               

            );
            $voyageC->ajouter_voyage($voyage); 
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
        <button><a href="afficher_voyage.php">Retour à la liste des voyages</a></button>
        <hr>
        
        <div id="error">
            <?php echo $error; ?>
        </div>
        
        <form action="" method="POST">
            <table border="1" align="center">
                
				<tr>
                    <td>
                        <label for="date_depart">Date de depart :
                        </label>
                    </td>
                    <td><input type="date" name="date_depart" id="date_depart" maxlength="20"></td>
                </tr>
                <tr>
                    <td>
                        <label for="date_arrivee">Date d'arrivee :
                        </label>
                    </td>
                    <td><input type="date" name="date_arrivee" id="date_arrivee" maxlength="20"></td>
                </tr>
                <tr>
                    <td>
                        <label for="heure_depart">Heure de depart :
                        </label>
                    </td>
                    <td>
                        <input type="time" name="heure_depart" id="heure_depart">
                    </td>
                </tr>

                <tr>
                    <td>
                        <label for="heure_arrivee">Heure d'arrivee :
                        </label>
                    </td>
                    <td>
                        <input type="time" name="heure_arrivee" id="heure_arrivee">
                    </td>
                </tr>


                <tr>
                    <td>
                        <label for="id_aeroport">  id d'aeroport :
                        </label>
                    </td>
                    <td>
                        <input type="number" name="id_aeroport" id="id_aeroport">
                    </td>
                </tr>
              
                
            </table>
									  

										 
			  
										  
			  
										  
										 
  <button type="button" class="form-control" onclick="myFunction2();myFunction();">Verifier les données</button> 
			  
										  <button type="submit" class="form-control" id="submit-button-rv"  name="submit">Reserver le voyage</button>
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