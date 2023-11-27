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

    private function checkFormNotEmpty($posts){
        
        foreach ($posts as $post) {
            if ($post == null || $post == '') {
                return false;
            }
        }
        return true;

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
    /////////////////////////////////////// LOGIN /////////////////////////////////////////////////////
    ///////////////////////////////////////////////////////////////////////////////////////////////////


    private function checkPasswordConnect($userName, $password){
        $request = new UserModel();
        $data = $request->requestGetDataUserName($userName);
        if(is_array($data)){

            if(password_verify($password, $data['password'])){
                return true;
            }else{
                $this->msg = "<p class='error'>Identifiant ou mot de passe incorrect</p>";
            }
        }else{
            $this->msg = "<p class='error'>Identifiant est incorrect</p>";
        }

    }

    public function Login($post){
        if($this->checkFormNotEmpty($post)){
            if($this->checkPasswordConnect($post['userName'], $post['password'])){
                $request = new UserModel();
                $data = $request->requestGetDataUserName($post['userName']);

                $userConnected = new UserController();

                $userConnected->setId(intval($data['id']));
                $userConnected->setUserName($data['userName']);
                $userConnected->setImage($data['image']);
                $userConnected->setPassword($data['password']);

                $_SESSION['user'] = $userConnected;

                $this->msg = "You are connected";
            }
        }else{
            $this->msg = "<p class='error'>Fill all the fields. </p>";
        }
    }



    ///////////////////////////////////////////////////////////////////////////////////////////////////
    /////////////////////////////////////// SETTERS //////////////////////////////////////////////////
    //////////////////////////////////////////////////////////////////////////////////////////////////

    public function setId($id){
        $this->id = $id;
    }

    public function setUserName($userName){
        $this->userName = $userName;
    }

    public function setImage($image){
        $this->image = $image;
    }

    public function setPassword($password){
        $this->password = $password;
    }

    public function setMsg($msg){
        $this->msg = $msg;
    }

    ///////////////////////////////////////////////////////////////////////////////////////////////////
    /////////////////////////////////////// GETTERS ///////////////////////////////////////////////////
    //////////////////////////////////////////////////////////////////////////////////////////////////

    
    public function getId(){
        return $this->id;
    }

    public function getUserName(){
        return $this->userName;
    }

    public function getImage(){
        return $this->image;
    }

    public function getPassword(){
        return $this->password;
    }

    public function getMsg(){
        return $this->msg;
    }
}