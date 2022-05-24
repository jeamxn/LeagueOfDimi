$('.c_dmId').val(myData['id']);
$('.c_button').on('click', () => {
    let type = 'add';
    let point = $('.c_point').val();
    let stuNum = $('.c_num').val();
    let dmId = $('.c_dmId').val();
    let dmPw = $('.c_dmPw').val();
    $.ajax({
        url: './api/pointEdit',
        type: 'POST',
        data: {
            type: type,
            point: point,
            stuNum: stuNum,
            dmId: dmId,
            dmPw: dmPw,
            gongi: $('.ggamaerj').val()
        },
        success: (res) => {
            getMyData();
            Swal.fire({icon: 'info', title: '정보', text: res});
        },
        error: (res) => {
            Swal.fire({icon: 'error', title: '오류!', text: `[${res.status}] ${res.statusText}`});
        }
    });
});

$('.gonjiAdd_btn').on('click', (event) => {
    $.ajax({
        url: './api/addGonji',
        type: 'POST',
        data: {
            context: $('.gonjiAdd_context').val()
        },
        success: (res) => {
            Swal.fire({icon: 'info', title: '정보', text: res});
        },
        error: (res) => {
            Swal.fire({icon: 'error', title: '오류!', text: `[${res.status}] ${res.statusText}`});
        }
    });
});