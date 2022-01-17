<html lang="fr">
  <head> 
    <title>
      EMT 2021-2022
    </title>
	<meta charset="UTF-8">
	<link rel="stylesheet" href="../styles/main.css"></link> 
  </head>
  <body>
	<div class="corps">
	<form method="post" action="../php/login.php">
				<h1>S'identifier</h1>
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
	<form method="post" action="../pages/register.php"><button type="submit" class="bouton">S'enregistrer</button></form>
	</div>
  </body>
  </html>