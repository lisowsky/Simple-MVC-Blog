<?php

namespace BlogMVC\Engine;
use \PDO;

/**
 * @package BlogMVC\Engine
 */

/**
 * This class includes methods for models.
 *
 * @abstract
 */
abstract class Model {

    /**
     * object of the class PDO
     *
     * @var object
     */
    protected $pdo;

    /**
     * It sets connect with the database.
     *
     * @return void
     */
    public function __construct() {
        try {
            $this->pdo = new PDO('mysql:host=' . DATABASE_HOST . ';dbname=' . DATABASE_NAME, DATABASE_USER, DATABASE_PASSOWD, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (DBException $e) {
            echo 'The connect can not create: ' . $e->getMessage();
        }
    }

}