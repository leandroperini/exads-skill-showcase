<?php


namespace Exads\Promotions\Models;


use Exads\Designs\Models\Design;

class PromotionDesign extends Design implements PromotionDesignInterface
{

    public function __construct(
        protected int $id,
        protected string $name,
        protected string $promotionName,
    ) {
        parent::__construct($id, $name);
    }

    public function getPromotionName(): string
    {
        return $this->promotionName;
    }
}