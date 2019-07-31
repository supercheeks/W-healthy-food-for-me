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
            <div class="board inlineBlock">
                <h5 class="inlineBlock">자유게시판</h5>
                <div class="inlineBlock">게시판 설명 게시판 설명 게시판 설명</div>
                <div class="write">
                    <form action="/page/board/save.php" method="post">
                        <ul>
                            <li>제목 <input name="title" type="text" placeholder="제목을 입력하세요" autocomplete="off" required></li>
                            <li>내용 <textarea name="contents" placeholder="내용을 입력하세요" required></textarea></li>
                        </ul>
                        <button type="submit">작성</button>
                    </form>
                    <a href="/page/board/index.php">목록</a>
                </div>
            </div>
        </div>
    </div>
</section>
<?php
include $_SERVER["DOCUMENT_ROOT"]."/include/footer.php";
?>