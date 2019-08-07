<?php
include $_SERVER["DOCUMENT_ROOT"]."/include/db.php";
include $_SERVER["DOCUMENT_ROOT"]."/include/subHeader.php";

$page = $_GET['page'];
?>
<section id="sub" class="community">
    <div class="title" style="background:url('https://images.pexels.com/photos/7096/people-woman-coffee-meeting.jpg?cs=srgb&dl=advice-advise-advisor-7096.jpg&fm=jpg'); background-size:cover; background-position:center;">
       <div class="contents">
           <div class="w100 font_EB">COMMUNITY</div>
       </div>
       <div class="cover gradient">&nbsp;</div>
    </div>
    <div class="contents">
        <div class="w100">
            <div class="list inlineBlock">
                <h5>커뮤니티</h5>
                <ul>
                    <li class="active">
                        <div class="inlineBlock">자유게시판</div>
                        <i class="fas fa-angle-right inlineBlock"></i>
                    </li>
                    <li>
                        <div class="inlineBlock">문의게시판</div>
                        <i class="fas fa-angle-right inlineBlock"></i>
                    </li>
                </ul>
            </div>
            <div class="board inlineBlock">
                <div class="title">
                    <h5 class="inlineBlock">자유게시판</h5>
                    <div class="inlineBlock">자유게시판 입니다.</div>
                </div>
                <div class="write">
                   <?php 
                    if(isset($_GET['idx'])){
                        $sql = "select * from board where idx=?";
                        $result = $pdo->prepare($sql);
                        $result -> execute(array($_GET['idx']));
                        $post = $result->fetch();
                    ?>
                    <form action="/page/board/save.php?idx=<?php echo $_GET['idx']; ?>" method="post">
                        <ul>
                            <li>
                                <div>제목</div>
                                <input name="title" type="text" placeholder="제목을 입력하세요" autocomplete="off" required value="<?php echo $post['title']; ?>" >
                            </li>
                            <li>
                                <div>내용</div>
                                <textarea name="contents" placeholder="내용을 입력하세요" required><?php echo $post['contents']; ?></textarea>
                            </li>
                        </ul>
                        <button type="submit">작성</button>
                        <a href="/page/board/index.php?page=<?php echo $page; ?>">목록</a>
                    </form>
                    <?php 
                    }
                    else {
                    ?>
                    <form action="/page/board/save.php" method="post">
                        <ul>
                            <li class="title">
                                <div class="inlineBlock">제목</div>
                                <input class="inlineBlock" name="title" type="text" placeholder="제목을 입력하세요" autocomplete="off" required >
                            </li>
                            <li class="contents">
                                <div class="inlineBlock">내용</div>
                                <textarea class="inlineBlock" name="contents" placeholder="내용을 입력하세요" required></textarea>
                            </li>
                        </ul>
                        <div>
                            <button type="submit">작성</button>
                            <a href="/page/board/index.php?page=<?php echo $page; ?>">목록</a>
                        </div>
                    </form>
                    <?php
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
</section>
<?php
include $_SERVER["DOCUMENT_ROOT"]."/include/footer.php";
?>