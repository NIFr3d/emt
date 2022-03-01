<html lang="fr">

<head>
    <title>
        EMT 2021-2022
    </title>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../styles/main.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <link rel="shortcut icon" href="../favicon.ico" type="image/x-icon"/>
    <div id="navbar"></div>
    <script type="text/javascript">
        $("#navbar").load("nav");
    </script>
    <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js" integrity="sha512-XQoYMqMTK8LvdxXYG3nZ448hOEQiglfqkJs1NOQV44cWnUrBc8PkAOcXy20w0vlaXaVUearIOBhiXZ5V3ynxwA==" crossorigin=""></script>

</head>

<body>
    <div class="corps">
    <?php
    session_start();
    if(!isset($_SESSION["acces"])) header("location: login");
    ?>
        <div>
            Nom : <?php echo($_SESSION["nom"]); ?> <br>
            Prénom : <?php echo($_SESSION["prenom"]); ?> <br>
        </div>
        <button type="button" onclick="mdp()">Changer de mot de passe</button>
        <div id="mdp" style="visibility:hidden">
            <form action="functions/changepassword" method="post">
                <input type="hidden" name="userid" value=<?php echo($_SESSION["userid"]); ?>>
                <label for="mdp">Nouveau mot de passe</label> <br>
                <input type="text" name="mdp"> <br>
                <label for="mdp">Confirmez votre mot de passe</label> <br>
                <input type="text" name="mdpconfirm"> <br>
                <button type="submit">Confirmer</button>
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
