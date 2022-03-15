<?php
include("BDD.php");
$userid = $_POST["userid"];
$db->delUserul($userid);
if (!$db->userExistul($userid)){
    header("location: ../userul?message=Utilisateur+supprimé+avec+succes"); //si l'utilisateur n'existe plus on informe de la suppression avec succes
} else {
    header("location: ../userul?message=Un+problème+est+survenu"); //sinon on informe qu'il y a eu un problème
}
?>