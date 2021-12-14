<?php
include("BDD.php");
$userid = $_POST["login"];
$mdp = $_POST["mdp"];

    if (!$db->userExist($userid)){
        header("location: ../pages/login.html?erreur=Utilisateur+inconnu"); // retour à la page de connexion si l'utilisateur n'existe pas
    } else {
        if ($mdp == $db->getMdp($userid)){
            $infos=$db->getinfos($userid);
            session_start();
            $_SESSION["nom"]=$infos[0];
            $_SESSION["prenom"]=$infos[1];
            $_SESSION["acces"]=$infos[2];
            $token=random_bytes(20);
            setcookie("token", $token,time()+600000,'/');
            $db->saveToken($userid,$token);
            header("location:../pages/data.html");
        } else {
            header("location: ../pages/login.html?erreur=Mot+de+passe+incorrect");
        }
    }

?>