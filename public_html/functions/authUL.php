<?php
include("BDD.php");
require('../../vendor/autoload.php');
use phpCAS;
phpCAS::client(CAS_VERSION_2_0,'auth.univ-lorraine.fr',443,'');
phpCAS::setNoCasServerValidation();
if(!phpCAS::checkAuthentication()){
    phpCAS::forceAuthentication();
}
$isEmt=$db->isEmt(phpCAS::getAttribute("mail"));
if($isEmt){
    $acces=$db->accesforUL(phpCAS::getAttribute("mail"));
    $_SESSION["nom"]=phpCAS::getAttribute("sn");
    $_SESSION["prenom"]=phpCAS::getAttribute("givenname");
    $_SESSION["acces"]=$acces;
    $_SESSION["userid"]=phpCAS::getAttribute("mail");
    $_SESSION["isul"]=true;
    header("location:../index");
}
else{
    phpCAS::logoutWithRedirectService("http://emt.polytech-nancy.univ-lorraine.fr/chooselogin?erreur=notaut");
}
?>