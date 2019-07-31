<?php
include $_SERVER["DOCUMENT_ROOT"]."/include/db.php";

$sql="delete from board where idx=?";
$save = $pdo->prepare($sql);
$save->execute(array($_GET['idx']));
?>

<script>
location.href="/page/board/index.php";
</script>