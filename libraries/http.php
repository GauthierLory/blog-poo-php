<?php

use JetBrains\PhpStorm\NoReturn;

class Http
{
    /**
     * @param string $url
     * @return void
     */
    #[NoReturn] public static function redirect (string $url): void
    {
        header("Location: $url");
        exit();
    }
}