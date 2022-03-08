<html lang="fr">
  <head> 
    <title>
      EMT 2021-2022
    </title>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../styles/main.css "></link>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> 
  </head>
  <body>
    <nav>
    <?php
      session_start();
      if($_SESSION["acces"]==1){
        echo('<div id="topnav" class="bordnav"><a class="nav admin" href="index"><img id="accueil" src="../styles/images/accueil.png" alt="accueil"/> Accueil</a>
        <a class="nav admin" href="historique">Historique des courses</a>
        <a class="nav admin" href="adduser">Ajout d\'utilisateur</a>
        <a class="nav admin" href="userlist">Gestion d\'utilisateur</a>
        <a class="nav admin" href="profil"><img id="profil" src="../styles/images/profil.png" alt="profil"/> Profil</a>
        <a class="nav admin" href="functions/logout"><img id="deconnexion" src="../styles/images/deconnexion.png" alt="deconnexion"/></a>
        <a href="javascript:void(0);" class="icon" onclick="responsive()"><i class="fa fa-bars"></i></a></div>');
      }
      else if($_SESSION["acces"]==0){
        echo('<div id="topnav" class="bordnav"><a class="nav user" href="index"><img id="accueil" src="../styles/images/accueil.png" alt="accueil"/> Accueil</a>
        <a class="nav user" href="historique">Historique des courses</a>
        <a class="nav user" href="profil"><img id="profil" src="../styles/images/profil.png" alt="profil"/> Profil</a>
        <a class="nav user" href="functions/logout"><img id="deconnexion" src="../styles/images/deconnexion.png" alt="deconnexion"/></a>
        <a href="javascript:void(0);" class="icon" onclick="responsive()"><i class="fa fa-bars"></i></a></div>');
      }
      else if($_SESSION["acces"]==2){
        echo('<div id="topnav" class="bordnav"><a class="nav strat" href="index"><img id="accueil" src="../styles/images/accueil.png" alt="accueil"/> Accueil</a>
        <a class="nav strat" href="historique">Historique des courses</a>
        <a class="nav strat" href="profil"><img id="profil" src="../styles/images/profil.png" alt="profil"/> Profil</a>
        <a class="nav strat" href="functions/logout"><img id="deconnexion" src="../styles/images/deconnexion.png" alt="deconnexion"/></a>
        <a href="javascript:void(0);" class="icon" onclick="responsive()"><i class="fa fa-bars"></i></a></div>');
      }
      ?>
    </nav>
  <script>
  function responsive() {
    var x = document.getElementById("topnav");
    if (x.className === "bordnav") {
      x.className += "responsive";
    } else {
      x.className = "bordnav";
    }
  }
  </script>
</body>
</html>