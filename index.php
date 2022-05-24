<!DOCTYPE html>
<html lang="kr" id="html">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="//cdn.chicken-moo.com/jquery/jquery-latest.js"></script>
    <script src="//cdn.chicken-moo.com/cookie.js"></script>
    <script src="//cdn.chicken-moo.com/sweetalert2/11.4.13/dist/sweetalert2.all.min.js"></script>
    <link rel="stylesheet" href="sweetalert2.css">
    <script src="/src/style.js"></script>
    <title>League Of Dimi [LOD]</title>
</head>
<body link="black" alink="black" vlink="black" class="bd">
    <div class="boxs">
        <div class=""><a href="./" class="title">League Of Dimi</a></div>
        <br>
        <div class="login-box">
          <form method="post" action="main">
            <input type="text" name="id" class="id input-hov" placeholder="디미고인 아이디" autocomplete="off" >
            <input type="password" name="pw" class="pw input-hov" placeholder="디미고인 비밀번호" autocomplete="off" >
            <input type="submit" class="btn" value="로그인">
          </form>
          <div class="join_div"><a href="/register" class="join">회원가입</a></div>
        </div>
    </div>
    <script src="/src/darkmode.js"></script>
    <script>
      $(window).load(() => {
        $('.id').focus();
      });
      try{
        let session = JSON.parse(decodeURI(atob(getCookie('lod'))));
        $('.id').val(session.id);
        $('.pw').val(session.pw);
        if($('.id').val() != '' && $('.pw').val() != ''){
          $('.btn').click();
        }
      }catch{}
    </script>
</body>
</html>
