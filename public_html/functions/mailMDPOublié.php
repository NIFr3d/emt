<?php
include("BDD.php");
$email=$_POST["email"];
$db->temporaryPassword($email);
header("location: ../login?erreur=Un+mail+vous+a+été+envoyé");
?>