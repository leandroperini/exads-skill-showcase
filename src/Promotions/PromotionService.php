<?php


namespace Exads\Promotions;

use Exads\ABTestData;
use Exads\Promotions\Models\Promotion;
use Exads\Promotions\Models\PromotionDesignInterface;

class PromotionService
{
    public function __construct(
        private PromotionDesignInterface $design
    ) {
    }

    public function findPromotion(int $id): Promotion
    {
        $promotionData = new ABTestData($id);

        return new Promotion($id, $promotionData->getPromotionName(), $this->design);
    }

}