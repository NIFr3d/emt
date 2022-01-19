<html lang="fr">

<head>
    <title>
        EMT 2021-2022
    </title>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../styles/main.css">
    <link rel="shortcut icon" href="../favicon.ico" type="image/x-icon"/>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <div id="navbar"></div>
    <script type="text/javascript">
        $("#navbar").load("nav.php");
    </script>
</head>
<body>
    <div class="corps">
    <?php
    session_start();
    if(!isset($_SESSION["acces"])) header("location: login");
    include("functions/BDD.php");
    ?>
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
<button class="boutonTab" onclick="afficherRun()">Afficher</button>
<div id="run"></div>
</div>
</body>
<footer>
<script type="text/javascript">
    function afficherRun(){
        var liste = document.getElementById("choixrun");
        var choix = liste.options[liste.selectedIndex].value;
        $("#run").load("run.php?choix="+choix);
    }

</script>
</footer>
</html>