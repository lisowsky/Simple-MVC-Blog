<?php

namespace BlogMVC\Model;

/**
 * Model u¿ytkownika
 */


class User extends \BlogMVC\Engine\Model
{
	 public function insert($data) 
     {
        $ins=$this->pdo->prepare('INSERT INTO users (username, password, email) VALUES (
        :username, :password, :email)');
        $ins->bindValue(':username', $data['username'], \PDO::PARAM_STR);
        $ins->bindValue(':password', $data['password'], \PDO::PARAM_STR);
        $ins->bindValue(':email', $data['email'], \PDO::PARAM_STR);
        $ins->execute();
    }
    
    public function getLogin($data)
    {

    }

}