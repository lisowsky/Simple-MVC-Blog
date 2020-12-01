<?php
$collection = new \BlogMVC\Engine\Router\RouteCollection();

$collection->add('category/delete', new \BlogMVC\Engine\Router\Route(
    HTTP_SERVER.'kategorie/usun/<id>?',
    array(
        'file' => DIR_CONTROLLER.'Category.php',
        'method' => 'delete',
        'class' => '\BlogMVC\Controller\Category'
    ),
    array(
        'id' => '\d+'
    ),
    array(
        'id' => 0
    )
));
$collection->add('category/add', new \BlogMVC\Engine\Router\Route(
    HTTP_SERVER.'kategorie/dodaj',
    array(
        'file' => DIR_CONTROLLER.'Category.php',
        'method' => 'add',
        'class' => '\BlogMVC\Controller\Category'
    )
));
$collection->add('category/index', new \BlogMVC\Engine\Router\Route(
    HTTP_SERVER.'kategorie',
    array(
        'file' => DIR_CONTROLLER.'Category.php',
        'method' => 'index',
        'class' => '\BlogMVC\Controller\Category'
    )
));
$collection->add('article/delete', new \BlogMVC\Engine\Router\Route(
    HTTP_SERVER.'artykuly/usun/<id>?',
    array(
        'file' => DIR_CONTROLLER.'Article.php',
        'method' => 'delete',
        'class' => '\BlogMVC\Controller\Article'
    ),
    array(
        'id' => '\d+'
    ),
    array(
        'id' => 0
    )
));
$collection->add('article/one', new \BlogMVC\Engine\Router\Route(
    HTTP_SERVER.'artykuly/wyswietl/<id>?',
    array(
        'file' => DIR_CONTROLLER.'Article.php',
        'method' => 'one',
        'class' => '\BlogMVC\Controller\Article'
    ),
    array(
        'id' => '\d+'
    ),
    array(
        'id' => 0
    )
));
$collection->add('article/add', new \BlogMVC\Engine\Router\Route(
    HTTP_SERVER.'artykuly/dodaj',
    array(
        'file' => DIR_CONTROLLER.'Article.php',
        'method' => 'add',
        'class' => '\BlogMVC\Controller\Article'
    )
));
$collection->add('article/index', new \BlogMVC\Engine\Router\Route(
    HTTP_SERVER.'artykuly',
    array(
        'file' => DIR_CONTROLLER.'Article.php',
        'method' => 'index',
        'class' => '\BlogMVC\Controller\Article'
    )
));
$collection->add('user/register', new \BlogMVC\Engine\Router\Route(
    HTTP_SERVER.'rejestracja',
    array(
        'file' => DIR_CONTROLLER.'User.php',
        'method' => 'new',
        'class' => '\BlogMVC\Controller\User'
    )
));
$collection->add('user/login', new \BlogMVC\Engine\Router\Route(
    HTTP_SERVER.'logowanie',
    array(
        'file' => DIR_CONTROLLER.'User.php',
        'method' => 'login',
        'class' => '\BlogMVC\Controller\User'
    )
));
$collection->add('user/logout', new \BlogMVC\Engine\Router\Route(
    HTTP_SERVER.'wylogowano',
    array(
        'file' => DIR_CONTROLLER.'User.php',
        'method' => 'logout',
        'class' => '\BlogMVC\Controller\User'
    )
));
$collection->add('homepage', new \BlogMVC\Engine\Router\Route(
    HTTP_SERVER.'',
    array(
        'file' => DIR_CONTROLLER.'Article.php',
        'method' => 'index',
        'class' => '\BlogMVC\Controller\Article'
    )
));


$router = new \BlogMVC\Engine\Router\Router($_SERVER['REQUEST_URI'], $collection);
