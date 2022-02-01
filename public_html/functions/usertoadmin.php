<?php
include("BDD.php");
$userid = $_POST["userid"];
$db->adminUser($userid);
if ($db->isAdmin($userid)){
    header("location: ../userlist?message=$userid+est+devenu+administrateur");
} else {
    header("location: ../userlist?message=Un+problème+est+survenu"); //on informe qu'il y a eu un problème
}
?>