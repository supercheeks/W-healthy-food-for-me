<?php
include $_SERVER["DOCUMENT_ROOT"]."/include/db.php";
include $_SERVER["DOCUMENT_ROOT"]."/include/subHeader.php";
?>
<section id="sub" class="review">
    <div class="contents">
        <div class="w100">
           <div class="write">
               <div class="title">
                   <div>리뷰를 작성해 주세요.</div>
               </div>
               <div class="contents">
                   <ul>
                       <li>
                           <div>
                               <i class="fas fa-circle inlineBlock"></i>
                               <div class="inlineBlock">해당 제품의 맛은 어땠나요?</div>
                           </div>
                           <div>선택란</div>
                       </li>
                       <li>
                           <div>
                               <i class="fas fa-circle inlineBlock"></i>
                               <div class="inlineBlock">해당 제품이 에너지 보충에 도움이 되었나요?</div>
                           </div>
                           <div>선택란</div>
                       </li>
                       <li>
                           <div>
                               <i class="fas fa-circle inlineBlock"></i>
                               <div class="inlineBlock">해당 제품을 섭취한 후 겪은 내용을 모두 선택해 주세요.</div>
                           </div>
                           <ul>
                               <li class="inlineBlock tagWhite">체중 감소</li>
                               <li class="inlineBlock tagWhite">배변활동에 도움</li>
                               <li class="inlineBlock tagWhite">휴대성 좋음</li>
                               <li class="inlineBlock tagWhite">맛있음</li>
                               <li class="inlineBlock tagWhite">심리적 안정</li>
                               <li class="inlineBlock tagWhite">에너지 보충</li>
                               <li class="inlineBlock tagWhite">포만감</li>
                           </ul>
                       </li>
                       <li>
                           <div>
                               <i class="fas fa-circle inlineBlock"></i>
                               <div class="inlineBlock">해당 제품의 맛을 모두 선택해 주세요.</div>
                           </div>
                           <ul>
                               <li class="inlineBlock tagWhite">단 맛</li>
                               <li class="inlineBlock tagWhite">쓴 맛</li>
                               <li class="inlineBlock tagWhite">짠 맛</li>
                               <li class="inlineBlock tagWhite">신 맛</li>
                               <li class="inlineBlock tagWhite">매운 맛</li>
                               <li class="inlineBlock tagWhite">싱거움</li>
                               <li class="inlineBlock tagWhite">고소함</li>
                               <li class="inlineBlock tagWhite">무맛</li>
                           </ul>
                       </li>
                       <li>
                           <div>
                               <i class="fas fa-circle inlineBlock"></i>
                               <div class="inlineBlock">해당 제품을 섭취한 후 겪은 부작용/불편함이 있다면 모두 선택해 주세요.</div>
                           </div>
                           <ul>
                               <li class="inlineBlock tagWhite">소화 불량</li>
                               <li class="inlineBlock tagWhite">메스꺼움</li>
                               <li class="inlineBlock tagWhite">두통</li>
                               <li class="inlineBlock tagWhite">불편한 식감</li>
                               <li class="inlineBlock tagWhite">영양결핍</li>
                               <li class="inlineBlock tagWhite">체중조절 방해</li>
                           </ul>
                       </li>
                       <li>
                           <div>
                               <i class="fas fa-circle inlineBlock"></i>
                               <div class="inlineBlock">한줄평을 작성해 주세요!</div>
                           </div>
                           <input type="text" required>
                       </li>
                   </ul>
                   <div>
                       <button>제출</button>
                   </div>
               </div>
           </div>
        </div>
    </div>
</section>