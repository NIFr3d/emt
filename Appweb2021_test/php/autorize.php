<?php
include("BDD.php");
$userid=$_POST["userid"];
$db->autorizeUser($userid);
header("location: ../pages/adduser.php");
?>