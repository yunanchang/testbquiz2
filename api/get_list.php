<?php include_once 'db.php';

$rows=$News->all(['type'=>$_GET['tpye'],'sh'=>1]);

foreach($rows as $row){

   
    echo "<a href='Javascript:getNews({$row['id']})'>";
    echo $row['title'];
    echo "</a>";
 
}