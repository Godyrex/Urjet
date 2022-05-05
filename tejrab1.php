<!DOCTYPE HTML>
<?php
require_once '../Controller/aeroportC.php';
$aeroportC = new aeroportC();
$aeroport = $aeroportC->afficher_aeroport();
if (isset($_POST['aeroport'])&& isset($_POST['search'])){
    $list = $aeroportC->afficher_aeroport($_POST['aeroport']);
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
							<ul class="spotlight">
								<li class="icon fa-paper-plane">
                                <tr>
                    <td>
                        <label for="depart"> aeroport depart :
                        </label>
                    </td>
                    <td>
                        <input type="text" name="depart" id="depart">
                    </td>
                </tr>
								</li>

								<li class="icon fa-paper-plane">
								<tr>
                    <td>
                        <label for="arrivee"> aeroport arrivee :
                        </label>
                    </td>
                    <td>
                        <input type="text" name="arrivee" id="arrivee">
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
						
					</section>


			
			</div>

	
<div class="form-container">
    <form action="" method ="POST">
        <div class="row">
            <div class="col-25" style="padding-left: 200px;">
                <label>Search: </label>
            </div>
            <div class="col-75" style="padding-left: 200px;">
                <select name="aeroport" id="aeroport">
                    <?php
                    foreach ($aeroport as $aeroport){
                        ?>
                    <option
                        value="<?= $aeroport['id_aeroport']?>"
                        <?php } ?>

                    >
                    <?= $aeroport['id_aeroport'] ?>
                    </option>
                    <?php
                    
                    ?>

                </select>
            </div>
        </div>
        <br>
        <div class="row" style="padding-left: 200px;">
            <input type="submit" value="Search" name= "search">
        </div>
    </form>
</div>


<?php
require_once '../Controller/voyageC.php';
$voyageC = new voyageC();
$list = $voyageC->afficher_voyage();
 if (isset($_POST['search'])){?>
    <section class="container">
        <?php foreach ($list as $voyage){
        ?>
        <div class="shop-item">
            <strong class="shop-item-title" style="padding-left: 200px;"><?= $voyage['date_depart'] ?> => </strong>
            <strong class="shop-item-title" style="padding-left: 200px;"><?= $voyage['date_arrivee'] ?></strong>
            <?php
require_once '../Controller/aeroportC.php';
$aeroportC = new aeroportC();
$list = $aeroportC->afficher_aeroport();
 if (isset($_POST['search'])){?>
    <section class="container">
        <?php foreach ($list as $aeroport){
        ?>
        <div class="shop-item">
        <strong class="shop-item-title" style="padding-left: 400px;"><?= $aeroport['depart'] ?> => </strong>
            <strong class="shop-item-title" style="padding-left: 400px;"><?= $aeroport['arrivee'] ?></strong>
        </div>


        <?php 
        }
        ?>
</div>
    </section>
    <?php 
        }
        ?>
            
            
            <div class="shop-item-details">
                <span class="shop-item-price" style="padding-left: 200px;"><?= $voyage['prix'] ?> dt. </span>

        </div>
        </div>


        <?php 
        }
        ?>
</div>
    </section>

    
    
   
	<!-- Scripts -->
    <script src="assets/js/jquery.min.js"></script>
			<script src="assets/js/jquery.scrollex.min.js"></script>
			<script src="assets/js/jquery.scrolly.min.js"></script>
			<script src="assets/js/browser.min.js"></script>
			<script src="assets/js/breakpoints.min.js"></script>
			<script src="assets/js/util.js"></script>
			<script src="assets/js/main.js"></script>

	</body>
    <?php 
        }
        ?>
</html>