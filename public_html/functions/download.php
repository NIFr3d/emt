<?php
include("BDD.php");
require('../../vendor/autoload.php');

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

$spreadsheet = new Spreadsheet();
$s = $spreadsheet->getActiveSheet();

$listeruns=$db->getRunHistory();
$choix=$_POST["choix"];
$choixstr=$listeruns[$choix][0];
$runinfos=$db->getRunInfos($choixstr);
for($i=0;$i<count($runinfos);$i++){
    $s->setCellValueByColumnAndRow(0, $i, $runinfos[$i][0]);
    $s->setCellValueByColumnAndRow(1, $i, $runinfos[$i][1]);
    $s->setCellValueByColumnAndRow(2, $i, $runinfos[$i][2]);
    $s->setCellValueByColumnAndRow(3, $i, $runinfos[$i][3]);
    $s->setCellValueByColumnAndRow(4, $i, $runinfos[$i][4]);
    $s->setCellValueByColumnAndRow(5, $i, $runinfos[$i][5]);
    $s->setCellValueByColumnAndRow(6, $i, $runinfos[$i][6]);
    
}

$writer = new Xlsx($spreadsheet);
header('Content-Disposition: attachment;filename="course'.$choixstr.'.xlsx"');
$writer->save('php://output');
?>