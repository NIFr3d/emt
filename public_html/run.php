<html lang="fr">
  <head> 
    <title>
      EMT 2021-2022
    </title>
	<meta charset="UTF-8">
	<link rel="stylesheet" href="../styles/main.css"></link> 
	<link rel="shortcut icon" href="../favicon.ico" type="image/x-icon"/>
  </head>
  <body>
	<div class="corps">
    <?php
    include("functions/BDD.php");
    $listeruns=$db->getRunHistory();
    $choix=$_GET["choix"];
    $choixstr=$listeruns[$choix][0];
    $runinfos=$db->getRunInfos($choixstr);
    echo("<br /><br /><br /><TABLE BORDER='1' cellspacing='0'> 
        <TR><TH>Temps (s)</TH><TH>Vitesse (km/h)</TH><TH>Intensité (A)</TH><TH>Tension (V)</TH><TH>Energie (J)</TH><TH>Latitude (DD)</TH><TH>Longitude (DD)</TH><TH>Aller à</TH></TR>\n");
    for($i=0;$i<count($runinfos);$i++){
        $temps=$runinfos[$i][0];
        $vitesse=$runinfos[$i][1];
        $intensite=$runinfos[$i][2];
        $tension=$runinfos[$i][3];
        $energie=$runinfos[$i][4];
        $latitude=$runinfos[$i][5];
        $longitude=$runinfos[$i][6];
        echo("<TR>
        <TD>$temps</TD>
        <TD>$vitesse</TD>
        <TD>$intensite</TD>
        <TD>$tension</TD>
        <TD>$energie</TD>
        <form method='get' action='' id='coord'>
        <TD><div id='latitude'>$latitude</div></TD>
        <TD><div id='longitude'>$longitude</div></TD>
        <TD><div id='aligniconegps'><input type='hidden' name='latitude' value=$latitude /><input type='hidden' name='longitude' value=$longitude /><button id='coordonnées' type='submit' form='coord' formaction='index' name='coordonnées'><img id='iconegps' src='styles/images/iconegps.png' /></button></div></TD>
        </form>
        </TR>");
    }
    echo("</TABLE>");
    ?>
    </div>
</body>

</html>