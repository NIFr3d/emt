<html lang="fr">
<!-- Cette page est la page d'accueil lorsqu'on ce connecte. Elle contient les informations de la voiture en temps réel. -->
<head>
    <title>
        EMT 2021-2022
    </title>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../styles/main.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <link rel="shortcut icon" href="../favicon.ico" type="image/x-icon"/>
    <?php include("nav.php"); ?> <!-- On inclut la navbar. -->
    <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js" integrity="sha512-XQoYMqMTK8LvdxXYG3nZ448hOEQiglfqkJs1NOQV44cWnUrBc8PkAOcXy20w0vlaXaVUearIOBhiXZ5V3ynxwA==" crossorigin=""></script>  <!-- On inclut la librairie Leaflet pour la map. -->
</head>

<body>
    <div class="corps">
    <?php
    session_start();
    if(!isset($_SESSION["acces"])) header("location: chooselogin");
    else {
        include("functions/BDD.php");
        $latloncir=$db->getCurrentCircuit(); // On récupère les coordonnées du circuit en cours.
        $lat=$latloncir[0];
        $lon=$latloncir[1];
        $cir=$latloncir[2];
        $acces=$_SESSION["acces"]; // On récupère le niveau d'accès de l'utilisateur.
        $token=$_SESSION["token"]; // On récupère le token de l'utilisateur.
        echo("<script> sessionStorage.setItem(\"acces\",$acces );</script>"); // On enregistre les informations précédentes dans la session afin d'être accessible depuis le script js.
        echo("<script> sessionStorage.setItem(\"token\",'$token' );</script>");
        echo("<script> sessionStorage.setItem(\"lat\",$lat );</script>");
        echo("<script> sessionStorage.setItem(\"lon\",'$lon' );</script>");
        echo("<script> sessionStorage.setItem(\"cir\",'$cir' );</script>");
    }
    ?>
    <div id="data" class="content">
        <p id='bjr'>Bonjour 
        <?php
        echo($_SESSION["prenom"]); 
        ?>
        </p> <p id='txtaccueil'>voici les données de la voiture</p>
        <table id='données' border='0' cellspacing='2'>
        <tr id='intitulés'>
        <th>Temps</th> 
        <th>Vitesse</th>
        <th>Vitesse moyenne</th>
        <th>Intensité</th>
        <th>Tension</th>
        <th>Energie</th>
        <th>Tours</th>
        </tr>
        <tr>
        <th><span id="temps"></span></th>
        <th><span id="vitesse"></span></th>
        <th><span id="avgspeed"></span></th>
        <th><span id="intensite"></span></th>
        <th><span id="tension"></span></th>
        <th><span id="energie"></span></th>
        <th><span id="laps"></span></th>
        </tr>
        </table>
        <?php
        // On affiche certains éléments de la page selon le niveau d'accès de l'utilisateur.
        if($acces==1 || $acces==2) {
            echo("<button type=\"button\" class=\"bouton\" id=\"executerstrat\">Exécuter script</button>"); // Le script est pour le pôle stratégie.
            ?>
            <div id="afficheCircuit">
            <a><button class="bouton" type="button" onclick="afficherListe()">Changer le circuit affiché</button></a>
            <a>
                <form action="/functions/changerCircuit" method="post"> <!-- On crée un formulaire pour changer de circuit. -->
                    <select name="choixcircuit" id="choixcircuit">
                    <option value="">--Choisissez un circuit--</option>
                    <?php
                    $listecircuits=$db->getCircuits(); // On récupère la liste des circuits.
                    foreach($listecircuits as $circuit){
                        $map=$circuit[0];
                        echo("<option value=$map>$map</option>");
                    }
                    ?>
                    </select>
                    <button type="submit" class="boutonConfirm">Changer</button>
                </form>
            </a>
            </div>
            <?php
            echo("<button type=\"button\" class=\"bouton\" id=\"cleartracer\">Nouveau tracé</button>"); 
            echo("<button type=\"button\" class=\"bouton\" id=\"envoitracer\">Envoyer le tracé</button>");
        }
        ?>
        <div class="carte"> <!-- On crée une carte Leaflet. On la manipule avec le fichier data.js . -->
            <div id="map"></div>
                <canvas id="canevas" width=800  height=600></canvas>
            </div>
        </div>
    </div>
    <script>
        function afficherListe(){ // Fonction pour afficher la liste des circuits.
            var x = document.getElementById("afficheCircuit");
            x.classList.toggle("afficheCircuit");
        }
    </script>
</body>
<footer>
    <script src="../scripts/data.js"></script>
</footer>

</html>
