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
  <div class="corps">
<?php
session_start();
if(!isset($_SESSION["acces"])) header("location: login.php");
include("../php/BDD.php");

$liste=$db->getPendingUsers();
echo("<br /><br /><TABLE border='1' cellspacing='0'> 
    <TR><TH>Prenom</TH><TH>Nom</TH><TH>Identifiant</TH><TH>Ajouter</TH><TH>Supprimer</TH></TR>\n");
for($i=0;$i<count($liste);$i++){
    $nom=$liste[$i][0];
    $prenom=$liste[$i][1];
    $userid=$liste[$i][2];
    echo("<TR><TD>$prenom</TD><TD>$nom</TD><TD>$userid</TD>
    <TD><form method='post' action='../php/authorize.php'><div id='butTab'><button class='boutonTab' type='submit'>Ajouter</button></div>
    <input type='hidden' name='userid' value='$userid' /></form></TD>
    <TD><form method='post' action='../php/refuseuser.php'><div id='butTab'><button class='boutonTab' type='submit'>Supprimer</button></div>
    <input type='hidden' name='userid' value='$userid' /></form></TD></TR>\n");
}
echo("</TABLE>\n");
?>
        <?php
				if(isset($_GET["erreur"])) echo($_GET["erreur"]);
				?>
  </div>
</body>
</html>