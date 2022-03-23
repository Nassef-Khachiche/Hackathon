<?php

function route() {
    $request = $_SERVER['REQUEST_URI'];

    switch ($request) {
        case '/' :
            require __DIR__ . '/index.php';
            break;
        case '' :
            require __DIR__ . '/index.php';
            break;
        case '/about' :
            require __DIR__ . '/views/about.php';
            break;
        case '/about' :
            require __DIR__ . '/views/quiz.php';
            break;
        default:
            http_response_code(404);
            require __DIR__ . '/views/404.php';
            break;
    }
}


?>