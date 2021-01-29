<?php

namespace App\Money;

class Franc extends Money
{
    public function __construct(int $amount)
    {
        $this->amount = $amount;
    }

    public function times(int $multiplier): Money
    {
        return new Franc($this->amount * $multiplier);
    }
}
