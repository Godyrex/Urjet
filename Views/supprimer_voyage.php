<?php
	include '../Controller/voyageC.php';
	$voyageC=new voyageC();
	$voyageC->supprimer_voyage($_GET["id_voyage"]);
	header('Location:afficher_voyage.php');
?>