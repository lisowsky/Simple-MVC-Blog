<?php

namespace BlogMVC\Model;

/**
 * Model rejestracji.
 */


class Category extends \BlogMVC\Engine\Model
{
	 public function insert($data) 
     {
        $ins=$this->pdo->prepare('INSERT INTO users (username, password) VALUES (
        :username, :password, :email)');
        $ins->bindValue(':username', $data['username'], \PDO::PARAM_STR);
        $ins->bindValue(':password', $data['password'], \PDO::PARAM_STR);
        $ins->bindValue(':email', $data['email'], \PDO::PARAM_STR);
        $ins->execute();
    }

    public function display($id)
    {
        $query = $this->pdo->query("SELECT a.id, a.title, a.date_add, a.author, c.name, a.content FROM articles AS a LEFT JOIN categories AS c ON a.id_categories=c.id where a.id=".(int)$id);
        $items = $query->fetchAll(\PDO::FETCH_ASSOC);
        if (isset($items[0])) {
            return $items[0];
        } else {
            return null;
        }
    }

}