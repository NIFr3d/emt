<?php
include("BDD.php");
$userid = $_GET["login"];
$mdp=$_GET["mdp"];
$nom=$_GET["nom"];
$prenom=$_GET["prenom"];
$acces=$_GET["acces"];
if(!$db->userExist($userid)){
    $db->addUser($userid,$mdp,$nom,$prenom,$acces);
    if($db->userExist($userid)){
        header("location: ../pages/adduser.php?msg=Utilisateur+ajouté+avec+succès");
    }
}else{
    header("location: ../pages/adduser.php?msg=Identifiant+déjà+utilisé");
}
?>