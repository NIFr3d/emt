<?php
use App\Models\data;
$choix=$_GET["choix"];
$courses=data::where("dataid",$choix)->get();
?>
<html lang="fr">
  <head> 
    <title>
      EMT 2021-2022
    </title>
	<meta charset="UTF-8">
	<link rel="stylesheet" href="css/main.css">
	<link rel="shortcut icon" href="favicon.ico" type="image/x-icon"/>
  </head>
  <body>
	<div class="corps">
    @if(session('acces')==1 || session('acces')==2)
      <div id='tablTab'><form method='post' action='CourseToExcel'><input type='hidden' name='choix' value='{{$choix}}'/>@csrf<button class='boutonTab' type='submit'>Télécharger en Excel</button></form></div>
    @endif
    <TABLE BORDER='1' cellspacing='0'> 
        <TR><TH>Temps (s)</TH><TH>Vitesse (km/h)</TH><TH>Intensité (A)</TH><TH>Tension (V)</TH><TH>Energie (J)</TH><TH>Latitude (DD)</TH><TH>Longitude (DD)</TH><TH>Aller à</TH></TR>
    @foreach($courses as $course)
        <TR>
        <TD>{{$course->temps}}</TD>
        <TD>{{$course->vitesse}}</TD>
        <TD>{{$course->intensite}}</TD>
        <TD>{{$course->tension}}</TD>
        <TD>{{$course->energie}}</TD>
        <TD><div>{{$course->lat}}</div></TD>
        <TD><div>{{$course->lon}}</div></TD>
        <TD><form method='get' action='/'><div id='aligniconegps'><button id='coordonnées'><input type='hidden' name='latitude' value={{$course->lat}} /><input type='hidden' name='longitude' value={{$course->lon}} /><img id='iconegps' src='img/iconegps.png' /></button></div></form></TD>
        </TR>
      @endforeach
    </TABLE>
    </div>
</body>

</html>