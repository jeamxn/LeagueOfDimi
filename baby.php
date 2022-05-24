<div class="sound"></div>
<script>
    const rand = (min, max) => {
        return Math.floor(Math.random() * (max - min + 1)) + min;
    }
    let num = rand(0, 2);
    $('.sound').html(`
    <audio autoplay controls>
        <source src="file/응애${num}.m4a">
    </audio>`);
</script>