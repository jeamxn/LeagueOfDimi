<script src="/src/fade.js"></script>

<script>
    $('.JM_div').append('<div class="ranks"></div>');
    const  rand = (min = 0, max = 255) => {
        return Math.floor(Math.random() * (max - min + 1)) + min;
    }
    const getRank = () => {
        $.ajax({
            url: './api/getRank.php',
            type: 'GET',
            dataType: 'json',
            success: (res) => {
                for(var i = 1; i <= Object.keys(res).length; i++){
                    try{
                        $(`.ranks`).append(`<div class="deRNum">
                            <div class="deRNum-i deRNum-i-${i}">
                                <div class="deRNum-n">${i}위</div>
                                <div class="deRNum-q">${stuName[res[i][0] % 100]}</div>
                                <div class="deRNum-p">${res[i][1]}p</div>
                            </div>
                        </div>`);
                    }
                    catch{}
                    if(!(i % 3)) $(`.ranks`).append(`<br>`);
                }
                
            }
        });
    };
    getRank();
        $('.deRNum-i-1').css('background-color', `rgba(${rand()}, ${rand()}, ${rand()}, 0.5)`);
        $('.deRNum-i-2').css('background-color', `rgba(${rand()}, ${rand()}, ${rand()}, 0.5)`);
        $('.deRNum-i-3').css('background-color', `rgba(${rand()}, ${rand()}, ${rand()}, 0.5)`);
    const itv = setInterval(() => {
        $('.deRNum-i-1').css('background-color', `rgba(${rand()}, ${rand()}, ${rand()}, 0.5)`);
        $('.deRNum-i-2').css('background-color', `rgba(${rand()}, ${rand()}, ${rand()}, 0.5)`);
        $('.deRNum-i-3').css('background-color', `rgba(${rand()}, ${rand()}, ${rand()}, 0.5)`);
    }, 1000);
</script>