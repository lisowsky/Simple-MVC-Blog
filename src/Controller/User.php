<?php
namespace BlogMVC\Controller;


/**
 * Kontroler u¿ytkownika
 */

class User extends \BlogMVC\Engine\Controller
{
	public function new()
    {
        $model = new \BlogMVC\Model\User();
        if (!empty($_POST)) {
            $model->insert($_POST);
            $this->redirect($this->generateUrl('user/register'));
        } else {
            $modelUser=new \BlogMVC\Model\Category();
            $view = new \BlogMVC\View\User();
            $view->renderHTML('register', 'front/user/');
        }
    }

    public function login()
    {
        $view = new \BlogMVC\View\User();
        $view->renderHTML('login', 'front/user/');
    }

    public function logout()
    {
        session_start();
        session_unset();
        session_destroy();
        $view = new \BlogMVC\View\User();
        $view->renderHTML('logout', 'front/user/');
    }


}