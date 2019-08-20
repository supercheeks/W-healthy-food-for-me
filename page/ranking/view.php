<?php
include $_SERVER["DOCUMENT_ROOT"]."/include/db.php";
include $_SERVER["DOCUMENT_ROOT"]."/include/function.php";
include $_SERVER["DOCUMENT_ROOT"]."/include/subHeader.php";

$idx = (isset($_GET["idx"])) ? $_GET["idx"] : 0;

$sql =  " select ".
        "   p.name as name, ".
        "   p.idx as pIdx, ".
        "   p.image as image, ".
        "   p.tag as tag, ".
        "   p.contents as contents, ".
        "   p.functionalMaterial as functionalMaterial, ".
        "   p.volume as volume, ".
        "   p.numTimes as numTimes, ".
        "   p.price as price, ".
        "   p.certification as certification, ".
        "   b.name as brand, ".
        "   b.image as brandImage, ".
        "   n.intake as intake, ".
        "   n.kcal as kcal, ".
        "   n.carb as carb, ".
        "   n.sugar as sugar, ".
        "   n.dietaryFiber as dietaryFiber, ".
        "   n.protein as protein, ".
        "   n.fat as fat, ".
        "   n.satFat as satFat, ".
        "   n.transFat as transFat, ".
        "   n.cholesterol as cholesterol, ".
        "   n.vitamin as vitamin, ".
        "   n.mineral as mineral, ".
        "   n.Na as Na ".
        " from product as p ".
        " join brand as b ".
        "   on b.name = p.brand ".
        " join nutrient as n ".
        "   on n.FK_product = p.idx ".
        " where ".
        "   p.idx = ? ";
$products = $pdo -> prepare($sql);
$products -> execute(array($idx));
$product = $products -> fetch();

$tag = array();
$tags = parseStringToArray($product["tag"], 0);

foreach($tags as $t) {
    $sql = " select name from tag where idx = ? ";
    $rs = $pdo -> prepare($sql);
    $rs -> execute(array($t));
    $tag[] = $rs -> fetchColumn();
}

$functionalMaterials = parseStringToArray($product["functionalMaterial"], 1);

foreach($functionalMaterials as $fKey => $f) {
    $sql = " select name from functionalMaterial where idx = ? ";
    $rs = $pdo -> prepare($sql);
    $rs -> execute(array($f[0]));
    $row = $rs -> fetchColumn();
    $tag[] = $row;
    $functionalMaterials[$fKey][0] = $row;
}

$info = array();
$volume = parseStringToArray($product["volume"], 0);
$numTimes = parseStringToArray($product["numTimes"], 0);
$price = parseStringToArray($product["price"], 0);

foreach($volume as $key => $v) {
    $info[] = array(
        "volume" => $volume[$key],
        "numTimes" => $numTimes[$key],
        "price" => (isset($price[$key])) ? $price[$key] : NULL
    );
}

$vitamin = parseStringToArray($product["vitamin"], 1);
$mineral = parseStringToArray($product["mineral"], 1);

$warn = NULL;
$sql = " select * from warn where FK_product = ? ";
$warns = $pdo -> prepare($sql);
$warns -> execute(array( $idx ));
if($warns -> rowCount())
    $warn = $warns -> fetch();

$cert = array();
$certification = parseStringToArray($product["certification"], 0);

$sql = " select * from certification order by idx asc ";
$certs = $pdo -> prepare($sql);
$certs -> execute();
while($c = $certs -> fetch())
    $cert[] = $c;
?>
<section id="sub" class="rankingView">
    <div class="contents">
        <div class="w100">
            <div class="summary">
                <div class="inlineBlock left">
                    <div class="img gradientProduct">
                        <img src="/img/product/<?php echo $product["image"]; ?>" alt="<?php echo $product["image"]; ?>" title="<?php echo $product["name"]; ?>">
                    </div>
                    
                    <div class="brand">
                        <img src="/img/brand/<?php echo $product['brandImage']; ?>" alt="<?php echo $product['brandImage'];?>" title="<?php echo $product['brand']; ?>" class="inlineBlock">
                        <h3 class="inlineBlock font_B"><?php echo $product["brand"]; ?></h3>
                        <a href="/page/ranking/index.php?brand=<?php echo $product["brand"]; ?>" class="inlineBlock">자세히 보기</a>
                    </div>
                    
                    <ul class="tag">
                    <?php
                    foreach($tag as $t) {    
                    ?>
                        <li class="tagWhite inlineBlock"><?php echo $t; ?></li>
                    <?php
                    }
                    ?>
                    </ul>
                </div>
                
                <div class="inlineBlock right">
                    <h3>
                        <span class="red font_EB"><?php echo $product["brand"]; ?></span> <?php echo $product["name"]; ?>
                        <p>다이어트 보조제 > 소분류</p>
                    </h3>
                    <div><?php echo ($product["contents"] != "") ? $product["contents"] : "<p>등록 된 제품 소개가 없습니다.</p>"; ?></div>
                    <ul class="info">
                        <li>
                            <h4>용량 / 섭취횟수 / 가격</h4>
                        <?php
                        if($product["volume"] == "") {
                            echo "<p>등록 된 용량, 섭취횟수 및 가격 정보가 없습니다.</p>";
                        } else { 
                        ?>
                            <ul class="price">
                            <?php
                            foreach($info as $key => $i) {
                                $i["price"] = ($i["price"] == NULL) ? "-" : number_format($i["price"]);
                            ?>
                                <li>
                                    <label for="price<?php echo $key; ?>" class="inlineBlock">
                                        <?php echo $i["volume"]." / ".$i["numTimes"]; ?>
                                        <span><?php echo $i["price"]." 원"; ?></span>
                                    </label>
                                    <input type="radio" name="type" class="inlineBlock" id="price<?php echo $key; ?>" <?php echo ($key == 0) ? "checked" : ""; ?>>
                                </li>
                            <?php
                            }        
                            ?>
                            </ul>
                            <div>
                                <a href="https://search.shopping.naver.com/search/all.nhn?query=<?php echo $product["name"]; ?>" class="naver_link" target="_blank">네이버 비교가 확인하기</a>
                            </div>
                        <?php
                        }    
                        ?>
                        </li>
                        <li class="table">
                            <h4>영양 성분</h4>
                        <?php
                        if($product["intake"] == "") {
                            echo "<p>등록 된 영양 정보가 없습니다.</p>";
                        } else {  
                        ?>
                            <table>
                                <tr>
                                    <td class="td1">칼로리<br><span style="color:#777;"><?php echo $product["intake"]; ?>기준</span></td>
                                    <td colspan="2"><?php echo $product["kcal"]; ?></td>    
                                </tr>
                                <tr>
                                    <td class="td1">탄수화물</td>
                                    <td colspan="2"><?php echo ($product["carb"] != NULL) ? $product["carb"] : "-"; ?></td>
                                </tr>
                                <tr>
                                    <td class="td1">당류</td>
                                    <td colspan="2"><?php echo ($product["sugar"] != NULL) ? $product["sugar"] : "-"; ?></td>
                                </tr>
                                <tr>
                                    <td class="td1">식이섬유</td>
                                    <td colspan="2"><?php echo ($product["dietaryFiber"] != NULL) ? $product["dietaryFiber"] : "-"; ?></td>
                                </tr>
                                <tr>
                                    <td class="td1">단백질</td>
                                    <td colspan="2"><?php echo ($product["protein"] != NULL) ? $product["protein"] : "-"; ?></td>
                                </tr>
                                <tr>
                                    <td class="td1">지방</td>
                                    <td colspan="2"><?php echo ($product["fat"] != NULL) ? $product["fat"] : "-"; ?></td>
                                </tr>
                                <tr>
                                    <td class="td1">포화지방</td>
                                    <td colspan="2"><?php echo ($product["satFat"] != NULL) ? $product["satFat"] : "-"; ?></td>
                                </tr>
                                <tr>
                                    <td class="td1">트랜스지방</td>
                                    <td colspan="2"><?php echo ($product["transFat"] != NULL) ? $product["transFat"] : "-"; ?></td>
                                </tr>
                                <tr>
                                    <td class="td1">콜레스테롤</td>
                                    <td colspan="2"><?php echo ($product["cholesterol"] != NULL) ? $product["cholesterol"] : "-"; ?></td>
                                </tr>
                            <?php
                            if(isset($vitamin[0][0])) {
                                foreach($vitamin as $key => $v) {
                            ?>
                                <tr>
                                    <?php echo ($key == 0) ? '<td class="td1" rowspan="'.count($vitamin).'">비타민</td>' : ''; ?>
                                    <td class="td2"><?php echo $v[0]; ?></td>
                                    <td class="td3"><?php echo $v[1]; ?></td>
                                </tr>
                            <?php
                                }
                            ?>
                            <?php
                            }
                            
                            if(isset($mineral[0][0])) {
                                foreach($mineral as $m) {
                            ?>
                                    <tr>
                                        <td class="td2"><?php echo $m[0]; ?></td>
                                        <td class="td3"><?php echo $m[1]; ?></td>
                                    </tr>
                            <?php
                                }
                            }    
                            ?>
                            </table>
                        <?php
                        }    
                        ?>
                        </li>
                        <li class="table FM">
                            <h4>기능성원료 성분</h4>
                        <?php
                        if($product["intake"] == "") {
                            echo "<p>등록 된 기능성원료 정보가 없습니다.</p>";
                        } else {
                        ?>
                            <table>
                            <?php  
                            foreach($functionalMaterials as $f) {
                            ?>
                                <tr>
                                    <td class="td1" data-name="<?php echo $f[0]; ?>">
                                        <?php echo $f[0]; ?>
                                        <i class="fas fa-question-circle"></i>
                                    </td>
                                    <td><?php echo (isset($f[1])) ? $f[1] : "-"; ?></td>
                                </tr>
                            <?php
                            }    
                            ?>
                            </table>
                        <?php
                        }
                        ?>
                        </li>
                        <li class="icon">
                            <h4>주의사항</h4>
                        <?php
                        if($product["intake"] != "") {    
                        ?>
                            <ul class="list">
                                <li class="inlineBlock <?php echo ($warn["allergie"] != "") ? "active" : ""; ?>">
                                    <div>
                                        <img src="/img/allergy.png" alt="">
                                    </div>
                                    <p>알러지 주의</p>
                                </li>
                                <li class="inlineBlock <?php echo ($warn["disease"] != "") ? "active" : ""; ?>">
                                    <div>
                                        <img src="/img/allergy.png" alt="">
                                    </div>
                                    <p>특정 질환 주의</p>
                                </li>
                                <li class="inlineBlock <?php echo ($warn["medicine"] != "") ? "active" : ""; ?>">
                                    <div>
                                        <img src="/img/medicine.png" alt="">
                                    </div>
                                    <p>의약품 섭취 주의</p>
                                </li>
                                <li class="inlineBlock <?php echo ($warn["pregnancy"]) ? "active" : ""; ?>">
                                    <div>
                                        <img src="/img/allergy.png" alt="">
                                    </div>
                                    <p>임산부/수유 주의</p>
                                </li>
                                <li class="inlineBlock <?php echo ($warn["child"]) ? "active" : ""; ?>">
                                    <div>
                                        <img src="/img/allergy.png" alt="">
                                    </div>
                                    <p>영유아/어린이<br>섭취 주의</p>
                                </li>
                                <li class="inlineBlock <?php echo ($warn["eldern"]) ? "active" : ""; ?>">
                                    <div>
                                        <img src="/img/allergy.png" alt="">
                                    </div>
                                    <p>고령자 섭취 주의</p>
                                </li>
                                <li class="inlineBlock <?php echo ($warn["sideEffect"] != "") ? "active" : ""; ?>">
                                    <div>
                                        <img src="/img/allergy.png" alt="">
                                    </div>
                                    <p>부작용</p>
                                </li>
                            </ul>
                        <?php
                        } else echo "<p>등록 된 주의사항 정보가 없습니다.</p>";    
                        ?>
                        </li>
                        <li>
                            <h4>인증</h4>
                        <?php
                        if($product["intake"] == "") {
                            echo "<p>등록 된 인증 정보가 없습니다.</p>";
                        } else {      
                        ?>
                            <ul class="list">
                            <?php
                            foreach($cert as $c) {
                            ?>
                                <li class="inlineBlock <?php echo (in_array($c["idx"], $certification)) ? "active": ""; ?>">
                                    <div>
                                        <img src="/img/certification/<?php echo $c["name"]; ?>.png" alt="<?php echo $c["name"].".png"; ?>" title="<?php echo $c["name"]; ?>">
                                    </div>
                                </li>
                            <?php
                            }    
                            ?>
                            </ul>
                        <?php
                        }
                        ?>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="review">
                <div class="left inlineBlock">
                    <div class="title">
                        <h4>
                            <i class="fas fa-filter inlineBlock"></i>
                            필터
                        </h4>
                        <p>
                            <i class="fas fa-retweet inlineBlock"></i>
                            <span>초기화</span>
                        </p>
                    </div>
                    
                    <ul>
                        <li>
                            <h5>성별</h5>
                            <ul>
                                <li class="tagGray">남성</li>
                                <li class="tagGray">여성</li>
                            </ul>
                        </li>
                        <li>
                            <h5>나이</h5>
                            <ul>
                                <li class="tagGray">10대</li>
                                <li class="tagGray">20대</li>
                                <li class="tagGray">30대</li>
                                <li class="tagGray">40대 이상</li>
                            </ul>
                        </li>
                        <li>
                            <h5>목적</h5>
                            <ul>
                                <li class="tagGray">다이어트</li>
                                <li class="tagGray">체력증진</li>
                                <li class="tagGray">근육증가</li>
                            </ul>
                        </li>
                        <li>
                            <h5>출처</h5>
                            <ul>
                                <li class="tagGray">헬푸미</li>
                                <li class="tagGray">블로그</li>
                                <li class="tagGray">오픈마켓</li>
                            </ul>
                        </li>
                    </ul>
                    <div class="submit">
                        <a href="#">적용</a>
                    </div>
                </div>
                
                <div class="right inlineBlock">
                    <div class="rating">
                        <h4>
                            평점
                            <span class="starRating">
                                <i class="fas fa-star inlineBlock"></i> 
                                4.7/5.0
                            </span>
                        </h4>
                        <ul class="reviewRating">
                            <li class="inlineBlock top">
                                <div class="title">
                                    <h5>휴대성</h5>
                                    <span>4.5</span>
                                </div>
                                <div class="bar">
                                    <div>&nbsp;</div>
                                </div>
                            </li>
                            <li class="inlineBlock top">
                                <div class="title">
                                    <h5>휴대성</h5>
                                    <span>4.5</span>
                                </div>
                                <div class="bar">
                                    <div>&nbsp;</div>
                                </div>
                            </li>
                            <li class="inlineBlock">
                                <div class="title">
                                    <h5>휴대성</h5>
                                    <span>4.5</span>
                                </div>
                                <div class="bar">
                                    <div>&nbsp;</div>
                                </div>
                            </li>
                            <li class="inlineBlock">
                                <div class="title">
                                    <h5>휴대성</h5>
                                    <span>4.5</span>
                                </div>
                                <div class="bar">
                                    <div>&nbsp;</div>
                                </div>
                            </li>
                            <li class="inlineBlock">
                                <div class="title">
                                    <h5>휴대성</h5>
                                    <span>4.5</span>
                                </div>
                                <div class="bar">
                                    <div>&nbsp;</div>
                                </div>
                            </li>
                            <li class="inlineBlock">
                                <div class="title">
                                    <h5>휴대성</h5>
                                    <span>4.5</span>
                                </div>
                                <div class="bar">
                                    <div>&nbsp;</div>
                                </div>
                            </li>
                        </ul>
                    </div>
                    
                    <div class="reviewList">
                        <div>
                            <h4>리뷰</h4>
                            <a href="/page/review/write.php">후기작성</a>
                            <select name="#" id="order">
                                <option value="wdate desc">최신순</option>
                                <option value="wdate asc">오래된 순</option>
                                <option value="like desc">좋아요▲</option>
                                <option value="like desc">좋아요▼</option>
                            </select>
                        </div>
                        
                        <ul>
                            <li class="naver">
                                <div class="profile">
                                    <div class="profileImage inlineBlock backImage" style="background:url('/img/naver.jpg');">&nbsp;</div>
                                    <div class="profileInfo inlineBlock">
                                        <p>sina****</p>
                                        <ul>
                                            <li class="tagWhite">20대</li>
                                            <li class="tagWhite">여성</li>
                                            <li class="tagWhite">다이어트</li>
                                        </ul>
                                        <span>2017.10.03</span>
                                    </div>
                                </div>
                                
                                <div class="image">
                                    <ul>
                                        <li style="background:url('https://scontent-iad3-1.cdninstagram.com/vp/c8e8c208b37819522366e59c63c50281/5D93BD6E/t51.2885-15/e35/c0.135.1080.1080a/s320x320/51163646_185738289072942_5747059737967790354_n.jpg?_nc_ht=scontent-iad3-1.cdninstagram.com');" class="inlineBlock backImage">&nbsp;</li>
                                        <li style="background:url('https://mblogthumb-phinf.pstatic.net/MjAxODAyMThfODYg/MDAxNTE4OTE2MDYwNDEy.q_kkAu-WqWFGuWntrhC2AfMKKzDkRAmoecqGD4UNEYUg.mzt85P_AlSXpHdQO7U6pnqyQna5hY5XVEsXe1E4B1igg.JPEG.ofagirl/20180214_165426.jpg?type=w800');" class="inlineBlock backImage">&nbsp;</li>
                                        <li style="background:url('https://mblogthumb-phinf.pstatic.net/MjAxODAyMThfMTU1/MDAxNTE4OTE2MDU5MTgy.QWQ-RkFOuoCnvB_eK1PmuQLNIbFV4UuiTum4VsYiga0g.Vzc259Wqifnj333UIOcV7u7udGXCQJz5nMwKpzh_2S0g.JPEG.ofagirl/20180214_165420.jpg?type=w800');" class="inlineBlock backImage">&nbsp;</li>
                                    </ul>
                                </div>
                                
                                <p>튼튼한 상자에 담겨온 스파우트 파우치 포장의 글램디 워터젤리. 따로 어디 덜어서 먹거나 하지 않아도 돼서 귀차니즘도 없고 설거지 걱정도 없이...</p>
                                
                                <div class="ref">
                                    네이버 블로그에서 작성 된 글입니다.
                                    <a href="#" class="naver_link_white">출처 바로가기</a>
                                </div>
                            </li>
                            <li>
                                <div class="profile">
                                    <div class="profileImage inlineBlock">&nbsp;</div>
                                    <div class="profileInfo inlineBlock">
                                        <p>
                                            익명의 담비
                                            <span class="starRating">
                                                <i class="fas fa-star inlineBlock"></i> 
                                                4.7/5.0
                                            </span>
                                        </p>
                                        <ul>
                                            <li class="tagWhite">20대</li>
                                            <li class="tagWhite">여성</li>
                                        </ul>
                                        <span>1일전</span>
                                    </div>
                                </div>
                                
                                <div class="image">
                                    <ul>
                                        <li style="background:url('https://scontent-iad3-1.cdninstagram.com/vp/c8e8c208b37819522366e59c63c50281/5D93BD6E/t51.2885-15/e35/c0.135.1080.1080a/s320x320/51163646_185738289072942_5747059737967790354_n.jpg?_nc_ht=scontent-iad3-1.cdninstagram.com');" class="inlineBlock backImage">&nbsp;</li>
                                        <li style="background:url('https://mblogthumb-phinf.pstatic.net/MjAxODAyMThfODYg/MDAxNTE4OTE2MDYwNDEy.q_kkAu-WqWFGuWntrhC2AfMKKzDkRAmoecqGD4UNEYUg.mzt85P_AlSXpHdQO7U6pnqyQna5hY5XVEsXe1E4B1igg.JPEG.ofagirl/20180214_165426.jpg?type=w800');" class="inlineBlock backImage">&nbsp;</li>
                                        <li style="background:url('https://mblogthumb-phinf.pstatic.net/MjAxODAyMThfMTU1/MDAxNTE4OTE2MDU5MTgy.QWQ-RkFOuoCnvB_eK1PmuQLNIbFV4UuiTum4VsYiga0g.Vzc259Wqifnj333UIOcV7u7udGXCQJz5nMwKpzh_2S0g.JPEG.ofagirl/20180214_165420.jpg?type=w800');" class="inlineBlock backImage">&nbsp;</li>
                                    </ul>
                                </div>
                                
                                <p>
                                    <span>한줄평</span>
                                    간편하고 맛있어요!
                                </p>
                                <ul class="reviewRating">
                                    <li class="inlineBlock top">
                                        <div class="title">
                                            <h5>휴대성</h5>
                                            <span>4.5</span>
                                        </div>
                                        <div class="bar">
                                            <div>&nbsp;</div>
                                        </div>
                                    </li>
                                    <li class="inlineBlock top">
                                        <div class="title">
                                            <h5>휴대성</h5>
                                            <span>4.5</span>
                                        </div>
                                        <div class="bar">
                                            <div>&nbsp;</div>
                                        </div>
                                    </li>
                                    <li class="inlineBlock">
                                        <div class="title">
                                            <h5>휴대성</h5>
                                            <span>4.5</span>
                                        </div>
                                        <div class="bar">
                                            <div>&nbsp;</div>
                                        </div>
                                    </li>
                                    <li class="inlineBlock">
                                        <div class="title">
                                            <h5>휴대성</h5>
                                            <span>4.5</span>
                                        </div>
                                        <div class="bar">
                                            <div>&nbsp;</div>
                                        </div>
                                    </li>
                                    <li class="inlineBlock">
                                        <div class="title">
                                            <h5>휴대성</h5>
                                            <span>4.5</span>
                                        </div>
                                        <div class="bar">
                                            <div>&nbsp;</div>
                                        </div>
                                    </li>
                                    <li class="inlineBlock">
                                        <div class="title">
                                            <h5>휴대성</h5>
                                            <span>4.5</span>
                                        </div>
                                        <div class="bar">
                                            <div>&nbsp;</div>
                                        </div>
                                    </li>
                                </ul>
                            </li>
                            <li>
                                <div class="profile">
                                    <div class="profileImage inlineBlock">&nbsp;</div>
                                    <div class="profileInfo inlineBlock">
                                        <p>
                                            익명의 공룡
                                            <span class="starRating">
                                                <i class="fas fa-star inlineBlock"></i> 
                                                4.7/5.0
                                            </span>
                                        </p>
                                        <ul>
                                            <li class="tagWhite">20대</li>
                                            <li class="tagWhite">여성</li>
                                        </ul>
                                        <span>1일전</span>
                                    </div>
                                </div>
                                
                                <p>
                                    <span>한줄평</span>
                                    간편하고 맛있어요!
                                </p>
                                <ul class="reviewRating">
                                    <li class="inlineBlock top">
                                        <div class="title">
                                            <h5>휴대성</h5>
                                            <span>4.5</span>
                                        </div>
                                        <div class="bar">
                                            <div>&nbsp;</div>
                                        </div>
                                    </li>
                                    <li class="inlineBlock top">
                                        <div class="title">
                                            <h5>휴대성</h5>
                                            <span>4.5</span>
                                        </div>
                                        <div class="bar">
                                            <div>&nbsp;</div>
                                        </div>
                                    </li>
                                    <li class="inlineBlock">
                                        <div class="title">
                                            <h5>휴대성</h5>
                                            <span>4.5</span>
                                        </div>
                                        <div class="bar">
                                            <div>&nbsp;</div>
                                        </div>
                                    </li>
                                    <li class="inlineBlock">
                                        <div class="title">
                                            <h5>휴대성</h5>
                                            <span>4.5</span>
                                        </div>
                                        <div class="bar">
                                            <div>&nbsp;</div>
                                        </div>
                                    </li>
                                    <li class="inlineBlock">
                                        <div class="title">
                                            <h5>휴대성</h5>
                                            <span>4.5</span>
                                        </div>
                                        <div class="bar">
                                            <div>&nbsp;</div>
                                        </div>
                                    </li>
                                    <li class="inlineBlock">
                                        <div class="title">
                                            <h5>휴대성</h5>
                                            <span>4.5</span>
                                        </div>
                                        <div class="bar">
                                            <div>&nbsp;</div>
                                        </div>
                                    </li>
                                </ul>
                            </li>
                            <li>
                                <div class="profile">
                                    <div class="profileImage inlineBlock">&nbsp;</div>
                                    <div class="profileInfo inlineBlock">
                                        <p>
                                            익명의 여우
                                            <span class="starRating">
                                                <i class="fas fa-star inlineBlock"></i> 
                                                4.7/5.0
                                            </span>
                                        </p>
                                        <ul>
                                            <li class="tagWhite">20대</li>
                                            <li class="tagWhite">여성</li>
                                        </ul>
                                        <span>1일전</span>
                                    </div>
                                </div>
                                
                                <p>
                                    <span>한줄평</span>
                                    간편하고 맛있어요!
                                </p>
                                <ul class="reviewRating">
                                    <li class="inlineBlock top">
                                        <div class="title">
                                            <h5>휴대성</h5>
                                            <span>4.5</span>
                                        </div>
                                        <div class="bar">
                                            <div>&nbsp;</div>
                                        </div>
                                    </li>
                                    <li class="inlineBlock top">
                                        <div class="title">
                                            <h5>휴대성</h5>
                                            <span>4.5</span>
                                        </div>
                                        <div class="bar">
                                            <div>&nbsp;</div>
                                        </div>
                                    </li>
                                    <li class="inlineBlock">
                                        <div class="title">
                                            <h5>휴대성</h5>
                                            <span>4.5</span>
                                        </div>
                                        <div class="bar">
                                            <div>&nbsp;</div>
                                        </div>
                                    </li>
                                    <li class="inlineBlock">
                                        <div class="title">
                                            <h5>휴대성</h5>
                                            <span>4.5</span>
                                        </div>
                                        <div class="bar">
                                            <div>&nbsp;</div>
                                        </div>
                                    </li>
                                    <li class="inlineBlock">
                                        <div class="title">
                                            <h5>휴대성</h5>
                                            <span>4.5</span>
                                        </div>
                                        <div class="bar">
                                            <div>&nbsp;</div>
                                        </div>
                                    </li>
                                    <li class="inlineBlock">
                                        <div class="title">
                                            <h5>휴대성</h5>
                                            <span>4.5</span>
                                        </div>
                                        <div class="bar">
                                            <div>&nbsp;</div>
                                        </div>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!--<div class="dialog displayNone"></div>-->

<script>
$(function() {
    $("header").addClass("redHeader gradient");
    
    on(".foldable h4", "click", function() {
        $(this).parents(".foldable").toggleClass("fold");
    });
    
    on(".FM .td1", "click", function() {
        var FMName = $(this).data("name");
        
        $.ajax({
            type: "post",
            url: "/page/ranking/findFM.php",
            data: {
                name: FMName
            },
            success: function(result) {
                result = result.trim();
                if(result == "") return;
                $(result).dialog({
                    modal: true,
                    draggable: false,
                    resizable: false,
                    width: 600,
                    show: {
                        effect: "drop",
                        duration: "slow"
                    },
                    hide: {
                        effect: "drop",
                        duration: "slow"
                    }
                });
            }
        });
    });
    
    on(".dialog button", "click", function() {
        $(this).parents(".dialog").dialog("close");
    });
});
</script>
<?php
include $_SERVER["DOCUMENT_ROOT"]."/include/footer.php";
?>