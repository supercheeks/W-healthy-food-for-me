<?php
include $_SERVER["DOCUMENT_ROOT"]."/include/db.php";
include $_SERVER["DOCUMENT_ROOT"]."/include/header.php";
?>
    <section id="sub" class="memberForm join">
        <div class="contents">
            <div class="w100">
                <div class="left inlineBlock">
                    <div class="contents">
                        <h2 class="font_EB"><span class="font_EB">헬푸미</span>와 함께하세요!</h2>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Itaque nobis accusamus et esse consequatur eius magnam</p>
                        <div class="account">
                            <p>이미 계정을 갖고계신가요?</p>
                            <a href="/page/member/login.php" class="button button-red button-red-hover">로그인</a>
                        </div>
                    </div>
                </div>
                <div class="right inlineBlock">
                    <h2 class="font_EB text-align-center">SIGN UP</h2>
                    <div class="joinOption">
                        <ul class="text-align-center display-none">
                            <li>
                                <p><img src="/img/logintonaver.jpg" alt="">
                                    네이버 아이디로 가입하기</p>
                            </li>
                            <li>
                                <p><img src="/img/logintokakao.jpg" alt="">
                                    카카오 아이디로 가입하기</p>
                            </li>
                            <li>
                                <p><img src="/img/logintogoogle.jpg" alt="">
                                    구글 아이디로 가입하기</p>
                            </li>
                            <li>헬푸미 가입하기</li>
                        </ul>
                    </div>
                    <form action="#">
                        <ul>
<!--
                            <li>
                                <label for="loginId">아이디</label>
                                <input type="text" placeholder="아이디를 입력하세요." id="loginId" class="input input-readonly" value="spcks2019@naver.com" readonly>
                                <p class="opacity-0 display-none">* 영문/숫자 조합 6~20자 이내</p>
                                <p class="opacity-0 display-none">* 영문/숫자 조합 6~20자 이내</p>
                            </li>
                            <li>
                                <label for="loginPw">비밀번호</label>
                                <input type="password" placeholder="비밀번호를 입력하세요." id="loginPw" class="input">
                                <p class="opacity-0 display-none">* 필수 정보입니다.</p>
                                <p class="opacity-0 display-none">* 영문/숫자/특수문자 조합 8~20자 이내</p>
                            </li>
-->
                            <li>
                                <label for="loginPw">닉네임</label>
                                <input type="text" placeholder="비밀번호를 입력하세요." id="loginPw" class="input">
                                <p class="opacity-0 display-none">* 필수 정보입니다.</p>
                                <p class="opacity-0 display-none">* 10자 이내</p>
                            </li>
                            <li>
                                <label for="#">성별</label>
                                <div class="gender">
                                    <label for="male" class="input-radio active">남성</label>
                                    <label for="female" class="input-radio">여성</label>
                                </div>
                                <input type="radio" name="gender" id="male" class="display-none">
                                <input type="radio" name="gender" id="female" class="display-none">
                                <p class="opacity-0 display-none">* 필수 정보입니다.</p>
                            </li>
                            <li>
                                <label for="loginPw">연령대</label>
                                <div class="age">
                                    <label for="age10" class="input-radio active">10대</label>
                                    <label for="age20" class="input-radio">20대</label>
                                    <label for="age30" class="input-radio">30대</label>
                                    <label for="age40" class="input-radio">40대 이상</label>
                                </div>
                                <input type="radio" name="age" id="age10" class="display-none">
                                <input type="radio" name="age" id="age20" class="display-none">
                                <input type="radio" name="age" id="age30" class="display-none">
                                <input type="radio" name="age" id="age40" class="display-none">
                                <input type="radio" name="age" id="age50" class="display-none">
                                <p class="opacity-0 display-none">* 필수 정보입니다.</p>
                            </li>
                            <li class="text-align-center">
                                <a href="#" class="button button-red button-red-hover loginBtn">회원가입</a>
                            </li>
                        </ul>
                    </form>
                </div>
            </div>
        </div>
    </section>
</div>



<script type='text/javascript'>
  //<![CDATA[
    // 사용할 앱의 JavaScript 키를 설정해 주세요.
    Kakao.init('9d37ad774cca96feda195bc3f59cca52');
    function loginWithKakao() {
      // 로그인 창을 띄웁니다.
      Kakao.Auth.login({
        success: function(authObj) {
          alert(JSON.stringify(authObj));
        },
        fail: function(err) {
          alert(JSON.stringify(err));
        }
      });
    };
  //]]>
function onSuccess(googleUser) {
  console.log('Logged in as: ' + googleUser.getBasicProfile().getName());
}
function onFailure(error) {
  console.log(error);
}
function renderButton() {
  gapi.signin2.render('googleSignIn', {
    'scope': 'profile email',
    'width': 240,
    'height': 35,
    'longtitle': false,
    'theme': 'white',
    'longtitle': true,
    'onsuccess': onSuccess,
    'onfailure': onFailure
  });
}
</script>
<script src="https://apis.google.com/js/platform.js?onload=renderButton" async defer></script>
<?php
include $_SERVER["DOCUMENT_ROOT"]."/include/footer.php";
?>