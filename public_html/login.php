<html lang="fr">
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
	<form method="post" action="functions/login">
				<h1>Bienvenue sur le site de suivi de l'EMT</h1><br> <h3>Veuillez vous identifier</h3>
				<div class="field">
					<label for="login">Identifiant :</label> <br/>
					<input type="text" id="login" class="champuser" name="login" placeholder="Identifiant" />
				</div>
				<div class="field">
					<label for="mdp">Mot de passe :</label><br/>
					<input type="password" id="mdp" class="champuser" name="mdp" placeholder="Mot de passe" />
				</div>
				<div class="field">
					<button type="submit" id="loginbutton" class="bouton" name="loginbutton">S'identifier</button>
				</div>
                <?php
				if(isset($_GET["erreur"])) echo($_GET["erreur"]);
				?>
	</form>
	<h2>Si vous n'avez pas de compte, vous pouvez demander à en créer un ci-dessous :</h2>
	<form method="post" action="register"><button type="submit" class="bouton">S'enregistrer</button></form>
	</div>
  </body>
  </html>