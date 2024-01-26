<style>
    .tags {
        display: flex;
        margin-left: 1px;
    }

    .tag {
        width: 100px;
        padding: 5px 10px;
        border: 1px solid black;
        margin-left: -1px;
        text-align: center;
        background-color: #ccc;
        cursor: pointer;
    }

    article section {
        border: 1px solid black;
        min-height: 480px;
        margin-top: -1px;
        display: none;
        padding: 15px;

    }

    .active {
        border-bottom: 1px solid white;
        background-color: wheat;
    }
</style>


<div class="tags">
    <div id='sec01' class="tag active">健康</div>
    <div id='sec02' class="tag">菸害</div>
    <div id='sec03' class="tag">癌鎮</div>
    <div id='sec04' class="tag">性病</div>


</div>
<article>
    <section id="section01" style='display:block'>
        <h2>健康新知</h2>
        <pre>缺乏運動已成為影響全球死亡率的第四大危險因子-國人無規律運動之比率高達72</pre>
    </section>
    <section id="section02">
        <h2>菸害防治</h2>
        <pre>
菸害防治法規
..........
</pre>
    </section>
    <section id="section03">
        <h2>癌症防治</h2>
        <pre>
降低罹癌風險 建構健康生活型態
........
</pre>
    </section>
    <section id="section04">
        <h2>慢性病防治</h2>
        <pre>
長期憋尿 泌尿系統問題多 
...........
</pre>
    </section>
</article>
<script>
    $(".tag").on('click', function() {
        $(".tag").removeClass('active')
        $(this).addClass('active')
        let id = $(this).attr('id').replace("sec", 'section');
        $("section").hide();
        $("#" + id).show();
    })
</script>