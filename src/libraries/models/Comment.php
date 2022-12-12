<?php

namespace Models;

class Comment extends Model
{
    protected string $table = "comments";

    /**
     * @param int $article_id
     * @return bool|array
     */
    public function findAllWithArticle(int $article_id): bool|array
    {
        $query = $this->pdo->prepare("SELECT * FROM comments WHERE article_id = :article_id");
        $query->execute(['article_id' => $article_id]);
        return $query->fetchAll();
    }

    /**
     * @param string $author
     * @param string $content
     * @param int $article_id
     * @return void
     */
    public function insert(string $author, string $content, int $article_id): void
    {
        $query = $this->pdo->prepare('INSERT INTO comments SET author = :author, content = :content, article_id = :article_id, created_at = NOW()');
        $query->execute(compact('author', 'content', 'article_id'));
    }
}