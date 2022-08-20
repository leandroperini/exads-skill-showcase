<?php


namespace Exads;


interface RequestInterface
{
    public function __construct(
        ?string $uri = null,
        ?string $query = null,
        ?string $method = null,
    );

    public function getUri(): string;
    public function getQuery(): string;
    public function getMethod(): string;
}