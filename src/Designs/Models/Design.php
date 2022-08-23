<?php

namespace Exads\Designs\Models;

use JsonSerializable;

class Design implements DesignInterface, JsonSerializable
{

    public function __construct(
        protected int $id,
        protected string $name,
    ) {
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function jsonSerialize()
    {
        return get_object_vars($this);
    }
}