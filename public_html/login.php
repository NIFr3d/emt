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
					<h1>Bienvenue sur le site de suivi de l'EMT</h1> <h3 style="padding-top:50px;padding-bottom:10px;margin-left:-15px;">Veuillez vous identifier</h3>
					<div class="field">
						<label for="login">Identifiant :</label><br/>
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
		<a href="forgottenpassword" style="display:none;">Mot de passe oublié</a>
		<h2>Si vous n'avez pas de compte, vous pouvez demander à en créer un ci-dessous :</h2>
		<form method="post" action="register"><button type="submit" class="bouton">S'enregistrer</button></form>
		<div class="field">
			<button onclick="location.href='chooselogin'" class="bouton" name="retourarr">Retour en arrière</button>
		</div>
		<?php
		include("functions/BDD.php");
		$nbEnregistres=$db->getNbUser();
		echo("<h3>Nombre d'utilisateurs enregistrés : $nbEnregistres</h3>");
		?>
	</div>
  </body>
  </html>