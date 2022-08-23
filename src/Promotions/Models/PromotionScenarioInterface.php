<?php

namespace Exads\Promotions\Models;

interface PromotionScenarioInterface
{
    public function getDesignId(): int;

    public function getDesignName(): string;

    public function getPromotionName(): string;
}