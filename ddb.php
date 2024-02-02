<?php 

date_default_timezone_set('Asia/Taipei');

session_start();

class DB{
   protected $dsn ="mysql:host=location;chartset=utf8;dbname=db0";
   protected $pdo;
   protected $stable;
   function __construct($table)
   {
      $this->table=$table;
      $this->pdo=new PDO($this->dsn,'root','');
      
   }
   function q($sql){
      return $this->pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
   }

   function a2s($array){
      foreach($array as $col =>$value){
         $tmp[]="`$col`='$value'";
      }
      return $tmp;
   }
   function sql_all($sql,$array,$other){

        if (isset($this->table) && !empty($this->table)) {
    
            if (is_array($array)) {
    
                if (!empty($array)) {
                    $tmp = $this->a2s($array);
                    $sql .= " where " . join(" && ", $tmp);
                }
            } else {
                $sql .= " $array";
            }
    
            $sql .= $other;
            // echo 'all=>'.$sql;
            // $rows = $this->pdo->query($sql)->fetchColumn();
            return $sql;
        } 
    }



}