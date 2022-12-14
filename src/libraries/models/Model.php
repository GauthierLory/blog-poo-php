<?php

namespace Models;


abstract class Model
{
    protected \PDO $pdo;
    protected string $table;

    public function __construct()
    {
        $this->pdo = \Database::getPdo();
    }

    /**
     * @param int $id
     * @return array
     */
    public function find(int $id): array
    {
        $query = $this->pdo->prepare("SELECT * FROM {$this->table} WHERE id = :id");
        $query->execute(['id' => $id]);
        return $query->fetch();
    }

    /**
     * @param string|null $order
     * @return bool|array
     */
    public function findAll(?string $order = ""): bool|array
    {
        $sql = "SELECT * FROM {$this->table}";

        if ($order) {
            $sql .= " ORDER BY " . $order;
        }

        $resultats = $this->pdo->query($sql);
        return $resultats->fetchAll();
    }

    /**
     * @param int $id
     * @return void
     */
    public function delete(int $id): void
    {
        $query = $this->pdo->prepare("DELETE FROM {$this->table} WHERE id = :id");
        $query->execute(['id' => $id]);
    }
}