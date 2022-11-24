<?php

require_once('libraries/models/Model.php');

class Article extends Model
{
    /**
     * @return bool|array
     */
    public function findAll(): bool|array
    {
        $resultats = $this->pdo->query('SELECT * FROM articles ORDER BY created_at DESC');
        return $resultats->fetchAll();
    }

    /**
     * @param int $id
     * @return array
     */
    public function find(int $id): array
    {
        $query = $this->pdo->prepare("SELECT * FROM articles WHERE id = :article_id");
        $query->execute(['article_id' => $id]);
        return $query->fetch();
    }

    /**
     * @param int $id
     * @return void
     */
    public function delete(int $id): void
    {
        $query = $this->pdo->prepare('DELETE FROM articles WHERE id = :id');
        $query->execute(['id' => $id]);
    }
}