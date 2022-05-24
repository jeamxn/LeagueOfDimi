var cnt = 0, sum = 0, haveStoke = 0;

let intervalTime = 5000;
let lineNum = 40;
let wMax = 10;
let max = 3;
let min = (max * -1);
let wData = [wMax], dateData = [''];
/*
try{
    wMax = Number(getCookie('dimiCoin'));
}
catch{
}
*/
for(var i = 0; i < lineNum - 2; i++){
    add = wData[i] + Math.floor(Math.floor(Math.random() * (max - (min) + 1)) + (min));
    if(add <= 0) add = 1;
    wData.push(add);
    dateData.push('');
}
wData.push(wMax);
dateData.push('');

var ctx = document.getElementById('myChart').getContext('2d');
Chart.defaults.global.legend.display = false;
Chart.defaults.global.tooltips.enabled = false;
var config = {
        type: 'line', // 차트의 형태
        data: { // 차트에 들어갈 데이터
            labels: dateData,
            datasets: [
                { //데이터
                    fill: true,
                    data: wData,
                    backgroundColor: [
                        'rgba(255, 233, 241, 0)'
                    ],
                    borderColor: [
                        '#E83C77'
                    ],
                    borderWidth: 1
                }
            ],
            legend: {
               display: false
            },
            tooltips: {
               enabled: false
            }
        },
        options: {
            scales: {
            },
            xAxis: {
                visible: false,
            }
        }
    };
var myChart = new Chart(ctx, config);
var nowPrice = 0;
const getStokeNum = () => {
    let prc = nowPrice;
    let num = $('.anum').val();
    let stuNum = myData["num"];
    $.ajax({
        url: './api/dobak',
        type: 'POST',
        data: {
            prc: prc,
            num: num,
            stuNum: btoa(stuNum),
            type: '수량'
        },
        success: (res) => {
            haveStoke = res;
            $('.JM_hvP').html(res);
        },
        error: (res) => {
            Swal.fire({icon: 'error', title: '오류!', text: `[${res.status}] ${res.statusText}`});
        }
    });
};

const htmlRef = () => {
    $('.JM_price').html(nowPrice);
    $('.JM_pgP').html(Math.floor(sum / cnt));
    $('.JM_allowP').html(Math.floor(myData['points'] / nowPrice));
    if($('.qhdbtnfid').is(":checked")){
        $('.anum').val(haveStoke);
    }
    if($('.rksmd').is(":checked")){
        $('.anum').val(Math.floor(myData['points'] / nowPrice));
    }
    $('.JM_prcP').html($('.anum').val() * nowPrice);
};

const ref = () => {
    //데이터셋 수 만큼 반복
    var dataset = config.data.datasets;
    for(var i=0; i<dataset.length; i++){
    	//데이터 갯수 만큼 반복
    	var data = dataset[i].data;
    	for(var j=0 ; j < data.length ; j++){
            if(j == data.length - 1){
                var ran = data[j - 1] + Math.floor(Math.floor(Math.random() * (max - (min) + 1)) + (min));
                if(ran <= 0) ran = 1;
                ran = Math.floor(ran);
                /*
                try{
                    deleteCookie('dimiCoin');
                    setCookie('dimiCoin', ran, 99999);
                }
                catch{}
                */
                data[j] = ran;
                nowPrice = ran;
            }
            else{
	    		data[j] = data[j + 1];
            }
    	}
    }
    myChart.update();	//차트 업데이트
    cnt++;
    sum += nowPrice;
    htmlRef();
};
$('.qhdbtnfid').on('click', (event) => {
    $('.rksmd').prop("checked", false);
});
$('.rksmd').on('click', (event) => {
    $('.qhdbtnfid').prop("checked", false);
});
try{
    clearInterval(rInterval);
}
catch{
    
}
ref();
var rInterval = setInterval(() => {
        ref();
}, intervalTime);
getStokeNum();
$('.aotn').on('click', (event) => {
    let prc = nowPrice;
    let num = $('.anum').val();
    let stuNum = myData["num"];
    $.ajax({
        url: './api/dobak',
        type: 'POST',
        data: {
            prc: prc,
            num: num,
            stuNum: btoa(stuNum),
            type: '매수'
        },
        success: (res) => {
            getMyData();
            htmlRef();
            getStokeNum();
            ref();
            Swal.fire({icon: 'success', title: '성공!', text: res});
        },
        error: (res) => {
            Swal.fire({icon: 'error', title: '오류!', text: `[${res.status}] ${res.statusText}`});
        }
    });
});
$('.aoeh').on('click', (event) => {
    let prc = nowPrice;
    let num = $('.anum').val();
    let stuNum = myData["num"];
    $.ajax({
        url: './api/dobak',
        type: 'POST',
        data: {
            prc: prc,
            num: num,
            stuNum: btoa(stuNum),
            type: '매도'
        },
        success: (res) => {
            getMyData();
            htmlRef();
            getStokeNum();
            ref();
            Swal.fire({icon: 'success', title: '성공!', text: res});
        },
        error: (res) => {
            Swal.fire({icon: 'error', title: '오류!', text: `[${res.status}] ${res.statusText}`});
        }
    });
});