<fieldset>
    <legend>目前位置:首頁>問卷調查</legend>
    <table>
        <tr>
            <th>編號</th>
            <th>問卷題目</th>
            <th>投票總數</th>
            <th>結果</th>
            <th>狀態</th>
        </tr>
        <?php
        $ques=$Que->all(['subject_id'=>0]);
        foreach($ques as $key=> $que){
        ?>
        <tr>
            <td><?=$key+1;?></td>
            <td><?=$que['text'];?></td>
            <td><?=$que['vote'];?></td>
            <td>
                <a href="?do=result&id=<?=$que['id']?>">結果</a>
            </td>
            <td>
                <?php
                if(isset($_SESSION['user'])){
                    echo "<a href='?do=vote&id={$que['id']}'>餐與投票</a>";
                }else{
                    echo '請先登錄';
                }
                ?>
            </td>
        </tr>
        <?php    
        }
        ?>
    </table>
</fieldset>