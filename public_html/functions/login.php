<?php
include("BDD.php");
$userid = stripslashes($_POST["login"]);
$mdp = stripslashes($_POST["mdp"]);

    if (!$db->userExist($userid)){
        header("location: ../login?erreur=Utilisateur+inconnu"); // retour à la page de connexion si l'utilisateur n'existe pas
    } else {
        if (password_verify($mdp,$db->getMdp($userid))){
            $infos=$db->getinfos($userid);
            session_start();
            $_SESSION["nom"]=$infos[0];
            $_SESSION["prenom"]=$infos[1];
            $_SESSION["acces"]=$infos[2];
            $_SESSION["userid"]=$userid;
            $token=base64_encode(random_bytes(20));
            setcookie("token", $token,time()+600000,'/');
            $db->saveToken($userid,$token);
            header("location:../index");
        } else {
            header("location: ../login?erreur=Mot+de+passe+incorrect");
        }
    }

?>