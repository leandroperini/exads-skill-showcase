<?php

namespace ExadsTests;

use GuzzleHttp\Client;
use GuzzleHttp\ClientInterface;
use PHPUnit\Framework\TestCase;

class ExadsTestCase extends TestCase
{
    protected ?ClientInterface $httpClient = null;

    protected function setUp(): void
    {
        parent::setUp();
        $this->httpClient = new Client(
            [
                'base_uri' => 'http://nginx/',
            ]
        );
    }

}