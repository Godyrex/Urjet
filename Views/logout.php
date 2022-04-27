<?php
session_start();
 
$_SESSION = array();
 
session_destroy();
$days = 30;
setcookie ("rememberme","", time() - ($days * 24 * 60 * 60 * 1000) );

header("location: index.php");
exit;
?>