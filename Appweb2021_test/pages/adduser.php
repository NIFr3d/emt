<html lang="fr">

<head>
  <title>
    EMT 2021-2022
  </title>
  <meta charset="UTF-8">
  <link rel="stylesheet" href="../styles/main.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
  <div id="navbar"></div>
  <script type="text/javascript">
    $("#navbar").load("../pages/nav.php");
  </script>
</head>

<body>
<?php

include("../php/BDD.php");

$liste=$db->getPendingUsers();
echo "<TABLE BORDER=1> 
    <TR><TH>Prenom</TH><TH>Nom</TH><TH>Identifiant</TH><TH>Supprimer</TH></TR>\n";
for($i=0;$i<count($liste);$i++){
    $nom=$liste[$i][0];
    $prenom=$liste[$i][1];
    $userid=$liste[$i][2];
    echo "<TR><TD>$prenom</TD><TD>$nom</TD><TD>$userid</TD>
    <TD><form method='post' action='../php/autorize.php'><button type='submit'>Ajouter</button>
    <input type='hidden' name='userid' value='$userid' /></form></TD></TR>
    <TD><form method='post' action='../php/refuseuser.php'><button type='submit'>Supprimer</button>
    <input type='hidden' name='userid' value='$userid' /></form></TD></TR>\n";
}
echo "</TABLE>\n";
?>
  <div id="msg"></div>
  </div>
</body>
<footer>
  <script src="../scripts/adduser.js"></script>
</footer>

</html>