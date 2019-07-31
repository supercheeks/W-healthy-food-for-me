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
                       <?php
                        $sql = " select count(*) from board ";
                        $totals = $pdo -> prepare($sql);
                        $totals -> execute();
                        $total = $totals -> fetchColumn();
                        $currPage = (isset($_GET['page']))?$_GET['page']:0;
                        $cnt = 10;
                        $totalPage= $total/$cnt;
                        
                        $sql = " select * from board order by wdate desc limit ".(($currPage)*$cnt).", ".$cnt;
                    
                        $rs = $pdo->prepare($sql);
                        $rs -> execute();
                        while($result = $rs->fetch()){
                        ?>
                        <tr>
                            <td><?php echo $result['idx']; ?></td>
                            <td><a href="/page/board/view.php?idx=<?php echo $result['idx']; ?>"><?php echo $result['title']; ?></a></td>
                            <td><?php echo $result['writer']; ?></td>
                            <td><?php echo $result['wdate']; ?></td>
                            <td><?php echo $result['view']?></td>
                        </tr>
                        <?php
                        }?>
                    </tbody>
                </table>
                <?php 
                $pageCut = 5;
                $start = ($currPage/$pageCut);
                for($i=($start*$pageCut)+1; $i <= ($start * $pageCut)+$pageCut; $i++){
                ?>
                <a href="/page/board/index.php?page=<?php echo $i; ?>" class="inlineBlock"><?php echo $i; ?></a>
                <?php 
                }
                ?>
                <a href="/page/board/write.php">글쓰기</a>
            </div>
        </div>
    </div>
</section>
<?php
include $_SERVER["DOCUMENT_ROOT"]."/include/footer.php";
?>