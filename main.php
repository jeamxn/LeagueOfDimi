<?php
    include './api/common.php';
    $id = $_POST['id'];
    $pw = $_POST['pw'];
    $rs = DB('SELECT * FROM user WHERE dmId="'.$id.'"');
    $exst = mysqli_fetch_array($rs);
    $pwRes = password_verify($pw, $exst['dmPw']);
    if(!($pwRes)){
        echo '<!DOCTYPE html>
<html lang="kr">
    <head>
        <script src="//cdn.chicken-moo.com/jquery/jquery-latest.js"></script>
        <script src="//cdn.chicken-moo.com/cookie.js"></script>
        <script src="/src/style.js"></script>
        <script src="//cdn.chicken-moo.com/sweetalert2/11.4.13/dist/sweetalert2.all.min.js"></script>
        <link rel="stylesheet" href="sweetalert2.css">
    </head>
    <body>
        <script src="/src/darkmode.js"></script>
        <script>
            deleteCookie("lod");
            history.pushState(null, null, "/");
            Swal.fire({
                icon:"error", 
                title: "아이디/비밀번호 오류!", 
                text: "회원가입 후 이용 해주세요."
            }).then((res) => location.replace("./"));
        </script>
    </body>
</html>';
        exit();
    }

    $num = $exst['stuNum'];
    $pon = $exst['points'];

    $rp1 = 'SELECT * FROM user WHERE dmId="'.$id.'"';
    $rs1 = DB($rp1);
    $admin = mysqli_fetch_array($rs1)['ifAdmin'];
?>
<!DOCTYPE html>
<html lang="kr" id="html">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="//cdn.chicken-moo.com/jquery/jquery-latest.js"></script>
    <script src="//cdn.chicken-moo.com/Chart.min.js"></script>
    <script src="//cdn.chicken-moo.com/cookie.js"></script>
    <script src="//cdn.chicken-moo.com/sweetalert2/11.4.13/dist/sweetalert2.all.min.js"></script>
    <link rel="stylesheet" href="sweetalert2.css">

    <?php
        echo '
        <script>
            setCookie("lod", btoa(encodeURI(`{"id": "'.$id.'", "pw": "'.$pw.'"}`)), 999999999999);
        </script>
        ';
    ?>
    <script src="/src/style.js"></script>
    <script src="/src/main.js"></script>
    <title>League Of Dimi</title>
</head>
<body link="black" alink="black" vlink="black" class="bgc">
    <div class="top">
        <div class="dt pointer">League Of Dimi</div>
        <div class="menu">
            <div class="menu-m menu-main pointer">메인</div>
            <div class="menu-m menu-jari pointer">자리</div>
            <div class="menu-m menu-more pointer">포인트</div>
            <?php
                if($admin > 0){
                    echo "<div class='menu-m menu-jabup pointer'>제제법정</div><script>$('.menu-jabup').on('click', (event) => {loadPage('jabup')});</script>";
                }
                if($admin == 1){
                    echo "<div class='menu-m menu-pont pointer'>관리자</div><script>$('.menu-pont').on('click', (event) => {loadPage('admin')});</script>";
                }
            ?>

        </div>
        <div class="info ">
            <div class="mode pointer">다크모드</div>
            <div class="name pointer">loading</div>
            <div class="points pointer">
                <div class="var_p">0</div>points
            </div>
        </div>
    </div>
    <div class="main">

    </div>
    <script src="/src/darkmode.js"></script>
    <script>
        let myData = Object();
        
        const getMyData = () => {
            $.ajax({
                url: '/api/getPoint.php',
                type: 'GET',
                data: {
                    stuNum: <?php echo $num; ?>
                },
                success: (res) => {
                    myData = {
                        "name": stuName[<?php echo $num % 100; ?>],
                        "num": <?php echo $num; ?>,
                        "id": "<?php echo $id; ?>",
                        "points": res
                    };
                    $('.name').html(myData["name"]);
                    $('.var_p').html(myData["points"]);
                    try{
                        getRank();
                    }
                    catch{}
                }
            });
            
        };
        getMyData();

        const loadPage = (pageName) => {
            $('.main').css('opacity', 0);
            setTimeout(() => {
                $.ajax({
                url: `${pageName}`,
                success: (res) => {
                    getMyData();
                    $('.main').css('opacity', 1);
                    $('.main').html(res);
                },
                error: (res) => {
                    Swal.fire({
                        icon: 'error',
                        title: '오류!',
                        text: `[${res.status}] ${res.statusText}`                        
                    });
                }
            });
            }, fadeTime);
        };

        $('.dt').on('click', (event) => loadPage('first'));
        $('.menu-main').on('click', (event) => loadPage('first'));
        $('.menu-jari').on('click', (event) => loadPage('jari'));
        $('.menu-more').on('click', (event) => loadPage('point'));
        loadPage('first');
        history.pushState(null, null, '/');

        const logout = () => {
            Swal.fire({
                title: '로그아웃',
                icon: 'info',
                text: '로그아웃하시겠습니까?',
                showCancelButton: true,
                confirmButtonText: '로그아웃',
                cancelButtonText: '취소하기'
            }).then(res => {
                if(res.isConfirmed){
                    deleteCookie('lod');
                    location.replace('/');
                }
            });
        };

        $('.name').on('click', (event) => logout());
        $('.points').on('click', (event) => logout());
        $('.mode').on('click', (event) => dlTogle());
    </script>
</body>
</html>
