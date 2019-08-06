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
               <form action="/page/event/save.php" method="post" enctype="multipart/form-data">
                   <ul>
                       <li class="title">
                           <div class="inlineBlock">제목</div>
                           <input name="title" type="text" class="inlineBlock" placeholder="제목을 입력하세요" autocomplete="off">
                       </li>
                       <li class="image">
                           <div class="inlineBlock">이미지<br>업로드</div>
                           <input name="image" type="file" class="inlineBlock" >
                       </li>
                       <li class="product">
                           <div class="inlineBlock">제품명</div>
                           <input name="product" type="text" class="inlineBlock" placeholder="제품명 선택">
                       </li>
                       <li class="date">
                           <div class="inlineBlock">이벤트<br>기한</div>
                           <input name="sdate" type="datetime" class="inlineBlock" id="sdate" placeholder="시작날짜">
                           <span>~</span>
                           <input name="edate" type="datetime" class="inlineBlock" id="edate" placeholder="종료날짜">
                       </li>
                   </ul>
                   <div>
                        <button type="submit">작성</button>
                        <a href="/page/event/index.php">목록</a>
                   </div>
               </form>
           </div>
        </div>
    </div>
</section>
<script>
$(function(){
   $("#sdate, #edate").datepicker(); 
});
</script>
<?php
include $_SERVER["DOCUMENT_ROOT"]."/include/footer.php";
?>