<?php


namespace Exads;


interface ControllerInterface
{
    public function handle(RequestInterface $request): mixed;
    public function sendResponse(mixed $responseContent, string $type): mixed;
}