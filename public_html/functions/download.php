<?php
$fileName = "course.xlsx"; 
 
$data=$_POST['data'];
echo($data);
header("Content-Disposition: attachment; filename=\"$fileName\""); 
header("Content-Type: application/vnd.ms-excel"); 
 
function filterData(&$str){ 
    $str = preg_replace("/\t/", "\\t", $str); 
    $str = preg_replace("/\r?\n/", "\\n", $str); 
    if(strstr($str, '"')) $str = '"' . str_replace('"', '""', $str) . '"'; 
}
foreach($data as $row) { 
    array_walk($row, 'filterData'); 
    echo implode("\t", array_values($row)) . "\n"; 
} 
 
//exit;
?>