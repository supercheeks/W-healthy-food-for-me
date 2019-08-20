<?php
include $_SERVER["DOCUMENT_ROOT"]."/include/db.php";
include $_SERVER["DOCUMENT_ROOT"]."/include/header.php";
?>
<section id="sub" class="login">
    <div class="contents">
        <div class="w100">
            <div class="info">
                <div class="title">
                    <div>자신의 신체 정보를 입력해 주세요.</div>
                    <ul>
                        <li class="inlineBlock">&nbsp;</li>
                        <li class="inlineBlock">&nbsp;</li>
                        <li class="inlineBlock">&nbsp;</li>
                    </ul>
                </div>
                <div class="contents">
                    <ul class="second">
                       <li>
                           <div class="inlineBlock">활동성</div>
                           <div class="inlineBlock">
                               <div>
                                   <div class="inlineBlock">
                                      <div class="inlineBlock">걸음수</div>
                                      <i class="fas fa-question-circle inlineBlock"></i>
                                   </div>
                                    <div class="inlineBlock">선택란</div>
                               </div>
                               <div>
                                    <div class="inlineBlock">
                                        <div class="inlineBlock">좌식생활량</div>
                                        <i class="fas fa-question-circle inlineBlock"></i>
                                    </div>
                                    <div class="inlineBlock">선택란</div>
                               </div>  
                           </div>
                        </li>
                        <li>
                           <div class="inlineBlock">운동량</div>
                           <div class="inlineBlock">
                               <div>
                                    <div class="inlineBlock">
                                        <div class="inlineBlock">운동횟수</div>
                                        <i class="fas fa-question-circle inlineBlock"></i>
                                    </div>
                                    <div class="inlineBlock">선택란</div>
                               </div>
                               <div>
                                     <div class="inlineBlock">
                                        <div class="inlineBlock">강도</div>
                                        <i class="fas fa-question-circle inlineBlock"></i>
                                    </div>
                                    <div class="inlineBlock">선택란</div>
                               </div>  
                           </div>
                    </ul>
                    <div>
                        <a href="/page/member/infoThird.php" class="inlineBlock">다음</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?php
include $_SERVER["DOCUMENT_ROOT"]."/include/footer.php";
?>