<html lang="fr">

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
    ?>
    <h2>Ajouter un utilisateur UL :</h2>
    <form method="post" action="functions/adduserul">
      <label for="uid">Adresse mail UL :</label></br>
      <input name="uid" type="text" class="champuser"/></br>
      <label for="uid">Accès :</label></br>
      <select name="acces" class="champuser">
        <option value="0">Standard</option>
        <option value="2">Stratégie</option>
        <option value="1">Administrateur</option>
      </select>
      </br>
      <button class="bouton" type="submit">Ajouter</button>
    </form>
    <?php
    $liste=$db->getUserListUL();
  echo("<TABLE BORDER='1' cellspacing='0'> 
      <TR><TH>Mail UL</TH><TH>Accès</TH><TH>Ajouter administrateur</TH><TH>Rendre utilisateur</TH><TH>Attribuer \"Stratégie\"</TH><TH>Supprimer</TH></TR>");
  for($i=0;$i<count($liste);$i++){
      $userid=$liste[$i][0];

      if($liste[$i][1]==1){ 
        $acces="admin";
      }
      else if(!$liste[$i][1]){
        $acces="utilisateur";
      }
      else if($liste[$i][1]==2){
        $acces="stratégie";
      }
      
      echo("
      <TR><TD>$userid</TD><TD>$acces</TD>
      <TD><form method='post' action='functions/usertoadminul.php'><div id='butTab'><button class='boutonTab' type='submit' ");
      if($liste[$i][1]==1){
        echo("disabled");
      }
      echo(">Admin</button></div>
      <input type='hidden' name='userid' value='$userid' /></form></TD>
      <TD><form method='post' action='functions/admintouserul.php'><div id='butTab'><button class='boutonTab' type='submit' ");
      if($liste[$i][1]==0){
        echo("disabled");
      }
      echo(">Utilisateur</button></div>
      <input type='hidden' name='userid' value='$userid' /></form></TD>
      <TD><form method='post' action='functions/usertostrategieul.php'><div id='butTab'><button class='boutonTab' type='submit' ");
      if($liste[$i][1]==2){
        echo("disabled");
      }
      echo(">Stratégie</button></div>
      <input type='hidden' name='userid' value='$userid' /></form></TD>
      <TD><form method='post' action='functions/deluserul.php'><div id='butTab'><button class='boutonTab' type='submit'>Supprimer</button></div>
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