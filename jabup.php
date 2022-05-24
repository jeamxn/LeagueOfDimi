<script src="/src/fade.js"></script>

<div class="jabup">
    <div class="pangul divBox">
        <div class="pan_title">
            <div class="panNum">0</div>번째 제보
        </div>
        <div class="panPass">
            (
            <div class="panPre pointer">이전</div>
            /
            <div class="panNex pointer">다음</div>
            )
        </div>
        <br>
        <div class="panWho">
            피 신고자: <div class="panPer">Loading</div>
        </div>
        <br>
        <div class="panSingo">신고 내용</div>
        <br>
        <div class="panContext">Loading</div>

    </div>
</div>
<script>
    let singoNum = 0, prenum = 0;
    const changeJabup = (number) => {
        $.ajax({
            url: './api/getsingo.php',
            type: 'GET',
            data: {
                number: number
            },
            success: (res) => {
                try{
                    res = JSON.parse(res)[number];
                }
                catch{
                    singoNum = prenum;
                    Swal.fire({
                        icon: 'error',
                        title: '어라?',
                        text: '마지막 제보입니다.'
                    });
                    return;
                }
                $('.panNum').html(number + 1);
                $('.panPer').html(`${res[1]} ${stuName[res[1] % 100]}`);
                $('.panContext').html(res[0]);
            },
            error: (res) => {
                singoNum = prenum;
                Swal.fire({
                    icon: 'error',
                    title: '오류!',
                    text: `[${res.status}] ${res.statusText}`                        
                });
            }   
        });
    };
    changeJabup(singoNum);
    $('.panPre').on('click', (event) => {
        if(singoNum - 1 < 0){
            Swal.fire({
                icon: 'error',
                title: '어라?',
                text: '마지막 제보입니다.'
            });
            return;
        }
        prenum = singoNum; 
        changeJabup(--singoNum);
    });
    $('.panNex').on('click', (event) => {
        prenum = singoNum; 
        changeJabup(++singoNum);
    });
</script>