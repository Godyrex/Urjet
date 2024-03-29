<?php
include_once "../Controller/voyageC.php";
include_once '../Model/voyage.php';
$voyage=new voyageC();



if (isset($_POST['date_depart']))
{
  $date_depart= $_POST["date_depart"];
$listevoyage=$voyage->rechercher_voyage($date_depart);

?>

<!DOCTYPE HTML>
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

               <!-- Recherche-->
			  <div class="form-group">
                            <div class="input-group input-group-lg">
                                <input type="search" class="form-control form-control-lg" placeholder="entrer votre voyage" value="">
                                <div class="input-group-append">
                                    <button type="submit" class="btn btn-lg btn-default">
                                        <i class="fa fa-search"></i>
                                    </button>
                                </div>
                            </div>
                        </div>


							<ul class="spotlight" style="padding-right: 50px;height: 400px;">
								<li class="icon fa-paper-plane">
                                <tr>
                    <td>
                        <label for="id_aeroport"> aeroport depart :
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
                        <label for="date_depart">  date depart :
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
                        <label for="date_arrivee">  date arrivee :
                        </label>
                    </td>
                    <td>
                        <input type="date" name="date_arrivee" id="date_arrivee">
                    </td>
                </tr>
				
								</li>
							</ul>
							<a href="rechercher_voyage.php" class="btn btn-sm btn-neutral" style="padding-left: 200px;">rechercher </a>
						
					</section>

					


			
			</div>
<?php
}
?>

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