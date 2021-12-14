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
include("BDD.php");

$liste=$db->getUserList();
echo "<TABLE BORDER=1> 
    <TR><TH>Prenom</TH><TH>Nom</TH><TH>Identifiant</TH><TH>Supprimer</TH></TR>\n";
for($i=0;$i<count($liste);$i++){
    $nom=$liste[$i][0];
    $prenom=$liste[$i][1];
    $userid=$liste[$i][2];
    echo "<form method='post' action='../php/deluser.php'>
    <TR><TD>$prenom</TD><TD>$nom</TD><TD>$userid</TD>
    <TD><button type='submit'>Supprimer</button></TD></TR>
    <input type='hidden' name='userid' value='$userid' /></form>\n";
}
echo "</TABLE>\n";
?>
<html>
    <div id="error"></div>
<script src="../scripts/userlist.js"></script>
</html>
