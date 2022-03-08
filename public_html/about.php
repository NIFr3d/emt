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
</head>
<?php
    session_start();
    if(!isset($_SESSION["acces"])) header("location: login");
?>
<body>
    <div class="corps">
        <table border='1' cellspacing='0'>
        <tr>
            <th>Application Web</th>
            <th>Projet Joulemètre</th>
            <th>Tableau de bord</th>
            <th>Essais et stratégie</th>
        </tr>
        <tr>
            <td>Lucas Printz</td>
            <td>Bryce Mathieu</td>
            <td>Arthur Hurdebourg</td>
            <td>Estelle Baby</td>   
        </tr>
        <tr>
            <td>Frédéric Wagner</td>
            <td>Nabil Benmira</td>
            <td>Christianna Anna</td>
            <td>Lucie Jeannin</td>
        </tr>
        </table>
    </div>
</body>
<footer>
    <script src="../scripts/nbuser.js"></script>
</footer>
</html>