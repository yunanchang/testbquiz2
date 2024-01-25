<div class="nav">
    目前位置:首頁>分類網誌><span class="type">健康新知</span>
</div>
<fieldset>
    <legend>分類網誌</legend>
    <a href="" class="type-item" data-type="1">健康新知</a>
    <a href="" class="type-item" data-type="2">菸害防制</a>
    <a href="" class="type-item" data-type="3">癌症防治</a>
    <a href="" class="type-item" data-type="4">性病防治</a>
</fieldset>

<fieldset>
    <legend>文章列表</legend>
    <div class="list-items" style="display: none;">
    健康新知
    </div>
    <div class="article">

    </div>
</fieldset>
<script>
    $('.type-item').on('click',function(){
        $('.type').text($(this).text())
        let type=$(this).data('type')
        getList(tpye)
    })

    function getList(type){
        $.get('./api/get_list.php',{type},(list)=>{
            $('list-items').html(list)
            $('.article').hide();
            $('.list-items').show();
        })
    }

    function getNews(id){
        $.get('.api/get_news.php',{id},(res)=>{
            $('.article').html(news)
            $('.article').show();
            $('.list-items').hide();
        })
    }
</script>