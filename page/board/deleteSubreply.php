<?php
include $_SERVER["DOCUMENT_ROOT"]."/include/db.php";

$idx = $_GET['idx'];
$sql="delete from subcomment where idx=?";
$sql2="select * from subcomment where idx=?";
$post = $pdo->prepare($sql2);
$post->execute(array($idx));
$result = $post->fetch();

$save = $pdo->prepare($sql);
$save->execute(array($idx));
?>

<script>
location.href="/page/board/view.php?idx=<?php echo $result['post']; ?>";
</script>
