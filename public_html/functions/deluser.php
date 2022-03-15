<?php
include("BDD.php");
$userid = $_POST["userid"];
$db->delUser($userid);
if (!$db->userExist($userid)){
    header("location: ../userext?message=Utilisateur+supprimé+avec+succes"); //si l'utilisateur n'existe plus on informe de la suppression avec succes
} else {
    header("location: ../userext?message=Un+problème+est+survenu"); //sinon on informe qu'il y a eu un problème
}
?>