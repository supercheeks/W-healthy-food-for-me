<?php
include $_SERVER["DOCUMENT_ROOT"]."/include/db.php";
include $_SERVER["DOCUMENT_ROOT"]."/include/subHeader.php";
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
                <h3>커뮤니티</h3>
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
            <div class="view inlineBlock">
               <div class="title">
                    <h5 class="inlineBlock">자유게시판</h5>
                    <div class="inlineBlock">게시판 설명 게시판 설명 게시판 설명</div>
               </div>
                <?php 
                $idx = $_GET['idx'];
                $sql = "select * from board where idx=?";
                $boards = $pdo->prepare($sql);
                $boards -> execute(array($idx));
                $row = $boards->fetch();
                ?>
                <div>
                    <div class="title">
                        <div class="inlineBlock">제목</div>
                        <div class="inlineBlock"><?php echo $row['title']; ?></div>
                    </div>
                    <div class="writer">
                        <div class="inlineBlock">작성자</div>
                        <div class="inlineBlock"><?php echo $row['writer']; ?></div>
                    </div>
                    <div class="wdate inlineBlock">
                        <div class="inlineBlock">작성일</div>
                        <div class="inlineBlock"><?php echo $row['wdate']; ?></div>
                    </div>
                    <div class="view inlineBlock">
                        <div class="inlineBlock">조회수</div>
                        <div class="inlineBlock"><?php echo $row['view']; ?></div>
                    </div>
                    <div class="contents">
                        <?php echo $row['contents']; ?>
                    </div>
                </div>
                <a href="/page/board/index.php" class="inlineBlock">목록</a>
                <a href="#" class="inlineBlock">수정</a>
                <a href="/page/board/delete.php?idx=<?php echo $row['idx']; ?>" class="inlineBlock">삭제</a>
            </div>
        </div>
    </div>
</section>
<?php
include $_SERVER["DOCUMENT_ROOT"]."/include/footer.php";
?>