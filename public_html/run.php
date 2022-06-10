<html lang="fr">
  <!-- Cette page affiche le détail d'un run. -->
  <head> 
    <title>
      EMT 2021-2022
    </title>
	<meta charset="UTF-8">
	<link rel="stylesheet" href="../styles/main.css"></link> 
	<link rel="shortcut icon" href="../favicon.ico" type="image/x-icon"/>
  </head>
  <body>
    <?php
    include("functions/BDD.php");
    $listeruns=$db->getRunHistory();
    $choix=$_GET["choix"]; // On récupère le numéro du run à afficher depuis l'url.
    $choixstr=$listeruns[$choix][0];
    $runinfos=$db->getRunInfos($choixstr);
    session_start();
    if(!isset($_SESSION["acces"])) header("location: chooselogin");
    else {
      $token=$_SESSION["token"];
      echo("<script> sessionStorage.setItem(\"token\",'$token' );</script>");
    }
    if($_SESSION['acces']==1 || $_SESSION['acces']==2){
      echo("<div id='tablTab'><form method='post' action='functions/download'><input type='hidden' name='choix' value='$choix'/><button class='boutonConfirm' type='submit'>Télécharger en Excel</button></form></div>");
    }
    echo("<TABLE BORDER='1' cellspacing='0'> 
        <TR><TH>Temps (s)</TH><TH>Vitesse (km/h)</TH><TH>Vitesse moyenne (km/h)</TH><TH>Intensité (A)</TH><TH>Tension (V)</TH><TH>Energie (J)</TH><TH>Latitude (DD)</TH><TH>Longitude (DD)</TH><TH>Aller à</TH><TH>Altitude (DD)</TH><TH>Distance (m)</TH><TH>Tour</TH></TR>\n");
    for($i=0;$i<count($runinfos);$i++){
        $temps=$runinfos[$i][0];
        $vitesse=$runinfos[$i][1];
        $avgspeed=$runinfos[$i][2];
        $intensite=$runinfos[$i][3];
        $tension=$runinfos[$i][4];
        $energie=$runinfos[$i][5];
        $latitude=$runinfos[$i][6];
        $longitude=$runinfos[$i][7];
        $altitude=$runinfos[$i][8];
        $tour=$runinfos[$i][9];
        $distance=$runinfos[$i][10];
        array_push($data,array($temps,$vitesse,$avgspeed,$intensite,$tension,$energie,$latitude,$longitude,$altitude,$tour));
        echo("<TR>
        <TD>$temps</TD>
        <TD>$vitesse</TD>
        <TD>$avgspeed</TD>
        <TD>$intensite</TD>
        <TD>$tension</TD>
        <TD>$energie</TD>
        <TD><div>$latitude</div></TD>
        <TD><div>$longitude</div></TD>
        <TD><form method='get' action='index'><div id='aligniconegps'><button id='coordonnées'><input type='hidden' name='latitude' value=$latitude /><input type='hidden' name='longitude' value=$longitude /><img id='iconegps' src='styles/images/iconegps.png' /></button></div></form></TD>
        <TD>$altitude</TD>
        <TD>$distance</TD>
        <TD>$tour</TD>
        </TR>");
    }
    echo("</TABLE>");
    ?>
</body>

</html>