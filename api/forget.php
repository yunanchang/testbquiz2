<?php include_once 'db.php';

// dd($_POST);
$user=$User->find(['email'=>$_POST['email']]);

if(empty($user)){
    echo '無知廖';
}else{
    echo $user['pw'];
}

// dd($user);