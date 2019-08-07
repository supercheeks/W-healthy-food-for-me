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
           <div class="view">
              <?php 
               $sql="select * from event where idx=?";
               $save=$pdo->prepare($sql);
               $save->execute(array($_GET['idx']));
               $event=$save->fetch();
               ?>
               <ul>
                   <li class="title">
                       <div class="inlineBlock">제목</div>
                       <div class="inlineBlock"><?php echo $event['title']; ?></div>
                   </li>
                   <li class="wdate inlineBlock">
                       <div class="inlineBlock">게시일</div>
                       <div class="inlineBlock"><?php echo $event['wdate']; ?></div>
                   </li>
                   <li class="term inlineBlock">
                       <div class="inlineBlock">이벤트 기간</div>
                       <div class="inlineBlock"><?php echo $event['sdate']; ?></div>
                       <span>~</span>
                       <div class="inlineBlock"><?php echo $event['edate']; ?></div>
                   </li>
                   <li class="contents">
                       <img src="<?php echo $event['file']; ?>" alt="">
                   </li>
               </ul>
               <div class="apply">    
                   <a href="#">신청하기</a>
               </div>
               <div>
                   <a href="/page/event/index.php">목록</a>
               </div>
           </div>
        </div>
    </div>
</section>
<?php
include $_SERVER["DOCUMENT_ROOT"]."/include/footer.php";
?>