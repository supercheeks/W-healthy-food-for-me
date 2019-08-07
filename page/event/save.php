<?php
include $_SERVER["DOCUMENT_ROOT"]."/include/db.php";
include $_SERVER["DOCUMENT_ROOT"]."/include/function.php";

$title = $_POST['title'];
$product = $_POST['product'];
$sdate = $_POST['sdate'];
$edate = $_POST['edate'];

if(isset($_GET['idx'])){    
    $sql = "select * from event where idx=?";
    $save = $pdo->prepare($sql);
    $save->execute(array($_GET['idx']));
    $fileName = $save->fetch();
    
    unlink($fileName['file']);
    
    $fileName = date("YmdHis").".jpg";
    $tmpName = $_FILES["image"]["tmp_name"];
    $dest = "/page/event/data/".$fileName;
    
    move_uploaded_file($tmpName, $dest);
    
    $sql="update event set title='$title', file='$dest', tmpFile=password('$dest'), product='$product', sdate='$sdate', edate='$edate', wdate=now() where idx=?";
    $save = $pdo->prepare($sql);
    $save->execute(array($_GET['idx']));
}
else{
    $fileName = date("YmdHis").".jpg";
    $tmpName = $_FILES["image"]["tmp_name"];
    $dest = "/page/event/data/".$fileName;
    
    move_uploaded_file($tmpName, $_SERVER["DOCUMENT_ROOT"].$dest);
    
    $sql="insert into event (title, file, tmpFile, user, product, sdate, edate, wdate) values (?,?,password(?),'writer1','product1',?,?,now())";
    $save = $pdo->prepare($sql);
    $save->execute(array($title, $dest, $dest, $sdate, $edate));
}

move("/page/event/index.php");

?>
