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
	<form method="post" action="functions/register.php">
				<h1>S'enregistrer</h1>
				<div class="field">
					<label for="login">Identifiant :</label> <br/>
					<input type="text" id="login" class="champuser" required name="login" placeholder="Identifiant" />
				</div>
				<div class="field">
					<label for="nom">Nom :</label> <br/>
					<input type="text" id="nom" class="champuser" required name="nom" placeholder="Identifiant" />
				</div>
				<div class="field">
					<label for="prenom">Prénom :</label> <br/>
					<input type="text" id="prenom" class="champuser" required name="prenom" placeholder="Identifiant" />
				</div>
				<div class="field">
					<label for="mdp">Mot de passe :</label><br/>
					<input type="password" id="mdp" class="champuser" required  name="mdp" placeholder="Mot de passe" />
				</div>
				<div class="field">
					<button type="submit" id="loginbutton" class="bouton" name="loginbutton">S'enregistrer</button>
				</div>
                <?php
				if(isset($_GET["msg"])) echo($_GET["msg"]);
				?>
	</form>
	Vous avez déjà un compte ?
	<form method="post" action="login"><button type="submit" class="bouton">Se connecter</button></form>
</div>
  </body>
  </html>