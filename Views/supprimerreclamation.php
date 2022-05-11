<?php
	include '../Controller/reclamationC.php';
	$reclamationC=new reclamationC();
	$reclamationC->supprimerreclamation($_GET["idrec"]);
	header('Location:afficherListereclamation.php');
?>