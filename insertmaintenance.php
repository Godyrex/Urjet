<?php

require_once "connexionbd.php";

// attempt insert query execution
if($_SERVER["REQUEST_METHOD"] == "POST"){
 
    $etat = trim($_POST["etat"]);
    $prix= trim($_POST["prix"]);

    
$sql = "INSERT INTO demande ( etat , prix ) VALUES ('$etat' , '$prix')";


$stmt = mysqli_prepare ($link, $sql);
/*$stmt->bind_param("sf", $etat, $prix);*/
mysqli_stmt_execute ($stmt);

}
?>