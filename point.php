<script src="/src/fade.js"></script>

<div class="JM_div">
    <div class="dobak_inbox">
        <div class="dobak_select divBox">
            <div class="">
                <div class="dobak_select_title">디미포인트</div>
                <br>
                <select class="dobak_select_select">
                    <option value="point" class="dobak_option">-- 선택 --</option>
                    <option value="singo" class="dobak_option">제보하기</option>
                    <option class="dobak_option" value="point_r">전체 순위</option>
                    <option class="dobak_option" value="allgonji">공지 전체</option>
                    <option class="dobak_option" value="goorm">구름</option>
                    <option class="dobak_option" value="holjak">홀짝</option>
                    <option class="dobak_option" value="baby">응애</option>
                </select>
                <input type="button" value="선택" class="dobak_select_btn">
            </div>
        </div>
        <br>
        <div class="gonji divBox">
            <div class="gonji_title">공지사항</div>
            <div class="gonji_all pointer">(전체보기)</div>
            <br>
            <div class="gonji_gonji">loading</div>
        </div>
    </div>
</div>
<script>
    $('.dobak_select_btn').on('click', (event) => {
        if($('.dobak_select_select').val() == 'point') return;
        if($('.dobak_select_select').val() == 'goorm'){
            window.open('https://leagueofdimi-hs.goorm.io/', '_blank');
            return;
        }
        $('.main').css('opacity', 0);

        setTimeout(() => {
            $.ajax({
            url: `./${$('.dobak_select_select').val()}`,
            type: 'GET',
            success: (res) => {
                $('.main').css('opacity', 1);
                $('.dobak_inbox').html(res);
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
    });
    $('.gonji_gonji').html(getGonji(10));
    $('.gonji_all').on('click', (event) => {
        $('.main').css('opacity', 0);
        setTimeout(() => {
            $.ajax({
            url: `./allgonji`,
            type: 'GET',
            success: (res) => {
                $('.main').css('opacity', 1);
                $('.dobak_inbox').html(res);
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
    });
</script>