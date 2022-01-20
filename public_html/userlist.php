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
    $("#navbar").load("nav.php");
  </script>
</head>
<body>
  <div class="corps">
  <?php
  session_start();
  if(!isset($_SESSION["acces"])) header("location: login");
  include("functions/BDD.php");

  $liste=$db->getUserList();
  echo("<br /><br /><br /><TABLE BORDER='1' cellspacing='0'> 
      <TR><TH>Prenom</TH><TH>Nom</TH><TH>Identifiant</TH><TH>Acces</TH><TH>Ajouter administrateur</TH><TH>Retirer administrateur</TH><TH>Supprimer</TH></TR>\n");
  for($i=0;$i<count($liste);$i++){
      $nom=$liste[$i][0];
      $prenom=$liste[$i][1];
      $userid=$liste[$i][2];
      if($liste[$i][3]){ 
        $acces="admin";
      }
      else if(!$liste[$i][3]){
        $acces="utilisateur";
      }
      
      echo("
      <TR><TD>$prenom</TD><TD>$nom</TD><TD>$userid</TD><TD>$acces</TD>
      <TD><form method='post' action='functions/usertoadmin.php'><div id='butTab'><button class='boutonTab' type='submit'>Ajouter</button></div>
      <input type='hidden' name='userid' value='$userid' /></form></TD>
      <TD><form method='post' action='functions/admintouser.php'><div id='butTab'><button class='boutonTab' type='submit'>Retirer</button></div>
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

			

