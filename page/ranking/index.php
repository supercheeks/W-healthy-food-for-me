<?php
include $_SERVER["DOCUMENT_ROOT"]."/include/db.php";
include $_SERVER["DOCUMENT_ROOT"]."/include/function.php";
include $_SERVER["DOCUMENT_ROOT"]."/include/subHeader.php";

$main = array();
$sub = array();

$sql = " select * from category order by main asc, idx desc ";
$rs = $pdo -> prepare($sql);
$rs -> execute();
while($row = $rs -> fetch()) {
    if($row["sub"] == 0)
        $main[] = $row;
    else
        $sub[] = $row;
}

$product = array();
$sql = " select * from product order by rate desc limit 10 ";
$rs = $pdo -> prepare($sql);
$rs -> execute();
while($row = $rs -> fetch())
    $product[] = $row;
?>
<section id="sub" class="ranking">
    <div class="title">
       <div class="contents">
           <div class="w100 font_EB">RANKING</div>
       </div>
       <div class="cover gradient">&nbsp;</div>
    </div>
    <div class="contents searchList">
        <div class="w100">
            <div class="filter">
                <div class="search">
                    <input type="text" id="word" placeholder="입력한 단어가 포함 된 제품을 찾습니다.">
                </div>
                <div class="category">
                    <ul>
                    <?php
                    foreach($main as $m) {    
                    ?>
                        <li>
                            <div class="img">
                                <?php echo "<img src='/img/category".$m["idx"]."_.png' alt='category".$m["idx"]."_.png' title='".$m["name"]."'>"; ?>
                            </div>
                            <p><?php echo $m["name"]; ?></p>
                        </li>
                    <?php
                    }    
                    ?>
                    </ul>
                </div>
                <div class="price">&nbsp;</div>
                <div class="tag">
                    <ul>
                    <?php
                    foreach($sub as $s) {    
                    ?>
                        <li><?php echo $s["name"]; ?></li>
                    <?php
                    }    
                    ?>
                    </ul>
                </div>
                <div class="submit">
                    <a href="#">적용</a>
                </div>
            </div>
            <div class="list">
                <ul>
                <?php    
                foreach($product as $pKey => $p) {
                    $volume = parseStringToArray($p["volume"], 0);
                    $price = parseStringToArray($p["price"], 0);
                    $tag = parseStringToArray($p["tag"], 0);
                ?>
                    <li>
                        <div class="img gradientProduct">
                            <span><?php echo $pKey + 1; ?></span>
                            <img src="/img/product/<?php echo $p["image"]; ?>" alt="<?php echo $p["image"]; ?>" title="<?php echo $p["name"]; ?>">
                        </div>
                        <div class="contents">
                            <div class="left">
                                <h3>
                                    <span class="bar">&nbsp;</span>
                                    <span class="red font_EB"><?php echo $p["brand"]; ?></span>
                                    <a href="/page/ranking/view.php?idx=<?php echo $p["idx"]; ?>"><?php echo $p["name"]; ?></a>
                                </h3>
                                <p>
                                <?php
                                if($p["volume"] != "") {
                                    foreach($volume as $key => $v) {
                                        echo $v." - ".$price[$key];
                                        echo ($key == count($volume)) ? "" : " / ";
                                    }
                                } else echo "&nbsp;";
                                ?>
                                </p>
                                <ul class="tag">
                                <?php
                                if($p["tag"] != "") {
                                    foreach($tag as $tKey => $t) {
                                        $sql2 = " select name from tag where idx = ? ";
                                        $rs = $pdo -> prepare($sql2);
                                        $rs -> execute(array($t));
                                        $name = $rs -> fetchColumn();
                                        echo '<li class="tagWhite">'.$name.'</li>';    
                                    }
                                }
                                ?>
                                    
<!--
                                    <li class="tagWhite">배고플때</li>
                                    <li class="tagWhite">복숭아맛</li>
-->
                                </ul>
                            </div>
                            <div class="right">
                                <p>
                                    <i class="far fa-star"></i>
                                    <span><?php echo $p["rate"]; ?></span>
                                </p>
                                <p>
                                    <i class="far fa-heart"></i>
                                    <span>24</span>
                                </p>
                                <p>
                                    <i class="far fa-comment-alt"></i>
                                    <span>10</span>
                                </p>
                            </div>
                        </div>
                    </li>
                <?php
                }    
                ?>
<!--
                    <li>
                        <div class="img gradientProduct">
                            <span>1</span>
                            <img src="/img/product_test.png" alt="">
                        </div>
                        <div class="contents">
                            <div class="left">
                                <h3>
                                    <span class="bar">&nbsp;</span>
                                    <span class="red font_EB">인테이크</span>
                                    <a href="/page/ranking/view.php">맛있는 칼로리컷</a>
                                </h3>
                                <p>
                                    25g \2,500 / 50g \4,500
                                </p>
                                <ul class="tag">
                                    <li class="tagWhite">젤리</li>
                                    <li class="tagWhite">배고플때</li>
                                    <li class="tagWhite">복숭아맛</li>
                                </ul>
                            </div>
                            <div class="right">
                                <p>
                                    <i class="far fa-star"></i>
                                    <span>4.03</span>
                                </p>
                                <p>
                                    <i class="far fa-heart"></i>
                                    <span>24</span>
                                </p>
                                <p>
                                    <i class="far fa-comment-alt"></i>
                                    <span>10</span>
                                </p>
                            </div>
                        </div>
                    </li>
                    <li>
                        <div class="img gradientProduct">
                            <span>1</span>
                            <img src="/img/product_test.png" alt="">
                        </div>
                        <div class="contents">
                            <div class="left">
                                <h3>
                                    <span class="bar">&nbsp;</span>
                                    <span class="red font_EB">인테이크</span>
                                    <a href="/page/ranking/view.php">맛있는 칼로리컷</a>
                                </h3>
                                <p>
                                    25g \2,500 / 50g \4,500
                                </p>
                                <ul class="tag">
                                    <li class="tagWhite">젤리</li>
                                    <li class="tagWhite">배고플때</li>
                                    <li class="tagWhite">복숭아맛</li>
                                </ul>
                            </div>
                            <div class="right">
                                <p>
                                    <i class="far fa-star"></i>
                                    <span>4.03</span>
                                </p>
                                <p>
                                    <i class="far fa-heart"></i>
                                    <span>24</span>
                                </p>
                                <p>
                                    <i class="far fa-comment-alt"></i>
                                    <span>10</span>
                                </p>
                            </div>
                        </div>
                    </li>
                    <li>
                        <div class="img gradientProduct">
                            <span>1</span>
                            <img src="/img/product_test.png" alt="">
                        </div>
                        <div class="contents">
                            <div class="left">
                                <h3>
                                    <span class="bar">&nbsp;</span>
                                    <span class="red font_EB">인테이크</span>
                                    <a href="/page/ranking/view.php">맛있는 칼로리컷</a>
                                </h3>
                                <p>
                                    25g \2,500 / 50g \4,500
                                </p>
                                <ul class="tag">
                                    <li class="tagWhite">젤리</li>
                                    <li class="tagWhite">배고플때</li>
                                    <li class="tagWhite">복숭아맛</li>
                                </ul>
                            </div>
                            <div class="right">
                                <p>
                                    <i class="far fa-star"></i>
                                    <span>4.03</span>
                                </p>
                                <p>
                                    <i class="far fa-heart"></i>
                                    <span>24</span>
                                </p>
                                <p>
                                    <i class="far fa-comment-alt"></i>
                                    <span>10</span>
                                </p>
                            </div>
                        </div>
                    </li>
                    <li>
                        <div class="img gradientProduct">
                            <span>1</span>
                            <img src="/img/product_test.png" alt="">
                        </div>
                        <div class="contents">
                            <div class="left">
                                <h3>
                                    <span class="bar">&nbsp;</span>
                                    <span class="red font_EB">인테이크</span>
                                    <a href="/page/ranking/view.php">맛있는 칼로리컷</a>
                                </h3>
                                <p>
                                    25g \2,500 / 50g \4,500
                                </p>
                                <ul class="tag">
                                    <li class="tagWhite">젤리</li>
                                    <li class="tagWhite">배고플때</li>
                                    <li class="tagWhite">복숭아맛</li>
                                </ul>
                            </div>
                            <div class="right">
                                <p>
                                    <i class="far fa-star"></i>
                                    <span>4.03</span>
                                </p>
                                <p>
                                    <i class="far fa-heart"></i>
                                    <span>24</span>
                                </p>
                                <p>
                                    <i class="far fa-comment-alt"></i>
                                    <span>10</span>
                                </p>
                            </div>
                        </div>
                    </li>
                    <li>
                        <div class="img gradientProduct">
                            <span>1</span>
                            <img src="/img/product_test.png" alt="">
                        </div>
                        <div class="contents">
                            <div class="left">
                                <h3>
                                    <span class="bar">&nbsp;</span>
                                    <span class="red font_EB">인테이크</span>
                                    <a href="/page/ranking/view.php">맛있는 칼로리컷</a>
                                </h3>
                                <p>
                                    25g \2,500 / 50g \4,500
                                </p>
                                <ul class="tag">
                                    <li class="tagWhite">젤리</li>
                                    <li class="tagWhite">배고플때</li>
                                    <li class="tagWhite">복숭아맛</li>
                                </ul>
                            </div>
                            <div class="right">
                                <p>
                                    <i class="far fa-star"></i>
                                    <span>4.03</span>
                                </p>
                                <p>
                                    <i class="far fa-heart"></i>
                                    <span>24</span>
                                </p>
                                <p>
                                    <i class="far fa-comment-alt"></i>
                                    <span>10</span>
                                </p>
                            </div>
                        </div>
                    </li>
                    <li>
                        <div class="img gradientProduct">
                            <span>1</span>
                            <img src="/img/product_test.png" alt="">
                        </div>
                        <div class="contents">
                            <div class="left">
                                <h3>
                                    <span class="bar">&nbsp;</span>
                                    <span class="red font_EB">인테이크</span>
                                    <a href="/page/ranking/view.php">맛있는 칼로리컷</a>
                                </h3>
                                <p>
                                    25g \2,500 / 50g \4,500
                                </p>
                                <ul class="tag">
                                    <li class="tagWhite">젤리</li>
                                    <li class="tagWhite">배고플때</li>
                                    <li class="tagWhite">복숭아맛</li>
                                </ul>
                            </div>
                            <div class="right">
                                <p>
                                    <i class="far fa-star"></i>
                                    <span>4.03</span>
                                </p>
                                <p>
                                    <i class="far fa-heart"></i>
                                    <span>24</span>
                                </p>
                                <p>
                                    <i class="far fa-comment-alt"></i>
                                    <span>10</span>
                                </p>
                            </div>
                        </div>
                    </li>
                    <li>
                        <div class="img gradientProduct">
                            <span>1</span>
                            <img src="/img/product_test.png" alt="">
                        </div>
                        <div class="contents">
                            <div class="left">
                                <h3>
                                    <span class="bar">&nbsp;</span>
                                    <span class="red font_EB">인테이크</span>
                                    <a href="/page/ranking/view.php">맛있는 칼로리컷</a>
                                </h3>
                                <p>
                                    25g \2,500 / 50g \4,500
                                </p>
                                <ul class="tag">
                                    <li class="tagWhite">젤리</li>
                                    <li class="tagWhite">배고플때</li>
                                    <li class="tagWhite">복숭아맛</li>
                                </ul>
                            </div>
                            <div class="right">
                                <p>
                                    <i class="far fa-star"></i>
                                    <span>4.03</span>
                                </p>
                                <p>
                                    <i class="far fa-heart"></i>
                                    <span>24</span>
                                </p>
                                <p>
                                    <i class="far fa-comment-alt"></i>
                                    <span>10</span>
                                </p>
                            </div>
                        </div>
                    </li>
                    <li>
                        <div class="img gradientProduct">
                            <span>1</span>
                            <img src="/img/product_test.png" alt="">
                        </div>
                        <div class="contents">
                            <div class="left">
                                <h3>
                                    <span class="bar">&nbsp;</span>
                                    <span class="red font_EB">인테이크</span>
                                    <a href="/page/ranking/view.php">맛있는 칼로리컷</a>
                                </h3>
                                <p>
                                    25g \2,500 / 50g \4,500
                                </p>
                                <ul class="tag">
                                    <li class="tagWhite">젤리</li>
                                    <li class="tagWhite">배고플때</li>
                                    <li class="tagWhite">복숭아맛</li>
                                </ul>
                            </div>
                            <div class="right">
                                <p>
                                    <i class="far fa-star"></i>
                                    <span>4.03</span>
                                </p>
                                <p>
                                    <i class="far fa-heart"></i>
                                    <span>24</span>
                                </p>
                                <p>
                                    <i class="far fa-comment-alt"></i>
                                    <span>10</span>
                                </p>
                            </div>
                        </div>
                    </li>
                    <li>
                        <div class="img gradientProduct">
                            <span>1</span>
                            <img src="/img/product_test.png" alt="">
                        </div>
                        <div class="contents">
                            <div class="left">
                                <h3>
                                    <span class="bar">&nbsp;</span>
                                    <span class="red font_EB">인테이크</span>
                                    <a href="/page/ranking/view.php">맛있는 칼로리컷</a>
                                </h3>
                                <p>
                                    25g \2,500 / 50g \4,500
                                </p>
                                <ul class="tag">
                                    <li class="tagWhite">젤리</li>
                                    <li class="tagWhite">배고플때</li>
                                    <li class="tagWhite">복숭아맛</li>
                                </ul>
                            </div>
                            <div class="right">
                                <p>
                                    <i class="far fa-star"></i>
                                    <span>4.03</span>
                                </p>
                                <p>
                                    <i class="far fa-heart"></i>
                                    <span>24</span>
                                </p>
                                <p>
                                    <i class="far fa-comment-alt"></i>
                                    <span>10</span>
                                </p>
                            </div>
                        </div>
                    </li>
-->
                </ul>
            </div>
        </div>
    </div>
</section>

<script>
$(function() {
    on(".tag li", "click", function(e) {
        $(this).toggleClass("select");
    });
    
    on(".category .img", "click", function(e) {
        $(this).parents("li").toggleClass("select");
    });
});
</script>
<?php
include $_SERVER["DOCUMENT_ROOT"]."/include/footer.php";
?>