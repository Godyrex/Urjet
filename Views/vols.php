<?php
require_once '../Controller/aeroportC.php';
$aeroportC = new aeroportC();
$aeroport = $aeroportC->afficher_aeroport();
if (isset($_POST['id_aeroport'])&& isset($_POST['search']))
{
    $list = $aeroportC->afficher_aeroport($_POST['id_aeroport']);
}
?>
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

    // create an instance of the controller
    $voyageC = new voyageC();
    if (
		isset($_POST["date_depart"]) &&		
        isset($_POST["date_arrivee"]) && 
        isset($_POST["nbr_places"])&&
        isset($_POST["id_aeroport"])&&
        isset($_POST["prix"])
		
   )
         { if (
			!empty($_POST["date_depart"]) &&		
            !empty($_POST["date_arrivee"]) &&
            !empty($_POST["nbr_places"]) &&
            !empty($_POST["id_aeroport"])&&
            !empty($_POST["prix"])  
	    )     {
            $voyage = new voyage(
				$_POST["date_depart"] ,		
                $_POST["date_arrivee"] ,
                $_POST["nbr_places"] ,
                $_POST["prix"],
                $_POST["id_aeroport"] 

            );
            $voyageC->ajouter_voyage($voyage); 
            $success = 1;
         } else 
		  {
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
											<li><a href="ajouter_voyage.php">Voyage</a></li>
											<li><a href="Signup.php">S'inscrire</a></li>
											<li><a href="Login.php">Se Connecter</a></li>
										</ul>
									</div>
								</li>
							</ul>
						</nav>
					</header>

				

				<!-- Three -->
					<section id="three" class="wrapper alt style2">
						<div class="inner">
							<header class="major">
								<h2>Choississez votre voyage</h2>
							</header>
							<ul class="spotlight" style="padding-right: 50px;height: 400px;">
							<li class="icon fa-paper-plane">
                <tr>
                <td>
                  <label for="depart" style="padding-left: 20px;"> Aeroprt Depart :</label>
                </td>
                 <select name="depart" id="depart">
                <?php
                foreach ($aeroport as $aeroport){
                ?>
               <option value="<?= $aeroport['pays']?>"    >
                 <?= $aeroport['pays'] ?>
               </option>
               <?php    }  ?>
                </select>
                </tr>
				</li>

								<li class="icon fa-paper-plane">
								<tr>
                    <td>
                        <label for="id_aeroport"> aeroport arrivee :
                        </label>
                    </td>
                    <td>
                        <input type="number" name="id_aeroport" id="id_aeroport">
                    </td>
                </tr>	
								</li>
								
								<li class="icon fa-paper-plane">
                                <tr>
                    <td>
                        <label for="date_depart">  date arrivee :
                        </label>
                    </td>
                    <td>
                        <input type="date" name="date_depart" id="date_depart">
                    </td>
                </tr>
								</li>

								<li class="icon fa-paper-plane">
                                <tr>
                    <td>
                        <label for="date_arrivee">  date depart :
                        </label>
                    </td>
                    <td>
                        <input type="date" name="date_arrivee" id="date_arrivee">
                    </td>
                </tr>
				
								
		                  </li>
						  <a href="rchboch_voyage.php" class="btn btn-sm btn-neutral" style="padding-left: 0px;margin-top: 300px;">rechercher </a>
							</ul>
							
						
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

	</body>
</html>