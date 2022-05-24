<script src="/src/fade.js"></script>

<div class="singo_big divBox">
    <div class="singo_title">제보하기</div>
    <br>
    <input type="number" class="singo_number" placeholder="학번">
    <input type="text" class="singo_name" placeholder="신고 대상자 이름">
    <br>
    <textarea class="singo_text" placeholder="자세한 신고 내용

최대한 자세히 적어주세요!
빈약한 신고 내용의 경우,
신고 처리가 되지 않을 수 있습니다!

신고는 익명으로 제법에게 제보되니,
본인의 개인 정보가 유출되지 않도록 
조심 해주세요! (최대 65,535글자)

그러나 데이터베이스에는 
누가 신고했는지 남으니, 장난은 절대 금지!

(언제, 어디서, 누가, 무엇을, 어떻게, 왜)

※허위/장난 신고 시 처벌※"></textarea>
    <br>
    <input type="button" value="제보하기" class="singo_btn">
</div>
<script>
    $('.singo_number').on('change', (event) => {
        $('.singo_name').val(getName($('.singo_number').val()));
    });
    $('.singo_name').on('change', (event) => {
        $('.singo_number').val(getNumber($('.singo_name').val()));
    });
    $('.singo_btn').on('click', (event) => {
        let stuNum = btoa(myData['num']);
        let p_stuNum = btoa($('.singo_number').val());
        let context = $('.singo_text').val();
        if(p_stuNum == '' || context == ''){
            Swal.fire({icon: 'info', title: '이건 좀...', text: '입력되지 않은 칸이 있습니다!'});
            return;
        }
        $.ajax({
            url: './api/singo.php',
            type: 'POST',
            data: {
                stuNum: stuNum,
                p_stuNum: p_stuNum,
                context: context
            },
            success: (res) => {
                Swal.fire({icon: 'success', title: '성공!', text: res});
            },
            error: (res) => {
                Swal.fire({
                    icon: 'error',
                    title: '오류!',
                    text: `[${res.status}] ${res.statusText}`                        
                });
            }
        });
    });
</script>