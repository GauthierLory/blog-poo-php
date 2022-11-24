<?php

require_once('libraries/database.php');

class Comment
{
    /**
     * @param int $article_id
     * @return bool|array
     */
    public function findAllWithArticle(int $article_id): bool|array
    {
        $pdo = getPdo();

        $query = $pdo->prepare("SELECT * FROM comments WHERE article_id = :article_id");
        $query->execute(['article_id' => $article_id]);
        return $query->fetchAll();
    }

    /**
     * @param int $id
     * @return mixed
     */
    public function find(int $id)
    {
        $pdo = getPdo();

        $query = $pdo->prepare('SELECT * FROM comments WHERE id = :id');
        $query->execute(['id' => $id]);

        return $query->fetch();
    }

    /**
     * @param int $id
     * @return void
     */
    public function delete(int $id): void
    {
        $pdo = getPdo();

        $query = $pdo->prepare('DELETE FROM comments WHERE id = :id');
        $query->execute(['id' => $id]);
    }

    /**
     * @param string $author
     * @param string $content
     * @param int $article_id
     * @return void
     */
    public function insert(string $author, string $content, int $article_id): void
    {
        $pdo = getPdo();

        $query = $pdo->prepare('INSERT INTO comments SET author = :author, content = :content, article_id = :article_id, created_at = NOW()');
        $query->execute(compact('author', 'content', 'article_id'));
    }
}