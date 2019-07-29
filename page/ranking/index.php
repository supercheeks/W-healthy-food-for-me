<?php
include $_SERVER["DOCUMENT_ROOT"]."/include/db.php";
include $_SERVER["DOCUMENT_ROOT"]."/include/subHeader.php";

$main = array();
$sub = array();

$sql = " select * from category order by main asc ";
$rs = $pdo -> prepare($sql);
$rs -> execute();
while($row = $rs -> fetch()) {
    if($row["sub"] == 0)
        $main[] = $row;
    else
        $sub[] = $row;
}
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