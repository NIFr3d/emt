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
    <form action="functions/authUL.php">
        <button type="submit">Connexion UL</button>
    </form>
    <a href="login"><button type="button">Utilisateur extérieur</button></a><br>
    <?php
        if(isset($_GET["erreur"])) echo($_GET["erreur"]);
    ?>
</body>
<footer>
<script src="../scripts/nbuser.js"></script>
</footer>
</html>