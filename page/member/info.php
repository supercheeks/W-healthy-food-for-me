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
                    <ul class="first">
                        <li>
                            <div class="inlineBlock">키</div>
                            <div class="inlineBlock">
                                <input type="text" class="inlineBlock" required>
                                <div class="inlineBlock">cm</div>    
                            </div>
                        </li>
                        <li>
                            <div class="inlineBlock">몸무게</div>
                            <div class="inlineBlock">
                                <input type="text" class="inlineBlock" required>
                                <div class="inlineBlock">kg</div>    
                            </div>
                        </li>
                        <li>
                            <div class="inlineBlock">체지방률</div>
                            <div class="inlineBlock">
                                <input type="text" class="inlineBlock">
                                <div class="inlineBlock">%</div>
                                <div class="inlineBlock">( 선택입력사항입니다 )</div>   
                            </div>
                        </li>
                    </ul>
                    <div>
                        <a href="/page/member/infoSecond.php" class="inlineBlock">다음</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?php
include $_SERVER["DOCUMENT_ROOT"]."/include/footer.php";
?>