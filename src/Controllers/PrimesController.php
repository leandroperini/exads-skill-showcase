<?php


namespace Exads\Controllers;

use Exads\Numbers\Models\Number;
use Exads\Numbers\NumberService;
use Exads\RequestInterface;

class PrimesController extends AbstractController
{

    public function defaultHandler(RequestInterface $request): mixed
    {
        $processedNumbers = $this->getNumberService()->findPrimes(1, 100);

        return $this->sendResponse($this->formatNumberDivisorsList($processedNumbers));
    }

    private function formatNumberDivisorsList(array $processedNumbers): string
    {
        /** @var Number $processedNumber */
        $result = '';
        foreach ($processedNumbers as $processedNumber) {
            $result .= $processedNumber . PHP_EOL;
        }

        return $result;
    }

    /*
     * Could be a Factory if it was bigger and more complex
     */
    private function getNumberService(): NumberService
    {
        return new NumberService();
    }
}