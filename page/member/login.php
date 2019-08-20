<?php
include $_SERVER["DOCUMENT_ROOT"]."/include/db.php";
include $_SERVER["DOCUMENT_ROOT"]."/include/header.php";
?>
    <section id="sub" class="memberForm login">
        <div class="contents">
            <div class="w100">
                <div class="left inlineBlock">
                    <div class="contents">
                        <h2 class="font_EB"><span class="font_EB">헬푸미</span>와 함께하세요!</h2>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Itaque nobis accusamus et esse consequatur eius magnam</p>
                        <div class="account">
                            <p>아직 계정이 없으신가요?</p>
                            <a href="/page/member/join.php" class="button button-red button-red-hover">회원 가입</a>
                        </div>
                    </div>
                </div>
                <div class="right inlineBlock">
                    <h2 class="font_EB text-align-center">SIGN IN</h2>
                    <form action="#">
                        <ul>
                            <li>
                                <label for="loginId">아이디</label>
                                <input type="text" placeholder="아이디를 입력하세요." id="loginId" class="input">
                            </li>
                            <li>
                                <label for="loginPw">비밀번호</label>
                                <input type="password" placeholder="비밀번호를 입력하세요." id="loginPw" class="input">
                                <p>
                                    비밀번호를 잊으셨나요?
                                    <a href="#" class="red findPw">비밀번호 찾기</a>
                                </p>
                            </li>
                            <li class="text-align-center">
                                <a href="#" class="button button-red button-red-hover loginBtn">로그인</a>
                            </li>
                        </ul>
                    </form>
                    <div class="socialAPI text-align-center">
                        <p>소셜 계정으로 간편하게 <span class="font_B">로그인</span> 하세요!</p>
                        <ul>
                            <li class="inlineBlock">
                                <img src="/img/naver_loginAPI.png" alt="">
                            </li>
                            <li class="inlineBlock">
                                <a id="custom-login-btn" href="javascript:loginWithKakao()">
                                    <img src="/img/kakaolink_btn_small.png">
                                </a>
<!--                                <a href="http://developers.kakao.com/logout"></a>-->
                            </li>
                            <li class="inlineBlock" id="googleSignIn" data-onsuccess="onSignIn"></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>



<script type='text/javascript'>
$(function() {
    $(".memberForm .left").height($(".memberForm .w100").height());
});
    
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
    'width': 35,
    'height': 35,
    'longtitle': false,
    'theme': 'white',
    'onsuccess': onSuccess,
    'onfailure': onFailure
  });
}
</script>
<script src="https://apis.google.com/js/platform.js?onload=renderButton" async defer></script>
<?php
include $_SERVER["DOCUMENT_ROOT"]."/include/footer.php";
?>