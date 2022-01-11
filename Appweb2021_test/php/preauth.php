<?php
if(!ISSET($_COOKIE["token"])){
    header("location:../pages/login.php?Pas+d+ancienne+connexion");
}else{

    include("BDD.php");
    $token=$_COOKIE["token"];
    if (!$db->tokenExist($token)){
        header("location: ../pages/login.php?erreur=Utilisateur+inconnu");
    }else{
        $infos=$db->gettokenInfos($token);
            session_start();
            $_SESSION["nom"]=$infos[0];
            $_SESSION["prenom"]=$infos[1];
            $_SESSION["acces"]=$infos[2];
            
            header("location:../pages/data.php");
    }
}
?>