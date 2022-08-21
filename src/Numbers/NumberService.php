<?php

namespace Exads\Numbers;

use Exads\Numbers\Models\Number;

class NumberService
{

    /**
     *
     * @return Number[]
     */
    public function findPrimes(int $start = 0, int $end = 10000): array
    {
        $processedNumbers = [];
        for ($curr = $start; $curr <= $end; $curr++) {
            $number = new Number($curr, false);

            if ($this->isPrime($number)) {
                $number = $number->setIsPrime(true);
            } else {
                $number = $number->setDivisors($this->getDivisors($number));
            }

            $processedNumbers[] = $number;
        }

        return $processedNumbers;
    }

    public function isPrime(Number $num): bool
    {
        if ($num->getNumber() !== 2 && ($num->getNumber() === 1 || $this->isEven($num))) {
            return false;
        }

        for ($idx = floor(sqrt($num->getNumber())); $idx > 1; $idx--) {
            if ($num->getNumber() % $idx === 0) {
                return false;
            }
        }

        return true;
    }

    private function isEven(Number $num): bool
    {
        return $num->getNumber() % 2 === 0;
    }

    public function getDivisors(Number $num): array
    {
        $divisors = [];

        for ($idx = $num->getNumber(); $idx > 0; $idx--) {
            if ($num->getNumber() % $idx === 0) {
                $divisors[] = $idx;
            }
        }

        return $divisors;
    }

    public function detectMissingElementFromNaturalConsecutiveProgression(
        array $incompleteProgression, int $firstOriginal, int $lastOriginal
    ): ?int
    {
        $sizeOriginal  = ($lastOriginal - $firstOriginal) + 1;

        $sumElementsOriginal   = (($sizeOriginal / 2) * ($firstOriginal + $lastOriginal));
        $sumElementsIncomplete = array_sum($incompleteProgression);

        $missing = (int) ($sumElementsOriginal - $sumElementsIncomplete);

        return $missing !== 0 ? $missing : null;
    }
}