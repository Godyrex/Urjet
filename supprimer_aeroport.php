<?php
	include '../Controller/aeroportC.php';
	$aeroportC=new aeroportC();
	$aeroportC->supprimer_aeroport($_GET["id_aeroport"]);
	header('Location:afficher_aeroport.php');
?>