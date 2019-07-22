<?php
include $_SERVER["DOCUMENT_ROOT"]."/include/db.php";
include $_SERVER["DOCUMENT_ROOT"]."/include/subHeader.php";
?>
<section id="sub" class="rankingView">
    <div class="contents">
        <div class="w100">
            <div class="summary">
                <div class="inlineBlock left">
                    <div class="img gradientProduct">
                        <img src="/img/product_test.png" alt="">
                    </div>
                    
                    <div class="brand">
                        <img src="/img/brandTest.jpg" alt="" class="inlineBlock">
                        <h3 class="inlineBlock font_B">글램디</h3>
                        <a href="#" class="inlineBlock">자세히 보기</a>
                    </div>
                    
                    <ul class="tag">
                        <li class="tagWhite inlineBlock">젤리</li>
                        <li class="tagWhite inlineBlock">배고플때</li>
                        <li class="tagWhite inlineBlock">복숭아맛</li>
                    </ul>
                </div>
                
                <div class="inlineBlock right">
                    <h3>
                        <span class="red font_EB">GLAM.D</span> 5킬로칼로리 워터젤리
                        <p>다이어트 보조제 > 소분류</p>
                    </h3>
                    <div>칼로리 걱정은 날려주고 과일 100% 농축액으로 맛을 더한 4킬로칼로리 곤약 워터젤리</div>
                    <ul class="info">
                        <li>
                            <h4>용량 / 섭취횟수 / 가격</h4>
                            <ul class="price">
                                <li>
                                    <label for="price1" class="inlineBlock">
                                        25g / 1회
                                        <span>\2,500</span>
                                    </label>
                                    <input type="radio" name="type" class="inlineBlock" id="price1" checked>
                                </li>
                                <li>
                                    <label for="price2" class="inlineBlock">
                                        50g / 2회
                                        <span>\4,500</span>
                                    </label>
                                    <input type="radio" name="type" class="inlineBlock" id="price2">
                                </li>
                            </ul>
                            <div>
                                <a href="#">네이버 비교가 확인하기</a>
                            </div>
                        </li>
                        
                        <!--
                        
                        78	20	5	13	7					비타민A;175µgRE(25%)?비타민B1;0.25mg(25%)?비타민B2;0.3mg(25%)?비타민B6;0.375mg(25%)?비타민C;25mg(25%)?비타민E;2.5mg(25%)?나이아신;3.25mgNE(25%)?엽산;62.5mg(25%)
                        -->
                        
                        <li class="icon nutrient">
                            <h4>영양 성분</h4>
                            <ul class="list">
                                <li class="active inlineBlock">
                                    <div>
                                        <span>78</span>
                                        Kcal
                                    </div>    
                                    <p>칼로리</p>
                                </li>
                                <li class="active inlineBlock">
                                    <div>
                                        <span>20</span>
                                        g
                                    </div>    
                                    <p>탄수화물</p>
                                </li>
                                <li class="active inlineBlock">
                                    <div>
                                        <span>5</span>
                                        g
                                    </div>    
                                    <p>당류</p>
                                </li>
                                <li class="active inlineBlock">
                                    <div>
                                        <span>13</span>
                                        g
                                    </div>    
                                    <p>식이섬유</p>
                                </li>
                                <li class="active inlineBlock">
                                    <div>
                                        <span>7</span>
                                        g
                                    </div>    
                                    <p>단백질</p>
                                </li>
                                <li class="inlineBlock">
                                    <div>
<!--                                        <span></span>-->
                                        *N/A
                                    </div>    
                                    <p>지방</p>
                                </li>
                                <li class="inlineBlock">
                                    <div>
                                        *N/A
                                    </div>    
                                    <p>포화지방</p>
                                </li>
                                <li class="inlineBlock">
                                    <div>
                                        *N/A
                                    </div>    
                                    <p>트랜스지방</p>
                                </li>
                                <li class="inlineBlock">
                                    <div>
                                        *N/A
                                    </div>    
                                    <p>콜레스테롤</p>
                                </li>
                                <li class="active inlineBlock">
                                    <div></div>    
                                    <p>비타민</p>
                                </li>
                            </ul>
                        </li>
                        <li class="icon">
                            <h4>주의사항</h4>
                            <ul class="list">
                                <li class="active inlineBlock">
                                    <div>
                                        <img src="/img/allergy.png" alt="">
                                    </div>
                                    <p>알러지 주의</p>
                                </li>
                                <li class="inlineBlock">
                                    <div>
                                        <img src="/img/allergy.png" alt="">
                                    </div>
                                    <p>특정 질환 주의</p>
                                </li>
                                <li class="inlineBlock active">
                                    <div>
                                        <img src="/img/medicine.png" alt="">
                                    </div>
                                    <p>의약품 섭취 주의</p>
                                </li>
                                <li class="inlineBlock">
                                    <div>
                                        <img src="/img/allergy.png" alt="">
                                    </div>
                                    <p>임산부/수유 주의</p>
                                </li>
                                <li class="inlineBlock">
                                    <div>
                                        <img src="/img/allergy.png" alt="">
                                    </div>
                                    <p>영유아/어린이<br>섭취 주의</p>
                                </li>
                                <li class="inlineBlock">
                                    <div>
                                        <img src="/img/allergy.png" alt="">
                                    </div>
                                    <p>고령자 섭취 주의</p>
                                </li>
                                <li class="inlineBlock">
                                    <div>
                                        <img src="/img/allergy.png" alt="">
                                    </div>
                                    <p>부작용</p>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <h4>인증</h4>
                            <ul class="list">
                                <li class="active inlineBlock">
                                    <div>
                                        <img src="/img/%EA%B1%B4%EA%B0%95%EA%B8%B0%EB%8A%A5%EC%8B%9D%ED%92%88.png" alt="">
                                    </div>
                                </li>
                                <li class="inlineBlock">
                                    <div>
                                        <img src="/img/%EC%9A%B0%EC%88%98%EA%B1%B4%EA%B0%95%EA%B8%B0%EB%8A%A5%EC%8B%9D%ED%92%88%EC%A0%9C%EC%A1%B0%EA%B8%B0%EC%A4%80.png" alt="">
                                    </div>
                                </li>
                                <li class="inlineBlock">
                                    <div>
                                        <img src="/img/fda.png" alt="">
                                    </div>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>

<script>
$(function() {
    $("header").addClass("redHeader gradient");
});
</script>
<?php
include $_SERVER["DOCUMENT_ROOT"]."/include/footer.php";
?>