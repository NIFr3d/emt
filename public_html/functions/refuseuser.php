<?php
include("BDD.php");
$userid=$_POST["userid"];
$db->refuseUser($userid);
header("location: ../userext");
?>