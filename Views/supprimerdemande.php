<?php
	include '../Controller/DemandeC.php';
	$demandeC=new DemandeC();
	$demandeC->supprimerdemande($_GET["IDdemande"]);
	header('Location:afficherListeDemandes.php');
?>