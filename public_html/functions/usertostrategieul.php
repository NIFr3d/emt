<?php
include("BDD.php");
$userid = $_POST["userid"];
$db->stratUserul($userid);
if ($db->isStratul($userid)){
    header("location: ../userul?message=$userid+est+devenu+stratégie");
} else {
    header("location: ../userul?message=Un+problème+est+survenu"); //on informe qu'il y a eu un problème
}
?>