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
  if(!isset($_SESSION["acces"])) header("location: login.php");
  include("functions/BDD.php");

  $liste=$db->getUserList();
  echo("<br /><br /><br /><TABLE BORDER='1' cellspacing='0'> 
      <TR><TH>Prenom</TH><TH>Nom</TH><TH>Identifiant</TH><TH>Supprimer</TH></TR>\n");
  for($i=0;$i<count($liste);$i++){
      $nom=$liste[$i][0];
      $prenom=$liste[$i][1];
      $userid=$liste[$i][2];
      echo("<form method='post' action='functions/deluser.php'>
      <TR><TD>$prenom</TD><TD>$nom</TD><TD>$userid</TD>
      <TD><div id='butTab'><button class='boutonTab' type='submit'>Supprimer</button></div></TD></TR>
      <input type='hidden' name='userid' value='$userid' /></form>\n");
  }
  echo("</TABLE>\n");	
  if(isset($_GET["message"])) echo($_GET["message"]);
  ?>
</div>
</body>
</html>

			

