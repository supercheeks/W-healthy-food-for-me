<?php
include $_SERVER["DOCUMENT_ROOT"]."/include/db.php";

$sql="delete from board where idx=?";
$save = $pdo->prepare($sql);
$save->execute(array($_GET['idx']));

move("/page/board/index.php")
?>
