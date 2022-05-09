<html lang="fr">
<!-- Cette page permet d'accéder à l'historique des courses. -->
<head>
    <title>
        EMT 2021-2022
    </title>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../styles/main.css">
    <link rel="shortcut icon" href="../favicon.ico" type="image/x-icon"/>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <?php include("nav.php"); ?>
</head>
<body>
    <?php
    session_start();
    if(!isset($_SESSION["acces"])) header("location: chooselogin"); // Si l'utilisateur n'est pas connecté, il est redirigé vers la page de connexion.
    include("functions/BDD.php");                                   // On inclut la page de connexion à la base de données.
    ?>
    <form method="post" action="functions/removerun.php">
    <select name="choixrun" id="choixrun">
        <option value="">--Choisissez une course--</option>
    <?php
    $listeruns=$db->getRunHistory();
    for($i=0;$i<count($listeruns);$i++){
        $run=$listeruns[$i][0];
        echo("<option value=$i>$run</option>");
    }
    ?>
    </select>
<button class="boutonConfirm" type="button" onclick="afficherRun()">Afficher</button>
<?php
if($_SESSION["acces"]==1){
    echo("<button class=\"boutonConfirm\" type=\"submit\">Supprimer cette course</button>");
}
?>
</form>
<div id="run"></div>
</body>
<footer>
<script type="text/javascript">
    // Cette fonction permet d'afficher le détail d'une course en chargeant la page de détail de course run.php. Elle utilise JQuery.
    function afficherRun(){
        var liste = document.getElementById("choixrun");
        var choix = liste.options[liste.selectedIndex].value;
        $("#run").load("run?choix="+choix);
    }

</script>
<script src="../scripts/nbuser.js"></script>
</footer>
</html>