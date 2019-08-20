<?php
include $_SERVER["DOCUMENT_ROOT"]."/include/db.php";
?>
<table>
    <tr>
        <td>idx</td>
<!--
        <td>name</td>
        <td>volume</td>
        <td>numTimes</td>
        <td>price</td>
        <td>image</td>
        <td>question</td>
        <td>category</td>
-->
        <td>brand</td>
<!--
        <td>functionalMaterial</td>
        <td>rate</td>
-->
    </tr>
<?php
$idx = 1;
$sql = " select distinct brand from product ";
$brands = $pdo -> prepare($sql);
$brands -> execute();
while($b = $brands -> fetch()) {
//    $sql2 = " insert into brand ( name, maker ) values ( ?, ? ) ";
//    $save = $pdo -> prepare($sql2);
//    $save -> execute(array( $b["brand"], $b["brand"] ));
    
    echo "<tr>";
    echo "<td>".$idx."</td>";
//    echo "<td>".$b["name"]."</td>";
//    echo "<td>".$b["volume"]."</td>";
//    echo "<td>".$b["numTimes"]."</td>";
//    echo "<td>".$b["price"]."</td>";
//    echo "<td>".$b["image"]."</td>";
//    echo "<td>".$b["question"]."</td>";
//    echo "<td>".$b["category"]."</td>";
    echo "<td>".$b["brand"]."</td>";
//    echo "<td>".$b["functionalMaterial"]."</td>";
//    echo "<td>".$b["rate"]."</td>";
    echo "</tr>";
    $idx++;
}
?>
</table>