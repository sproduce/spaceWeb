<?php

require_once('../vendor/autoload.php');

$execObj = new App\api\execClass();

$apiObj = new App\api\taskClass($execObj);

try {
    $token = $apiObj->getToken('sproduce', 'xh2tw6*n23LUTba5');
}catch (Exception $e) {
    echo "ERROR: ".$e->getMessage(), "\n";
}



try {
    $response = $apiObj->move('a1590testdomain.ru', 'none');
    echo $response;
}catch (Exception $e) {
    echo "ERROR: ".$e->getMessage(), "\n";
}
