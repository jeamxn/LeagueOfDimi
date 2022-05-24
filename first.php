<script src="/src/fade.js"></script>
<div class="mainPage">
    <div class="m_1">
        <div class="timetable divBox">
        <table class="ptable">
                <tr class="ptable_t">
                    <th class="ptable_th" colspan="3">오늘의 시간표</th>
                </tr>
                <tr class="ptable_tr">
                    <td class="ptable_1 ptable_dung">1</td>
                    <td class="ptable_1 ptable_name ttable1">loading</td>
                </tr>
                <tr class="ptable_tr">
                    <td class="ptable_2 ptable_dung">2</td>
                    <td class="ptable_2 ptable_name ttable2">loading</td>
                </tr>
                <tr class="ptable_tr">
                    <td class="ptable_1 ptable_dung">3</td>
                    <td class="ptable_1 ptable_name ttable3">loading</td>
                </tr>
                <tr class="ptable_tr">
                    <td class="ptable_2 ptable_dung">4</td>
                    <td class="ptable_2 ptable_name ttable4">loading</td>
                </tr>
                <tr class="ptable_tr">
                    <td class="ptable_1 ptable_dung">5</td>
                    <td class="ptable_1 ptable_name ttable5">loading</td>
                </tr>
                <tr class="ptable_tr">
                    <td class="ptable_2 ptable_dung">6</td>
                    <td class="ptable_2 ptable_name ttable6">loading</td>
                </tr>
                <tr class="ptable_tr">
                    <td class="ptable_1 ptable_dung">7</td>
                    <td class="ptable_1 ptable_name ttable7">loading</td>
                </tr>
            </table>
        </div>
    </div>
    <div class="m_2">
        <div class="nowTime divBox">
            <div class="now">
                <div class="nowT">
                    <div class="nTime">loading</div>
                </div>
                <br>
                <div class="leave">loading</div>
            </div>
            <div class="nt">
                <div class="next2">
                    <div class="nextBox2">
                        <div class="nextT">이전</div>
                        <br>
                        <div class="pt1 nextTitle">loading</div>
                        <br>
                        <div class="pt2 nextTime">loading</div>
                    </div>
                </div>
                <div class="next1">
                    <div class="nextBox">
                        <div class="nextT">다음</div>
                        <br>
                        <div class="nt1 nextTitle">loading</div>
                        <br>
                        <div class="nt2 nextTime">loading</div>
                </div>
            </div>
            </div>
        </div>
        <br>
        <div class="zasup divBox pointer">
            <div class="zasup_a">자습 현황 등록</div>
            <div class="goout">
                <select class="zasup_select">
                    <option class="zasup_option">사유선택</option>
                    <option class="zasup_option">기타활동</option>
                    <option class="zasup_option">방과후</option>
                    <option class="zasup_option">창동</option>
                    <option class="zasup_option">자동</option>
                    <option class="zasup_option">외출</option>
                    <option class="zasup_option">귀가</option>
                    <option class="zasup_option">화장실</option>
                    <option class="zasup_option">물</option>
                    <option class="zasup_option">복도</option>
                    <option class="zasup_option">세탁</option>
                    <option class="zasup_option">기타</option>
                </select>
                <input type="text" class="zasup_input it_text" placeholder="자세한 사유 입력">
            </div>
            <input type="number" placeholder="학번" class="dmm_num it_text">
            <input type="password" placeholder="그거 아이디" class="dmm_id it_text">
            <input type="button" value="나가기" class="zasup_out">
            <input type="button" value="들어오기" class="zasup_in">
        </div>
    </div>
    <script>
        $('.zasup').on('click', () => window.open('https://dimigo.xyz'));
    </script>
    <div class="m_3 pointer">
        <div class="list_point divBox">
            <table class="ptable">
                <tr class="ptable_t">
                    <th class="ptable_th" colspan="3">현재 포인트 순위</th>
                </tr>
                <tr class="ptable_tr">
                    <td class="ptable_1 ptable_dung">01</td>
                    <td class="ptable_1 ptable_name ptable_name1">loading</td>
                    <td class="ptable_1 ptable_poin ptable_poin1">loading</td>
                </tr>
                <tr class="ptable_tr">
                    <td class="ptable_2 ptable_dung">02</td>
                    <td class="ptable_2 ptable_name ptable_name2">loading</td>
                    <td class="ptable_2 ptable_poin ptable_poin2">loading</td>
                </tr>
                <tr class="ptable_tr">
                    <td class="ptable_1 ptable_dung">03</td>
                    <td class="ptable_1 ptable_name ptable_name3">loading</td>
                    <td class="ptable_1 ptable_poin ptable_poin3">loading</td>
                </tr>
                <tr class="ptable_tr">
                    <td class="ptable_2 ptable_dung">04</td>
                    <td class="ptable_2 ptable_name ptable_name4">loading</td>
                    <td class="ptable_2 ptable_poin ptable_poin4">loading</td>
                </tr>
                <tr class="ptable_tr">
                    <td class="ptable_1 ptable_dung">05</td>
                    <td class="ptable_1 ptable_name ptable_name5">loading</td>
                    <td class="ptable_1 ptable_poin ptable_poin5">loading</td>
                </tr>
                <tr class="ptable_tr">
                    <td class="ptable_2 ptable_dung">06</td>
                    <td class="ptable_2 ptable_name ptable_name6">loading</td>
                    <td class="ptable_2 ptable_poin ptable_poin6">loading</td>
                </tr>
                <tr class="ptable_tr">
                    <td class="ptable_1 ptable_dung">07</td>
                    <td class="ptable_1 ptable_name ptable_name7">loading</td>
                    <td class="ptable_1 ptable_poin ptable_poin7">loading</td>
                </tr>
                <tr class="ptable_tr">
                    <td class="ptable_2 ptable_dung">08</td>
                    <td class="ptable_2 ptable_name ptable_name8">loading</td>
                    <td class="ptable_2 ptable_poin ptable_poin8">loading</td>
                </tr>
                <tr class="ptable_tr">
                    <td class="ptable_1 ptable_3 ptable_dung ptable_dung_n">.</td>
                    <td class="ptable_1 ptable_3 ptable_name ptable_name_n">loading</td>
                    <td class="ptable_1 ptable_3 ptable_poin ptable_poin_n">loading</td>
                </tr>
            </table>
        </div>
    </div>
</div>
<script src="./src/getRank.js"></script>
<!--<script src="./src/dimigome.js"></script>-->
<script src="./src/lefttime.js"></script>
<script src="./src/timetable.js"></script>
<script>
    $('.m_3').on('click', (event) => {
        $('.main').css('opacity', 0);
        setTimeout(() => {
            $.ajax({
            url: `point`,
            success: (res) => {
                getMyData();
                $('.main').html(res);
                $.ajax({
                    url: `./point_r`,
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