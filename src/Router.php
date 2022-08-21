<?php


namespace Exads;

use Exads\Controllers\AsciiController;
use Exads\Controllers\ControllerInterface;
use Exads\Controllers\PrimesController;
use Exception;

class Router
{
    private mixed $response = null;

    public function route(RequestInterface $request): mixed
    {
        $this->get('/primes', $request, PrimesController::class);
        $this->get('/ascii', $request, AsciiController::class);


        return $this->response;
    }

    private function get(string $uri, RequestInterface $request, string $controllerClass): void
    {
        $this->method('GET', $uri, $request, $controllerClass);
    }

    private function method(string $method, string $uri, RequestInterface $request, string $controllerClass): void
    {
        if ($this->isMatch($method, $uri, $request)) {
            $this->response = $this->processRequest($controllerClass, $request);
        }
    }

    private function isMatch(string $method, string $uri, RequestInterface $request): bool
    {
        return $request->getMethod() === $method && $request->getUri() === $uri;
    }

    private function processRequest(string $controllerClass, RequestInterface $request): mixed
    {
        $controller = new $controllerClass();
        if (!$controller instanceof ControllerInterface) {
            throw new Exception('Invalid controller type, a ControllerInterface is required');
        }

        if ($this->response === null) {
            return $controller->handle($request);
        }

        return $this->response;
    }
}