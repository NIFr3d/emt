<?php
include("BDD.php");
$userid = stripslashes($_POST["login"]);
$mdp = stripslashes($_POST['mdp']);
$mdp = password_hash($mdp,PASSWORD_DEFAULT);
$nom= stripslashes($_POST["nom"]);
$prenom= stripslashes($_POST["prenom"]);
$acces=0;
if(!$db->userExist($userid)){
    $db->register($userid,$mdp,$nom,$prenom,$acces);
        header("location: ../register?msg=Demande+envoyée");
}else{
    header("location: ../register?msg=Identifiant+déjà+utilisé");
}
?>