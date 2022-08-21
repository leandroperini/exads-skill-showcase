<?php


namespace Exads\Controllers;

use Exads\RequestInterface;

interface ControllerInterface
{
    public function handle(RequestInterface $request): mixed;

    public function sendResponse(mixed $responseContent, string $type): mixed;
}