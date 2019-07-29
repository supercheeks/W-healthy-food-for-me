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
                <h3>목록</h3>
                <ul>
                    <li>
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
                <h5 class="inlineBlock">게시판 이름</h5>
                <div class="inlineBlock">게시판 설명 게시판 설명 게시판 설명</div>
                <table>
                    <thead>
                        <tr>
                            <th>번호</th>
                            <th>제목</th>
                            <th>작성자</th>
                            <th>작성일</th>
                            <th>조회</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td>제목제목</td>
                            <td>홍길동</td>
                            <td>2019-07-29</td>
                            <td>53</td>
                        </tr>
                        <tr>
                            <td>2</td>
                            <td>제목제목</td>
                            <td>홍길동</td>
                            <td>2019-07-29</td>
                            <td>55</td>
                        </tr>
                        <tr>
                            <td>3</td>
                            <td>제목제목</td>
                            <td>홍길동</td>
                            <td>2019-07-29</td>
                            <td>5</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>
<?php
include $_SERVER["DOCUMENT_ROOT"]."/include/footer.php";
?>