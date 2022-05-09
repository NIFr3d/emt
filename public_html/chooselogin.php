<html lang="fr">
    <!-- Page permettant de choisir entre la connexion UL ou la connexion pour un utilisateur extérieur -->
<head> 
    <title>
        EMT 2021-2022
    </title>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../styles/main.css"></link> 
    <link rel="shortcut icon" href="../favicon.ico" type="image/x-icon"/>
</head>
<body>
    <div class="corps2">
    <h1>Bienvenue sur le site de suivi de l'EMT</h1>
        <div id="chooselog">
            <form action="functions/authUL.php">
                <button type="submit" class="bouton">Connexion UL</button>
            </form>
            <a href="login"><button type="button" class="bouton">Utilisateur extérieur</button></a><br>
            <?php
            //On affiche le message d'erreur si la connection a échoué
                if(isset($_GET["erreur"])) {
                    if($_GET["erreur"]=="dc") echo("Vous avez été déconnecté");
                    else if($_GET["erreur"]=="notaut") echo("Vous n'êtes pas autorisé à utiliser cette application");
                }
            ?>
        </div>
    </div>
</body>
<footer>
<script src="../scripts/nbuser.js"></script>
</footer>
</html>