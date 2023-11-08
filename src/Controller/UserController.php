<?php 
namespace App\controller;       // Permet à l'autoloader de savoir où il est
use App\model\UserModel;

class UserController{
    private ?int $id;
    private ?string $login;
    private ?string $email;
    private ?string $password;
    public ?string $msg;

    public function __constructor(){
        
    }
}