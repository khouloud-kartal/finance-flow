<?php

namespace App\view;

use App\controller\UserController;

require_once('../../../autoloader.php');

$allowedCros = "http://localhost:5173";
    
header("Access-Control-Allow-Origin: " . $allowedCros);
header('Access-Control-Allow-Methods: GET, POST, PUT, DELETE');
header('Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With');
header('Access-Control-Allow-Credentials: true');

if(isset($_GET['register'])){
    var_dump('it is working');
}
