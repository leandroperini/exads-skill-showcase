<?php


namespace Exads;


interface RequestInterface
{
    public function __construct(
        ?string $uri = null,
        array $query = null,
        ?string $method = null,
    );

    public function getUri(): string;

    public function getQuery(): array;

    public function getQueryParam(string $name, mixed $default = null): mixed;

    public function getMethod(): string;
}