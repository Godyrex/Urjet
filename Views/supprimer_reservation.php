<?php
	include '../Controller/reservationC.php';
	$reservationC=new reservationC();
	$reservationC->supprimer_reservation($_GET["idres"]);
	header('Location:afficher_reservation.php');
?>