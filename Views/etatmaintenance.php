
 <?php
 session_start();
	include '../Controller/MaintenanceC.php';
	$MaintenanceC=new MaintenanceC();
	$listeMaintenance=$MaintenanceC->affichermaintenances(); 
    if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
        header("location: login.php");
        exit;
    }
?>
<!DOCTYPE HTML>

<html>
	<head>
		<title>maintenance de maintenance</title>
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
          <h1><a href="index.php">URJET</a></h1>
						<?php require 'sidebarfront.php' ?>
					</header>

				<!-- Main -->
					<article id="main">
						<header>
							<h2>Afficher l'etat de votre maintenance</h2>
						</header>
						<section class="wrapper style5">
							<div class="inner">
								<section>
							
		<table border="1" align="center">
			<tr>
				<th>IDmaintenance</th>
				<th>Etat</th>
				<th>Prix</th>
			</tr>
			<?php
				foreach($listeMaintenance as $maintenance){
			?>
			<tr>
				<td><?php echo $maintenance['IDM']; ?></td>
				<td><?php echo $maintenance['etat']; ?></td>
				<td><?php echo $maintenance['prix']; ?></td>
				

			</tr>
			<?php
				}
			?>
		</table>
									
								</section>
                                <form action="facture.php" method="post">
                  <input class="btn btn-primary" type="submit" name="submit" value="Facturation" />
                </form>
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