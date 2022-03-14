<html lang="fr">

<head>
    <title>
        EMT 2021-2022
    </title>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="css/main.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <link rel="shortcut icon" href="favicon.ico" type="image/x-icon"/>
    @include("nav")
    <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js" integrity="sha512-XQoYMqMTK8LvdxXYG3nZ448hOEQiglfqkJs1NOQV44cWnUrBc8PkAOcXy20w0vlaXaVUearIOBhiXZ5V3ynxwA==" crossorigin=""></script>

</head>

<body>
    <div class="corps">
    <?php
    $acces=session("acces");
    echo("<script> sessionStorage.setItem(\"acces\",$acces);</script>");
    ?>
    <div id="data" class="content">
        <p id='bjr'>Bonjour {{session("prenom")}}
        </p> <p id='txtaccueil'>voici les données de la voiture</p><br />
        <table id='données' border='0' cellspacing='2'>
        <tr id='intitulés'>
        <th>Temps</th> 
        <th>Vitesse</th> 
        <th>Intensite</th>
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
        @if($acces==1 || $acces==2)
            <button type="button" class="bouton" id="cleartracer">Nouveau tracé</button>
            <button type="button" class="bouton" id="envoitracer">Envoyer le tracé</button>
        @endif
        <div class="carte">

            <div id="map"></div>
            <canvas id="canevas" width=800  height=600></canvas>
        </div>
    </div>
    </div>
</body>
<footer>
    <script src="js/data.js"></script>
</footer>

</html>
