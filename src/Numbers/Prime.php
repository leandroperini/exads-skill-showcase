<?php

namespace Exads\Numbers;

class Prime {

    public static function generatePrimes(int $start = 0, int $end = 10000): array
    {
        $primes = [];
        for ($curr = $start; $curr < $end; $curr++) {
            $primes[] = $curr;
        }

        return $primes;
    }

}