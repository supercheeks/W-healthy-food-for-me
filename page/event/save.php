<?php
include $_SERVER["DOCUMENT_ROOT"]."/include/db.php";
include $_SERVER["DOCUMENT_ROOT"]."/include/function.php";

$title = $_POST['title'];
$product = $_POST['product'];
$sdate = $_POST['sdate'];
$edate = $_POST['edate'];

if(isset($_GET['idx'])){ // update    
    $sql = "select * from event where idx=?";
    $save = $pdo->prepare($sql);
    $save->execute(array($_GET['idx']));
    $fileName = $save->fetch();
    
    if(file_exists($_SERVER["DOCUMENT_ROOT"].$fileName['thumbnail']) && ($_FILES['thumbnail']['size'] != 0 )){
        unlink($_SERVER["DOCUMENT_ROOT"].$fileName['thumbnail']);
        $thumbnail = date("YmdHis")."_thumbnail".".jpg";
        $tmpName = $_FILES["thumbnail"]["tmp_name"];
        $destThumbnail = "/page/event/data/".$thumbnail;
        
        move_uploaded_file($tmpName,  $_SERVER["DOCUMENT_ROOT"].$destThumbnail);
        
        $sql="update event set thumbnail='$destThumbnail', tmpThumbnail=password('$destThumbnail') where idx=?";
        $save = $pdo->prepare($sql);
        $save->execute(array($_GET['idx']));
    }    
    
    if(file_exists($_SERVER["DOCUMENT_ROOT"].$fileName['file']) && ($_FILES['image']['size'] != 0 )){
        unlink($_SERVER["DOCUMENT_ROOT"].$fileName['file']);
        $image = date("YmdHis").".jpg";
        $tmpName = $_FILES["image"]["tmp_name"];
        $dest = "/page/event/data/".$image;
        
        move_uploaded_file($tmpName,  $_SERVER["DOCUMENT_ROOT"].$dest);
        
        $sql="update event set file='$dest', tmpFile=password('$dest') where idx=?";
        $save = $pdo->prepare($sql);
        $save->execute(array($_GET['idx']));
    }
    
    $sql="update event set title='$title', product='$product', sdate='$sdate', edate='$edate', wdate=now() where idx=?";
    $save = $pdo->prepare($sql);
    $save->execute(array($_GET['idx']));
}
else{
    $image = date("YmdHis").".jpg";
    $tmpName = $_FILES["image"]["tmp_name"];
    $dest = "/page/event/data/".$image;
    
    move_uploaded_file($tmpName, $_SERVER["DOCUMENT_ROOT"].$dest);
    
    $thumbnail = date("YmdHis_thumbnail").".jpg";
    $tmpName = $_FILES["thumbnail"]["tmp_name"];
    $destThumbnail = "/page/event/data/".$thumbnail;
    
    move_uploaded_file($tmpName,  $_SERVER["DOCUMENT_ROOT"].$destThumbnail);
    
    $sql="insert into event (title, thumbnail, tmpThumbnail, file, tmpFile, user, product, sdate, edate, wdate) values (?,?,password(?),?,password(?),'writer1','product1',?,?,now())";
    $save = $pdo->prepare($sql);
    $save->execute(array($title, $destThumbnail, $destThumbnail, $dest, $dest, $sdate, $edate));
}

move("/page/event/index.php");

?>
