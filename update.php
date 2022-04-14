<?php

require_once "connexionbd.php";

// attempt insert query execution
if($_SERVER["REQUEST_METHOD"] == "POST"){
    $etat= trim($_POST["etat"]);
    $id= trim($_POST["id"]);
    
$sql = "UPDATE maintenance SET etat = ? WHERE id = ?";

$stmt = mysqli_prepare ($link, $sql);
$stmt->bind_param("si", $etat, $id);
mysqli_stmt_execute ($stmt);

}
?>