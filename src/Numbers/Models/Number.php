<?php


namespace Exads\Numbers\Models;


class Number
{

    public function __construct(
        private int $number,
        private bool $isPrime,
        private array $divisors = [],
    ) {
    }

    public function getNumber(): int
    {
        return $this->number;
    }

    public function isPrime(): bool
    {
        return $this->isPrime;
    }

    public function getDivisors(): array
    {
        return $this->divisors;
    }

    public function setNumber(int $number): self
    {
        return $this->setProperty('number', $number);
    }

    public function setIsPrime(bool $isPrime): self
    {
        $new = $this->setProperty('isPrime', $isPrime);

        if ($isPrime) {
            $new->divisors = [1, $this->getNumber()];
        }

        return $new;
    }

    public function setDivisors(array $divisors): self
    {
        return $this->setProperty('divisors', $divisors);
    }

    private function setProperty(string $name, mixed $value): self
    {
        $clone        = clone $this;
        $clone->$name = $value;

        return $clone;
    }

    public function __toString(): string
    {
        return sprintf(
            '%s [%s]',
            $this->getNumber(),
            $this->isPrime ? 'PRIME' : implode(',', $this->getDivisors())
        );
    }


}