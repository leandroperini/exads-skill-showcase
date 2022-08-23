<?php

namespace Exads\Promotions;

use Exads\Promotions\Models\PromotionDesign;
use Exads\Promotions\Models\PromotionDesignInterface;
use Exads\Promotions\Models\PromotionScenarioInterface;

class PromotionDesignFactory
{
    public static function createFromScenario(PromotionScenarioInterface $scenario): PromotionDesignInterface
    {
        return new PromotionDesign(
            $scenario->getDesignId(),
            $scenario->getDesignName(),
            $scenario->getPromotionName(),
        );
    }
}