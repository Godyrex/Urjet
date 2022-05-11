<?php
session_start();
require_once '../Controller/evenementC.php';
$evenementC = new evenementC();
$evenement = $evenementC->afficher_evenement();
if (isset($_POST['ideven'])&& isset($_POST['search'])){
 $list = $evenementC->afficher_evenement($_POST['ideven']);
}
?>
<!DOCTYPE HTML>
<!--
	Spectral by HTML5 UP
	html5up.net | @ajlkn
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<?php
    include_once '../Model/reservation.php';
    include_once '../Controller/reservationC.php';

    $error = "";
    $success = 0;
   
    // create user
    $reservation = null;

   
    // create an instance of the controller  $reservationC = new reservationC();
    $reservationC = new reservationC() ;
    if (  isset($_POST["ideven"]) &&  isset($_POST["dateres"]) && isset($_POST["etatres"]))
    
    {
        if (  !empty($_POST["ideven"]) && !empty($_POST["dateres"]) && !empty($_POST["etatres"]))
         {
            $reservation = new reservation(
             
                $_SESSION["id"],
                $_POST['ideven'],
				$_POST['dateres'],
                $_POST['etatres']
               

            );
            $reservationC->ajouter_reservation($reservation); 
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
        <button><a href="afficher_reservation.php">Retour à la liste des reservation</a></button>
        <hr>
        
        <div id="error">
            <?php echo $error; ?>
        </div>
        
        <form action="" method="POST">
            <table border="1" align="center">
                

 <tr>
 <td>
 <label for="ideven">Id evenement :
	<select name="ideven" id="ideven"
 style="width: 180px;">
	
 <?php
                    foreach ($evenement as $evenement){
                        ?>
                    <option
                        value="<?= $evenement['ideven']?>"
                        

                    >
                    <?= $evenement['ideven'] ?>
                    </option>
                    <?php
                    }
                    ?>

 </select>
 </label>
 </td>
 
 
</tr>
 </p>

                <tr>
                    <td>
                        <label for="dateres">date de la reservation :
                        </label>
                    </td>
                    <td>
                        <input type="date" name="dateres" id="dateres" maxlength="20">
                    </td>
		</tr> 
					<tr>
					<td>
                        <label for="etatres">etat de la reservation:
                        </label>
                    </td>
                    <td>
                        <input type="text" name="etatres" id="etatres" maxlength="20">
                    </td>
					
         </tr>
		
						</table>
										  
										 
  <button type="button" class="form-control" onclick="myFunction2();myFunction();">Verifier les données</button> 
			  
										  <button type="submit" class="form-control" id="submit-button-rv"  name="submit">envoyer</button>
									  </form>
					</section>

				<!-- CTA -->


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