<?php
include("BDD.php");
require('../../vendor/autoload.php');
use phpCAS;
phpCAS::client(CAS_VERSION_2_0,'auth.univ-lorraine.fr',443,'');
phpCAS::setNoCasServerValidation();
if(!phpCAS::checkAuthentication()){
    phpCAS::forceAuthentication();
}
$isEmt=$db->isEmt(phpCAS::getAttribute("uid"));
if($isEmt){
    $acces=$db->accesforUL(phpCAS::getAttribute("uid"));
    $_SESSION["nom"]=phpCAS::getAttribute("sn");
    $_SESSION["prenom"]=phpCAS::getAttribute("givenname");
    $_SESSION["acces"]=$acces;
    $_SESSION["userid"]=phpCAS::getAttribute("uid");
    header("location:../index");
}
else{
    phpCAS::client(CAS_VERSION_2_0,'auth.univ-lorraine.fr',443,'');
    phpCAS::logoutWithRedirectService("http://pny-vm-emt.ptny.site.univ-lorraine.fr/chooselogin?erreur=Vous+n'+êtes+pas+autorisé+à+utiliser+cette+application");

}
?>