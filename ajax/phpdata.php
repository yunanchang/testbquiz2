<?php

header('Content-Type: application/json');

$mobileArr=[
    's1'=>'amy',
    's2'=>'bob',
    's3'=>'candy'
];



echo json_encode($mobileArr);