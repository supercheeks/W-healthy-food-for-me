<?php
include $_SERVER["DOCUMENT_ROOT"]."/include/db.php";

$sql="insert into comment (contents, wdate, writer, post) values (?,now(), 'writer1' ,?)";
$post = $_GET['idx'];
$save = $pdo->prepare($sql);
$save->execute(array($_POST['contents'], $post));
?>

<script>
location.href="/page/board/view.php?idx=<?php echo $post; ?>";
</script>