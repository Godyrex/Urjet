<?php
session_start();
if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] && !isset($_SESSION["Admin"]) || $_SESSION["Admin"] !== true) {
	header("location: index.php");
	exit;
  }


?>
<!DOCTYPE HTML>
<!--
	Spectral by HTML5 UP
	html5up.net | @ajlkn
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<?php
include_once '../Model/evenement.php';
include_once '../Controller/evenementC.php';

$error = "";
$success = 0;

// create user
$evenement = null;


// create an instance of the controller  $rendez_vousC = new Rendez_vousC();
$evenementC = new evenementC();
if (isset($_POST["nom"]) && isset($_POST["debut"]) && isset($_POST["fin"]) && isset($_POST["nbrpart"]) && isset($_POST["prix"])) {
	if (!empty($_POST["nom"]) && isset($_POST["debut"])  && isset($_POST["fin"]) && isset($_POST["nbrpart"]) && isset($_POST["prix"])) {
		$evenement = new evenement(

			$_POST['nom'],
			$_POST['debut'],
			$_POST['fin'],
			$_POST['nbrpart'],
			$_POST['prix']




		);
		$evenementC->ajouter_evenement($evenement);
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
	<noscript>
		<link rel="stylesheet" href="assets/css/noscript.css" />
	</noscript>
</head>

<body class="landing is-preload">

	<!-- Page Wrapper -->
	<div id="page-wrapper">

		<!-- Header -->
		<header id="header" class="alt">
			<h1><a href="index.php">URJET</a></h1>
						<?php require 'sidebarfront.php' ?>
		</header>

		<!--
					<section id="two" class="wrapper alt style2">
						<section class="spotlight">
							<div class="image"><img src="images/pic01.jpg" alt="" /></div><div class="content">
								<h2>Private Jets<br />
								</h2>
								<p>Aliquam ut ex ut augue consectetur interdum. Donec hendrerit imperdiet. Mauris eleifend fringilla nullam aenean mi ligula.</p>
							</div>
						</section>
						<section class="spotlight">
							<div class="image"><img src="images/pic02.jpg" alt="" /></div><div class="content">
								<h2>Skydiving Planes<br />
								</h2>
								<p>Aliquam ut ex ut augue consectetur interdum. Donec hendrerit imperdiet. Mauris eleifend fringilla nullam aenean mi ligula.</p>
							</div>
						</section>
						<section class="spotlight">
							<div class="image"><img src="images/pic03.jpg" alt="" /></div><div class="content">
								<h2>Farming Planes<br />
								</h2>
								<p>Aliquam ut ex ut augue consectetur interdum. Donec hendrerit imperdiet. Mauris eleifend fringilla nullam aenean mi ligula.</p>
							</div>
						</section>
					</section>
-->

		<!-- Three -->
		<section id="three" class="wrapper style3 special">



			<body>
				<button><a href="afficher_evenement.php">Retour aux evenement</a></button>
				<hr>

				<div id="error">
					<?php echo $error; ?>
				</div>

				<form action="" method="POST">
					<table border="1" align="center">

						<tr>
							<td>
								<label for="nom"> nom :
								</label>
							</td>
							<td><input type="text" name="nom" id="nom" maxlength="20"></td>
						</tr>
						<tr>
							<td>
								<label for="debut"> debut :
								</label>
							</td>
							<td><input type="date" name="debut" id="debut" maxlength="20"></td>
						</tr>
						<tr>
							<td>
								<label for="fin"> fin :
								</label>
							</td>
							<td><input type="date" name="fin" id="fin" maxlength="20"></td>
						</tr>

						<tr>
							<td>
								<label for="nbrpart"> nbrpart :
								</label>
							</td>
							<td><input type="number" name="nbrpart" id="nbpart" maxlength="20"></td>
						</tr>

						<tr>
							<td>
								<label for="prix">prix :
								</label>
							</td>
							<td><input type="number" name="prix" id="prix" maxlength="20"></td>
						</tr>
					</table>

					<button type="button" class="form-control" onclick="myFunction2();myFunction();">Verifier les données</button>

					<button type="submit" class="form-control" id="submit-button-rv" name="submit">envoyer</button>
				</form>
				</body>
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
				<li>&copy; Untitled</li>
				<li>Design: <a href="http://html5up.net">HTML5 UP</a></li>
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



	<script>
		var b = document.getElementById("mybtn")

		b.addEventListener("CLICK", myFunction() {
			alert('WRONG')
		});
	</script>
	</html>	
	<!--
<script>
function myFunction() {
  // Get the value of the input field with id
  let x = document.getElementById("daterec").value;
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