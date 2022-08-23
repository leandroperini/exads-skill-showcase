<?php


namespace Exads\Promotions\Models;

use JsonSerializable;

class Promotion implements JsonSerializable
{
    public function __construct(
        protected int $id,
        protected string $name,
        protected PromotionDesignInterface $design,
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

    public function getDesign(): PromotionDesignInterface
    {
        return $this->design;
    }

    public function jsonSerialize()
    {
        return get_object_vars($this);
    }
}