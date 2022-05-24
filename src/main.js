const stuName = ['제제t', '강민석', '강태민', '고가람', '김근석', '김도윤', '김도현', '김민아', '김진현', '김하은', '김희은', '박상수', '박서연', '박수인', '박준범', '방준호', '백가온', '서민규', '오현준', '이수성', '이유성', '이유진', '장채은', '조인성', '조한결', '조현우', '차건', '최우성', '최재민', '최진혁', '한연수', '홍준기', '황보성윤'];
const timeTable = {
    '토': ['오전 1차<br>09:00~10:20', '오전 2차<br>10:40~12:00', '오후 1차<br>14:00~16:00', '오후 2차<br>16:20~18:00', '야간 1차<br>19:50~21:00', '야간 2차<br>21:20~22:20', '기숙사 ㄱㄱ<br>22:20~24:00'],
    '일': ['오전 1차<br>09:00~10:20', '오전 2차<br>10:40~12:00', '오후 1차<br>14:00~16:00', '오후 2차<br>16:20~18:00', '야간 1차<br>19:50~21:00', '야간 2차<br>21:20~22:20', '기숙사 ㄱㄱ<br>22:20~24:00'],
    '월': ['미술', '사회', '체육', '수학', '진로', '프로그래밍', '창체'],
    '화': ['사물 인터넷', '사물 인터넷', '프로그래밍', '컴퓨터 시스템 일반', '영어', '과학', '국어'],
    '수': ['컴퓨터 시스템 일반', '영어', '미술', '과학', '사물 인터넷', '동아리', '동아리'],
    '목': ['수학', '사회', '미술', '프로그래밍', '과학', '국어', '학급 활동'],
    '금': ['영어', '사회', '컴퓨터 시스템 일반', '수학', '국어', '체육', '프로그래밍']
};
const ko_day = ['일', '월', '화', '수', '목', '금', '토'];
var fadeTime = 300;

var today, year, month, date, day;
const setDate = () => {
    today = new Date();
    year = today.getFullYear(); // 년도
    month = today.getMonth() + 1;  // 월
    date = today.getDate();  // 날짜
    day = ko_day[today.getDay()];  // 요일
};
setDate();

function getCookie(name) {
    var value = document.cookie.match('(^|;) ?' + name + '=([^;]*)(;|$)');
    return value ? value[2] : null;
}
function deleteCookie(name) {
    document.cookie = name + '=; expires=Thu, 01 Jan 1970 00:00:01 GMT;';
}
function setCookie(name, value, exp = 99999999) {
    deleteCookie(name);
    var date = new Date();
    date.setTime(date.getTime() + exp * 24 * 60 * 60 * 1000);
    document.cookie = name + '=' + value + ';expires=' + date.toUTCString() + ';path=/';
}
const getGonji = (number) => {
    var rtn;
    $.ajax({
        url: `./api/gonji`,
        type: 'GET',
        data: {
            num: number
        },
        async: false,
        success: (res) => {
            if(res == '') res = '없음';
            rtn = res;
        },
        error: (res) => Swal.fire({icon: 'error', title: '오류!', text: `[${res.status}] ${res.statusText}`})
    });
    return rtn;
}

var gonji_r = getGonji(1);
setInterval(() => {
    gonji_new = getGonji(1);
    if(gonji_r != gonji_new && gonji_r != '없음') {
        Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 3000,
            timerProgressBar: true,
            didOpen: (toast) => {
                toast.addEventListener('mouseenter', Swal.stopTimer)
                toast.addEventListener('mouseleave', Swal.resumeTimer)
            }
        }).fire({
            icon: 'info',
            title: `${gonji_new}`
        });
        //Swal.fire({icon: 'info', title: '공지', text: gonji_new});
        gonji_r = gonji_new;
    }
}, 5000);
const getName = (number) => {
    return stuName[number % 100];
};
const getNumber = (name) => {
    for(let i = 1601; i <= 1632; i++){
        if(name == getName(i)){
            return i;
        }
    }
};


