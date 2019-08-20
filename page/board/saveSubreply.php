<?php
include $_SERVER["DOCUMENT_ROOT"]."/include/db.php";

$comment = $_GET['idx'];
$sql="insert into subcomment (contents, wdate, writer, post, comment) values (?,now(),'writer',?,?)";
$sql2="select * from comment where idx=?";
$post = $pdo->prepare($sql2);
$post->execute(array($comment));
$result = $post->fetch();

$save = $pdo->prepare($sql);
$save->execute(array($_POST['contents'], $result['post'], $comment));
?>

<script>
location.href="/page/board/view.php?idx=<?php echo $result['post']; ?>";
</script>
