<?php

namespace App\view;

use App\controller\UserController;

require_once('../../../autoloader.php');

$allowedCros = "http://localhost:5173";
    
header("Access-Control-Allow-Origin: " . $allowedCros);
header('Access-Control-Allow-Methods: GET, POST, PUT, DELETE');
header('Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With');
header('Access-Control-Allow-Credentials: true');

$user = new UserController();

if(isset($_GET['register'])){    
    $user->Register($_POST, $_FILES['image']);
    echo $user->getMsg();
}

if(isset($_GET['login'])){

    
    $user->Login($_POST);
    echo $user->getMsg();

}

// var_dump($_SESSION);