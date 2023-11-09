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

    public function uploadImage($dossier, $file){
        $path = "images/". $dossier . "/";
        $fichier = basename($file['name']);
        
        if(move_uploaded_file($file['tmp_name'], $path . $fichier)){
        }
    }


    public function register($post, $file){

        if($post['userName'] !== null && $post['password'] !== null && $post['confirmPassword'] !== null && $file['name'] !== null){
            
            if($this->checkUserName($post['userName'])){
                
                if($this->checkPasswordRegex($post['password'], $post['confirmPassword'])){

                    // $post = htmlspecialchars(trim($post));

                    $post['password'] = password_hash($post['password'], PASSWORD_BCRYPT);

                    unset($post['confirmPassword']);

                    $request = new UserModel();
                    $request->requestRegister($post, $file['name']);

                    $this->uploadImage('profile', $file);
                    
                    $this->msg = "You are regitered with success";
                    
                }

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
}