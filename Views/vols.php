<?php
session_start();
include '../config.php';
include "../Controller/voyageC.php";
$voyagec = new voyageC();
$rows=0;
?>
<?php
require_once '../Controller/aeroportC.php';
$aeroportC = new aeroportC();
$aeroport = $aeroportC->afficher_aeroport();

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

				

				<!-- Three -->
                <div class="col-md-5">
                            <!-- general form elements -->

                            <div class="card card-primary ">
                                <div class="card-header">
                                    <h3 class="card-title">recherche</h3>
                                </div>
                                <!-- /.card-header -->
                                <!-- form start -->
                                <form name="search"  method="post" enctype="multipart/form-data">
                                    <div class="card-body">
                                        <div class="form-group">
                                            <div class="input-group">
                                                <div class="custom-file">
                                                <label id="imagelabel" class="custom-file-label" >Depart :</label>
                                                <select id="depart" name="depart" class="form-select">
                        <option>Choose an option</option>
                        <?php
                        $con = config::getConnexion();
                        $sql = "SELECT pays From aeroport";
                        $stmt = $con->prepare($sql);
                        $stmt->execute();
                        while ($row = $stmt->fetch()) { ?>
                            <option><?php echo htmlspecialchars($row['pays']) ?></option>
                        <?php } ?>
                    </select>
                                                    <label id="imagelabel" class="custom-file-label" >Arrivee :</label>
                                                    <select id="arrivee" name="arrivee" class="form-select">
                        <option>Choose an option</option>
                        <?php
                        $con = config::getConnexion();
                        $sql = "SELECT pays From aeroport";
                        $stmt = $con->prepare($sql);
                        $stmt->execute();
                        while ($row = $stmt->fetch()) { ?>
                            <option><?php echo htmlspecialchars($row['pays']) ?></option>
                        <?php } ?>
                    </select>
                                                    <label id="imagelabel" class="custom-file-label" >Date Depart :</label>
                                                    <input  id="ddepart" name="ddepart" type="date" >
                                                    <label id="imagelabel" class="custom-file-label" >Date Arrivee :</label>
                                                    <input  id="darrivee" name="darrivee" type="date" >
                                                    
                                                </div>
                                            </div>
                                            <br>

                                        </div>
                                    </div>
                                    <!-- /.card-body -->

                                    <div class="card-footer">
                                        <button name="searchc"  type="submit" class="btn btn-primary">Recherche</button>
                                    </div>
                                    
                                </form>
                            </div>
                            <div class="card-body table-responsive p-0" style="height: 300px ">
                <table id="myTable" class="table table-head-fixed text-nowrap">
                  <thead>
                    <tr>
                    <th>Date Depart</th>
                    <th>Date Arrivee</th>
                    <th>Depart</th>
                    <th>Arrivee</th>
                    <th>Prix</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    if (isset($_POST["searchc"]))
                    {
                        $depart = $_POST['depart'];
                        $arrivee = $_POST['arrivee'];
                        $ddepart = $_POST['ddepart'];
                        $darrivee = $_POST['darrivee'];
                        $voyagec->rechercher_voyage($ddepart,$darrivee,$arrivee,$depart);
                    }

                    ?>
                  </tbody>

                </table>
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