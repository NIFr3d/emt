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
    if(!isset($_SESSION["acces"])) header("location: chooselogin");
    else {
        $acces=$_SESSION["acces"];
        echo("<script> sessionStorage.setItem(\"acces\",$acces );</script>");
    }
    ?>
    <div id="data" class="content">
        <p id='bjr'>Bonjour 
        <?php
        echo($_SESSION["prenom"])
        ?>
        </p> <p id='txtaccueil'>voici les données de la voiture</p>
        <table id='données' border='0' cellspacing='2'>
        <tr id='intitulés'>
        <th>Temps</th> 
        <th>Vitesse</th> 
        <th>Intensité</th>
        <th>Tension</th>
        <th>Energie</th>
        </tr>
        <tr>
        <th><span id="temps"></span></th>
        <th><span id="vitesse"></span></th>
        <th><span id="intensite"></span></th>
        <th><span id="tension"></span></th>
        <th><span id="energie"></span></th>
        </tr>
        </table>
        <?php
        if($acces==1 || $acces==2) {
            echo("<button type=\"button\" class=\"bouton\" id=\"executerstrat\">Exécuter script</button>");
            echo("<button type=\"button\" class=\"bouton\" id=\"cleartracer\">Nouveau tracé</button>");
            echo("<button type=\"button\" class=\"bouton\" id=\"envoitracer\">Envoyer le tracé</button>");
        }
        ?>
        <div class="carte">
            <div id="map"></div>
                <canvas id="canevas" width=800  height=600></canvas>
            </div>
        </div>
    </div>
</body>
<footer>
    <script src="../scripts/data.js"></script>
</footer>

</html>
