<?php
include("functions/BDD.php");
$listeruns=$db->getRunHistory();
$choix=$_GET["choix"];
$choixstr=$listeruns[$choix][0];
$runinfos=$db->getRunInfos($choixstr);
echo("<br /><br /><br /><TABLE BORDER='1' cellspacing='0'> 
      <TR><TH>Temps</TH><TH>Vitesse</TH><TH>Consommation</TH><TH>Latitude</TH><TH>Longitude</TH></TR>\n");
  for($i=0;$i<count($runinfos);$i++){
      $temps=$liste[$i][0];
      $vitesse=$liste[$i][1];
      $consommation=$liste[$i][2];
      $latitude=$liste[$i][3];
      $longitude=$liste[$i][4];
      echo("<TR><TD>$temps</TD><TD>$vitesse</TD><TD>$consommation</TD><TD>$latitude</TD>$longitude<TD></TD></TR>\n");
  }
  echo("</TABLE>\n");	
?>