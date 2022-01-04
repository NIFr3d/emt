<html lang="fr">
  <head> 
    <title>
      EMT 2021-2022
    </title>
	<meta charset="UTF-8">
	<link rel="stylesheet" href="../styles/main.css"></link> 
  </head>
  <body>
	<form method="post" action="../php/register.php">
				<h1>S'enregistrer</h1>
				<div class="field">
					<label for="login">Identifiant :</label> <br/>
					<input type="text" id="login" class="champuser" name="login" placeholder="Identifiant" />
				</div>
				<div class="field">
					<label for="nom">Nom :</label> <br/>
					<input type="text" id="nom" class="champuser" name="nom" placeholder="Identifiant" />
				</div>
				<div class="field">
					<label for="prenom">Prénom :</label> <br/>
					<input type="text" id="prenom" class="champuser" name="prenom" placeholder="Identifiant" />
				</div>
				<div class="field">
					<label for="mdp">Mot de passe :</label><br/>
					<input type="password" id="mdp" class="champuser" name="mdp" placeholder="Mot de passe" />
				</div>
				<div class="field">
					<button type="submit" id="loginbutton" class="bouton" name="loginbutton">S'enregistrer</button>
				</div>
                <div id="error"></div>
	</form>
  </body>
  <footer>
	<script src="../scripts/login.js"></script>
  </footer>
  </html>