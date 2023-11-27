<?php

namespace App\model;

class UserModel extends GlobalModel{

    function requestCheckUserNameExists($userName){
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
}