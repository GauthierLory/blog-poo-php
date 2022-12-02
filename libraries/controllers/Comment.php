<?php

namespace Controllers;

use JetBrains\PhpStorm\NoReturn;

class Comment extends Controller
{
    protected string $modelName = \Models\Comment::class;

    /**
     * @return void
     */
    #[NoReturn] public function insert(): void
    {
        $articleModel = new \Models\Article();

        $author = null;
        if (!empty($_POST['author'])) {
            $author = $_POST['author'];
        }

        $content = null;
        if (!empty($_POST['content'])) {
            $content = htmlspecialchars($_POST['content']);
        }

        $article_id = null;
        if (!empty($_POST['article_id']) && ctype_digit($_POST['article_id'])) {
            $article_id = $_POST['article_id'];
        }

        if (!$author || !$article_id || !$content) {
            die("Votre formulaire a été mal rempli !");
        }

        $article = $articleModel->find($article_id);
        if (!$article) {
            die("Ho ! L'article $article_id n'existe pas !");
        }

        $this->model->insert($author, $content, $article_id);

        \Http::redirect("index.php?controller=article&task=show&id=" . $article_id);
    }

    /**
     * @return void
     */
    public function delete(): void
    {
        if (empty($_GET['id']) || !ctype_digit($_GET['id'])) {
            die("Ho ! Fallait préciser le paramètre id en GET !");
        }

        $id = $_GET['id'];

        $commentaire = $this->model->find($id);
        if (!$commentaire) {
            die("Aucun commentaire n'a l'identifiant $id !");
        }

        $article_id = $commentaire['article_id'];
        $this->model->delete($id);

        \Http::redirect("index.php?controller=article&task=show&id=" . $article_id);
    }
}