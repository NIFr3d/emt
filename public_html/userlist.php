<html>
<head>
  <title>
    EMT 2021-2022
  </title>
  <meta charset="UTF-8">
  <link rel="stylesheet" href="../styles/main.css">
  <link rel="shortcut icon" href="../favicon.ico" type="image/x-icon"/>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
  <div id="navbar"></div>
  <script type="text/javascript">
    $("#navbar").load("nav");
  </script>
</head>
<body>
  <div class="corps userlist">
  <?php
  session_start();
  if(!isset($_SESSION["acces"])) header("location: chooselogin");
  else if($_SESSION["acces"]!=1) header("location: index");
  include("functions/BDD.php");

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
  if(isset($_GET["message"])) echo($_GET["message"]);
  ?>
</div>
</body>
<footer>
    <script src="../scripts/nbuser.js"></script>
</footer>
</html>

			

