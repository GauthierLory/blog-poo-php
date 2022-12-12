<?php

class Database
{
    /**
     * @return PDO
     */
    public static function getPdo (): PDO
    {
        $user = 'root';
        $pass = 'example';
        $pdo = new PDO('mysql:host=192.168.1.83;port=3306;dbname=blogpoo', $user, $pass);

        return $pdo;
    }
}