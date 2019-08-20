<?php
include $_SERVER["DOCUMENT_ROOT"]."/include/db.php";
include $_SERVER["DOCUMENT_ROOT"]."/include/function.php";

$sql = "select * from event where idx=?";
$save = $pdo->prepare($sql);
$save->execute(array($_GET['idx']));
$fileName = $save->fetch();

if(file_exists($_SERVER["DOCUMENT_ROOT"].$fileName['file'])){
    unlink($_SERVER["DOCUMENT_ROOT"].$fileName['file']);
}
if(file_exists($_SERVER["DOCUMENT_ROOT"].$fileName['thumbnail'])){
    unlink($_SERVER["DOCUMENT_ROOT"].$fileName['thumbnail']);
}

$sql="delete from event where idx=?";
$save = $pdo->prepare($sql);
$save->execute(array($_GET['idx']));

move("/page/event/index.php");
    
?>
