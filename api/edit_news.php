<?php
 include_once "db.php";
//  dd($_POST);
if(isset($_POST['id'])){
    foreach($_POST['id'] as $id){
        if(isset($_POST['del']) && in_array($id,$_POST['del'])){
            $News->del('id');
            
        }else{
            $news=$News->find($id);
            // dd($news);
            $news['sh']=(isset($_POST['sh'])&& in_array($id,$_POST['sh']))?1:0;
            $News->save($news);
            // dd($news);
        }
    }
}
to("../back.php?do=news");