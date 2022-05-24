<!DOCTYPE html>
<html lang="kr" id="html">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="//cdn.chicken-moo.com/jquery/jquery-latest.js"></script>
    <script src="/src/style.js"></script>
    <script src="//cdn.chicken-moo.com/sweetalert2/11.4.13/dist/sweetalert2.all.min.js"></script>
    <script src="//cdn.chicken-moo.com/cookie.js"></script>
    <link rel="stylesheet" href="sweetalert2.css">
    <title>League Of Dimi - 회원가입</title>
</head>
<body link="black" alink="black" vlink="black" class="bd">
    <div class="box">
        <div class=""><a href="./" class="title">League Of Dimi</a></div>
        <br>
        <input type="text" class="id input-hov" placeholder="디미고인 아이디">
        <input type="password" class="pw input-hov" placeholder="디미고인 비밀번호">
        <input type="number" class="number input-hov" placeholder="학번">
        <input type="button" class="btn" value="회원가입">
    </div>
    <script src="/src/darkmode.js"></script>
    <script>
        history.pushState(null, null, '/');
        const onEvent = () => {
            const number = $('.number').val();
            const username = $('.id').val();
            const password = $('.pw').val();
            if(number == '' || username == '' || password == ''){
                Swal.fire({icon: 'info', title: '이건 좀...', text: '입력되지 않은 칸이 있습니다!'});
                return;
            }
            $.ajax({
                url: '/api/register.php',
                type: 'POST',
                data: {
                    username: username,
                    number: number,
                    password: password
                },
                success: (result) => {
                    Swal.fire({
                        icon: 'info', 
                        title: '정보', 
                        text: result
                    }).then((res) => location.href = '/');
                    
                }
            });
        };
        $('.btn').on('click', (event) => {onEvent();});
        $(".input-hov").on("keyup", (key) => {if(key.keyCode==13) onEvent();});
    </script>
</body>
</html>
