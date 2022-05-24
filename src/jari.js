const setJariData = () => {
    $.ajax({
        url: './api/getJari',
        type: 'GET',
        dataType: 'json',
        success: (res) => {
            var name, point;
            for(var i = 1; i <= 32; i++){
                name = stuName[res[i][0] % 100];
                point = res[i][1];
                $(`.jari${i}`).html(`
                    <div class="jari_name">${name}</div>
                    <div class="jari_point">${point}</div>
                `);
            }
        },
        error: (res) => {
            Swal.fire({icon: 'error', title: '오류!', text: `[${res.status}] ${res.statusText}`});

        }
    });
};
setJariData();

const onJariClick = (jariNum) => {
    Swal.fire({
      title: '포인트 입력',
        text: `${jariNum}번 자리에 걸 포인트를 입력해 주세요!`,
        icon: 'question',
        input: 'text',
      inputAttributes: {
        autocapitalize: 'off'
      },
      showCancelButton: true,
      confirmButtonText: '배팅하기!',
      cancelButtonText: '취소하기',
      preConfirm: (point) => {
          if(point == '' || point == undefined) return;
          if(isNaN(point) || point < 0){
              Swal.fire({icon: 'info', title: '숫자 오류!', text: '올바른 숫자를 입력해 주세요!'});
              return;
          }
          Swal.fire({
            title: `${jariNum}번 자리에 ${point}포인트 배팅?`,
            text: "이 작업은 취소할 수 없고, 배팅한 포인트는 돌려받을 수 없습니다.",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: '배팅하기!',
            cancelButtonText: '취소하기'
          }).then((result) => {
            if (result.isConfirmed) {
              $.ajax({
                  url: './api/setJari',
                  type: 'POST',
                  data: {
                      number: myData['num'],
                      point: point,
                      jariNum: jariNum
                  },
                  success: (res) => {
                      setJariData();
                      getMyData();
                      Swal.fire({icon: 'info', title:'정보', text: res});
                  },
                  error: (res) => Swal.fire({icon: 'error', title: '오류!', text: `[${res.status}] ${res.statusText}`})
              });
            }
          });
      }
    }); 
};


$('.jari1').on('click', (event) => {onJariClick(1)});
$('.jari2').on('click', (event) => {onJariClick(2)});
$('.jari3').on('click', (event) => {onJariClick(3)});
$('.jari4').on('click', (event) => {onJariClick(4)});
$('.jari5').on('click', (event) => {onJariClick(5)});
$('.jari6').on('click', (event) => {onJariClick(6)});
$('.jari7').on('click', (event) => {onJariClick(7)});
$('.jari8').on('click', (event) => {onJariClick(8)});
$('.jari9').on('click', (event) => {onJariClick(9)});
$('.jari10').on('click', (event) => {onJariClick(10)});
$('.jari11').on('click', (event) => {onJariClick(11)});
$('.jari12').on('click', (event) => {onJariClick(12)});
$('.jari13').on('click', (event) => {onJariClick(13)});
$('.jari14').on('click', (event) => {onJariClick(14)});
$('.jari15').on('click', (event) => {onJariClick(15)});
$('.jari16').on('click', (event) => {onJariClick(16)});
$('.jari17').on('click', (event) => {onJariClick(17)});
$('.jari18').on('click', (event) => {onJariClick(18)});
$('.jari19').on('click', (event) => {onJariClick(19)});
$('.jari20').on('click', (event) => {onJariClick(20)});
$('.jari21').on('click', (event) => {onJariClick(21)});
$('.jari22').on('click', (event) => {onJariClick(22)});
$('.jari23').on('click', (event) => {onJariClick(23)});
$('.jari24').on('click', (event) => {onJariClick(24)});
$('.jari25').on('click', (event) => {onJariClick(25)});
$('.jari26').on('click', (event) => {onJariClick(26)});
$('.jari27').on('click', (event) => {onJariClick(27)});
$('.jari28').on('click', (event) => {onJariClick(28)});
$('.jari29').on('click', (event) => {onJariClick(29)});
$('.jari30').on('click', (event) => {onJariClick(30)});
$('.jari31').on('click', (event) => {onJariClick(31)});
$('.jari32').on('click', (event) => {onJariClick(32)});