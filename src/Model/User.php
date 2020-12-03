<?php

namespace BlogMVC\Model;

/**
 * Model u¿ytkownika
 */


class User extends \BlogMVC\Engine\Model
{
    public $id;
    
    public $username;

    public $password;

    public $email;
    
	 public function insert($data) 
     {
        $ins=$this->pdo->prepare('INSERT INTO users (username, password, email) VALUES (
        :username, :password, :email)');
        $ins->bindValue(':username', $data['username'], \PDO::PARAM_STR);
        $ins->bindValue(':password', $data['password'], \PDO::PARAM_STR);
        $ins->bindValue(':email', $data['email'], \PDO::PARAM_STR);
        $ins->execute();
    }
    
    public function getById(int $id): User
    {
        $model = new self;
        $query = $model->pdo->query('SELECT id,username,password,email FROM users WHERE id = ' . $id);
        $result = $query->fetch(\PDO::FETCH_ASSOC);

        return $model->getModel($model, $result);
    }

    private function getModel($model, $params)
    {
        if (!$params) {
            return new User();
        }

        foreach ($params as $key => $value) {
            $model->$key = $value;
        }
        
        return $model;
    }

    public static function getByCredentials($username, $password)
    {
        $model = new self;
        $query = $model->pdo->query('SELECT id,username,password,email FROM users WHERE username = "' . $username . '" AND password =' . '"' . $password . '"');
        $result = $query->fetch(\PDO::FETCH_ASSOC);

        return $model->getModel($model, $result);
    }

}