<?php

namespace Exads\Promotions\Models;

use Exads\AbTests\Models\Scenario;

class PromotionScenario extends Scenario implements PromotionScenarioInterface
{
    public function getDesignId(): int
    {
        return (int) $this->getPayload()['designId'];
    }

    public function getDesignName(): string
    {
        return $this->getPayload()['designName'];
    }

    public function getPromotionName(): string
    {
        return $this->getPayload()['promoName'];
    }
}