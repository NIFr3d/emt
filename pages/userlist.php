<html>
<head>
  <title>
    EMT 2021-2022
  </title>
  <meta charset="UTF-8">
  <link rel="stylesheet" href="../styles/main.css">
</head>
</html>
<?php

include("../pages/nav.php");
include("../php/BDD.php");
if(!isset($_SESSION["acces"])) header("location: login.php");

$liste=$db->getUserList();
echo("<br /><br /><br /><TABLE BORDER='1' cellspacing='0'> 
    <TR><TH>Prenom</TH><TH>Nom</TH><TH>Identifiant</TH><TH>Supprimer</TH></TR>\n");
for($i=0;$i<count($liste);$i++){
    $nom=$liste[$i][0];
    $prenom=$liste[$i][1];
    $userid=$liste[$i][2];
    echo("<form method='post' action='../php/deluser.php'>
    <TR><TD>$prenom</TD><TD>$nom</TD><TD>$userid</TD>
    <TD><button type='submit'>Supprimer</button></TD></TR>
    <input type='hidden' name='userid' value='$userid' /></form>\n");
}
echo("</TABLE>\n");	
if(isset($_GET["message"])) echo($_GET["message"]);
?>
			
