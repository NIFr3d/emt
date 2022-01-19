<?php
include("functions/BDD.php");
$listeruns=$db->getRunHistory();
$choix=$_POST["choixrun"];
$choixstr=$listeruns[$choix][0];
header("location: ../historique.php");
?>