<?php

namespace BlogMVC\Model;

/**
 * Model kategorii.
 */


class Category extends \BlogMVC\Engine\Model
{
    /**
     * Zwraca z bazy danych wszystkie kategorie
     * @return array|null Tablica z kategoriami
     */
    public function getAll()
    {
        $query = $this->pdo->query("SELECT * from categories");
        $items = $query->fetchAll(\PDO::FETCH_ASSOC);
        if (isset($items)) {
            return $items;
        } else {
            return null;
        }
    }
    /**
     * Dodaje kategorię do bazy
     * @param $data Dane do zapisu
     */
    public function insert($data)
    {
        $ins = $this->pdo->prepare('INSERT INTO categories (name) VALUES (:name)');
        $ins->bindValue(':name', $data['name'], \PDO::PARAM_STR);
        $ins->execute();
    }

    /**
     * Usuwa kategorię z bazy
     * @param int $id ID kategorii
     */
    public function delete($id)
    {
        $del = $this->pdo->prepare('DELETE FROM categories where id=:id');
        $del->bindValue(':id', $id, \PDO::PARAM_INT);
        $del->execute();
    }
}