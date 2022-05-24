const getRank = () => {
    $.ajax({
        url: './api/getRank',
        type: 'GET',
        dataType: 'json',
        success: (res) => {
            for(var i = 1; i <= 8; i++){
                try{
                    $(`.ptable_name${i}`).html(stuName[res[i][0] % 100]);
                    $(`.ptable_poin${i}`).html(res[i][1]);
                }
                catch{
                    $(`.ptable_name${i}`).html('없음');
                    $(`.ptable_poin${i}`).html('0');
                }
            }
            for(var i = 1; i <= Object.keys(res).length; i++){
                if(res[i][0] == myData['num']){
                    try{
                        $(`.ptable_dung_n`).html(i < 10 ? `0${i}` : i);
                        $(`.ptable_name_n`).html(stuName[res[i][0] % 100]);
                        $(`.ptable_poin_n`).html(res[i][1]);
                    }
                    catch{
                        $(`.ptable_dung_n`).html('.');
                        $(`.ptable_name${i}`).html('없음');
                        $(`.ptable_poin${i}`).html('0');
                    }
                }
            }
        }
    });
};
getRank();