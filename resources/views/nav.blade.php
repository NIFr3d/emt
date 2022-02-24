<html lang="fr">
  <head> 
    <title>
      EMT 2021-2022
    </title>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="css/main.css">
  </head>
  <body>
    <nav>
    <ul>
      @if(session("acces")==1)
        <li><a class="navadmin" href="/"><img id="accueil" src="img/accueil.png" alt="accueil"/> Accueil</a></li>
        <li><a class='navadmin' href='Historique'>Historique des courses</a></li>
        <li><a class='navadmin' href='adduser'>Ajout d'utilisateur</a></li>
        <li><a class='navadmin' href='ListeUtilisateurs'>Gestion d'utilisateur</a></li>
        <li><a class="navadmin" href="functions/logout.php"><img id="deconnexion" src="img/deconnexion.png" alt="deconnexion"/></a></li>
      @else
      <li><a class="navuser" href="/"><img id="accueil" src="img/accueil.png" alt="accueil"/> Accueil</a></li>
      <li><a class='navuser' href='Historique'>Historique des courses</a></li>
      <li><a class="navuser" href="functions/logout.php"><img id="deconnexion" src="img/deconnexion.png" alt="deconnexion"/></a></li>
      @endif     
    </ul>
    </nav>
</body>
</html>