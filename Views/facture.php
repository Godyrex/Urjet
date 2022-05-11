
 <?php
 session_start();
	include '../Controller/DemandeC.php';
	$demandeC=new DemandeC();
	$listeDemandes=$demandeC->facturation(); 
	
?>
<!DOCTYPE HTML>

<html>
	<head>
		<title>Facturation</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
		<link rel="stylesheet" href="assets/css/main.css" />
        <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-beta.2/css/bootstrap.css'>
		<noscript><link rel="stylesheet" href="assets/css/noscript.css" /></noscript>
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
							<h2>Facturation</h2>
							
						</header>
						<section class="wrapper style5">
							<div class="inner">
							
								<section>
                                <div class="container">
        <div class="card">
            <div class="card-header">
                Invoice
                <strong>01/01/2020</strong>
                <span class="float-right"> <strong>Status:</strong> Pending</span>
            </div>
            <div class="card-body">
                <div class="row mb-4">
                    <div class="col-sm-6">
                        <h6 class="mb-3">De:</h6>
                        <div>
                            <strong>URJET</strong>
                        </div>
                        <div>El GHAZELA</div>
                        <div>Tunis, TUNISIE</div>
                        <div>Email: www.URJET@gmail.com</div>
                        <div>Phone: +216 71506286</div>
                    </div>
                    <div class="col-sm-6">
                        <h6 class="mb-3">À:</h6>
                        <div>
                            <strong><?php echo htmlspecialchars($_SESSION["name"]);   echo htmlspecialchars($_SESSION["lastname"])  ?></strong>
                        </div>
                        <div>Attn: </div>
                        <div>16 rue salema, La Manouba</div>
                        <div>Email: <?php echo htmlspecialchars($_SESSION["email"]); ?></div>
                        <div>Phone: +216 59682349</div>
                    </div>
                </div>
                <div class="table-responsive-sm">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th class="center">#</th>
                                <th>Item</th>
                                <th>Description</th>
                                <th class="right">Unit Cost</th>
                                <th class="center">Qty</th>
                                <th class="right">Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="center">1</td>
                                <td class="left strong">Origin License</td>
                                <td class="left">Extended License</td>
                                <td class="right">$999,00</td>
                                <td class="center">1</td>
                                <td class="right">$999,00</td>
                            </tr>
                            <tr>
                                <td class="center">2</td>
                                <td class="left">Custom Services</td>
                                <td class="left">Instalation and Customization (cost per hour)</td>
                                <td class="right">$150,00</td>
                                <td class="center">20</td>
                                <td class="right">$3.000,00</td>
                            </tr>
                            <tr>
                                <td class="center">3</td>
                                <td class="left">Hosting</td>
                                <td class="left">1 year subcription</td>
                                <td class="right">$499,00</td>
                                <td class="center">1</td>
                                <td class="right">$499,00</td>
                            </tr>
                            <tr>
                                <td class="center">4</td>
                                <td class="left">Platinum Support</td>
                                <td class="left">1 year subcription 24/7</td>
                                <td class="right">$3.999,00</td>
                                <td class="center">1</td>
                                <td class="right">$3.999,00</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="row">
                    <div class="col-lg-4 col-sm-5">
                    </div>
                    <div class="col-lg-4 col-sm-5 ml-auto">
                        <table class="table table-clear">
                            <tbody>
                                <tr>
                                    <td class="left">
                                        <strong>Subtotal</strong>
                                    </td>
                                    <td class="right">$8.497,00</td>
                                </tr>
                                <tr>
                                    <td class="left">
                                        <strong>Discount (20%)</strong>
                                    </td>
                                    <td class="right">$1,699,40</td>
                                </tr>
                                <tr>
                                    <td class="left">
                                        <strong>VAT (10%)</strong>
                                    </td>
                                    <td class="right">$679,76</td>
                                </tr>
                                <tr>
                                    <td class="left">
                                        <strong>Total</strong>
                                    </td>
                                    <td class="right">
                                        <strong>$7.477,36</strong>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
								</section>
                                <li><input type="submit" value="Imprimer" class="primary" /></li>
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