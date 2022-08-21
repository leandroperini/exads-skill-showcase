<?php


namespace Exads\Controllers;

use Exads\Numbers\Models\Number;
use Exads\Numbers\NumberService;
use Exads\RequestInterface;

class PrimesController extends AbstractController
{

    public function handle(RequestInterface $request): mixed
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

    private function getNumberService(): NumberService
    {
        return new NumberService();
    }
}