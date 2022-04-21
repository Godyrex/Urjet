<?php
    include_once '../Model/Demande.php';
    include_once '../Controller/DemandeC.php';

    $error = "";

    // create adherent
    $demande = null;

    // create an instance of the controller
    $demandeC = new DemandeC();
    if (
     
		isset($_POST["diagnostic"]) &&		
        isset($_POST["urgence"]) &&
		isset($_POST["type"]) && 
        isset($_POST["descriptionpanne"])
    ) {
        if (
        
			!empty($_POST["diagnostic"]) &&
            !empty($_POST["urgence"]) && 
			!empty($_POST["type"]) && 
            !empty($_POST["descriptionpanne"]) 
        ) {
            $demande = new Demande(
            
				$_POST['diagnostic'],
                $_POST['urgence'], 
				$_POST['type'],
                $_POST['descriptionpanne']
            );
            $demandeC->ajouterdemande($demande);
            header('Location:afficherListeDemandes.php');
        }
        else
            $error = "Informations Manquantes";
    }

    
?>
<!DOCTYPE HTML>

<html>
	<head>
		<title>Demande de maintenance</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
		<link rel="stylesheet" href="assets/css/main.css" />
		<noscript><link rel="stylesheet" href="assets/css/noscript.css" /></noscript>
		<script src="finsert.js"></script>
	</head>
	<body class="is-preload">

		<!-- Page Wrapper -->
			<div id="page-wrapper">

				<!-- Header -->
					<header id="header">
						<h1><a href="index.html">Urjet</a></h1>
						<nav id="nav">
							<ul>
								<li class="special">
									<a href="#menu" class="menuToggle"><span>Menu</span></a>
									<div id="menu">
										<ul>
										<li><a href="index.php">Accueil (airplanes catalog)</a></li>
											<li><a href="cata.php">Airplanes catalog</a></li>
											<?php if (isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] && isset($_SESSION["Admin"]) && $_SESSION["Admin"] === true) { ?>
											<li><a href="add.php">Avion</a></li>
											<?php }?>
											<li><a href="Resersation.php"></a>Réservation</li>
											<li><a href="Reclamation.php">Réclamation</a></li>
											<li><a href="Reponse.php">Réponse</a></li>
											<li><a href="afficherListeDemandes.php"></a>Afficher la liste des demandes</li>
											<li><a href="ajouterdemande.php">Demande de maintenance</a></li>
											<li><a href="Voyage.php">Voyage</a></li>
                                            <?php if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) { ?>
                                            <li><a href="signup.php">Sign Up</a></li>
											<li><a href="login.php">Log In</a></li>
                                            <?php }?>
											<?php if (isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] && isset($_SESSION["Admin"]) && $_SESSION["Admin"] === true) { ?>
                                                <li><a href="AdminPanel.php">Admin Panel</a></li>
                                                <?php }?>
                                            <?php if (isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true) { ?>
                                            <li><a href="settings.php">Settings</a></li>
											<li><a href="logout.php">Log out</a></li>
                                            <?php }?>
										</ul>
									</div>
								</li>
							</ul>
						</nav>
					</header>

				<!-- Main -->
					<article id="main">
						<header>
							<h2>Demande de maintenance</h2>
							<p>Veuillez remplir le formulaire suivant</p>
						</header>
						<section class="wrapper style5">
							<div class="inner">

								<section>
									<h4>Form</h4>
									<form action="" method="post" >
										<div class="row gtr-uniform">
											<div class="col-6 col-12-xsmall">
												<input type="text" name="nomavion" id="demo-name" placeholder="Le nom de l'avion" />
											</div>
											<div class="col-12">
												<select name="typeavion" id="demo-category">
													<option value="">Le type de votre avion</option>
													<option value="1">L'imprécision des jauges de carburant</option>
													<option value="2">L'imprécision du débitmètre ou le défaut d'étalonnage</option>
													<option value="3">Le tachymètre défaillant ou l'interprétation erronée de l'indication</option>
													<option value="4">La surconsommation anormale du moteur</option>
                                                    <option value="5">Les pertes en carburant ou des fuites non détectées</option>
                                                    <option value="6">Autre</option>
												</select>
											</div>
											<div class="col-6 col-12-small">
												<input type="checkbox" id="demo-copy" name="diagnostic" value="Diagnostic">
												<label for="demo-copy">Diagnostic</label>
											</div>
											<div class="col-6 col-12-small">
												<input type="checkbox" id="demo-human" name="diagnostic" value="Réparation" >
												<label for="demo-human">Réparation</label>
											</div>
                                            <div class="col-4 col-12-small">
												<input type="radio" id="urgente" name="urgence" value="urgence" >
												<label for="demo-priority-low">Panne urgente (entre 24h et 72h)</label>
											</div>
											<div class="col-4 col-12-small">
												<input type="radio" id="demo-priority-normal" name="urgence" value="pas urgent">
												<label for="demo-priority-normal">Normal (entre 72h et 3 mois)</label>
											</div>

											<div class="col-12">
												<select name="type" id="demo-category">
													<option value="">Le type de la panne</option>
													<option value="1">L'imprécision des jauges de carburant</option>
													<option value="1">L'imprécision du débitmètre ou le défaut d'étalonnage</option>
													<option value="1">Le tachymètre défaillant ou l'interprétation erronée de l'indication</option>
													<option value="1">La surconsommation anormale du moteur</option>
                                                    <option value="1">Les pertes en carburant ou des fuites non détectées</option>
                                                    <option value="1">Autre</option>
												</select>
											</div>
											<div class="col-12">
												<textarea name="descriptionpanne" id="demo-message" placeholder="Description de la panne" rows="6"></textarea>
											</div>
											<div class="col-12">
												<ul class="actions">
													<li><input type="submit" value="Enregistrer" class="primary" /></li>
													<li><input type="reset" value="Réinitialiser" /></li>
												</ul>
											</div>
										</div>
									</form>
								</section>
							</div>
						</section>
					</article>

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
							<li>&copy; Untitled</li><li>Design: <a href="http://urjet.com">HTML5 UP</a></li>
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

	</body>
</html>