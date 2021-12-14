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
      <form method="post" action="../pages/data.html" class="nav"><button type="submit" class="bouton">Accueil</button></form>
      <?php
      session_start();
      if($_SESSION["acces"]==1){
        echo("<form method=\"post\" action=\"../pages/adduser.html\" class=\"nav\"><button type=\"submit\" class=\"bouton\">Ajout d'utilisateur</button></form>
        <form method=\"post\" action=\"../php/userlist.php\" class=\"nav\"><button type=\"submit\" class=\"bouton\">Suppression d'utilisateur</button></form>");
      }
      ?>
      <form method="post" action="../php/logout.php" class="nav"><button type="submit" class="bouton">Deconnexion</button></form>
    </div>
</body>
</html>