<html lang="fr">
  <head> 
    <title>
      EMT 2021-2022
    </title>
	<meta charset="UTF-8">
	<link rel="stylesheet" href="../styles/main.css"></link> 
	<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/cookieconsent@3/build/cookieconsent.min.css" />
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
	<a href="forgottenpassword">Mot de passe oublié</a>
	<h2>Si vous n'avez pas de compte, vous pouvez demander à en créer un ci-dessous :</h2>
	<form method="post" action="register"><button type="submit" class="bouton">S'enregistrer</button></form>
	<div id="compteur">
	<h3>Nombre d'utilisateurs connectés : <span id="nbUtilisateurs"></span></h3>
	<?php
	include("functions/BDD.php");
	$nbEnregistres=$db->getNbUser();
	echo("<h3>Nombre d'utilisateurs enregistrés : $nbEnregistres</h3>");
	?>
	</div>
	</div>
	<script src="https://cdn.jsdelivr.net/npm/cookieconsent@3/build/cookieconsent.min.js" data-cfasync="false"></script>
		<script>
		window.cookieconsent.initialise({
		"palette": {
			"popup": {
			"background": "#edeff5",
			"text": "#838391"
			},
			"button": {
			"background": "#4b81e8"
			}
		},
		"content": {
			"message": "Notre site utilise des cookies pour son bon fonctionnement.",
			"dismiss": "OK !",
			"link": "Plus d'infos",
			"href": "/cookiespolicy"
		}
		});
		</script>
  </body>
  <footer>
    <script src="../scripts/nbuser.js"></script>
</footer>

  </html>