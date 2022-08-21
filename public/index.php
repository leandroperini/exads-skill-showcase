<?php

use Exads\Request;
use Exads\Router;

require __DIR__ . '/../vendor/autoload.php';

[$uri, $queryString] = array_merge(explode('?', $_SERVER['REQUEST_URI'] ?? null, 2), ['']);

header_register_callback(static function () {
    if ($_SERVER['REQUEST_URI'] ?? true) {
        header_remove();
    }
});

if ($uri === '') {
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
