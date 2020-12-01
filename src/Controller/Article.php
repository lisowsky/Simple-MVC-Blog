<?php
namespace BlogMVC\Controller;


/**
 * Kontroler do artykułów.
 */


class Article extends \BlogMVC\Engine\Controller
{
    /**
     * Wyświetla listę artykułów
     */
    public function index()
    {
        $model = new \BlogMVC\Model\Article();
        $articles = $model->getAll();
        $view = new \BlogMVC\View\Article();
        $view->articles = $articles;
        $view->renderHTML('index', 'front/article/');
    }
    /**
     * Wyświetla jeden artykuł
     */
    public function one()
    {
        $model = new \BlogMVC\Model\Article();
        $article = $model->getOne($_GET['id']);
        $view = new \BlogMVC\View\Article();
        $view->article = $article;
        $view->renderHTML('one', 'front/article/');
    }

    /**
     * Wyświetla formularz i dodaje artykuł
     */
    public function add()
    {
        $model = new \BlogMVC\Model\Article();
        if (!empty($_POST)) {
            $model->insert($_POST);
            $this->redirect($this->generateUrl('article/index'));
        } else {
            $modelCategory=new \BlogMVC\Model\Category();
            $view = new \BlogMVC\View\Article();
            $view->categories=$modelCategory->getAll();
            $view->renderHTML('add', 'front/article/');
        }
    }

    /**
     * Usuwa artykuł
     */
    public function delete()
    {
        $model = new \BlogMVC\Model\Article();
        $model->delete($_GET['id']);;
        $this->redirect($this->generateUrl('article/index'));
    }
}