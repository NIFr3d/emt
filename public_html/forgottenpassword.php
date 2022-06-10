<html lang="fr">
  <!-- Cette page servait à récupérer son compte lorsqu'on perdait son mot de passe. Elle est devenue inutilisée lorsque nous sommes passés à la connexion via l'UL. -->
  <head> 
    <title>
      EMT 2021-2022
    </title>
	<meta charset="UTF-8">
	<link rel="stylesheet" href="../styles/main.css"></link> 
	<link rel="shortcut icon" href="../favicon.ico" type="image/x-icon"/>
  </head>
  <body>
    <div class="corps">
      <h3>Veuillez entrer l'adresse mail associée à votre compte, vous recevrez un mot de passe temporaire pour vous connecter.</h3>
      <form method="post" action="functions/mailMDPOublié">
      <div class="field">
          <label for="email">Adresse mail : </label><br />
          <input type="email" id="email" class="champuser" name="email" placeholder="Adresse mail" />
      </div>
      <div class="field">
    <button type="submit" id="loginbutton" class="bouton" name="loginbutton">Valider</button>
    </div>
    </form>
    <?php
      if(isset($_GET["erreur"])) echo($_GET["erreur"]);
    ?>
      </br><a href="login">Retour à la page de connexion</a>
    </div>
  </body>
<footer>
    <script src="../scripts/nbuser.js"></script>
</footer>
</html>

			
