<html lang="fr">

<head>
    <title>
        EMT 2021-2022
    </title>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../styles/main.css">
    <link rel="shortcut icon" href="../favicon.ico" type="image/x-icon"/>
    <?php include("nav.php"); ?>
</head>
<?php
    session_start();
    if(!isset($_SESSION["acces"])) header("location: chooselogin");
    else {
        $token=$_SESSION["token"];
        echo("<script> sessionStorage.setItem(\"token\",'$token' );</script>");
    }
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
        <div id="compteur">
	        <h3>Nombre d'utilisateurs connectés : <span id="nbUtilisateurs"></span></h3>
        <?php
		include("functions/BDD.php");
		$nbEnregistres=$db->getNbUser();
		echo("<h3>Nombre d'utilisateurs enregistrés : $nbEnregistres</h3>");
		?>
        </div>
        
    </div>
</body>
<footer>
    <script src="../scripts/nbuser.js"></script>
</footer>
</html>