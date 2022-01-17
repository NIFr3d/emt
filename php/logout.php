<?php
setcookie("token", null,-1,'/');
session_start();
session_destroy();
header("location: ../");
?>