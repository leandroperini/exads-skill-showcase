<?php


namespace Exads;

use Exads\Controllers\AsciiController;
use Exads\Controllers\ControllerInterface;
use Exads\Controllers\PrimesController;
use Exads\Controllers\TvSeriesController;
use Exception;

class Router
{
    private mixed $response = null;

    public function route(RequestInterface $request): mixed
    {
        $this->get('/primes', $request, PrimesController::class);
        $this->get('/ascii', $request, AsciiController::class);
        $this->get('/tv-series', $request, TvSeriesController::class);
        $this->get('/tv-series/now', $request, TvSeriesController::class, 'now');


        return $this->response;
    }

    private function get(
        string $uri,
        RequestInterface $request,
        string $controllerClass,
        ?string $handler = null,
    ): void {
        $this->method('GET', $uri, $request, $controllerClass, $handler);
    }

    private function method(
        string $method,
        string $uri,
        RequestInterface $request,
        string $controllerClass,
        ?string $handler = null,
    ): void {
        $handler = $handler === null ? 'handle' : $handler . 'Handler';
        if ($this->isMatch($method, $uri, $request)) {
            $this->response = $this->processRequest($controllerClass, $request, $handler);
        }
    }

    private function isMatch(string $method, string $uri, RequestInterface $request): bool
    {
        return $request->getMethod() === $method && $request->getUri() === $uri;
    }

    private function processRequest(
        string $controllerClass,
        RequestInterface $request,
        string $handler,
    ): mixed {
        $controller = new $controllerClass();
        if (!$controller instanceof ControllerInterface) {
            throw new Exception('Invalid controller type, a ControllerInterface is required');
        }

        if ($this->response === null) {
            return $controller->$handler($request);
        }

        return $this->response;
    }
}