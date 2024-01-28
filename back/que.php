<fieldset>
    <legend>新增問卷</legend>
    <form action="./api/add_que.php" method="post">

        <div>問卷名稱
            <input type="text" name="subject">
        </div>
        <div id="opt">選項
            <input type="text" name="option[]" id="">
        <input type="button" value="更多" onclick="more()">
        </div>
        <div class="ct">
            <input type="submit" value="送出">
            <input type="reset" value="reset">
        </div>
    </form>

</fieldset>
<script>
function more(){
    let opt=`<div>選項
                <input type="text" name="option[]">
            </div>`
    $("#opt").before(opt);
}  
</script>