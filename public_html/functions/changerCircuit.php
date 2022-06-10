<?php
include("BDD.php");
if($_POST["change"]){
    $nom=$_POST["choixcircuit"];
    $db->changeCircuit($nom);
    header("location:../index");
}
else{
    $nom=$_POST["choixcircuit"];
    $db->removeCircuit($nom);
    header("location: ../index");
}
?>