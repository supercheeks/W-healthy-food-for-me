<?php
include $_SERVER["DOCUMENT_ROOT"]."/include/db.php";
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<body>
<form action="/page/event/save.php" method="post" enctype="multipart/form-data">
    <input type="file" name="image" id="image">
    <button type="submit">업로드</button>
</form>
</body>
</html>