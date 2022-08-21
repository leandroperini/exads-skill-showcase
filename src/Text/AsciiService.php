<?php


namespace Exads\Text;


use Exads\Numbers\NumberService;

class AsciiService
{

    public function __construct(
        private NumberService $numberService
    ) {
    }

    public function getRandomChars(string $first, string $last): array
    {
        $randomChars = [];
        for ($curr = ord($first); $curr <= ord($last); $curr++) {
            $randomChars[$curr] = $curr;
        }
        shuffle($randomChars);

        return $randomChars;
    }

    public function removeIndexFromList(int $charIdx, array $chars): array
    {
        unset($chars[$charIdx]);

        return $chars;
    }

    public function removeCharFromList(string $char, array $chars): array
    {
        return array_filter($chars, fn($item) => $item !== ord($char));
    }

    public function removeRandomCharFromList(array $chars, int &$removedCharCode = null): array
    {
        $removedIdx      = array_rand($chars);
        $removedCharCode = $chars[$removedIdx];

        return $this->removeIndexFromList($removedIdx, $chars);
    }

    public function detectMissingCharFromList(array $chars, string $first, string $last): ?int
    {
        return $this->numberService
            ->detectMissingElementFromNaturalConsecutiveProgression($chars, ord($first), ord($last));
    }
}