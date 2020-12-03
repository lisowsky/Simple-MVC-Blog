<?php

namespace BlogMVC\Model;

use BlogMVC\Helper\Auth;

/**
 * Model artykułów.
 */

class Article extends \BlogMVC\Engine\Model
{
    /**
     * Zwraca z bazy danych wszystkie artykuły
     * @return array|null Tablica z artykułami
     */
    public function getAll()
    {
        $query = $this->pdo->query("SELECT a.id, a.title, a.date_add, a.author, c.name FROM articles AS a LEFT JOIN categories AS c ON a.id_categories=c.id");
        $items = $query->fetchAll(\PDO::FETCH_ASSOC);
        if (isset($items)) {
            return $items;
        } else {
            return null;
        }
    }

    /**
     * Zwraca z bazy danych jeden artykuł
     * @param int $id ID artykułu
     * @return array|null Tablica z danymi jednego artykułu
     */
    public function getOne($id)
    {
        $query = $this->pdo->query("SELECT a.id, a.title, a.date_add, a.author, c.name, a.content FROM articles AS a LEFT JOIN categories AS c ON a.id_categories=c.id where a.id=".(int)$id);
        $items = $query->fetchAll(\PDO::FETCH_ASSOC);
        if (isset($items[0])) {
            return $items[0];
        } else {
            return null;
        }
    }

    /**
     * Dodaje artykuł do bazy
     * @param $data Dane do zapisu
     */
    public function insert($data) {
        $ins=$this->pdo->prepare('INSERT INTO articles (title, content, date_add, author, id_categories) VALUES (
            :title, :content, :date_add, :author, :id_categories, :id_user)');
        $ins->bindValue(':title', $data['title'], \PDO::PARAM_STR);
        $ins->bindValue(':content', $data['content'], \PDO::PARAM_STR);
        $ins->bindValue(':date_add', $data['date_add'], \PDO::PARAM_STR);
        $ins->bindValue(':author', $data['author'], \PDO::PARAM_STR);
        $ins->bindValue(':id_categories', $data['cat'], \PDO::PARAM_INT);
        $ins->bindValue(':id_user', Auth::getUser()->id, \PDO::PARAM_INT);
        $ins->execute();
    }

    /**
     * Usuwa artykuł z bazy
     * @param int $id ID artykułu
     */
    public function delete($id) {
        $del=$this->pdo->prepare('DELETE FROM articles where id=:id');
        $del->bindValue(':id', $id, \PDO::PARAM_INT);
        $del->execute();
    }
}