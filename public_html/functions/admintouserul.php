<?php
include("BDD.php");
$userid = $_POST["userid"];
$db->unadminUserul($userid);
if (!$db->isAdminul($userid)){
    header("location: ../userul?message=$userid+est+devenu+utilisateur");
} else {
    header("location: ../userul?message=Un+problème+est+survenu"); //on informe qu'il y a eu un problème
}
?>