<?php
include("BDD.php");
$fileName = "course.xlsx"; 
$listeruns=$db->getRunHistory();
$choix=$_POST["choix"];
$choixstr=$listeruns[$choix][0];
$runinfos=$db->getRunInfos($choixstr);
$data=array();
for($i=0;$i<count($runinfos);$i++){
    $temps=$runinfos[$i][0];
    $vitesse=$runinfos[$i][1];
    $intensite=$runinfos[$i][2];
    $tension=$runinfos[$i][3];
    $energie=$runinfos[$i][4];
    $latitude=$runinfos[$i][5];
    $longitude=$runinfos[$i][6];
    array_push($data,array($temps,$vitesse,$intensite,$tension,$energie,$latitude,$longitude));
}
function filterData(&$str){ 
    $str = preg_replace("/\t/", "\\t", $str); 
    $str = preg_replace("/\r?\n/", "\\n", $str); 
    if(strstr($str, '"')) $str = '"' . str_replace('"', '""', $str) . '"'; 
}
foreach($data as $row) { 
    array_walk($row, 'filterData'); 
    echo implode("\t", array_values($row)) . "\n"; 
} 
 
header("Content-Disposition: attachment; filename=\"$fileName\""); 
header("Content-Type: application/vnd.ms-excel"); 

//exit;
?>