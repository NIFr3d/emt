<?php
include("BDD.php");
// Enlève les guillemets
$userid = stripslashes($_POST["login"]);
$mdp = stripslashes($_POST["mdp"]);

    if (!$db->userExist($userid)){
        header("location: ../login?erreur=Utilisateur+inconnu"); // retour à la page de connexion si l'utilisateur n'existe pas
    } else {
        if (password_verify($mdp,$db->getMdp($userid))){
            $infos=$db->getInfos($userid);
            // On lance la session et on stocke les informations nécessaires
            session_start();
            $_SESSION["nom"]=$infos[0];
            $_SESSION["prenom"]=$infos[1];
            $_SESSION["acces"]=$infos[2];
            $_SESSION["userid"]=$userid;
            $_SESSION["token"]=$db->getWSToken();
            header("location:../index");
        } else {
            header("location: ../login?erreur=Mot+de+passe+incorrect");
        }
    }

?>