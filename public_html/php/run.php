<?php
include("functions/BDD.php");
$listeruns=$db->getRunHistory();
$choix=$_GET["choix"];
$choixstr=$listeruns[$choix][0];
echo($choixstr);
var_dump($db->getRunInfos($choixstr));
?>