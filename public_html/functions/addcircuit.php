<?php
include("BDD.php");
$lat=$_POST["lat"];
$lon=$_POST["lon"];
$zoom=$_POST["zoom"];
$cir=$_POST["cir"];
$db->addCircuit($lat,$lon,$zoom,$cir);
header("location: ../index");
?>