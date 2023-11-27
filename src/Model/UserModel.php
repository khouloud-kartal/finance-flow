<?php

namespace App\model;

class UserModel extends GlobalModel{

    public function requestCheckUserNameExists($userName){
        $request = $this->connect->prepare("SELECT * FROM user WHERE userName = :userName");
        $request->execute([':userName' => $userName]);
        $data = $request->rowCount();

        return $data;
    }

    public function requestRegister($post, $file){
        $request = $this->connect->prepare("INSERT INTO user (userName, image, password) VALUES (:userName, :image, :password)");
        $request->execute([':userName' => $post['userName'],
                            ':image' => $file,
                            ':password' => $post['password']
        ]);

        return $request;
    }

    public function requestCheckUserNameToConnect($userName){

        $request = $this->connect->prepare("SELECT * FROM user WHERE userName = :userName"); 
        $request->execute([':userName' => $userName]);
        $count = $request->rowCount();

        return $count;
    }

    public function requestCheckPasswordToConnect($userName, $password){

        $request = $this->connect->prepare("SELECT * FROM user WHERE userName = :userName AND password = :password"); 
        $request->execute(['userName' => $userName,
                            'password' => $password]);
        $data = $request->fetchAll(\PDO::FETCH_ASSOC);

        return $data;
    }

    public function requestGetDataToConnect($userName){
        $request = $this->connect->prepare("SELECT * FROM user WHERE userName = :userName"); 
        $request->execute(['userName' => $userName]);
        $data = $request->fetch(\PDO::FETCH_ASSOC);

        return $data;
    }

    public function requestGetDataUserName($userName){
        $request = $this->connect->prepare("SELECT * FROM user WHERE userName = :userName");
        $request->execute([':userName' => $userName]);

        $data = $request->fetch(\PDO::FETCH_ASSOC);
        return $data;
    }
}