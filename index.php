<?php
include $_SERVER["DOCUMENT_ROOT"]."/include/db.php";
include $_SERVER["DOCUMENT_ROOT"]."/include/header.php";

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
    <section id="main">
        <div class="contents">
            <h2><span class="font_EB">헬푸미</span>가 원하시는 제품을 찾아드릴게요.</h2>
            <div class="search">
                <input id="word" placeholder= "입력하신 단어를 포함한 제품을 찾습니다.">
            </div>
            <div class="category">
                <ul class="w100">
                <?php
                foreach($main as $m) {    
                ?>
                    <li>
                        <div class="selectable" data-idx="<?php echo $m['main']; ?>">
                            <?php echo '<img src="/img/category'.$m['idx'].'.png" alt="category'.$m['idx'].'.png" title="'.$m['name'].'">';  ?>
                            <?php echo '<img src="/img/category'.$m['idx'].'_.png" alt="category'.$m['idx'].'_.png" title="'.$m['name'].'">';  ?>
                        </div>
                        <p><?php echo $m["name"]; ?></p>
                    </li>
                <?php
                }    
                ?>
                </ul>
            </div>
            <div class="price">
                <div class="slider"></div>
                <span class="minPrice">\10000</span>
                <span class="maxPrice">\90000</span>
            </div>
            <div class="tag">
                <ul>
                <?php
                foreach($sub as $s) {    
                ?>
                    <li class="hover_in_white selectable" data-main="<?php echo $s['main']; ?>"><?php echo $s["name"]; ?></li>
                <?php
                }    
                ?>
                </ul>
            </div>
            <div class="submit">
                <a href="#" class="hover_in_white">완료</a>
            </div>
        </div>
    </section>
</div>

<script>
$(function() {
    on(".category .selectable", "click", function() {
        $(".category .selectable").removeClass("selected");
        $(".tag .selectable").removeClass("selected").hide();
        $(".tag .selectable[data-main='"+ $(this).attr("data-idx") +"']").show();
    });
    
    on(".selectable", "click", function() {
        if($(this).hasClass("selected"))
            $(this).removeClass("selected");
        else
            $(this).addClass("selected");
    });
    
    $(".category .selectable").eq(0).click();
    
    var maxPrice = 100000;
    $(".price .slider").slider({
        range: true,
        min: 0,
        max: maxPrice,
        values: [10000, 90000],
        step: 5000,
        slide: function(event, ui) {
            var handleIdx = ui.handleIndex;
            var curValue = ui.value;
            var text;
            
            if(curValue == 0) text = "최소가격";
            else if(curValue == maxPrice) text = "최대가격";
            else text = "\\" + curValue;
            
            $(".price > span").eq(handleIdx).css({
                "left": "calc("+(curValue / maxPrice * 100)+"% - 9%)"
            }).text(text);
        }
    });
});
</script>
<?php
include $_SERVER["DOCUMENT_ROOT"]."/include/footer.php";
?>