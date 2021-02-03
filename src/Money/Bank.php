<?php

namespace App\Money;

class Bank
{
    /**
     * @var array
     */
    private $rates = [];

    public function reduce(Expression $source, string $to): Money
    {
        return $source->reduce($this, $to);
    }

    public function addRate(string $from, string $to, int $rate): void
    {
        $pair = new Pair($from, $to);
        $this->rates[$pair->getName()] = $rate;
    }

    public function rate(string $from, string $to): int
    {
        if ($from === $to) {
            return 1;
        }
        $pair = new Pair($from, $to);
        return $this->rates[$pair->getName()];
    }
}
