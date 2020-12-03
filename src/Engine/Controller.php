<?php

namespace BlogMVC\Engine;

use BlogMVC\Helper\Auth;
/**
 * This class includes methods for controllers.
 */
abstract class Controller
{
    /**
     * Przekierowuje na wskazany adres
     *
     * @param string $url URL do przekierowania
     *
     * @return void
     */
    public function redirect($url)
    {
        header("location: " . $url);
    }

    /**
     * Generuje link.
     * @param $name
     * @param null $data
     * @return bool|string
     */

    public function generateUrl($name, $data = null)
    {
        $router = new \BlogMVC\Engine\Router\Router('http://' . $_SERVER["SERVER_NAME"] . $_SERVER["REQUEST_URI"]);
        $collection = $router->getCollection();
        $route = $collection->get($name);
        if (isset($route)) {
            return $route->geneRateUrl($data);
        }
        return false;
    }

    public function checkAuthorization() {
        $user = Auth::getUser();

        if ($user->id) {
            return;
        }

        $this->redirect('/artykuly');
    }
}