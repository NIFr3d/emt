<?php
include("BDD.php");
$uid=stripslashes($_POST["uid"]);
$acces=stripslashes($_POST["acces"]);
$db->adduserul($uid,$acces);
if ($db->userExistul($userid)){
    header("location: ../userul?message=$userid+ajouté");
} else {
    header("location: ../userul?message=Un+problème+est+survenu"); //on informe qu'il y a eu un problème
}
?>