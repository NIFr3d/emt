<?php
include("BDD.php");
$userid = $_POST["userid"];
$db->delUser($userid);
if (!$db->userExist($userid)){
    header("location: ../php/userlist.php?message=succes"); //si l'utilisateur n'existe plus on informe de la suppression avec succes
} else {
    header("location: ../php/userlist.php?message=echec"); //sinon on informe qu'il y a eu un problème
}
?>