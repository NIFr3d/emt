<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\data;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class DataController extends Controller
{
    function excel(){
        $choix=$_POST["choix"];
        $courses=data::where("dataid",$choix)->get();
        $spreadsheet = new Spreadsheet();
        $s = $spreadsheet->getActiveSheet();
        $i=1;
        foreach($courses as $course){
            $s->setCellValueByColumnAndRow(1, $i, $course->temps);
            $s->setCellValueByColumnAndRow(2, $i, $course->vitesse);
            $s->setCellValueByColumnAndRow(3, $i, $course->intensite);
            $s->setCellValueByColumnAndRow(4, $i, $course->tension);
            $s->setCellValueByColumnAndRow(5, $i, $course->energie);
            $s->setCellValueByColumnAndRow(6, $i, $course->lat);
            $s->setCellValueByColumnAndRow(7, $i, $course->lon);
            $i++;
        }
        $writer = new Xlsx($spreadsheet);
        header('Content-Disposition: attachment;filename="course '.$choix.'.xlsx"');
        $writer->save('php://output');
    }
}
