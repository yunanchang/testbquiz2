<?php include_once 'db.php';

$user=$User->find(['email'=>$_POST['email']]);

if(empty($user)){
    echo '無知廖';
}else{
    echo $user['pw'];
}