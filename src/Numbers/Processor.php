<?php

namespace Exads\Numbers;

use Exads\Numbers\Models\Number;

class Processor
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
}