
 <?php
 session_start();
	include '../Controller/DemandeC.php';
	$demandeC=new DemandeC();
	$listeDemandes=$demandeC->afficherdemandesuser(); 
    if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
        header("location: login.php");
        exit;
    }
	if (isset($_POST['Export'])) {
		$demandeC->excel();
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
          <h1><a href="index.php">URJET</a></h1>
						<?php require 'sidebarfront.php' ?>
					</header>

				<!-- Main -->
					<article id="main">
						<header>
							<h2>Demande de maintenance</h2>
							<p>Liste des demandes</p>
						</header>
						<section class="wrapper style5">
							<div class="inner">
							<form action="rechercherdemande.php" method="post" >
										<div class="row gtr-uniform"> 
											<div class="col-6 col-12-xsmall"> 
												<input type="text" name="key"  placeholder="Recherche.." />
												<input type="submit" name="submit"  value="chercher" />
												
											</div>  
										</div>
							</form>
								<section>
							
		<table border="1" align="center">
			<tr>
				<th>IDdemande</th>
				<th>diagnostic</th>
				<th>urgence</th>
				<th>type</th>
				<th>description de panne</th>
				<th>Modifier</th>
				<th>Supprimer</th>
			</tr>
			<?php
				foreach($listeDemandes as $demande){
			?>
			<tr>
				<td><?php echo $demande['IDdemande']; ?></td>
				<td><?php echo $demande['diagnostic']; ?></td>
				<td><?php echo $demande['urgence']; ?></td>
				<td><?php echo $demande['type']; ?></td>
				<td><?php echo $demande['descriptionpanne']; ?></td>
				
				<td>
					<form method="POST" action="modifierdemande.php">
						<input type="submit" name="Modifier" value="Modifier">
						<input type="hidden" value=<?PHP echo $demande['IDdemande']; ?> name="IDdemande">
					</form>
				</td>
				<td>
					<a href="supprimerdemande.php?IDdemande=<?php echo $demande['IDdemande']; ?>">Supprimer</a>
				</td>
			</tr>
			<?php
				}
			?>
		</table>
									
								</section>
								<form method="POST" action="">		
						<input type="submit" name="Export" value="Export ">
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