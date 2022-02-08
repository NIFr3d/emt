<?php
include("BDD.php");
$userid=$_POST["userid"];
$db->authorizeUser($userid);
header("location: ../adduser");
?>