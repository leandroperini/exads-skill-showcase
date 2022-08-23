<?php


namespace Exads\Controllers;

use Exads\RequestInterface;

interface ControllerInterface
{
    public function defaultHandler(RequestInterface $request): mixed;

    public function sendResponse(mixed $responseContent, string $type): mixed;
}