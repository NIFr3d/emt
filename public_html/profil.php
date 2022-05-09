<html lang="fr">
    <!-- Ceci est la page de profil utilisateur. Elle n'est affichée que pour les utilisateurs extérieurs et sert à changer de mot de passe. -->
<head>
    <title>
        EMT 2021-2022
    </title>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../styles/main.css">
    <link rel="shortcut icon" href="../favicon.ico" type="image/x-icon"/>
    <?php include("nav.php"); ?>
</head>

<body>
    <div class="corps">
    <?php
    session_start();
    if(!isset($_SESSION["acces"])) header("location: chooselogin");
    else {
        $token=$_SESSION["token"];
        echo("<script> sessionStorage.setItem(\"token\",'$token' );</script>");
    }
    ?>
        <div>
            Nom : <?php echo($_SESSION["nom"]); ?> <br>
            Prénom : <?php echo($_SESSION["prenom"]); ?> <br>
        </div>
        <button class="boutonConfirm dispmdp" type="button" onclick="mdp()">Changer de mot de passe</button>
        <div id="mdp" style="visibility:hidden">
            <form action="functions/changepassword" method="post">
                <input type="hidden" name="userid" value=<?php echo($_SESSION["userid"]); ?>>
                <label for="mdp">Nouveau mot de passe</label> <br>
                <input type="password" name="mdp"> <br>
                <label for="mdp">Confirmez votre mot de passe</label> <br>
                <input type="password" name="mdpconfirm"> <br>
                <button class="boutonConfirm" type="submit">Confirmer</button>
            </form>
        </div>
    <?php if(isset($_GET["e"])) echo($_GET["e"]); ?>
    </div>
</body>
<footer>
    <script src="../scripts/nbuser.js"></script>
    <script>
   function mdp(){
    var x = document.getElementById('mdp');
    if (x.style.visibility === 'hidden') {
        x.style.visibility = 'visible';
    } else {
        x.style.visibility = 'hidden';
    }
}
</script>
</footer>
</html>
