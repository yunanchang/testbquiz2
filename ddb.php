<?php

date_default_timezone_set("Asia/Taipei");
session_start();

class DB{

   protected $dsn='mysql:host=localhost;chartset=utf8;dbname=db02';
   protected $pdo;
   protected $table;
   
   public function __construct($table)
   {
    $this->table=$table;
    $this->pdo=new PDO($this->dsn,'root','');
   }

   function all($where='',$other=''){
    $sql="select * from `$this->table`";
    $sql=$this->sql_all($sql,$where,$other);
    return $this->pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
 
   }

   private function a2s($array){
      foreach($array as $col => $value){
         $tmp[]="`$col`=`$value`";
      }
      return $tmp;
   }
   private function sql_all($sql,$array,$other){
      if(isset($this->table)){
         if(is_array($array)){
            if(!empty($array)){
               $tmp=$this->a2s($array);
               
            }
         }
      }
   }
}