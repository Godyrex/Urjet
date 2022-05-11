<!DOCTYPE HTML>
<!--
	Spectral by HTML5 UP
	html5up.net | @ajlkn
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<?php
session_start();
    include_once '../Model/reclamation.php';
    include_once '../Controller/reclamationC.php';

    $error = "";
	$success = 0;
   
    // create user
    $reclamation = null;

   
    // create an instance of the controller  $rendez_vousC = new Rendez_vousC();
    $reclamationC = new reclamationC() ;
    if (isset($_POST["objetrec"]) &&   isset($_POST["sujet"]) &&  isset($_POST["contenurec"]) && isset($_POST["daterec"]) && isset($_POST["etatrec"]) && isset($_POST["idclient"]) )
    
    {
        if ( !empty($_POST["objetrec"]) && !empty($_POST["sujet"]) && !empty($_POST["contenurec"]) && !empty($_POST["daterec"]) && !empty($_POST["etatrec"]) && !empty($_POST["idclient"]) )
         {
            $reclamation = new reclamation(
             
				$_POST['objetrec'],
                $_POST['sujet'],
				$_POST['contenurec'],
                $_POST['daterec'],
				$_POST['etatrec'],
				$_POST['idclient']
				
               

            );
            $reclamationC->ajouterreclamation($reclamation); 
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
				<!-- Three -->
				<section id="three" class="wrapper style3 special">
					<body>
        <button><a href="afficherListereclamation.php">Retour à la liste des reclamation</a></button>
        <hr>
        
        <div id="error">
            <?php echo $error; ?>
        </div>
        
        <form action="" method="POST">
            <table border="1" align="center">
                
				<tr>
                    <td>
                        <label for="objetrec">objet de la reclamation :
							</label>
                    </td>
                    <td><input type="text" name="objetrec" id="objetrec" maxlength="20"></td>
                </tr>
                <tr>
                    <td>
                        <label for="sujet">sujet de la reclamation :
                        </label>
                    </td>
                    <td><input type="text" name="sujet" id="sujet" maxlength="20"></td>
                </tr>
                <tr>
                    <td>
                        <label for="contenurec">contenu de la reclamation :
                        </label>
                    </td>
                    <td>
                        <input type="text" name="contenurec" id="contenurec" maxlength="20">
                    </td>
		</tr> 
					<tr>
					<td>
                        <label for="daterec">date de la reclamation:
                        </label>
                    </td>
                    <td>
                        <input type="date" name="daterec" id="daterec" maxlength="20">
                    </td>
					
         </tr>
		 <tr>
					<td>
                        <label for="etatrec">etat de la reclamation:
                        </label>
                    </td>
                    <td>
                        <input type="text" name="etatrec" id="etatrec" maxlength="20">
                    </td>
					
         </tr>
		 <tr>
					<td>
                        <label for="idclient"> id du client:
                        </label>
                    </td>
                    <td>
                        <input type="number" name="idclient" id="idclient" maxlength="20">
                    </td>
					
         </tr>
		 
						</table>
										  
										 
  <button type="button" class="form-control" onclick="myFunction2();myFunction();">Verifier les données</button> 
			  
										  <button type="submit" class="form-control" id="submit-button-rv"  name="submit">Envoyer</button>
									  </form>
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






	</body>
</html>