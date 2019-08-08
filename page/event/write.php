<?php
include $_SERVER["DOCUMENT_ROOT"]."/include/db.php";
include $_SERVER["DOCUMENT_ROOT"]."/include/subHeader.php";
?>
<section id="sub" class="event">
    <div class="title" style="background:url('https://images.pexels.com/photos/221361/pexels-photo-221361.jpeg?cs=srgb&dl=art-balloons-birthday-221361.jpg&fm=jpg'); background-size:cover; background-position:center;">
       <div class="contents">
           <div class="w100 font_EB">EVENT</div>
       </div>
       <div class="cover gradient">&nbsp;</div>
    </div>
    <div class="contents">
        <div class="w100">
           <div class="write">
               <?php 
               if(isset($_GET['idx'])){
                   $sql = "select * from event where idx=?";
                   $result = $pdo->prepare($sql);
                   $result -> execute(array($_GET['idx']));
                   $event = $result->fetch();
               ?>
                <form action="/page/event/save.php?idx=<?php echo $_GET['idx']; ?>" method="post" enctype="multipart/form-data">
                   <ul>
                       <li class="title">
                           <div class="inlineBlock">제목</div>
                           <input id="title" name="title" type="text" class="inlineBlock" placeholder="제목을 입력하세요" autocomplete="off" value="<?php echo $event['title']; ?>">
                       </li>
                       <li class="thumbnail">
                           <div class="inlineBlock">썸네일<br>업로드</div>
                           <input id="thumbnail" name="thumbnail" type="file" class="inlineBlock" autocomplete="off" >
                       </li>
                       <li class="image">
                           <div class="inlineBlock">이미지<br>업로드</div>
                           <input id="image" name="image" type="file" class="inlineBlock" autocomplete="off" >
                       </li>
                       <li class="product">
                           <div class="inlineBlock">제품명</div>
                           <input id="product" name="product" type="text" class="inlineBlock" placeholder="제품명 선택" autocomplete="off" value="<?php echo $event['product']; ?>">
                       </li>
                       <li class="date">
                           <div class="inlineBlock">이벤트<br>기한</div>
                           <input id="sdate" name="sdate" type="date" class="inlineBlock" id="sdate" placeholder="시작날짜" autocomplete="off" value="<?php echo $event['sdate']; ?>">
                           <span>~</span>
                           <input id="edate" name="edate" type="date" class="inlineBlock" id="edate" placeholder="종료날짜" autocomplete="off" value="<?php echo $event['edate']; ?>">
                       </li>
                   </ul>
                   <div>
                        <button type="submit">작성</button>
                        <a href="/page/event/index.php">목록</a>
                   </div>
               </form>
               <?php 
               }
               else{
               ?>
               <form action="/page/event/save.php" method="post" enctype="multipart/form-data">
                   <ul>
                       <li class="title">
                           <div class="inlineBlock">제목</div>
                           <input id="title" name="title" type="text" class="inlineBlock" placeholder="제목을 입력하세요" autocomplete="off">
                       </li>
                       <li class="thumbnail">
                           <div class="inlineBlock">썸네일<br>업로드</div>
                           <input id="thumbnail" name="thumbnail" type="file" class="inlineBlock" autocomplete="off">
                       </li>
                       <li class="image">
                           <div class="inlineBlock">이미지<br>업로드</div>
                           <input id="image" name="image" type="file" class="inlineBlock" autocomplete="off">
                       </li>
                       <li class="product">
                           <div class="inlineBlock">제품명</div>
                           <input id="product" name="product" type="text" class="inlineBlock" placeholder="제품명 선택" autocomplete="off">
                       </li>
                       <li class="date">
                           <div class="inlineBlock">이벤트<br>기한</div>
                           <input id="sdate" name="sdate" type="date" class="inlineBlock" id="sdate" placeholder="시작날짜" autocomplete="off">
                           <span>~</span>
                           <input id="edate" name="edate" type="date" class="inlineBlock" id="edate" placeholder="종료날짜" autocomplete="off">
                       </li>
                   </ul>
                   <div>
                        <button type="submit">작성</button>
                        <a href="/page/event/index.php">목록</a>
                   </div>
               </form>
               <?php
               }
                ?>
           </div>
        </div>
    </div>
</section>
<?php
include $_SERVER["DOCUMENT_ROOT"]."/include/footer.php";
?>