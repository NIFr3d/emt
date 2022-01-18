<html lang="fr">

<head>
    <title>
        EMT 2021-2022
    </title>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../styles/main.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <div id="navbar"></div>
    <script type="text/javascript">
        $("#navbar").load("nav.php");
    </script>
</head>
<body>
    <select name="choixrun">
        <option value="">--Choisissez un run--</option>
    <?php
    include("functions/BDD.php");
    $listeruns=$db->getRunHistory();
    for($i=0;$i<count($listeruns);$i++){
        $run=$listeruns[$i][0];
        echo("<option value=$i>$run</option>");
    }
    ?>
</select>
<button onclick="afficherRun()">Afficher</button>
<div id="run"></div>
</body>
<footer>
<script type="text/javascript">
    function afficherRun(){
    var liste=document.getElementById("choixrun");
    var choix=liste.value;
    $("#run").load("run.php/choix="+choix);
    }

</script>
</footer>
</html>