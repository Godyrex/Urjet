<?php
	include '../Controller/MaintenanceC.php';
	$maintenanceC=new MaintenanceC();
	$maintenanceC->supprimermaintenance($_GET["IDM"]);
	header('Location:afficherListeMaintenance.php');
?>