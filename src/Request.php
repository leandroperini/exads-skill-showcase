<?php


namespace Exads;


class Request implements RequestInterface
{

    public function __construct(
        private ?string $uri = null,
        private ?string $query = null,
        private ?string $method = null,
    ) {
    }

    public function getUri(): string
    {
        return $this->uri ?? '';
    }

    public function getQuery(): string
    {
        return $this->query ?? '';
    }

    public function getMethod(): string
    {
        return $this->method ?? '';
    }

}