<?php

namespace ExadsTests\unit\Numbers;

use Exads\Numbers\Models\Number;
use Exads\Numbers\Processor;
use ExadsTests\ExadsTestCase;

class ProcessorTest extends ExadsTestCase
{

    /**
     * @dataProvider primesProvider
     */
    public function testGeneratePrimes(int $number, bool $isPrime)
    {
        $this->assertEquals(
            $isPrime,
            (new Processor())->isPrime(
                new Number($number, false)
            )
        );
    }

    public function primesProvider()
    {
        //primes from https://primes.utm.edu/lists/
        return [
            [2, true],
            [3, true],
            [5, true],
            [7, true],
            [11, true],
            [13, true],
            [17, true],
            [19, true],
            [23, true],
            [29, true],
            [31, true],
            [37, true],
            [41, true],
            [43, true],
            [47, true],
            [53, true],
            [59, true],
            [61, true],
            [67, true],
            [71, true],
            [73, true],
            [79, true],
            [83, true],
            [89, true],
            [97, true],
            [101, true],
            [211, true],
            [307, true],
            [401, true],
            [503, true],
            [601, true],
            [701, true],
            [809, true],
            [907, true],
            [1999, true],
            [2999, true],
            [3989, true],
            [4999, true],
            [5987, true],
            [6997, true],
            [7583, true],
            [104723, true],
            [104729, true],
            [982451653, true],
            [2 * 2, false],
            [3 * 2, false],
            [5 * 2, false],
            [7 * 2, false],
            [11 * 2, false],
            [13 * 2, false],
            [17 * 2, false],
            [19 * 2, false],
            [23 * 2, false],
            [29 * 2, false],
            [31 * 2, false],
            [37 * 2, false],
            [41 * 2, false],
            [43 * 2, false],
            [47 * 2, false],
            [53 * 2, false],
            [59 * 2, false],
            [61 * 2, false],
            [67 * 2, false],
            [71 * 2, false],
            [73 * 2, false],
            [79 * 2, false],
            [83 * 2, false],
            [89 * 2, false],
            [97 * 2, false],
            [101 * 2, false],
            [211 * 2, false],
            [307 * 2, false],
            [401 * 2, false],
            [503 * 2, false],
            [601 * 2, false],
            [701 * 2, false],
            [809 * 2, false],
            [907 * 2, false],
            [1999 * 2, false],
            [2999 * 2, false],
            [3989 * 2, false],
            [4999 * 2, false],
            [5987 * 2, false],
            [6997 * 2, false],
            [7583 * 2, false],
            [104723 * 2, false],
            [104729 * 2, false],
            [982451653 * 2, false],
        ];
    }
}
