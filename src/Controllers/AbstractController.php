<?php


namespace Exads\Controllers;

abstract class AbstractController implements ControllerInterface
{
    public function sendResponse(mixed $responseContent, string $type = 'text/plain '): mixed
    {
        header("Content-Type: $type; charset=utf-8");

        return $responseContent;
    }

    public function sendJsonResponse(mixed $responseContent)
    {
        return $this->sendResponse(json_encode($responseContent), 'application/json');
    }
}
