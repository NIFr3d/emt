<?php
include("functions/BDD.php");
$listeruns=$db->getRunHistory();
$choix=$_GET["choix"];
$choixstr=$listeruns[$choix];
var_dump($db->getRunInfos($choixstr));
?>