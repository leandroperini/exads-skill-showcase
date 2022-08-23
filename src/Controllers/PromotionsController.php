<?php

namespace Exads\Controllers;

use Exads\Promotions\Models\PromotionDesignInterface;
use Exads\Promotions\PromotionAbTestService;
use Exads\Promotions\PromotionDesignFactory;
use Exads\Promotions\PromotionService;
use Exads\RequestInterface;

class PromotionsController extends AbstractController
{

    public function defaultHandler(RequestInterface $request): mixed
    {
        $promotionId = $request->getQueryParam('id');
        $chosenAbTestScenario = $this->getAbTestService()
                                ->getScenarioForPromotion($promotionId);

        $chosenDesign = PromotionDesignFactory::createFromScenario($chosenAbTestScenario);

        $promotion = $this->getPromotionService($chosenDesign)->findPromotion($promotionId);

        return $this->sendJsonResponse($promotion);
    }


    /*
     * Could be a Factory if it was bigger and more complex
     */
    private function getPromotionService(PromotionDesignInterface $design): PromotionService
    {
        return new PromotionService($design);
    }

    private function getAbTestService()
    {
        return new PromotionAbTestService();
    }
}