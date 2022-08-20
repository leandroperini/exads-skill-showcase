<?php


namespace Exads;


use Exads\Numbers\Prime;

class PrimesController implements ControllerInterface
{

    public function handle(RequestInterface $request): mixed
    {
        header('Content-Type: application/json; charset=utf-8');
        return json_encode(Prime::generatePrimes());
    }
}