<?php

require_once "connexionbd.php";

// attempt insert query execution
if($_SERVER["REQUEST_METHOD"] == "POST"){
   /* $typeavion = trim($_POST["typeavion"]);
    $nomavion = trim($_POST["nomavion"]);*/
    $diagnostic = trim($_POST["diagnostic"]);
    $urgence = trim($_POST["urgence"]);
    $type = trim($_POST["type"]);
    $descriptionpanne = trim($_POST["descriptionpanne"]);
    
$sql = "INSERT INTO demande ( diagnostic , urgence , type , descriptionpanne ) VALUES ('$diagnostic' , '$urgence' , '$type' , '$descriptionpanne')";


$stmt = mysqli_prepare ($link, $sql);
/*$stmt->bind_param("ssss", $diagnostic, $urgence,$type,$descriptionpanne);*/
mysqli_stmt_execute ($stmt);
/*
$sql1="SELECT id FROM demande WHERE id_avion = SCOPE_IDENTITY()";
$stmt1 = mysqli_prepare ($link, $sql1);
mysqli_stmt1_execute ($stmt1);
mysqli_stmt1_store_result($stmt1);
mysqli_stmt1_bind_result($stmt1, $id);
$sql2 =$link->prepare ( "UPDATE avion SET nom = ?, type = ? WHERE id = ?");
$id = $link->insert_id_avion;
$stmt2->bind_param("ssi", $nomavion, $typeavion, $id);
$stmt2->execute();*/
}
?>