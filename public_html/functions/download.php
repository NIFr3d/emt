<?php
include("BDD.php");
require '../../vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

$spreadsheet = new Spreadsheet();
$s = $spreadsheet->getActiveSheet();

$listeruns=$db->getRunHistory();
$choix=$_POST["choix"];
$choixstr=$listeruns[$choix][0];
$runinfos=$db->getRunInfos($choixstr);
for($i=0;$i<count($runinfos);$i++){
    $s->setCellValueByColumnAndRow($i, 0,$runinfos[$i][0]);
    $s->setCellValueByColumnAndRow($i, 1,$runinfos[$i][1]);
    $s->setCellValueByColumnAndRow($i, 2,$runinfos[$i][2]);
    $s->setCellValueByColumnAndRow($i, 3,$runinfos[$i][3]);
    $s->setCellValueByColumnAndRow($i, 4,$runinfos[$i][4]);
    $s->setCellValueByColumnAndRow($i, 5,$runinfos[$i][5]);
    $s->setCellValueByColumnAndRow($i, 6,$runinfos[$i][6]);
    
}
$writer = new Xlsx($spreadsheet);f
$writer->save('course.xlsx');

?>