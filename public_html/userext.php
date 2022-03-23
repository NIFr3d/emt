<html lang="fr">

<head>
  <title>
    EMT 2021-2022
  </title>
  <meta charset="UTF-8">
  <link rel="stylesheet" href="../styles/main.css">
  <link rel="shortcut icon" href="../favicon.ico" type="image/x-icon"/>
  <?php include("nav.php"); ?>
</head>

<body>
  <div class="corps">
<?php
session_start();
if(!isset($_SESSION["acces"])) header("location: chooselogin");
else if($_SESSION["acces"]!=1) header("location: index");
else {
  $token=$_SESSION["token"];
  echo("<script> sessionStorage.setItem(\"token\",'$token' );</script>");
}
include("functions/BDD.php");

$liste=$db->getPendingUsers();
echo("<TABLE border='1' cellspacing='0'> 
    <TR class='intit'><TH>Prenom</TH><TH>Nom</TH><TH>Identifiant</TH><TH>Adresse mail</TH><TH>Ajouter</TH><TH>Supprimer</TH></TR>\n");
for($i=0;$i<count($liste);$i++){
    $nom=$liste[$i][0];
    $prenom=$liste[$i][1];
    $userid=$liste[$i][2];
    $email=$liste[$i][3];
    echo("<TR><TD class='valeurs'>$prenom</TD><TD class='valeurs'>$nom</TD><TD class='valeurs'>$userid</TD><TD class='valeurs'>$email</TD>
    <TD class='valeurs'><form method='post' action='functions/authorize.php'><div id='butTab'><button class='boutonTab' type='submit'>Ajouter</button></div>
    <input type='hidden' name='userid' value='$userid' /></form></TD>
    <TD class='valeurs'><form method='post' action='functions/refuseuser.php'><div id='butTab'><button class='boutonTab' type='submit'>Supprimer</button></div>
    <input type='hidden' name='userid' value='$userid' /></form></TD></TR>\n");
}
echo("</TABLE>\n");
?>
</div>
<div class="corps userlist">
<?php

$liste=$db->getUserList();
  echo("<TABLE BORDER='1' cellspacing='0'> 
      <TR><TH>Prénom</TH><TH>Nom</TH><TH>Identifiant</TH><TH>Adresse mail</TH><TH>Accès</TH><TH>Ajouter administrateur</TH><TH>Rendre utilisateur</TH><TH>Attribuer \"Stratégie\"</TH><TH>Supprimer</TH></TR>");
  for($i=0;$i<count($liste);$i++){
      $nom=$liste[$i][0];
      $prenom=$liste[$i][1];
      $userid=$liste[$i][2];
      $email=$liste[$i][4];

      if($liste[$i][3]==1){ 
        $acces="admin";
      }
      else if(!$liste[$i][3]){
        $acces="utilisateur";
      }
      else if($liste[$i][3]==2){
        $acces="stratégie";
      }
      
      echo("
      <TR><TD>$prenom</TD><TD>$nom</TD><TD>$userid</TD><TD>$email</TD><TD>$acces</TD>
      <TD><form method='post' action='functions/usertoadmin.php'><div id='butTab'><button class='boutonTab' type='submit' ");
      if($liste[$i][3]==1){
        echo("disabled");
      }
      echo(">Admin</button></div>
      <input type='hidden' name='userid' value='$userid' /></form></TD>
      <TD><form method='post' action='functions/admintouser.php'><div id='butTab'><button class='boutonTab' type='submit' ");
      if($liste[$i][3]==0){
        echo("disabled");
      }
      echo(">Utilisateur</button></div>
      <input type='hidden' name='userid' value='$userid' /></form></TD>
      <TD><form method='post' action='functions/usertostrategie.php'><div id='butTab'><button class='boutonTab' type='submit' ");
      if($liste[$i][3]==2){
        echo("disabled");
      }
      echo(">Stratégie</button></div>
      <input type='hidden' name='userid' value='$userid' /></form></TD>
      <TD><form method='post' action='functions/deluser.php'><div id='butTab'><button class='boutonTab' type='submit'>Supprimer</button></div>
      <input type='hidden' name='userid' value='$userid' /></form></TD>
      </TR>
      \n");
  }
  echo("</TABLE>\n");	
  if(isset($_GET["erreur"])) echo($_GET["erreur"]);
  ?>
  </div>
</body>
<footer>
    <script src="../scripts/nbuser.js"></script>
</footer>
</html>