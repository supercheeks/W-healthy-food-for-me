<?php
include $_SERVER["DOCUMENT_ROOT"]."/include/db.php";
include $_SERVER["DOCUMENT_ROOT"]."/include/subHeader.php";
?>
<section id="sub" class="event">
    <div class="title" style="background:url('https://images.pexels.com/photos/221361/pexels-photo-221361.jpeg?cs=srgb&dl=art-balloons-birthday-221361.jpg&fm=jpg'); background-size:cover; background-position:center;">
       <div class="contents">
           <div class="w100 font_EB">EVENT</div>
       </div>
       <div class="cover gradient">&nbsp;</div>
    </div>
    <div class="contents">
        <div class="w100">
           <div class="list">
              <?php 
                $sql = " select * from event order by wdate desc";
                $save = $pdo -> prepare($sql);
                $save -> execute();
               
                while($event = $save->fetch()){
               ?>
               <div class="item inlineBlock">
                    <a href="/page/event/view.php?idx=<?php echo $event['idx']; ?>" class="inlineBlock"><img src="<?php echo $event['thumbnail']; ?>" alt=""></a>
                    <div>
                        <a href="/page/event/view.php?idx=<?php echo $event['idx']; ?>" class="inlineBlock"><?php echo $event['title']; ?></a>
                        <div class="inlineBlock"><?php echo $event['wdate']; ?></div>
                    </div>    
                </div>
                <?php 
                }
               ?>
                <div>
                    <a href="/page/event/write.php">글쓰기</a>    
                </div>
           </div>
        </div>
    </div>
</section>
<?php
include $_SERVER["DOCUMENT_ROOT"]."/include/footer.php";
?>