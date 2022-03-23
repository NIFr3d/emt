<html lang="fr">

<head>
    <title>
        EMT 2021-2022
    </title>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../styles/main.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <link rel="shortcut icon" href="../favicon.ico" type="image/x-icon"/>
    <?php include("nav.php"); ?>
</head>

<body>
    <div class="corps">
    <?php
    session_start();
    if(!isset($_SESSION["acces"])) header("location: chooselogin");
    else {
        include("functions/BDD.php");
        $latloncir=$db->getCurrentCircuit();
        $lat=$latloncir[0];
        $lon=$latloncir[1];
        $cir=$latloncir[2];
        $acces=$_SESSION["acces"];
        $token=$_SESSION["token"];
        echo("<script> sessionStorage.setItem(\"acces\",$acces );</script>");
        echo("<script> sessionStorage.setItem(\"token\",'$token' );</script>");
        echo("<script> sessionStorage.setItem(\"lat\",$lat );</script>");
        echo("<script> sessionStorage.setItem(\"lon\",'$lon' );</script>");
        echo("<script> sessionStorage.setItem(\"cir\",'$cir' );</script>");
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
            ?>
            <div id="afficheCircuit">
            <a><button class="bouton" type="button" onclick="afficherListe()">Changer le circuit affiché</button></a>
            <a>
                <form action="/functions/changerCircuit" method="post">
                    <select name="choixcircuit" id="choixcircuit">
                    <option value="">--Choisissez un circuit--</option>
                    <?php
                    $listecircuits=$db->getCircuits();
                    foreach($listecircuits as $circuit){
                        $map=$circuit[0];
                        echo("<option value=$map>$map</option>");
                    }
                    ?>
                    </select>
                    <button type="submit" class="boutonTab">Changer</button>
                </form>
            </a>
            </div>
            <?php
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
    <script>
        function afficherListe(){
            var x = document.getElementById("afficheCircuit");
            x.classList.toggle("afficheCircuit");
        }
    </script>
</body>
<footer>
    <script src="../scripts/data.js"></script>
</footer>

</html>
