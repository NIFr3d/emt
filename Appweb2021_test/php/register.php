<?php
include("BDD.php");
$userid = $_POST["login"];
$mdp=$_POST["mdp"];
$nom=$_POST["nom"];
$prenom=$_POST["prenom"];
$acces=0;
if(!$db->userExist($userid)){
    $db->register($userid,$mdp,$nom,$prenom,$acces);
        header("location: ../pages/register.php?msg=Demande+envoyée");
}else{
    header("location: ../pages/register.php?msg=Identifiant+déjà+utilisé");
}
?>