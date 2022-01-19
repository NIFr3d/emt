<?php
include("BDD.php");
$userid = $_POST["userid"];
$db->adminUser($userid);
if ($db->isAdmin($userid)){
    header("location: ../userlist.php?message=$userid+devenu+administrateur");
} else {
    header("location: ../userlist.php?message=Un+problème+est+survenu"); //on informe qu'il y a eu un problème
}
?>