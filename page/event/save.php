<?php
include $_SERVER["DOCUMENT_ROOT"]."/include/db.php";
include $_SERVER["DOCUMENT_ROOT"]."/include/function.php";

print_r($_FILES);
echo ($_FILES["image"]["size"] != 0) ? "exist" : "not exist";

$fileName = date("YmdHis").".jpg";
$tmpName = $_FILES["image"]["tmp_name"];

// F:/xampp/htdocs/page/event/data/image.jpeg
// move_uploaded_file(tmpFile, destination)
// move_uploaded_file($tmpName, $_SERVER["DOCUMENT_ROOT"]."/page/event/data/".$fileName)

$dest = $_SERVER["DOCUMENT_ROOT"]."/page/event/data/".$fileName;
//echo $dest;
//move_uploaded_file($tmpName, $dest);
//
//alert("업로드 완료");
//move("/page/event/write.php");
?>


<img src="<?php echo $file; ?>" alt="">
<img src="<?php echo $tmpFile; ?>" alt="">