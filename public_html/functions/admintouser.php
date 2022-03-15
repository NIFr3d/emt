<?php
include("BDD.php");
$userid = $_POST["userid"];
$db->unadminUser($userid);
if (!$db->isAdmin($userid)){
    header("location: ../userext?message=$userid+est+devenu+utilisateur");
} else {
    header("location: ../userext?message=Un+problème+est+survenu"); //on informe qu'il y a eu un problème
}
?>