<?php
include $_SERVER["DOCUMENT_ROOT"]."/include/db.php";

$name = (isset($_POST["name"])) ? $_POST["name"] : "";

$sql = " select * from functionalMaterial where name = ? ";
$FMs = $pdo -> prepare($sql);
$FMs -> execute(array( $name ));
$FM = $FMs -> fetch();
?>

<div class="dialog">
    <h4>
        <?php echo $FM["name"]; ?>
        <button type="button" style="float:right; width:auto; display:inline;">
            <i class="fas fa-times"></i>
        </button>
    </h4>
    <table>
        <tr>
            <td>기능</td>
            <td><?php echo $FM["func"]; ?></td>
        </tr>
        <tr>
            <td>섭취시 주의사항</td>
            <td><?php echo $FM["contents"]; ?></td>
        </tr>
    </table>
</div>