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
</head>
<?php
    session_start();
    if(!isset($_SESSION["acces"])) header("location: login");
?>
<body>
    <div class="corps">
        Application Web :<br>
            Lucas Printz<br>
            Frédéric Wagner<br>
        Projet Joulemètre :<br>
            Bryce Mathieu<br>
            Nabil Benmira<br>
        Tableau de bord :<br>
            Arthur Hurdebourg<br>
            Christianna Anna<br>
        Essais et startégie :<br>
            Estelle Baby<br>
            Lucie Jeannin<br>
    </div>
</body>
<footer>
    <script src="../scripts/nbuser.js"></script>
</footer>
</html>