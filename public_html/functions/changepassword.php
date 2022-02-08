<?php
include("BDD.php");
$userid=$_POST["userid"];
$mdp=$_POST["mdp"];
$mdpconfirm=$_POST["mdpconfirm"];
if($mdp==$mdpconfirm){
    $db->changemdp(password_hash($mdp,PASSWORD_DEFAULT),$userid);
    header("Location: /profil?e=Mot+de+passe+changé");
}else{
    header("Location: /profil?e=Entrez+2+fois+le+même+mot+de+passe");
}

?>