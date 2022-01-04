<html lang="fr">

<head>
    <title>
        EMT 2021-2022
    </title>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../styles/main.css">
    <link href='https://api.mapbox.com/mapbox-gl-js/v2.6.0/mapbox-gl.css' rel='stylesheet' />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <div id="navbar"></div>
    <script type="text/javascript">
        $("#navbar").load("../pages/nav.php");
    </script>
    <script src="https://api.mapbox.com/mapbox-gl-js/v2.6.0/mapbox-gl.js"></script>

</head>

<body>
    <?php
    session_start();
    if(!isset($_SESSION["acces"])) header("location: login.php");
    ?>
    <div id="data" class="content">
        Bonjour <span id="prenom"></span>, voici les données de la voiture : <br />
        Temps : <span id="temps"></span> <br />
        Vitesse : <span id="vitesse"></span> <br />
        Conso : <span id="conso"></span> <br />

        <button type="button" class="bouton" id="envoitracer">Envoyer le tracé</button>
        <div class="carte">
            <div id="map"></div>
            <canvas id="canevas" width=800  height=500></canvas>
        </div>
    </div>

</body>
<footer>
    <script src="../scripts/data.js"></script>
</footer>

</html>