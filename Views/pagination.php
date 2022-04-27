<?php
include '../config.php';

    $sql="SELECT *FROM demande";
    $pdo = config::getConnexion();
    $query = $pdo->prepare($sql);
    $query->execute();
    $results = $query->fetchAll();
 // pagination

    $total_results = $query->rowCount();
    $results_per_page = 10;
    $number_of_pages = ceil($total_results/$results_per_page);

?>