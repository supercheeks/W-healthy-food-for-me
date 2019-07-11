<?php
include $_SERVER["DOCUMENT_ROOT"]."/include/db.php";
include $_SERVER["DOCUMENT_ROOT"]."/include/header.php";
?>
<section>
    <div class="contents">
        <h2><span class="font_EB">헬푸미</span>가 원하시는 제품을 찾아드릴게요.</h2>
        <div class="search">
            <input id="word" placeholder= "입력하신 단어를 포함한 제품을 찾습니다.">
        </div>
        <div class="category">
            <ul class="w100">
                <li>
                    <div class="selectable">
                        <img src="/img/icon1.png" alt="" title="">
                        <img src="/img/icon1_.png" alt="" title="">
                    </div>
                    <p>건강 간식</p>
                </li>
                <li>
                    <div class="selectable">
                        <img src="/img/icon2.png" alt="" title="">
                        <img src="/img/icon2_.png" alt="" title="">
                    </div>
                    <p>건강 대용식</p>
                </li>
                <li>
                    <div class="selectable">
                        <img src="/img/icon3.png" alt="" title="">
                        <img src="/img/icon3_.png" alt="" title="">
                    </div>
                    <p>다이어트 보조제</p>
                </li>
                <li>
                    <div class="selectable">
                        <img src="/img/icon4.png" alt="" title="">
                        <img src="/img/icon4_.png" alt="" title="">
                    </div>
                    <p>헬스 보충제</p>
                </li>
                <li>
                    <div class="selectable">
                        <img src="/img/icon5.png" alt="" title="">
                        <img src="/img/icon5_.png" alt="" title="">
                    </div>
                    <p>기타 건강식품</p>
                </li>
            </ul>
        </div>
        <div class="price">
            <div class="slider"></div>
            <span class="minPrice">\10000</span>
            <span class="maxPrice">\90000</span>
        </div>
        <div class="tag">
            <ul>
                <li class="hover_in_white selectable">체지방 감소</li>
                <li class="hover_in_white selectable">항산화 작용</li>
                <li class="hover_in_white selectable">간 건강</li>
                <li class="hover_in_white selectable">아토피</li>
                <li class="hover_in_white selectable">갱년기</li>
                <li class="hover_in_white selectable">근육량 증가</li>
                <li class="hover_in_white selectable">혈당 조절</li>
            </ul>
        </div>
        <div class="submit">
            <a href="#" class="hover_in_white">완료</a>
        </div>
    </div>
</section>

<script>
$(function() {
    on(".selectable", "click", function() {
        if($(this).hasClass("selected"))
            $(this).removeClass("selected");
        else
            $(this).addClass("selected");
    });
    
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