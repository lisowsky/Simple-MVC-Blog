<?php
namespace BlogMVC\Controller;

use BlogMVC\Helper\Auth;
use BlogMVC\Model\User as ModelUser;

/**
 * Kontroler u¿ytkownika
 */

class User extends \BlogMVC\Engine\Controller
{

     /**
     * Dodaje u¿ytkownika
     */
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
        if (Auth::getUser()->id) {
            $this->redirect('artykuly');
        }

        if (!empty($_POST)) {
            $success = Auth::authorize($_POST['username'], $_POST['password']);

            if ($success) {
                $this->redirect('/artykuly');
            }
        }
        $view = new \BlogMVC\View\User();
        $view->renderHTML('login', 'front/user/');
    }

    public function logout()
    {
        Auth::logout();
        $this->checkAuthorization();
    }


}