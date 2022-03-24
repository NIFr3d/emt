<html lang="fr">

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
    <div class="corps">
    <?php
    session_start();
    if(!isset($_SESSION["acces"])) header("location: chooselogin");
    include("functions/BDD.php");
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
</div>
</body>
<footer>
<script type="text/javascript">
    function afficherRun(){
        var liste = document.getElementById("choixrun");
        var choix = liste.options[liste.selectedIndex].value;
        $("#run").load("run?choix="+choix);
    }

</script>
<script src="../scripts/nbuser.js"></script>
</footer>
</html>