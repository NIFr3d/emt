<html lang="fr">
<!-- Page about réalisée sur demande de M. Sarteaux, contient des informations sur les élèves réalisants le projet EMT et certaines fonctionnalités peu utiles -->
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
        <!--<button type="button" class="bouton" id="theme" onclick="changertheme()">Changer de thème</button>-->
        <div id="compteur">
	        <h3>Nombre d'utilisateurs connectés : <span id="nbUtilisateurs"></span></h3>
        <?php
		include("functions/BDD.php");
		$nbEnregistres=$db->getNbUser();
		echo("<h3>Nombre d'utilisateurs enregistrés : $nbEnregistres</h3>");
		?>
        </div>
        
    </div>
    <script>
        // Fonction qui permet de changer de thème (mode nocturne ou jour)
        var r = document.querySelector(':root');
        function changertheme(){
            var rs = getComputedStyle(r);
            if(rs.getPropertyValue('--bgcolor')=="white"){
                r.style.setProperty('--bgcolor', 'black');
                r.style.setProperty('--menucolor', 'steelblue');
                r.style.setProperty('--menucolorhover', 'darkblue');
                r.style.setProperty('--colorblack', 'white');
                r.style.setProperty('--colorwhite', 'black');
            }
            else{
                r.style.setProperty('--bgcolor', 'white');
                r.style.setProperty('--menucolor', '#019cde');
                r.style.setProperty('--menucolorhover', '#007ade');
                r.style.setProperty('--colorblack', 'black');
                r.style.setProperty('--colorwhite', 'white');
            }
        }
    </script>
</body>
<footer>
    <!-- Contient le script de compteur de connexions -->
    <script src="../scripts/nbuser.js"></script>
</footer>
</html>