let gp = JSON.parse(getCookie('dimigome'));
try{
    $('.dmm_num').val(gp.number);
    $('.dmm_id').val(gp.ids);
}
catch{}
if($('.dmm_num').val() == ''){
    $('.dmm_num').val(myData.num);
}


$('.zasup_out').on('click', (event) => {
    let texts = $('.zasup_select').val();
    let number = $('.dmm_num').val();
    let ids = $('.dmm_id').val();
    let Infos = $('.zasup_input').val();
    if(ids == '' || number == ''){
        Swal.fire({icon: 'info', title: '이건 좀...', text: '입력되지 않은 칸이 있습니다!'});
        return;
    }
    if(texts == '' || texts == '사유선택'){
        Swal.fire({icon: 'info', title: '이건 좀...', text: '선택되지 않은 칸이 있습니다!'});
        return;
    }
    if((texts == '기타' || texts == '기타활동') && Infos == ''){
        Swal.fire({icon: 'info', title: '자세한 사유', text: '자세한 사유를 입력해 주세요!'});
        return;
    }
    deleteCookie('dimigome');
    let ck = `{"number": "${number}", "ids": "${ids}"}`;
    setCookie('dimigome', ck, 9999);
    $.ajax({
        url: './api/dimigome',
        type: 'POST',
        data: {
            texts: texts,
            number: number,
            ids: ids,
            Infos: Infos
        },
        success: (res) => {
            Swal.fire({icon: 'info', title: '정보', text: res});
        },
        error: (res) => {
            Swal.fire({icon: 'error', title: '오류!', text: `[${res.status}] ${res.statusText}`});
        }
    });

});
$('.zasup_in').on('click', (event) => {
    let texts = '삭제';
    let number = $('.dmm_num').val();
    let ids = $('.dmm_id').val();
    let Infos = $('.zasup_input').val();
    if(ids == '' || number == ''){
        Swal.fire({icon: 'info', title: '이건 좀...', text: '입력되지 않은 칸이 있습니다!'});
        return;
    }
    deleteCookie('dimigome');
    let ck = `{"number": "${number}", "ids": "${ids}"}`;
    setCookie('dimigome', ck, 9999);
    $.ajax({
        url: './api/dimigome',
        type: 'POST',
        data: {
            texts: texts,
            number: number,
            ids: ids,
            Infos: Infos
        },
        success: (res) => {
            Swal.fire({icon: 'info', title: '정보', text: res});
        },
        error: (res) => {
            Swal.fire({icon: 'error', title: '오류!', text: `[${res.status}] ${res.statusText}`});
        }

    });

});