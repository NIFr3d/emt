<?php
include("BDD.php");
$uid=$_POST["uid"];
$acces=$_POST["acces"];
$db->adduserul($uid,$acces);
if ($db->userExistul($userid)){
    header("location: ../userul?message=$userid+ajouté");
} else {
    header("location: ../userul?message=Un+problème+est+survenu"); //on informe qu'il y a eu un problème
}
?>