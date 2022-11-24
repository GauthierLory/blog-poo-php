<?php

// render('article/show')
function render (string $path, array $variables): void
{
    // ['var1' => 1, 'var2' => 'Goat']
    // $var1 = 2
    // $var2 = 'Goat'

    extract($variables);
    ob_start();
    require('templates/' . $path . '.html.php');
    $pageContent = ob_get_clean();

    require('templates/layout.html.php');
}