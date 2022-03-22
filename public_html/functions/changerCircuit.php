<?php
include("BDD.php");
$nom=$_POST["choixcircuit"];
$db->changeCircuit($nom);
header("location:../index");
?>