<?php
include("functions/BDD.php");
$listeruns=$db->getRunHistory();
$choix=$_GET["choix"];
$choixstr=$listeruns[$choix][0];
$runinfos=$db->getRunInfos($choixstr);
echo("<br /><br /><br /><TABLE BORDER='1' cellspacing='0'> 
      <TR><TH>Temps (s)</TH><TH>Vitesse (km/h)</TH><TH>Consommation (???)</TH><TH>Latitude (DD)</TH><TH>Longitude (DD)</TH></TR>\n");
  for($i=0;$i<count($runinfos);$i++){
      $temps=$runinfos[$i][0];
      $vitesse=$runinfos[$i][1];
      $consommation=$runinfos[$i][2];
      $latitude=$runinfos[$i][3];
      $longitude=$runinfos[$i][4];
      echo("<TR><TD>$temps</TD><TD>$vitesse</TD><TD>$consommation</TD><TD>$latitude</TD><TD>$longitude</TD></TR>\n");
  }
  echo("</TABLE>\n");	
?>