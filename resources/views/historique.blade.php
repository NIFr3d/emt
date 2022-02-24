<?php
use App\Models\data;
$datas=data::groupBy("dataid")->get();
?>
<html lang="fr">

<head>
    <title>
        EMT 2021-2022
    </title>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="css/main.css">
    <link rel="shortcut icon" href="../favicon.ico" type="image/x-icon"/>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    @include("nav")
</head>
<body>
    <div class="corps">
    <form method="post" action="removerun">
    <select name="choixrun" id="choixrun">
        <option value="">--Choisissez une course--</option>
    <?php
    for($i=0;$i<count($datas);$i++){
        $data=$datas[$i];
        echo("<option value=$i>$data->dataid</option>");
    }
    ?>
    </select>
<button class="boutonTab" type="button" onclick="afficherRun()">Afficher</button>

@if(session("acces")==1){
    <button class="boutonTab" type="submit">Supprimer cette course</button>
@endif
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