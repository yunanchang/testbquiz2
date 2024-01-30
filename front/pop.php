<fieldset>
    <legend>目前位置:首頁 > 最新文章區</legend>
    <table style="width:95%;margin:auto">
        <tr>
            <th width="30%">標題</th>
            <th width="50%">內容</th>
            <th></th>
        </tr>
        <?php 
        $total=$News->count(['sh'=>1]);
        $div=5;
        $pages=ceil($total/$div);
        $now=$_GET['p']??1;
        $start=($now-1)*$div;

        $rows=$News->all(['sh'=>1]," order by `good` desc limit $start,$div");
        foreach($rows as $row){
        ?>
        <tr>
            <td>
                <div class='title' data-id="<?=$row['id'];?>" style='cursor: pointer'>
                    <?=$row['title'];?>
                </div>
            </td>
            <td style="position: relative;">
                <div >
                    <?=mb_substr($row['news'],0,25);?>...
                </div>
                <div id="p<?=$row['id'];?>" class='pop'>
                <h3 style='color:skyblue'><?=$row['title'];?> </h3>
                    <?=$row['news'];?>
                </div>
            </td>
            <td>
                <span><?=$row['good'];?></span>個人說
                <img src="./icon/02B03.jpg" style="width:25px">
            <?php
            if(isset($_SESSION['user'])){
                if($Log->count(['news'=>$row['id'],'acc'=>$_SESSION['user']])>0){
                    echo "<a href='Javascript:good({$row['id']})'>收回讚</a>";
                    
                }else{
                    echo "<a href='Javascript:good({$row['id']})'>讚</a>";
                    
                }
            }
            ?>
            </td>
        </tr>
        <?php  }    ?>
    </table>
    <div>
    <?php
    if(($now-1)>0){
        $prev=$now-1;
        echo "<a href='?do=news&p=$prev'> < </a>";
    }
    for($i=1;$i<=$pages;$i++){
        $fontsize=($now==$i)?"font-size:20px":"font-size:16px";
        echo "<a href='?do=news&p=$i' style='$fontsize'> $i </a>";
    }
    if(($now+1)<=$pages){
        $next=$now+1;
        echo "<a href='?do=news&p=$next'> > </a>";
    }
    ?>
    </div>
</fieldset>
<script>
$(".title").hover(
    function(){
        $(".pop").hide()
        let id=$(this).data("id")
        $("#p"+id).show();
    }
)


function good(news){
	$.post("./api/good.php",{news},(e)=>{
        //使用重整頁面的方式來更新按讚的結果
		location.reload();
            // alert(e)
        // /*或是使用前端的方式來更新頁面上的文字
        // //根據點擊的文字來決定動作
		// switch($("#n"+news).text()){
		// 	case "讚":
		// 		//如果按下的字是"讚"，則替換成"收回讚"，並且讚數+1
		// 		$("#n"+news).text("收回讚")
		// 		$("#g"+news).text($("#g"+news).text()*1+1)
		// 	break;
		// 	case "收回讚":
		// 		//如果按下的字是"收回讚"，則替換成"讚"，並且讚數-1
		// 		$("#n"+news).text("讚")
		// 		$("#g"+news).text($("#g"+news).text()*1-1)
		// 	break;
		// } */
	})
}
</script>