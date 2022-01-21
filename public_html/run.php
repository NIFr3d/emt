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
      <form method='get' action='functions/afficherpos'>
      <TD>$latitude</TD>
      <TD>$longitude</TD>
      <TD><div id='aligniconegps'><button id='boutongps'type='submit' name='iconegps'><img id='iconegps' src='styles/images/iconegps.png' /></button></div></TD>
      </form>
      </TR>\n");
  }
  echo("</TABLE>\n");	
?>