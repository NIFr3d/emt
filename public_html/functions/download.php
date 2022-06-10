<?php
// Téléchargement d'un fichier excel contenant les données d'une course
include("BDD.php");
require('../../vendor/autoload.php');

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

session_start();
if(!isset($_SESSION["acces"])) header("location: ../login");
else if($_SESSION["acces"]==0) header("location: ../index");

$spreadsheet = new Spreadsheet();
$s = $spreadsheet->getActiveSheet();

$listeruns=$db->getRunHistory();
$choix=$_POST["choix"];
$choixstr=$listeruns[$choix][0];
$runinfos=$db->getRunInfos($choixstr);
$s->setCellValueByColumnAndRow(1, 1, "temps");
$s->setCellValueByColumnAndRow(2, 1, "vitesse");
$s->setCellValueByColumnAndRow(3, 1, "vitesse moyenne");
$s->setCellValueByColumnAndRow(4, 1, "intensité");
$s->setCellValueByColumnAndRow(5, 1, "tension");
$s->setCellValueByColumnAndRow(6, 1, "énergie");
$s->setCellValueByColumnAndRow(7, 1, "latitude");
$s->setCellValueByColumnAndRow(8, 1, "longitude");
$s->setCellValueByColumnAndRow(9, 1, "altitude");
$s->setCellValueByColumnAndRow(10, 1, "distance");
$s->setCellValueByColumnAndRow(11, 1, "tour");
for($i=1;$i<count($runinfos)+1;$i++){
    $s->setCellValueByColumnAndRow(1, $i+1, $runinfos[$i-1][0]);
    $s->setCellValueByColumnAndRow(2, $i+1, $runinfos[$i-1][1]);
    $s->setCellValueByColumnAndRow(3, $i+1, $runinfos[$i-1][2]);
    $s->setCellValueByColumnAndRow(4, $i+1, $runinfos[$i-1][3]);
    $s->setCellValueByColumnAndRow(5, $i+1, $runinfos[$i-1][4]);
    $s->setCellValueByColumnAndRow(6, $i+1, $runinfos[$i-1][5]);
    $s->setCellValueByColumnAndRow(7, $i+1, $runinfos[$i-1][6]);
    $s->setCellValueByColumnAndRow(8, $i+1, $runinfos[$i-1][7]);
    $s->setCellValueByColumnAndRow(9, $i+1, $runinfos[$i-1][8]);
    $s->setCellValueByColumnAndRow(10, $i+1, $runinfos[$i-1][10]);
    $s->setCellValueByColumnAndRow(11, $i+1, $runinfos[$i-1][9]);
}

$writer = new Xlsx($spreadsheet);
header('Content-Disposition: attachment;filename="course'.$choixstr.'.xlsx"');
$writer->save('php://output');
?>