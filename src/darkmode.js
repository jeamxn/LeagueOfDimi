const setProperty = (data) =>{
    for(let i = 0; i < data.length; i++){
        document.documentElement.style.setProperty(data[i][0], data[i][1]);
    }
}
const toDark = () => {
    setProperty([
        ['--dimigo', '#E83C77'],
        ['--dimigo-d', '#8D1A41'],
        ['--dimigo-y', 'rgba(255, 100, 157, 0.281)'],
        ['--dimigo-y-z', '#685a5f'],
        ['--background', '#000'],
        ['--background-1', '#191919'],
        ['--color', '#e3e3e3'],
        ['--shadow', 'rgb(63 57 57)'],
        ['--shadow-2', 'rgba(129, 122, 122, .1)'],
        ['--alert-background', 'rgba(0, 0, 0, 0.5)'],
        ['--timeout-alert', 'rgba(255, 255, 255, 0.5)']
    ]);
    deleteCookie('darkMode');
    setCookie('darkMode', 0, 99999);
    $('.mode').html('라이트모드');
}
const toLight = () => {
    setProperty([
        ['--dimigo', '#E83C77'],
        ['--dimigo-d', '#8D1A41'],
        ['--dimigo-y', '#ffe9f1'],
        ['--dimigo-y-z', '#c0b0b6'],
        ['--background', '#fff'],
        ['--background-1', '#f5f5f5'],
        ['--color', '#000'],
        ['--shadow', 'rgb(209 209 209)'],
        ['--shadow-2', 'rgba(0, 0, 0, .1)'],
        ['--alert-background', 'rgba(0, 0, 0, 0.2)'],
        ['--timeout-alert', 'rgba(0, 0, 0, 0.5)']
    ]);
    deleteCookie('darkMode');
    setCookie('darkMode', 1, 99999);
    $('.mode').html('다크모드');
}
const dlTogle = (check = 1) => {
    let now = getCookie('darkMode') || 3;
    let clientDarkMode = window.matchMedia('(prefers-color-scheme: dark)').matches;
    if(now == 3) clientDarkMode ? toDark() : toLight();
    else now == check ? toDark() : toLight();
}
dlTogle(0);