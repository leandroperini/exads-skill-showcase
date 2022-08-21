<?php


namespace Exads;


class Request implements RequestInterface
{

    public function __construct(
        private ?string $uri = null,
        private ?array $query = null,
        private ?string $method = null,
    ) {
    }

    public function getUri(): string
    {
        return $this->uri ?? '';
    }

    public function getQuery(): array
    {
        return $this->query ?? [];
    }

    public function getMethod(): string
    {
        return $this->method ?? '';
    }

    public function getQueryParam(string $name, mixed $default = null): mixed
    {
        return $this->getQuery()[$name] ?? $default;
    }
}