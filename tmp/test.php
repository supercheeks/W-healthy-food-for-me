<?php
include $_SERVER["DOCUMENT_ROOT"]."/include/db.php";
?>
<table>
<?php
$sql = " select * from product where functionalMaterial regexp '[가-힣]+' order by idx asc ";
$products = $pdo -> prepare($sql);
$products -> execute();
while($p = $products -> fetch()) {
//    if(preg_match("/.*[가-힣][a-z][A-Z].*/", $p["functionalMaterial"]))
//    {
        echo "<tr>";
        echo "<td>".$p["idx"]."</td>";
        echo "<td>".$p["name"]."</td>";
        echo "<td>".$p["brand"]."</td>";
        echo "<td>".$p["functionalMaterial"]."</td>";
        echo "</tr>";
//    }
}
?>
</table>
<?php

//$sql = " select * from functionalMaterial order by idx desc ";
//$materials = $pdo -> prepare($sql);
//$materials -> execute();
//while($m = $materials -> fetch()) {
//    $sql2 = " update product set functionalMaterial = replace(functionalMaterial, '".$m['name']."', '".$m['idx']."') where functionalMaterial like '%".$m['name']."%' ";
//    $update = $pdo -> prepare($sql2);
//    $update -> execute();
//}

//$product = array();
//$material = array();
//$vitamin = array("비타민 A", "비타민 D", "비타민 E", "비타민 K", "비타민 B1", "비타민 B2", "비타민 B6", "비타민 B12", "비타민 C");
//$mineral = array("베타카로틴", "나이아신", "판토텐산", "엽산", "비오틴", "철", "아연", "구리", "셀레늄(또는 셀렌)", "요오드", "망간", "몰리브덴", "크롬", "칼슘", "마그네슘", "칼륨");

//$sql = " select * from functionalMaterial order by idx asc ";
//$materials = $pdo -> prepare($sql);
//$materials -> execute();
//while($m = $materials -> fetch()) $material[] = $m["name"];

//$sql = " select * from product where idx >= 15007 order by idx asc ";
//$products = $pdo -> prepare($sql);
//$products -> execute();
//while($p = $products -> fetch()) {
//    $functionalMaterial = explode("?", $p["functionalMaterial"]);
//    foreach($material as $key => $m) {
////        $p["functionalMaterial"] = str_replace($m["name"], $m["idx"], $p["functionalMaterial"]);
//        $p["functionalMaterial"] = str_replace($m["name"], "", $p["functionalMaterial"]);
//    }
    
//    $nutrient = array(
//        "kcal" => 0,
//        "carb" => 0,
//        "sugar" => 0,
//        "dietaryFiber" => 0,
//        "protein" => 0,
//        "fat" => 0,
//        "satFat" => 0,
//        "transFat" => 0,
//        "cholesterol" => 0,
//        "vitamin" => array(),
//        "mineral" => array(),
//        "Na" => 0
//    );
    
//    $extra = array();
//    foreach($functionalMaterial as $key => $f) {
////        $f = preg_replace("/(.+)(\(.*원료.*\))/i", "$1", $f);
//        $f = preg_replace("/(.+)(\(.*제[0-9].*\))/i", "$1", $f);
//        $f = preg_replace("/(.+)(\(.*[0-9]-[0-9].*\))/i", "$1", $f);
//        if(in_array($f, $vitamin))
//        {
//            // 비타민임
//            $nutrient["vitamin"][] = $f.";0";
//        }
//        else if(in_array($f, $mineral))
//        {
//            // 미네랄임
//            $nutrient["mineral"][] = $f.";0";
//        }
////        else if(in_array($f, $material)) 
////        {
////            // 기능성원료
////        }
//        else if($f == "식이섬유" || $f == "서류가공품" || $f == "단백질")
//            continue;
//        else
//            $extra[] = $f;
//    }
//    
//    $nutrient["vitamin"] = implode("?", $nutrient["vitamin"]); // vitamin
//    $nutrient["mineral"] = implode("?", $nutrient["mineral"]); // mineral
//    $p["functionalMaterial"] = implode("?", $extra);  // functionalMaterial
    
//    $sql2 = " update product set functionalMaterial = ? where idx = ? ";
//    $save = $pdo -> prepare($sql2);
//    $save -> execute(array( $p["functionalMaterial"], $p["idx"] ));
    
//    $sql2 = " insert into nutrient (kcal, carb, sugar, dietaryFiber, protein, fat, satFat, transFat, cholesterol, vitamin, mineral, Na, FK_product) values (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?) ";
//    $save = $pdo -> prepare($sql2);
//    $save -> execute(array(0, 0, 0, 0, 0, 0, 0, 0, 0, $nutrient["vitamin"], $nutrient["mineral"], 0, $p["idx"]));
//    print_r($nutrient);
//    echo "<br>";
    
//    $product[] = $p;
//}
?>