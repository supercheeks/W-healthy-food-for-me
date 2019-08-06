<?php
include $_SERVER["DOCUMENT_ROOT"]."/include/db.php";

$title = $_POST['title'];
$image = $_FILES['image'];
$product = $_POST['product'];
$sdate = $_POST['sdate'];
$edate = $_POST['edate'];

if(isset($_GET['idx'])){
    $sql="update event set title='$title' where idx=?";
    $save = $pdo->prepare($sql);
    $save->execute(array($_GET['idx']));
}
else{
    $sql="insert into event (title, image, user, product, sdate, edate, wdate) values (?,?,'writer1','product1',?,?,now())";
    $save = $pdo->prepare($sql);
    $save->execute(array($title, $image, $user, $product, $sdate, $edate));
}
?>

<script>
location.href="/page/event/index.php";
</script>