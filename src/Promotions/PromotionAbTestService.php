<?php


namespace Exads\Promotions;

use Exads\ABTestData;
use Exads\AbTests\AbTestService;
use Exads\AbTests\Models\ScenarioInterface;
use Exads\Promotions\Models\Promotion;
use Exads\Promotions\Models\PromotionScenario;
use Exads\Promotions\Models\PromotionScenarioInterface;

class PromotionAbTestService extends AbTestService
{
    public function getTargetEntity(): string
    {
        return Promotion::class;
    }

    /**
     * @return ScenarioInterface[]
     * @throws \Exads\ABTestException
     */
    public function getAbTestData(mixed $promotionId): array
    {
        $abData    = new ABTestData($promotionId);
        $scenarios = [];
        foreach ($abData->getAllDesigns() as $item) {
            $item['targetIdentifier'] = $promotionId;
            $item['promoName']        = $abData->getPromotionName();
            $scenarios[]              = new PromotionScenario($item,
                                                              $item['splitPercent'],
                                                              $this->getTargetEntity()
            );
        }

        return $scenarios;
    }

    public function getScenarioForPromotion(int $promoId): PromotionScenarioInterface
    {
        $scenario = $this->getScenarioForTarget($promoId);

        return new PromotionScenario(
            $scenario->getPayload(),
            $scenario->getOccurrencePercentage(),
            $scenario->getTargetEntity()
        );
    }

}