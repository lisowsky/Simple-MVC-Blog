<?php
session_start();
require_once 'config.php';
$loader = include DIR_VENDOR.'autoload.php';
require_once 'config-router.php';
$router = new \BlogMVC\Engine\Router\Router('http://'.$_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"]);
//var_dump('http://'.$_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"]);
$router->run();
$file=$router->getFile();
$classController=$router->getClass();
$method=$router->getMethod();
if (file_exists($file)) {
    require_once($file);
}
$obj = new $classController();
$obj->$method();