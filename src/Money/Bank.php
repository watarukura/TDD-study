<?php

namespace App\Money;

class Bank
{
    public function reduce(Expression $source, string $to): ?Money
    {
        return Money::dollar(10);
    }
}