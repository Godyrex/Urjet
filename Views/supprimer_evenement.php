<?php
	include '../Controller/evenementC.php';
	$evenementC=new evenementC();
	$evenementC->supprimer_evenement($_GET["ideven"]);
	header('Location:afficher_evenement.php');
?>