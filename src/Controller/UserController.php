<?php 
namespace App\controller;       // Permet à l'autoloader de savoir où il est
use App\model\UserModel;

class UserController{
    private ?int $id;
    private ?string $userName;
    private ?string $password;
    private ?string $image;
    public ?string $msg;

    public function __construct(){
        
    }

    ///////////////////////////////////////////////////////////////////////////////////////////////////
    /////////////////////////////////////// Register //////////////////////////////////////////////////
    //////////////////////////////////////////////////////////////////////////////////////////////////

    public function checkPasswordRegex($password, $confPassword){
        $password_regex = "/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-]).{8,}$/"; 
        $checkRegex = false; 
        $checkConfPassword = false;
  
        if(preg_match($password_regex, $password)){
            $checkRegex = true;
        }
        else{
            $this->msg = "The password is not conform";
        }
    
        if($password == $confPassword){
            $checkConfPassword = true;
        }
        else{
            $this->msg = "Both password have to be identical";
        }
        
        if($checkRegex && $checkConfPassword){
            return true;
        }
    }

    public function checkUserName($userName){
        $post = ['userName' => $userName];

        $request = new UserModel();
        $count = $request->requestCheckUserNameExists($userName);

        if($count < 1){
            return true;
        }
        else{
            $this->msg = "The user name already exists";
        }
    }

    public function uploadImage($file){
        $path = "../images/profile/";
        $fichier = basename($file['name']);
        
        if(move_uploaded_file($file['tmp_name'], $path . $fichier)){
        }
    }


    public function register($post, $file){

        if($post['userName'] !== '' && $post['password'] !== '' && $post['confirmPassword'] !== ''){
            
            if($this->checkUserName($post['userName'])){
                
                if($this->checkPasswordRegex($post['password'], $post['confirmPassword'])){

                    // $post = htmlspecialchars(trim($post));

                    $post['password'] = password_hash($post['password'], PASSWORD_BCRYPT);

                    unset($post['confirmPassword']);

                    $request = new UserModel();
                    $request->requestRegister($post, $file['name']);

                    $this->uploadImage($file);
                    
                    $this->msg = "You are regitered with success";
                    
                }

            }else{
                $this->msg = "The user name already exists";
            }

        }
        else{
            $this->msg = "Please fill in all the blanks";
        }

    }


    ///////////////////////////////////////////////////////////////////////////////////////////////////
    /////////////////////////////////////// SETTERS //////////////////////////////////////////////////
    //////////////////////////////////////////////////////////////////////////////////////////////////

    function setUserName($userName){
        $this->userName = $userName;
    }

    function setImage($image){
        $this->image = $image;
    }

    function setPassword($password){
        $this->password = $password;
    }

    function setMsg($msg){
        $this->msg = $msg;
    }

    ///////////////////////////////////////////////////////////////////////////////////////////////////
    /////////////////////////////////////// GETTERS ///////////////////////////////////////////////////
    //////////////////////////////////////////////////////////////////////////////////////////////////

    function getUserName(){
        return $this->userName;
    }

    function getImage(){
        return $this->image;
    }

    function getPassword(){
        return $this->password;
    }

    function getMsg(){
        return $this->msg;
    }

}