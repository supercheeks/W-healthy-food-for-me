<?php
include $_SERVER["DOCUMENT_ROOT"]."/include/db.php";
include $_SERVER["DOCUMENT_ROOT"]."/include/function.php";

$id = $_GET["loginId"];
$pw = $_GET["loginPw"];
//$id = "tester";
//$pw = "1234";

$sql = " select * from member where id = ? and pw = password(".$pw.") ";
//$sql = " select * from member where id = ? and pw = ? ";
$members = $pdo -> prepare($sql);
$members -> execute(array($id, $pw));
if($members -> rowCount())
{
    $member = $members -> fetch();
}
else
{
    alert("입력하신 정보와 일치하는 계정이 없습니다.");
    move($_SERVER["DOCUMENT_ROOT"]."/page/member/login.php");
}
?>