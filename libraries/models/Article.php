<?php

require_once('libraries/database.php');

class Article
{
    /**
     * @return bool|array
     */
    public function findAll(): bool|array
    {
        $pdo = getPdo();

        $resultats = $pdo->query('SELECT * FROM articles ORDER BY created_at DESC');
        return $resultats->fetchAll();
    }

    /**
     * @param int $id
     * @return array
     */
    public function find(int $id): array
    {
        $pdo = getPdo();

        $query = $pdo->prepare("SELECT * FROM articles WHERE id = :article_id");
        $query->execute(['article_id' => $id]);
        return $query->fetch();
    }

    /**
     * @param int $id
     * @return void
     */
    public function delete(int $id): void
    {
        $pdo = getPdo();

        $query = $pdo->prepare('DELETE FROM articles WHERE id = :id');
        $query->execute(['id' => $id]);
    }
}