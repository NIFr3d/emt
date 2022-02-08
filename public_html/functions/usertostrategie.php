<?php
include("BDD.php");
$userid = $_POST["userid"];
$db->stratUser($userid);
if ($db->isStrat($userid)){
    header("location: ../userlist?message=$userid+est+devenu+stratégie");
} else {
    header("location: ../userlist?message=Un+problème+est+survenu"); //on informe qu'il y a eu un problème
}
?>