
<fieldset>
<legend>會員註冊</legend>
<span style='color:rebeccapurple'>請設定您要註冊</span>
<table>
    <tr>
        <td class="clo">Step:1登入帳號</td>
        <td><input type="text" name="acc" id="acc"></td>
    </tr>
    <tr>
        <td  class="clo">Step:2登入密碼</td>
        <td><input type="text" name="pw" id="pw"></td>
    </tr>
    <tr>
        <td class="clo">Step3:在確認密碼</td>
        <td><input type="text" name="pw2" id="pw2"></td>
    </tr>
    <tr>
        <td class="clo">Step4:信箱</td>
        <td><input type="text" name="email" id="email"></td>
    </tr>
    <tr>
        <td>
            <input type="button" value="註冊" onclick="reg()">
            <input type="reset" value="清除" onclick="clean()">
        </td>
        <td></td>
    </tr>
</table>
</fieldset>

<script>
    function reg(){
        let user={
            acc:$('#acc').val(),
            pw:$('#pw').val(),
            pw2:$('#pw2').val(),
            email:$('#email').val(),
        }

        if(user.acc!=''&& user.pw!=''&& user.pw2!=''&&user.email!=''){
            if(user.pw==user.pw){
                $.post('./api/chk_acc.php',{acc:user.acc},(res)=>{
                    if(parseInt(res)==1){
                        alert('帳號重複')
                    }else{
                        $.post('./api/reg.php',user,(res)=>{
                            alert('註冊完成')
                            // console.log(res)
                        })
                    }
                })
            }else{
                alert('密碼錯誤')
            }
        }else{
            alert('不可空白')
        }
    }


</script>