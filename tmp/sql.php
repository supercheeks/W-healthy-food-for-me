<?php
$ex = "히알";
$arr = ["히알루론산", "히알루론산나트륨(HA-LF-P)"];
$sql = [];

// select * from product where functionalMaterial like '%가시오%' and functionalMaterial not like '%\?가시오가피숙지황복합추출물%' and functionalMaterial not like '%가시오가피숙지황복합추출물\?%'
foreach($arr as $a) {
    $sql[] = "functionalMaterial not like '%\?".$a."%'";
    $sql[] = "functionalMaterial not like '%".$a."\?%'";
    $sql[] = "functionalMaterial not like '".$a."'";
}

$sql = "select * from product where functionalMaterial like '%".$ex."%' and ".implode($sql, " and ");

echo $sql;
?>