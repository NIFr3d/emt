<?php
include("BDD.php");
$userid = $_POST["userid"];
$db->adminUserul($userid);
if ($db->isAdminul($userid)){
    header("location: ../userul?message=$userid+est+devenu+administrateur");
} else {
    header("location: ../userul?message=Un+problème+est+survenu"); //on informe qu'il y a eu un problème
}
?>