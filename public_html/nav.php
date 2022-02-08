<html lang="fr">
  <head> 
    <title>
      EMT 2021-2022
    </title>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../styles/main.css"></link> 
  </head>
  <body>
    <nav>
    <ul>
    <?php
      session_start();
      if($_SESSION["acces"]==1){
        echo('<li><a class="navadmin" href="index"><img id="accueil" src="../styles/images/accueil.png" alt="accueil"/> Accueil</a></li>');
        echo("<li><a class='navadmin' href='historique'>Historique des courses</a></li>
        <li><a class='navadmin' href='adduser'>Ajout d'utilisateur</a></li>
        <li><a class='navadmin' href='userlist'>Gestion d'utilisateur</a></li>
        <li><a class='navadmin' href='profil'><img id='profil' src='../styles/images/profil.png' alt='profil'/> Profil</a></li>");
        echo('<li><a class="navadmin" href="functions/logout"><img id="deconnexion" src="../styles/images/deconnexion.png" alt="deconnexion"/></a></li>');
      }
      else{
        echo('<li><a class="navuser" href="index"><img id="accueil" src="../styles/images/accueil.png" alt="accueil"/> Accueil</a></li>');
        echo("<li><a class='navuser' href='historique'>Historique des courses</a></li>");
        echo('<li><a class="navuser" href="profil"><img id="profil" src="../styles/images/profil.png" alt="profil"/> Profil</a></li>');
        echo('<li><a class="navuser" href="functions/logout"><img id="deconnexion" src="../styles/images/deconnexion.png" alt="deconnexion"/></a></li>');
      }
      ?>
      
    </ul>
    </nav>
</body>
</html>