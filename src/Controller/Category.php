<?php
namespace BlogMVC\Controller;


/**
 * Kontroler do kategorii.
 */

class Category extends \BlogMVC\Engine\Controller
{
    /**
     * Wyświetla listę kategorii
     */
    public function index()
    {
        $model = new \BlogMVC\Model\Category();
        $categories = $model->getAll();
        $view = new \BlogMVC\View\Category();
        $view->categories = $categories;
        $view->renderHTML('index', 'front/category/');
    }

    /**
     * Wyświetla formularz i dodaje kategorię
     */
    public function add()
    {
        $model = new \BlogMVC\Model\Category();
        if (!empty($_POST)) {
            $model->insert($_POST);
            $this->redirect($this->generateUrl('category/index'));
        } else {
            $view = new \BlogMVC\View\Category();
            $view->renderHTML('add', 'front/category/');
        }
    }

    /**
     * Usuwa kategorię
     */
    public function delete()
    {
        $model = new \BlogMVC\Model\Category();
        $model->delete($_GET['id']);;
        $this->redirect($this->generateUrl('category/index'));
    }
}