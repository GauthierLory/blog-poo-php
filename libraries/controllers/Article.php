<?php

namespace Controllers;

require_once('libraries/utils.php');
require_once('libraries/models/Article.php');
require_once('libraries/models/Comment.php');

class Article
{
    protected \Models\Article $model;

    public function __construct()
    {
        $this->model = new \Models\Article();
    }

    /**
     * @return void
     */
    public function index(): void
    {
        $articles = $this->model->findAll("created_at DESC");
        $pageTitle = "Accueil";

        render('articles/index', compact('pageTitle','articles'));
    }

    /**
     * @return void
     */
    public function show(): void
    {
        $commentModel = new \Models\Comment();
        $article_id = null;

        if (!empty($_GET['id']) && ctype_digit($_GET['id'])) {
            $article_id = $_GET['id'];
        }

        if (!$article_id) {
            die("Vous devez préciser un paramètre `id` dans l'URL !");
        }

        $article = $this->model->find($article_id);
        $commentaires = $commentModel->findAllWithArticle($article_id);

        $pageTitle = $article['title'];
        render('articles/show', compact('pageTitle','article','commentaires','article_id'));

    }

    /**
     * @return void
     */
    public function delete(): void
    {
        if (empty($_GET['id']) || !ctype_digit($_GET['id'])) {
            die("Ho ?! Tu n'as pas précisé l'id de l'article !");
        }

        $id = $_GET['id'];
        $article = $this->model->find($id);

        if (!$article) {
            die("L'article $id n'existe pas, vous ne pouvez donc pas le supprimer !");
        }

        $this->model->delete($id);

        redirect("index.php");
    }
}