<?php

use Exads\Request;
use Exads\Router;

require __DIR__ . '/../vendor/autoload.php';


exit(
(new Router())->handle(
    new Request(
        $_SERVER['REQUEST_URI'],
        $_SERVER['QUERY_STRING'],
        $_SERVER['REQUEST_METHOD'],
    )
)
);
