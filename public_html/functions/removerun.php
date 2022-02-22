<?php
include("BDD.php");
$listeruns=$db->getRunHistory();
$choix=$_POST["choixrun"];
$choixstr=$listeruns[$choix][0];
$db->delRun($choixstr);
header("location: ../historique");
?>