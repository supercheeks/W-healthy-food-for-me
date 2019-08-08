<?php
include $_SERVER["DOCUMENT_ROOT"]."/include/db.php";

$title=$_POST['title'];
$contents=$_POST['contents'];

if(isset($_GET['idx'])){
    $sql="update board set title='$title', contents='$contents' where idx=?";
    $save = $pdo->prepare($sql);
    $save->execute(array($_GET['idx']));
}
else{
    $sql="insert into board (title, wdate, writer, contents) values (?,now(),'writer11',?)";
    $save = $pdo->prepare($sql);
    $save->execute(array($title, $contents));
}
?>

<script>
location.href="/page/board/index.php";
</script>