<?php
include("BDD.php");
$nom=$_POST["nom"];
$db->changeCircuit($nom);
header("location:../index");
?>