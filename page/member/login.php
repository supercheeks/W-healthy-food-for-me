<?php
include $_SERVER["DOCUMENT_ROOT"]."/include/db.php";
include $_SERVER["DOCUMENT_ROOT"]."/include/header.php";
?>
    <section id="sub" class="login">
        <div class="contents">
            <div class="w100">
                <div class="left inlineBlock">
                    <div class="contents">
                        <h2 class="font_EB"><span class="font_EB">헬푸미</span>와 함께하세요!</h2>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Itaque nobis accusamus et esse consequatur eius magnam</p>
                        <div class="account">
                            <p>아직 계정이 없으신가요?</p>
                            <a href="#" class="button button-red">계정 생성</a>
                        </div>
                    </div>
                </div>
                <div class="right inlineBlock">
                    <h2>SIGN IN</h2>
                    <form action="#">
                        <ul>
                            <li>
                                <label for="loginId">아이디</label>
                                <input type="text" placeholder="아이디를 입력하세요." id="loginId">
                            </li>
                            <li>
                                <label for="loginPw">비밀번호</label>
                                <input type="password" placeholder="비밀번호를 입력하세요." id="loginPw">
                            </li>
                            <li>
                                <a href="#" class="button button-red">로그인</a>
                            </li>
                        </ul>
                    </form>
                    <div class="socialAPI">
                        <p>소셜 계정으로 간편하게 로그인 하세요!</p>
                        <ul>
                            <li class="inlineBlock">&nbsp;</li>
                            <li class="inlineBlock">&nbsp;</li>
                            <li class="inlineBlock">&nbsp;</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
<?php
include $_SERVER["DOCUMENT_ROOT"]."/include/footer.php";
?>