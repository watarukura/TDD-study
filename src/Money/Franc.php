<?php

namespace App\Money;

class Franc extends Money
{
    public function times(int $multiplier): Money
    {
        return Money::franc($this->amount * $multiplier);
    }
}
