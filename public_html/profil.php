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
    if(!isset($_SESSION["acces"])) header("location: login");
    $db->getInfos($_SESSION["userid"])
    ?>
    <div>
</div>
    
    </div>
</body>
<footer>
    <script src="../scripts/data.js"></script>
</footer>
</html>
<script>
   
</script>