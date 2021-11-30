<?php
include("BDD.php");
$userid = $_GET["login"];
$mdp = $_GET["mdp"];
if (!$db->userExist($userid)){
    header("location: ../pages/login.html?erreur=Utilisateur+inconnu"); // retour à la page de connexion si l'utilisateur n'existe pas
} else {
    if ($mdp == $db->getMdp($userid)){
        header("location:../pages/data.html?userid=$userid");
    } else {
        header("location: ../pages/login.html?erreur=Mot+de+passe+incorrect");
    }
}
?>