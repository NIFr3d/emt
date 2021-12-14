<?php
if(!ISSET($_COOKIE["token"])){
    header("location:../pages/login.html?Pas+d'ancienne+connexion");
}else{
    include("BDD.php");
    $token=$_COOKIE["token"];
    if (!$db->tokenExist($token)){
        header("location: ../pages/login.html?erreur=Utilisateur+inconnu");
    }else{
        $infos=$db->gettokenInfos($userid);
            session_start();
            $_SESSION["nom"]=$infos[0];
            $_SESSION["prenom"]=$infos[1];
            $_SESSION["acces"]=$infos[2];
            
            header("location:../pages/data.html");
    }
}
?>