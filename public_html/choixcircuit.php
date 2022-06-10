<html lang="fr">
    <!-- Ceci est la page d'ajout de circuit. Elle permet d'enregistrer un nouveau lieu comme circuit. -->
<head>
    <title>
        EMT 2021-2022
    </title>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../styles/main.css">
    <link rel="shortcut icon" href="../favicon.ico" type="image/x-icon"/>
    <?php include("nav.php"); ?>
    <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js" integrity="sha512-XQoYMqMTK8LvdxXYG3nZ448hOEQiglfqkJs1NOQV44cWnUrBc8PkAOcXy20w0vlaXaVUearIOBhiXZ5V3ynxwA==" crossorigin=""></script>  <!-- On inclut la librairie Leaflet pour la map. -->
</head>

<body>
    <div class="corps">
        Bougez la carte pour choisir le lieu du circuit à ajouter.
    <?php
    session_start();
    if(!isset($_SESSION["acces"])) header("location: chooselogin");
    else if($_SESSION["acces"]==0) header("location: index");
    else{
        include("functions/BDD.php");
        $latloncir=$db->getCurrentCircuit(); // On récupère les coordonnées du circuit en cours.
        $lat=$latloncir[0];
        $lon=$latloncir[1];
        $cir=$latloncir[2];
        $zoom=$latloncir[3];
        $token=$_SESSION["token"]; // On récupère le token de l'utilisateur.
        // On enregistre les informations précédentes dans la session afin d'être accessible depuis le script js.
        echo("<script> sessionStorage.setItem(\"token\",'$token' );</script>");
        echo("<script> sessionStorage.setItem(\"lat\",$lat );</script>");
        echo("<script> sessionStorage.setItem(\"lon\",'$lon' );</script>");
        echo("<script> sessionStorage.setItem(\"cir\",'$cir' );</script>");
        echo("<script> sessionStorage.setItem(\"zoom\",'$zoom' );</script>");
    }
    ?>
        <form id="form" method="post" action="functions/addcircuit">
            <label for="cir">Nom du circuit :</label></br>
            <input id="cir" name="cir" type="text" class="champuser"/></br>
            <button type="button" class="bouton" id="ajoutCircuit">Ajouter</button>
            <div class="carte"> <!-- On crée une carte Leaflet. On la manipule avec le fichier ajoutcircuit.js . -->
                <div id="map"></div>
                <canvas width=800  height=600></canvas>
            </div>
            <input id="lat" name="lat" type="hidden" value=""/>
            <input id="lon" name="lon" type="hidden" value=""/>
            <input id="zoom" name="zoom" type="hidden" value=""/>
        </form>
    </div>
</body>
<footer>
    <script src="../scripts/ajoutcircuit.js"></script>
</footer>
</html>
