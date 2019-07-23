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
                        <li class="table foldable fold">
                            <h4>영양 성분</h4>
                            <ul class="nutrientChart">
                                <li style="width: calc((20 / 45) * 100%);">탄수화물 <span>44.4</span>%</li>
                                <li style="width: calc((5 / 45) * 100%);">당류 <span>11.1</span>%</li>
                                <li style="width: calc((13 / 45) * 100%);">식이섬유 <span>28.8</span>%</li>
                                <li style="width: calc((7 / 45) * 100%);">단백질 <span>15</span>%</li>
<!--
                                <li>탄수화물 <span></span>%</li>
                                <li>당류 <span></span>%</li>
                                <li>식이섬유 <span></span>%</li>
                                <li>단백질 <span></span>%</li>
                                <li>지방 <span></span>%</li>
                                <li>포화지방 <span></span>%</li>
                                <li>트랜스지방 <span></span>%</li>
                                <li>콜레스테롤 <span></span>%</li>
-->
                            </ul>
                            <table>
                                <tr>
                                    <td class="td1">칼로리</td>
                                    <td colspan="2">78Kcal (45g)</td>
                                </tr>
                                <tr>
                                    <td class="td1">탄수화물</td>
                                    <td colspan="2">20g</td>
                                </tr>
                                <tr>
                                    <td class="td1">당류</td>
                                    <td colspan="2">5g</td>
                                </tr>
                                <tr>
                                    <td class="td1">식이섬유</td>
                                    <td colspan="2">13g</td>
                                </tr>
                                <tr>
                                    <td class="td1">단백질</td>
                                    <td colspan="2">7g</td>
                                </tr>
                                <tr>
                                    <td class="td1">지방</td>
                                    <td colspan="2">0g</td>
                                </tr>
                                <tr>
                                    <td class="td1">포화지방</td>
                                    <td colspan="2">0g</td>
                                </tr>
                                <tr>
                                    <td class="td1">트랜스지방</td>
                                    <td colspan="2">0g</td>
                                </tr>
                                <tr>
                                    <td class="td1">콜레스테롤</td>
                                    <td colspan="2">0g</td>
                                </tr>
                                <tr>
                                    <td class="td1" rowspan="8">비타민</td>
                                    <td class="td2">비타민A</td>
                                    <td class="td3">175µgRE(25%)</td>
                                </tr>
                                <tr>
                                    <td class="td2">비타민B1</td>
                                    <td class="td3">0.25mg(25%)</td>
                                </tr>
                                <tr>
                                    <td class="td2">비타민B2</td>
                                    <td class="td3">0.3mg(25%)</td>
                                </tr>
                                <tr>
                                    <td class="td2">비타민B6</td>
                                    <td class="td3">0.375mg(25%)</td>
                                </tr>
                                <tr>
                                    <td class="td2">비타민C</td>
                                    <td class="td3">25mg(25%)</td>
                                </tr>
                                <tr>
                                    <td class="td2">비타민E</td>
                                    <td class="td3">2.5mg(25%)</td>
                                </tr>
                                <tr>
                                    <td class="td2">나이아신</td>
                                    <td class="td3">3.25mgNE(25%)</td>
                                </tr>
                                <tr>
                                    <td class="td2">엽산</td>
                                    <td class="td3">62.5mg(25%)</td>
                                </tr>
                            </table>
                        </li>
                        <li class="table foldable fold">
                            <h4>기능성원료 성분</h4>
                            <table>
                                <tr>
                                    <td class="td1">
                                        가르시니아캄보지아<br>껍질추출물(HCA)
                                        <i class="fas fa-question-circle"></i>
                                    </td>
                                    <td>750mg</td>
                                </tr>
                                <tr>
                                    <td class="td1">
                                        공액리놀렌산(CLA)
                                        <i class="fas fa-question-circle"></i>
                                    </td>
                                    <td>1,400mg</td>
                                </tr>
                            </table>
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
            
            <div class="review"></div>
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