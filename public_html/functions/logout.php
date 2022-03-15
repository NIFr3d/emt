<?php
require('../../vendor/autoload.php');
use phpCAS;
setcookie("token", null,-1,'/');
session_start();
session_destroy();
phpCAS::client(CAS_VERSION_2_0,'auth.univ-lorraine.fr',443,'');
phpCAS::logoutWithRedirectService("http://emt.polytech-nancy.univ-lorraine.fr/chooselogin?erreur=dc");
?>