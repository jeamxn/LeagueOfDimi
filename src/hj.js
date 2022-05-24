const holjak = (type) => {
    let stuNum = myData["num"];
    let bat = $('.hj_number').val();

    $.ajax({
        url: './api/hj',
        type: 'POST',
        data: {
            bat: bat,
            stuNum: btoa(stuNum),
            type: type
        },
        success: (res) => {
            getMyData();
            rep = res.split('|');
            Swal.fire({icon: 'success', title: '성공!', text: rep[1] == undefined ? `${rep[0]}` : `${rep[0]}\n${rep[1]}`});
        },
        error: (res) => {
            Swal.fire({icon: 'error', title: '오류!', text: `[${res.status}] ${res.statusText}`});
        }
    });

};
$('.hj_hol').on('click', (event) => {holjak('1')});
$('.hj_jak').on('click', (event) => {holjak('0')});
$('.hj_hc').on('click', (event) => {
    let stuNum = myData["num"];

    $.ajax({
        url: './api/hc',
        type: 'POST',
        data: {
            stuNum: btoa(stuNum)
        },
        success: (res) => {
            getMyData();
            Swal.fire({icon: 'success', title: '성공!', text: res});
        },
        error: (res) => {
            Swal.fire({icon: 'error', title: '오류!', text: `[${res.status}] ${res.statusText}`});
        }
    });
});