// JavaScript Document
function lo(th,url)
{
	$.ajax(url,{cache:false,success: function(x){$(th).html(x)}})
}
function good(id,type,user)
{
	$.post("back.php?do=good&type="+type,{"id":id,"user":user},function()
	{
		if(type=="1")
		{
			$("#vie"+id).text($("#vie"+id).text()*1+1)
			$("#good"+id).text("收回讚").attr("onclick","good('"+id+"','2','"+user+"')")
		}
		else
		{
			$("#vie"+id).text($("#vie"+id).text()*1-1)
			$("#good"+id).text("讚").attr("onclick","good('"+id+"','1','"+user+"')")
		}
	})
}

function clean(){
    //針對特定類型的input標籤進行資料清空的動作
    $("input[type='text'],input[type='password'],input[type='number'],input[type='radio']").val("");
}

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