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
    <h1>Bienvenue sur le site de suivi de l'EMT</h1>
        <div id="chooselog">
            <form action="functions/authUL.php">
                <button type="submit" class="bouton">Connexion UL</button>
            </form>
            <a href="login"><button type="button" class="bouton">Utilisateur extérieur</button></a><br>
            <?php
                if(isset($_GET["erreur"])) echo($_GET["erreur"]);
            ?>
        </div>
    </div>
</body>
<footer>
<script src="../scripts/nbuser.js"></script>
</footer>
</html>