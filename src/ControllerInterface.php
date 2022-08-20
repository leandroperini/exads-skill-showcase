<?php


namespace Exads;


interface ControllerInterface
{
    public function handle(RequestInterface $request): mixed;
}