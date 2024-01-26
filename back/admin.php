<fieldset>
    <legend>帳號管理</legend>
    <form action="./api/edit_user.php" method="post">
    <table style='width: 55%;margin:auto;text-align:center'>
        <tr>
            <td>帳號</td>
            <td>密碼</td>
            <td>刪除</td>
          
        </tr>
        <?php
        $rows=$User->all();
        foreach($rows as $row){
            if($row['acc']!='admin'){
                ?>
                <tr>
                    <td><?=$row['acc'];?></td>
                    <td><?=str_repeat('*',mb_strlen($row['pw']));?></td>
                    <td>
                        <input type="checkbox" name="del[]" id="<?=$row['id'];?>">
                    </td>
                </tr>

            <?php
            }
        }
        ?>
    </table>
    <div class="ct">
        <input type="submit" value="確認刪除">
        <input type="reset" value="清空">
    </div>

    </form>
    <h2>新增會員</h2>
    <span style='color:red'>請設定您要註冊的帳密</span>
    <table>
        <tr>
            <td class="clo">Step:1登入帳號</td>
            <td><input type="text" name="acc" id="acc"></td>
        </tr>
        <tr>
            <td class="clo">Step:2登入密碼</td>
            <td><input type="password" name="pw" id="pw"></td>
        </tr>
        <tr>
            <td class="clo">Step:3在確任密碼</td>
            <td><input type="password" name="pw2" id="pw2"></td>
        </tr>
        <tr>
            <td class="clo">信箱</td>
            <td><input type="text" name="email" id="email"></td>
        </tr>
        <tr>
            <td ><input type="button" value="註冊" onclick="reg()">
                <input type="button" value="清除" onclick='clean()'>
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
                            // alert('註冊完成')
                            location.reload()
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