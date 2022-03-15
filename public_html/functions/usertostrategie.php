<?php
include("BDD.php");
$userid = $_POST["userid"];
$db->stratUser($userid);
if ($db->isStrat($userid)){
    header("location: ../userext?message=$userid+est+devenu+stratégie");
} else {
    header("location: ../userext?message=Un+problème+est+survenu"); //on informe qu'il y a eu un problème
}
?>