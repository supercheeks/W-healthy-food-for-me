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
                <div class="comments">
                   <?php 
                    $sql = " select count(*) from comment where post=?";
                    $totals = $pdo -> prepare($sql);
                    $totals -> execute(array($idx));
                    $total = $totals -> fetchColumn();
                    ?>
                    <div>Comments <?php echo $total ?>개</div>
                    <div>
                        <form action="/page/board/saveReply.php?idx=<?php echo $row['idx']; ?>" method="post">
                            <textarea name="contents" placeholder="댓글달기" required></textarea>                           
                            <button type="submit">작성</button>
                        </form>
                    </div>
                    <?php 
                    $sql = "select * from comment where post=? order by wdate desc";
                    $comment = $pdo->prepare($sql);
                    $comment -> execute(array($idx));
                    ?>
                    <ul>
                       <?php 
                        while($result = $comment->fetch()){
                        ?>
                        <li>
                            <div class="comment">
                                <div class="inlineBlock">
                                    <div class="image">&nbsp;</div>
                                </div>
                                <div class="contents inlineBlock">
                                    <div class="name inlineBlock"><?php echo $result['writer']; ?></div>
                                    <ul class="inlineBlock">
                                        <li class="tagWhite inlineBlock">직장인</li>
                                        <li class="tagWhite inlineBlock">30대 초반</li>
                                        <li class="tagWhite inlineBlock">여성</li>
                                    </ul>
                                    <div class="date inlineBlock"><?php echo $result['wdate']; ?></div>
                                    <div class="text"><?php echo $result['contents']; ?></div>
                                    <div>
                                        <a href="#" class="inlineBlock">답글달기</a>
                                        <a href="#" class="inlineBlock">수정</a>
                                        <a href="/page/board/deleteReply.php?idx=<?php echo $result['idx']; ?>" class="inlineBlock">삭제</a>
                                    </div>
                                </div>
                            </div>
                            <div class="writeSubreply">
                                <form action="/page/board/saveSubreply.php?idx=<?php echo $result['idx']; ?>" method="post">
                                    <textarea name="contents" placeholder="대댓글달기" required></textarea>                           
                                    <button type="submit">작성</button>
                                </form>
                            </div>
                            <?php 
                            $sql="select * from subcomment where comment=? order by wdate desc";
                            $sub = $pdo->prepare($sql);
                            $sub -> execute(array($result['idx']));
                            
                            while($subcomment = $sub->fetch()){
                            ?>
                            <div class="subcomment">
                                <div class="inlineBlock">
                                    <div class="image">&nbsp;</div>
                                </div>
                                <div class="contents inlineBlock">
                                    <div class="name inlineBlock"><?php echo $subcomment['writer']; ?></div>
                                    <ul class="inlineBlock">
                                        <li class="tagWhite inlineBlock">직장인</li>
                                        <li class="tagWhite inlineBlock">30대 초반</li>
                                        <li class="tagWhite inlineBlock">여성</li>
                                    </ul>
                                    <div class="date inlineBlock"><?php echo $subcomment['wdate']; ?></div>
                                    <div class="text"><?php echo $subcomment['contents']; ?></div>
                                    <div>
                                        <a href="#" class="inlineBlock">수정</a>
                                        <a href="/page/board/deleteSubreply.php?idx=<?php echo $subcomment['idx']; ?>" class="inlineBlock">삭제</a>
                                    </div>
                                </div>
                            </div>
                        <?php 
                            }
                        }
                        ?>
                         
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>
<?php
include $_SERVER["DOCUMENT_ROOT"]."/include/footer.php";
?>