<?php


namespace Exads;

use Exads\Numbers\Models\Number;
use Exads\Numbers\Processor;

class PrimesController extends AbstractController
{

    public function handle(RequestInterface $request): mixed
    {
        $processedNumbers = (new Processor())->findPrimes(1, 100);

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
}