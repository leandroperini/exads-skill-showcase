<?php

use Exads\Request;
use Exads\Router;

require __DIR__ . '/../vendor/autoload.php';
require __DIR__ . '/../doctrineBootstrap.php';

$uri         = rtrim(parse_url($_SERVER['REQUEST_URI'] ?? '', PHP_URL_PATH), '/') ?: '';
$queryString = parse_url($_SERVER['REQUEST_URI'] ?? '', PHP_URL_QUERY) ?: '';


if ($uri === '') {
    header_register_callback(static function () {
        if ($_SERVER['REQUEST_URI'] ?? true) {
            header_remove();
        }
    });
    $terminalOptions = getopt('r:p:', ['route:', 'params:']);
    $uri             = $terminalOptions['route'] ?? $terminalOptions['r'] ?? '/';
    $queryString     = $terminalOptions['params'] ?? $terminalOptions['p'] ?? '';
}

$response = (new Router())->route(
    new Request(
        $uri,
        array_merge(
            ...array_map(
                   static function ($item) {
                       [$name, $val] = array_merge(explode('=', $item), [null, null]);

                       return $name == null ? [] : [$name => $val];
                   },
                   array_merge(explode('&', $queryString), [])
               )
        ),
        $_SERVER['REQUEST_METHOD'] ?? 'GET',
    )
);

exit($response);
