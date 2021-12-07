<?php
include("BDD.php");
$userid = $_GET["login"];
$mdp = $_GET["mdp"];
if (!$db->userExist($userid)){
    header("location: ../pages/login.html?erreur=Utilisateur+inconnu"); // retour à la page de connexion si l'utilisateur n'existe pas
} else {
    if ($mdp == $db->getMdp($userid)){
        setcookie("userid", $userid,time()+1800,'/');
        $infos=$db->getinfos($userid);
        setcookie("acces",$infos[2],time()+1800,'/');
        setcookie("nom",$infos[0],time()+1800,'/');
        setcookie("prenom",$infos[1],time()+1800,'/');
        setcookie("islogged", true,time()+1800,'/');
        header("location:../pages/data.html");
    } else {
        header("location: ../pages/login.html?erreur=Mot+de+passe+incorrect");
    }
}
?>