<?php
include $_SERVER["DOCUMENT_ROOT"]."/include/db.php";

$sql="insert into board (title, wdate, contents) values (?,now(),?)";
$save = $pdo->prepare($sql);
$save->execute(array($_POST['title'], $_POST['contents']));
?>

<script>
location.href="/page/board/index.php";
</script>