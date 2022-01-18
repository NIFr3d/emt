<html lang="fr">
  <head> 
    <title>
      EMT 2021-2022
    </title>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../styles/main.css"></link> 
  </head>
  <body>
    <div id="nav" class="content">
    <?php
      session_start();
      if($_SESSION["acces"]==1){
        echo('<form method="post" action="data.php" class="nav"><button type="submit" class="boutonNav"><img id="accueil" src="../styles/images/accueil.png" alt="accueil"/> Accueil</button></form>');
        echo("<form method=\"post\" action=\"historique.php\" class=\"nav\"><button type=\"submit\" class=\"boutonNav\">Historique des runs</button></form>
        <form method=\"post\" action=\"adduser.php\" class=\"nav\"><button type=\"submit\" class=\"boutonNav\">Ajout d'utilisateur</button></form>
        <form method=\"post\" action=\"userlist.php\" class=\"nav\"><button type=\"submit\" class=\"boutonNav\">Suppression d'utilisateur</button></form>");
        echo('<form method="post" action="functions/logout.php" class="nav"><button type="submit" class="boutonNav"><img id="deconnexion" src="../styles/images/deconnexion.png" alt="deconnexion"/></button></form>');
      }
      else{
        echo('<form method="post" action="data.php" class="nav2"><button type="submit" class="boutonNav"><img id="accueil" src="../styles/images/accueil.png" alt="accueil"/> Accueil</button></form>');
        echo("<form method=\"post\" action=\"historique.php\" class=\"nav2\"><button type=\"submit\" class=\"boutonNav\">Historique des runs</button></form>");
        echo('<form method="post" action="functions/logout.php" class="nav2"><button type="submit" class="boutonNav"><img id="deconnexion" src="../styles/images/deconnexion.png" alt="deconnexion"/></button></form>');
      }
      ?>
      
    </div>
</body>
</html>