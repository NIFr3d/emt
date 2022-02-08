<?php
include("BDD.php");
$userid=$_POST["userid"];
$mdp=$_POST["mdp"];
$mdpconfirm=$_POST["mdpconfirm"];
if($mdp==$mdpconfirm){
    $db->changemdp(password_hash($mdp,PASSWORD_DEFAULT));
    header("Location: /profil");
}else{
    header("Location: /profil?e=Entrez+2+fois+le+même+mot+de+passe");
}

?>