<?php
include("BDD.php");
// Enlève les guillemets
$userid=stripslashes($_POST["userid"]);
$mdp=stripslashes($_POST["mdp"]);
$mdpconfirm=stripslashes($_POST["mdpconfirm"]);

if($mdp==$mdpconfirm){
    $db->changemdp(password_hash($mdp,PASSWORD_DEFAULT),$userid);
    header("Location: /profil?e=Mot+de+passe+changé");
}else{
    header("Location: /profil?e=Entrez+2+fois+le+même+mot+de+passe");
}

?>