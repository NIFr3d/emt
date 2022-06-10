<html lang="fr">
  <!-- Ceci est la navigation de l'application. -->
  <head> 
    <title>
      EMT 2021-2022
    </title>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> 
  </head>
  <body>
    <nav>
    <?php
      session_start();
      if($_SESSION["acces"]==1){ // La navigation est différente selon l'accès de l'utilisateur.
        ?>
        <div id="topnav" class="bordnav">
          <div id="navleft">
          <a href="index"><img id="accueil" src="../styles/images/accueil.png" alt="accueil"/> Accueil</a>
          <a href="historique">Historique des courses</a>
          <a href="choixcircuit">Ajouter un circuit</a>
          <a href="userul">Gérer les utilisateurs UL</a>
          <a href="userext">Gérer les utilisateurs extérieurs</a>
          </div>
          <a href="javascript:void(0);" class="icon" onclick="responsive()"><i class="fa fa-bars"></i></a>
          <div id="alignright">
            <div id="navright">
            <?php if(!isset($_SESSION["isul"])){ ?>
            <a href="profil"><img id="profil" src="../styles/images/profil.png" alt="profil"/> Profil</a>
            <?php }?>
            <a href="about">A propos</a>
            <a href="functions/logout"><img id="deconnexion" src="../styles/images/deconnexion.png" alt="deconnexion"/></a>
            </div>
          </div>
        </div>
      <?php
      }
      else if($_SESSION["acces"]==0){
        ?>
        <div id="topnav" class="bordnav">
          <div id="navleft">
          <a href="index"><img id="accueil" src="../styles/images/accueil.png" alt="accueil"/> Accueil</a>
          <a href="historique">Historique des courses</a>
          </div>
          <a href="javascript:void(0);" class="icon" onclick="responsive()"><i class="fa fa-bars"></i></a>
          <div id="alignright">
            <div id="navright">
            <?php if(!isset($_SESSION["isul"])){ ?>
            <a href="profil"><img id="profil" src="../styles/images/profil.png" alt="profil"/> Profil</a>
            <?php }?>
            <a href="about">A propos</a>
            <a href="functions/logout"><img id="deconnexion" src="../styles/images/deconnexion.png" alt="deconnexion"/></a>
            </div>
          </div>
        </div>
        <?php
      }
      else if($_SESSION["acces"]==2){
        ?>
        <div id="topnav" class="bordnav">
          <div id="navleft">
          <a href="index"><img id="accueil" src="../styles/images/accueil.png" alt="accueil"/> Accueil</a>
          <a href="historique">Historique des courses</a>
          <a href="choixcircuit">Ajouter un circuit</a>
          </div>
          <a href="javascript:void(0);" class="icon" onclick="responsive()"><i class="fa fa-bars"></i></a>
          <div id="alignright">
            <div id="navright">
              <?php if(!isset($_SESSION["isul"])){ ?>
            <a href="profil"><img id="profil" src="../styles/images/profil.png" alt="profil"/> Profil</a>
            <?php }?>
            <a href="about">A propos</a>
            <a href="functions/logout"><img id="deconnexion" src="../styles/images/deconnexion.png" alt="deconnexion"/></a>
            </div>
          </div>
        </div>
        <?php
      }
      ?>
    </nav>
  <script>
  function responsive() {
    var x = document.getElementById("topnav");
    x.classList.toggle("responsive");
  }
  </script>
</body>
</html>
